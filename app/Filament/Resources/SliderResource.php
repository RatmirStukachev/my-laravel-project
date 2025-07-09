<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SliderResource\Pages;
use App\Filament\Resources\SliderResource\RelationManagers;
use App\Models\Slider;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class SliderResource extends Resource
{
    const NAME = 'Слайдер';
    protected static ?string $model = Slider::class;
    protected static ?string $navigationGroup = 'Контент';
    protected static ?string $navigationLabel = self::NAME;
    protected static ?string $pluralModelLabel = self::NAME;
    protected static ?string $modelLabel = self::NAME;
    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
        ->schema([
            Forms\Components\TextInput::make('title')
                ->label('Заголовок слайда')
                ->required()
                ->columnSpanFull()
                ->maxLength(655),
            Forms\Components\Section::make('')->schema([
                Forms\Components\FileUpload::make('image')
                    ->label('Изображение (1410x300)')
                    ->columnSpanFull()
                    ->directory('slider')
                    ->required(),
                Forms\Components\FileUpload::make('image_mobile')
                    ->label('Изображение мобайл (575x700)')
                    ->columnSpanFull()
                    ->directory('slider'),
            ])->columns(2),
            Forms\Components\Section::make('')->schema([
                Forms\Components\TextInput::make('link')
                    ->columnSpanFull()
                    ->label('Ссылка слайда'),
                Forms\Components\ColorPicker::make('color')
                    ->columnSpanFull()
                    ->label('Цвет слайда'),
            ])->columns(2),
            Forms\Components\TextInput::make('pos')
                ->numeric()
                ->columnSpanFull()
                ->default(1000)
                ->label('Позиция (Опционально)'),
            Forms\Components\Toggle::make('is_active')
                ->label('Активно'),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('title')
                    ->label('Заголовок'),
                Tables\Columns\ImageColumn::make('image')
                    ->label('Изображение')
                    ->square(),
                Tables\Columns\TextInputColumn::make('pos')->label('Позиция'),
                Tables\Columns\CheckboxColumn::make('is_active')
                    ->label('Активен'),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListSliders::route('/'),
            'create' => Pages\CreateSlider::route('/create'),
            'edit' => Pages\EditSlider::route('/{record}/edit'),
        ];
    }
}
