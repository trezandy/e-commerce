<?php

namespace App\Filament\Resources;

use App\Filament\Resources\OrderResource\Pages;
use App\Filament\Resources\OrderResource\RelationManagers;
use App\Models\Order;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Infolists\Components;
use Filament\Infolists\Infolist;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class OrderResource extends Resource
{
    protected static ?string $model = Order::class;
    protected static ?string $navigationIcon = 'heroicon-o-shopping-bag';
    protected static ?int $navigationSort = 3;

    // Admin tidak bisa membuat pesanan baru, hanya mengelola yang sudah ada
    public static function canCreate(): bool
    {
        return false;
    }

    public static function form(Form $form): Form
    {
        // Form untuk halaman Edit, fokus pada perubahan status
        return $form
            ->schema([
                Forms\Components\Section::make('Update Status Pesanan')
                    ->schema([
                        Forms\Components\Select::make('status')
                            ->options([
                                'pending' => 'Pending',
                                'processing' => 'Processing',
                                'completed' => 'Completed',
                                'cancelled' => 'Cancelled',
                            ])->required()->label('Status Order'),
                        Forms\Components\Select::make('payment_status')
                            ->options([
                                'pending' => 'Pending',
                                'paid' => 'Paid',
                                'failed' => 'Failed',
                            ])->required()->label('Status Pembayaran'),
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        // Tampilan tabel daftar pesanan (sesuai order-list.html)
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('id')->label('Order ID')->searchable(),
                Tables\Columns\TextColumn::make('user.name')->label('Customer')->searchable(),
                Tables\Columns\TextColumn::make('status')->badge()->color(fn(string $state): string => match ($state) {
                    'pending' => 'gray',
                    'processing' => 'warning',
                    'completed' => 'success',
                    'cancelled' => 'danger',
                })->searchable(),
                Tables\Columns\TextColumn::make('grand_total')->numeric()->sortable()->money('IDR'),
                Tables\Columns\TextColumn::make('created_at')->label('Order Date')->dateTime()->sortable(),
            ])
            ->defaultSort('created_at', 'desc')
            ->filters([
                Tables\Filters\SelectFilter::make('status')
                    ->options([
                        'pending' => 'Pending',
                        'processing' => 'Processing',
                        'completed' => 'Completed',
                        'cancelled' => 'Cancelled',
                    ]),
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
            ]);
    }

    public static function infolist(Infolist $infolist): Infolist
    {
        // Tampilan di halaman detail (sesuai order-single.html)
        return $infolist
            ->schema([
                Components\Section::make()->schema([
                    Components\Grid::make(3)->schema([
                        Components\Group::make()->schema([
                            Components\TextEntry::make('id')->label('Order ID'),
                            Components\TextEntry::make('created_at')->label('Order Date')->dateTime(),
                        ]),
                        Components\Group::make()->schema([
                            Components\TextEntry::make('user.name')->label('Customer'),
                            Components\TextEntry::make('user.email')->label('Email'),
                        ]),
                        Components\Group::make()->schema([
                            Components\TextEntry::make('status')->badge()->color(fn(string $state): string => match ($state) {
                                'pending' => 'gray',
                                'processing' => 'warning',
                                'completed' => 'success',
                                'cancelled' => 'danger',
                            }),
                            Components\TextEntry::make('grand_total')->money('IDR'),
                        ]),
                    ]),
                ]),
                Components\Section::make('Shipping & Payment')->schema([
                    Components\Grid::make(2)->schema([
                        Components\TextEntry::make('shipping_address')->label('Shipping Address'),
                        Components\Group::make()->schema([
                            Components\TextEntry::make('phone_number')->label('Phone'),
                            Components\TextEntry::make('payment_method')->label('Payment Method'),
                        ]),
                    ])
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            RelationManagers\ItemsRelationManager::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListOrders::route('/'),
            'view' => Pages\ViewOrder::route('/{record}'),
            // 'edit' => Pages\EditOrder::route('/{record}/edit'),
        ];
    }
}
