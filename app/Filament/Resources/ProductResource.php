<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProductResource\Pages;
// Import Relation Manager yang baru dibuat
use App\Filament\Resources\ProductResource\RelationManagers\VariantsRelationManager;
use App\Models\Product;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
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
                    Forms\Components\Section::make('Detail Produk')->schema([
                        Forms\Components\TextInput::make('name')->label('Nama Produk')
                            ->required()->maxLength(255)->live(onBlur: true)
                            ->afterStateUpdated(fn(Set $set, ?string $state) => $set('slug', Str::slug($state))),

                        Forms\Components\TextInput::make('slug')
                            ->required()->maxLength(255)->unique(Product::class, 'slug', ignoreRecord: true),

                        Forms\Components\MarkdownEditor::make('description')
                            ->columnSpanFull(),
                    ])->columns(2),

                    // Modifikasi bagian ini
                    Forms\Components\Section::make('Harga & Stok Default')
                        ->description('Isi bagian ini jika produk tidak memiliki varian. Jika ada varian, harga dan stok akan diambil dari masing-masing varian.')
                        ->schema([
                            Forms\Components\TextInput::make('price')
                                ->label('Harga Normal')
                                ->numeric()->prefix('Rp')->nullable(),
                            Forms\Components\TextInput::make('sale_price')
                                ->label('Harga Diskon (Opsional)')
                                ->numeric()->prefix('Rp')->nullable(),
                            Forms\Components\TextInput::make('stock')
                                ->label('Stok Utama')->numeric()->nullable(),
                        ])->columns(3),

                ])->columnSpan(2),

                Forms\Components\Group::make()->schema([
                    Forms\Components\Section::make('Atribut')->schema([
                        Forms\Components\Select::make('category_id')
                            ->relationship('category', 'name')
                            ->required(),
                    ]),
                    Forms\Components\Section::make('Gambar Utama')->schema([
                        Forms\Components\FileUpload::make('image')
                            ->image()
                            ->disk('public')
                            ->directory('products'),
                    ]),
                    Forms\Components\Section::make('Galeri Gambar')->schema([
                        Forms\Components\FileUpload::make('images')
                            ->multiple()
                            ->image()
                            ->maxFiles(3)
                            ->directory('products'),
                    ]),
                ])->columnSpan(1),
            ])->columns(3);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('image'),
                Tables\Columns\TextColumn::make('name')->searchable(),
                Tables\Columns\TextColumn::make('category.name')->sortable(),
                // Sembunyikan harga dan stok dari tabel utama karena sudah ada di varian
                // Tables\Columns\TextColumn::make('price')->money('IDR')->sortable(),
                // Tables\Columns\TextColumn::make('stock')->sortable(),
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

    // Daftarkan Relation Manager di sini
    public static function getRelations(): array
    {
        return [
            VariantsRelationManager::class,
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
