<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProductResource\Pages;
use App\Filament\Resources\ProductResource\RelationManagers;
use App\Models\Product;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Str;
use Filament\Forms\Set;


class ProductResource extends Resource
{
    protected static ?string $model = Product::class;

    protected static ?string $navigationIcon = 'heroicon-o-shopping-bag';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Group::make()->schema([
                    Forms\Components\Section::make('Product Details')->schema([
                        Forms\Components\TextInput::make('name')
                            ->required()->maxLength(255)->live(onBlur: true)
                            ->afterStateUpdated(fn(Set $set, ?string $state) => $set('slug', Str::slug($state))),

                        Forms\Components\TextInput::make('slug')
                            ->required()->maxLength(255)->unique(ignoreRecord: true),

                        Forms\Components\MarkdownEditor::make('description')
                            ->columnSpanFull(), // Gunakan lebar penuh
                    ])->columns(2),

                    Forms\Components\Section::make('Pricing & Stock')->schema([
                        Forms\Components\TextInput::make('price')
                            ->numeric()->prefix('Rp')->required(),
                        Forms\Components\TextInput::make('stock')
                            ->numeric()->required(),
                    ])->columns(2),

                ])->columnSpan(2),

                Forms\Components\Group::make()->schema([
                    Forms\Components\Section::make('Category')->schema([
                        Forms\Components\Select::make('category_id')
                            ->relationship('category', 'name') // Ambil dari relasi 'category' dan tampilkan kolom 'name'
                            ->required(),
                    ]),
                    Forms\Components\Section::make('Image')->schema([
                        Forms\Components\FileUpload::make('image')
                            ->image() // Hanya terima file gambar
                            ->directory('products'), // Simpan di folder storage/app/public/products
                    ]),
                    Forms\Components\Repeater::make('images')
                        ->label('Image Gallery')
                        ->schema([
                            Forms\Components\FileUpload::make('path')
                                ->label('Image')
                                ->image(),
                        ])
                        ->maxItems(3) // <-- Batasan maksimal 3 gambar
                        ->columnSpanFull(),
                ])->columnSpan(1),
            ])->columns(3);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('image'), // Tampilkan gambar
                Tables\Columns\TextColumn::make('name')->searchable(),
                Tables\Columns\TextColumn::make('category.name') // Tampilkan nama dari relasi
                    ->sortable(),
                Tables\Columns\TextColumn::make('price')
                    ->formatStateUsing(fn($state) => 'Rp ' . number_format($state, 0, ',', '.'))
                    // ->numeric()->prefix('Rp') // Format sebagai mata uang Rupiah
                    ->sortable(),
                Tables\Columns\TextColumn::make('stock')
                    ->sortable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable() // Buat kolom ini bisa diurutkan
                    ->toggleable(isToggledHiddenByDefault: true), // Sembunyikan by default, bisa dimunculkan
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
            'index' => Pages\ListProducts::route('/'),
            'create' => Pages\CreateProduct::route('/create'),
            'edit' => Pages\EditProduct::route('/{record}/edit'),
        ];
    }
}
