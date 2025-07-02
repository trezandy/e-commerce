<?php

namespace App\Filament\Resources\ProductResource\RelationManagers;

use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class VariantsRelationManager extends RelationManager
{
    protected static string $relationship = 'variants';

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->label('Nama Varian (e.g., 250g, Merah, XL)')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('price')
                    ->label('Harga Normal')
                    ->numeric()
                    ->prefix('Rp')
                    ->required(),
                Forms\Components\TextInput::make('sale_price')
                    ->label('Harga Diskon (Opsional)')
                    ->numeric()
                    ->prefix('Rp'),
                Forms\Components\TextInput::make('stock')
                    ->label('Stok Varian')
                    ->numeric()
                    ->required(),
            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('name')
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->label('Varian'),
                Tables\Columns\TextColumn::make('price')
                    ->money('IDR')
                    ->sortable(),
                Tables\Columns\TextColumn::make('sale_price')
                    ->default('-')
                    ->label('Harga Diskon')
                    ->money('IDR')
                    ->sortable(),
                Tables\Columns\TextColumn::make('stock'),
            ])
            ->filters([
                //
            ])
            ->headerActions([
                Tables\Actions\CreateAction::make(),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }
}
