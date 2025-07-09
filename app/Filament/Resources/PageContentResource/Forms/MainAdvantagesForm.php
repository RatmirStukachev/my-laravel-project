<?php

namespace App\Filament\Resources\PageContentResource\Forms;

use Filament\Forms\Components\Section;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\FileUpload;
use Mohamedsabil83\FilamentFormsTinyeditor\Components\TinyEditor;

class MainAdvantagesForm
{
    public static function get(): array
    {
        return [
            Section::make('')->schema([
                TextInput::make('data.title')
                    ->columnSpanFull()
                    ->label('Заголовок'),
                TinyEditor::make('data.desc')
                    ->label('Описание')
                    ->columnSpanFull(),
            ])->columns(2),
            Repeater::make('data.blocks')
                ->label('Блоки')
                ->columnSpanFull()
                ->schema([
                    TextInput::make('title')
                        ->label('Заголовок'),
                    TextInput::make('desc')
                        ->label('Описание'),
                    FileUpload::make('svg')
                        ->label('Картинка svg 16x20')
                        ->directory('main_advantages'),
                ]),
        ];
    }
}
