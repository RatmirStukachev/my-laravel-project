<?php

namespace App\Filament\Resources;

use App\Filament\Resources\FeedBackResource\Pages;
use App\Filament\Resources\FeedBackResource\RelationManagers;
use App\Models\FeedBack;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class FeedBackResource extends Resource
{
    public const NAME = 'Обратная связь';
    protected static ?string $model = FeedBack::class;
    protected static ?string $navigationGroup = 'Обратная связь';
    protected static ?string $navigationLabel = self::NAME;
    protected static ?string $pluralModelLabel = self::NAME;
    protected static ?int $navigationSort = 2;
    protected static ?string $breadcrumb = self::NAME;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->label('Имя'),
                Forms\Components\TextInput::make('phone')
                    ->label('Телефон'),
                Forms\Components\TextInput::make('email')
                    ->label('Email'),
                Forms\Components\TextInput::make('organization')
                    ->label('Название компании'),
                Forms\Components\TextInput::make('equipment')
                    ->label('Оборудование'),
                Forms\Components\TextInput::make('product_link')
                    ->label('Ссылка на товар'),
                Forms\Components\TextInput::make('product_price')
                    ->label('Цена товара'),
                Forms\Components\Textarea::make('message')
                    ->columnSpanFull()
                    ->label('Сообщение'),
                Forms\Components\TextInput::make('file')
                    ->label('Файл (скачать можно по пути /storage/путь_к_файлу)'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('organization')
                    ->label('Название компании')
                    ->searchable(),
                Tables\Columns\TextColumn::make('equipment')
                    ->label('Оборудование'),
                Tables\Columns\TextColumn::make('product_link')
                    ->label('Ссылка на товар'),
                Tables\Columns\TextColumn::make('product_price')
                    ->label('Цена товара'),
                Tables\Columns\TextColumn::make('name')
                    ->label('Имя')
                    ->searchable(),
                Tables\Columns\TextColumn::make('phone')
                    ->label('Телефон')
                    ->searchable(),
                Tables\Columns\TextColumn::make('email')
                    ->label('Email')
                    ->searchable(),
                Tables\Columns\TextColumn::make('message')
                    ->label('Сообщение')
                    ->wrap()
                    ->searchable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime('d.m.Y H:i:s')
                    ->label('Дата')
                    ->sortable(),
            ])
            ->defaultSort('created_at', 'desc')
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
            'index' => Pages\ListFeedBacks::route('/'),
            // 'create' => Pages\CreateFeedBack::route('/create'),
            'edit' => Pages\EditFeedBack::route('/{record}/edit'),
        ];
    }
}
