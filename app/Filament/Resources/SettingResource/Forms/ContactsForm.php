<?php

namespace App\Filament\Resources\SettingResource\Forms;

use Filament\Forms\Components\Section;
use Filament\Forms\Components\Checkbox;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\FileUpload;
use Mohamedsabil83\FilamentFormsTinyeditor\Components\TinyEditor;

class ContactsForm
{
    const NAME = 'Contacts';
    const ICON = 'heroicon-o-document-text';

    public static function get(): array
    {
        return [            
            Section::make('')->schema([
                TextInput::make('company_name')
                    ->label('Название компании'),
                TextInput::make('company_address')
                    ->label('Юридический адрес'),
            ])->columns(2),
            TinyEditor::make('work_time')
                ->columnSpanFull()
                ->label('Время работы'),
            TinyEditor::make('company_info')
                ->columnSpanFull()
                ->label('О компании (footer)'),
            TextInput::make('email')
                    ->label('Почты для получения заказов (через запятую)'),
            TextInput::make('email_callback')
                    ->label('Почты для обратной связи (через запятую)'),
            TinyEditor::make('company_info')
                ->columnSpanFull()
                ->label('Инфо о компании'),
            Repeater::make('contacts_phones')
                ->label('Номера телефонов')
                ->schema([                    
                    FileUpload::make('phone_svg')
                        ->columnSpanFull()
                        ->acceptedFileTypes(['image/svg+xml'])
                        ->label('Картинка (svg)'),
                    Section::make('')->schema([
                        TextInput::make('service_name')
                            ->label('Отдел'),
                        TextInput::make('phone')
                                ->label('Телефон'),
                    ])->columns(2),
                    Checkbox::make('is_main')
                        ->label('Главный телефон'),
                    Checkbox::make('is_dropdown')
                        ->label('В выпадающем списке'),
                ])->createItemButtonLabel('Добавить телефон'),
            Repeater::make('contacts_emails')
                ->label('Email для контактов')
                ->schema([
                    TextInput::make('email')
                        ->label('Email'),
                    Checkbox::make('is_main')
                        ->label('Главный email'),
                    // Checkbox::make('is_dropdown')
                    //     ->label('В выпадающем списке'),
                ])->createItemButtonLabel('Добавить eamil'),
            Section::make('Social networks')->schema([
                TextInput::make('telegram')
                    ->autofocus()
                    ->label('Telegram (@nickname)'),
                TextInput::make('whatsapp')
                    ->autofocus()
                    ->label('WhatsApp (номер телефона 375..)'),
                TextInput::make('viber')
                    ->autofocus()
                    ->label('Viber (номер телефона 375..)'),
            ])->columns(3),
            Section::make('Карта')->schema([
                TextInput::make('coords')
                    ->autofocus()
                    ->label('Координаты (широта, долгота)'),
                TextInput::make('coords_name')
                    ->autofocus()
                    ->label('Адрес (на карте)'),
            ])->columns(3),
        ];
    }
}
