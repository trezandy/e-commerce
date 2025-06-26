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
                    ->label('Product') // Hilangkan label agar lebih bersih
                    ->width(48)->height(48)
                    ->circular(),

                Tables\Columns\TextColumn::make('product.name')
                    ->label(''),

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
            ->contentFooter(
                // Memanggil file view baru dan mengirim data order saat ini
                view('filament.tables.footer.order-summary', ['record' => $this->getOwnerRecord()])
            )
            ->paginated(false)
            ->actions([])
            ->bulkActions([]);
    }
}
