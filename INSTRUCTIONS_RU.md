Понял тебя! Проблема в том, что категория 79 (Триммеры) на сайте сейчас помечена как **неактивная**, поэтому она вообще не отображается в списке выбора. К тому же, мы добавим вывод ID в формате `ID | Название`, чтобы тебе было удобнее.

Вот обновленная инструкция. Тебе нужно изменить два файла.

### 1. Изменяем модель категорий
Открой файл: `app/Models/Category.php`

**Шаг 1.1: Добавляем связь для получения всех подкатегорий**
Найди примерно 60-ю строку (там где `parent()`) и добавь после неё новый метод `childRaw()`:
```php
    public function parent(): hasOne
    {
        return $this->hasOne(self::class, 'id', 'parent_id')->where('is_active', true);
    }

    // Добавь вот это:
    public function childRaw(): HasMany
    {
        return $this->hasMany(self::class, 'parent_id', 'id')->orderByPos();
    }
```

**Шаг 1.2: Обновляем формирование списка (Tree)**
Найди методы `getCategoryTree()` и `getProductCategoryTree()` (примерно 230-270 строки). Тебе нужно заменить их код полностью на этот.
*Обрати внимание: мы заменили `child` на `childRaw`, чтобы подтягивались даже скрытые (неактивные) категории, и добавили вывод ID.*

```php
    public static function getCategoryTree(): array
    {
        $categories = self::query()
            ->where('level', 1)
            ->with(['childRaw', 'childRaw.childRaw'])
            ->orderBy('pos')
            ->get();

        $options = [null => 'Категория первого уровня'];

        foreach ($categories as $category) {
            $options[$category->id] = "{$category->id} | " . $category->title;

            foreach ($category->childRaw as $childCategory) {
                $options[$childCategory->id] = '⤷ ' . "{$childCategory->id} | " . $childCategory->title;

                foreach ($childCategory->childRaw as $grandChildCategory) {
                    $options[$grandChildCategory->id] = ' ⤷⤷ ' . "{$grandChildCategory->id} | " . $grandChildCategory->title;
                }
            }
        }

        return $options;
    }

    public static function getProductCategoryTree(): array
    {
        $categories = self::query()
            ->where('level', 1)
            ->with(['childRaw', 'childRaw.childRaw'])
            ->orderBy('pos')
            ->get();

        $options = [];

        foreach ($categories as $category) {
            $options[$category->id] = "{$category->id} | " . $category->title;

            foreach ($category->childRaw as $childCategory) {
                $options[$childCategory->id] = '⤷ ' . "{$childCategory->id} | " . $childCategory->title;

                foreach ($childCategory->childRaw as $grandChildCategory) {
                    $options[$grandChildCategory->id] = ' ⤷⤷ ' . "{$grandChildCategory->id} | " . $grandChildCategory->title;
                }
            }
        }

        return $options;
    }
```

---

### 2. Обновляем поиск в товарах
Открой файл: `app/Filament/Resources/ProductResource.php`

Найди настройку поля `category_id` (примерно 77-90 строка). Замени блок `getSearchResultsUsing` на этот:

```php
                                           Forms\Components\Select::make('category_id')
                                                ->label('Категория')
                                                ->options(Category::getProductCategoryTree())
                                                ->optionsLimit(500)
                                                ->required()
                                                ->getSearchResultsUsing(function (string $search) {
                                                    // Фильтруем категории по названию или по цифрам ID
                                                    return collect(Category::getProductCategoryTree())
                                                        ->filter(function ($categoryName, $categoryId) use ($search) {
                                                            return mb_stripos($categoryName, $search) !== false || mb_stripos((string)$categoryId, $search) !== false;
                                                        })
                                                        ->toArray();
                                                })
                                                ->searchable(),
```

---

### Что теперь будет:
1. В выпадающем списке появятся **все** категории, включая неактивные (такие как 79).
2. Названия будут выглядеть так: `79 | Триммеры`.
3. В поиске можно будет просто написать `79`, и категория сразу найдется.

Теперь ты сможешь выбрать категорию 79 для своего товара, даже если она сейчас скрыта на сайте.
