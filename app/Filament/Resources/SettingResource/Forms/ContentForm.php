<?php

namespace App\Filament\Resources\SettingResource\Forms;

use Filament\Forms\Components\Section;
use Filament\Forms\Components\TextInput;
use Mohamedsabil83\FilamentFormsTinyeditor\Components\TinyEditor;

class ContentForm
{
    const NAME = 'Контент';
    const ICON = 'heroicon-o-document-text';
    public static function get(): array
    {
        return [
            TextInput::make('copyright')->label('Копирайты'),
            TextInput::make('privacy')->label('Ссылка на политику обработки персональных данных'),
            TextInput::make('products_count')->label('Кол-во товаров на странице'),
            TextInput::make('brands_count')->label('Кол-во брендов на странице'),
            TextInput::make('news_count')->label('Кол-во новостей на странице'),
            TextInput::make('reviews_count_company')->label('Кол-во отзывов на странице'),
            TextInput::make('articles_count')->label('Кол-во статей на странице'),
            TextInput::make('yandex_api')->label('Yandex api key'),
            Section::make('Реквизиты')->schema([
                TinyEditor::make('statement')
                    ->autofocus()
                    ->columnSpanFull()
                    ->label('Адреса'),
                TinyEditor::make('credentials')
                    ->autofocus()
                    ->columnSpanFull()
                    ->label('Резвизиты'),
                TinyEditor::make('certificate')
                    ->autofocus()
                    ->columnSpanFull()
                    ->label('Свидетельство'),
            ]),
        ];
    }
}
