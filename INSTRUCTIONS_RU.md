Привет! Я подготовил подробную инструкцию, как сделать так, чтобы в админ-панели при создании товара ты видел ID категорий и мог искать их по этим цифрам.

Тебе нужно будет изменить два файла.

### 1. Добавляем ID в список категорий
Открой файл: `app/Models/Category.php`

Найди в нем методы `getCategoryTree()` и `getProductCategoryTree()`. Тебе нужно изменить строки, где формируются названия категорий, чтобы перед ними в скобках выводился их ID.

**Что нужно изменить в `getCategoryTree`:**
Найди этот блок (примерно 235 строка):
```php
        foreach ($categories as $category) {
            $options[$category->id] = $category->title;

            foreach ($category->child as $childCategory) {
                $options[$childCategory->id] = '⤷ '.$childCategory->title;

                foreach ($childCategory->child as $grandChildCategory) {
                    $options[$grandChildCategory->id] = ' ⤷⤷ '.$grandChildCategory->title;
                }
            }
        }
```

И замени его на этот (мы добавили `"[{$category->id}] "` перед названием):
```php
        foreach ($categories as $category) {
            $options[$category->id] = "[{$category->id}] " . $category->title;

            foreach ($category->child as $childCategory) {
                $options[$childCategory->id] = '⤷ ' . "[{$childCategory->id}] " . $childCategory->title;

                foreach ($childCategory->child as $grandChildCategory) {
                    $options[$grandChildCategory->id] = ' ⤷⤷ ' . "[{$grandChildCategory->id}] " . $grandChildCategory->title;
                }
            }
        }
```

**Точно так же сделай в методе `getProductCategoryTree`** (примерно 260 строка). Замени цикл на:
```php
        foreach ($categories as $category) {
            $options[$category->id] = "[{$category->id}] " . $category->title;

            foreach ($category->child as $childCategory) {
                $options[$childCategory->id] = '⤷ ' . "[{$childCategory->id}] " . $childCategory->title;

                foreach ($childCategory->child as $grandChildCategory) {
                    $options[$grandChildCategory->id] = ' ⤷⤷ ' . "[{$grandChildCategory->id}] " . $grandChildCategory->title;
                }
            }
        }
```

---

### 2. Включаем поиск по цифрам (ID)
Открой файл: `app/Filament/Resources/ProductResource.php`

Найди описание поля `category_id` (примерно 77 строка). Там есть функция `getSearchResultsUsing`, которая отвечает за поиск.

**Найди этот блок:**
```php
                                                ->getSearchResultsUsing(function (string $search) {
                                                    // Фильтруем категории по поисковому запросу
                                                    return collect(Category::getProductCategoryTree())
                                                        ->filter(function ($categoryName) use ($search) {
                                                            return mb_stripos($categoryName, $search) !== false;
                                                        })
                                                        ->toArray();
                                                })
```

**И замени его на этот:**
```php
                                                ->getSearchResultsUsing(function (string $search) {
                                                    // Фильтруем категории по поисковому запросу или ID
                                                    return collect(Category::getProductCategoryTree())
                                                        ->filter(function ($categoryName, $categoryId) use ($search) {
                                                            return mb_stripos($categoryName, $search) !== false || (string)$categoryId === $search;
                                                        })
                                                        ->toArray();
                                                })
```
*(Здесь мы добавили условие `|| (string)$categoryId === $search`, которое позволяет находить категорию, если ты ввел её точный ID).*

---

### Что изменится:
1. Теперь в выпадающем списке категорий ты будешь видеть названия в формате: `[79] Триммеры`.
2. Если ты введешь в поиске цифру `79`, в результатах сразу появится категория «Триммеры».

Если возникнут вопросы — пиши!
