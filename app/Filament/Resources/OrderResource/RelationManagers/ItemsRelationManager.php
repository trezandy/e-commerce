<?php

namespace App\Filament\Resources\OrderResource\RelationManagers;

use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Table;

class ItemsRelationManager extends RelationManager
{
    protected static string $relationship = 'items';

    // Beri judul pada tabel relasi ini
    protected static ?string $title = 'Products in this Order';

    public function form(Form $form): Form
    {
        return $form->schema([]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('id')
            ->columns([
                Tables\Columns\ImageColumn::make('product.image')
                    ->label('') // Hilangkan label agar lebih bersih
                    ->width(80)->height(80)
                    ->circular(),

                Tables\Columns\TextColumn::make('product.name')
                    ->label('Product'),

                Tables\Columns\TextColumn::make('price')
                    ->label('Price')
                    ->money('IDR'),

                Tables\Columns\TextColumn::make('quantity')
                    ->numeric(),

                Tables\Columns\TextColumn::make('total')
                    ->label('Total')
                    ->state(fn($record): float => $record->price * $record->quantity)
                    ->money('IDR'),
            ])
            ->paginated(false)
            ->actions([])
            ->bulkActions([]);
    }
}
