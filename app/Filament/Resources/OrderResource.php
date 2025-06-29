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
use Illuminate\Support\HtmlString;

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
                Forms\Components\Section::make('Update Status')
                    ->schema([
                        Forms\Components\Select::make('payment_status')
                            ->options([
                                'pending' => 'Pending',
                                'paid' => 'Paid',
                                'failed' => 'Failed',
                            ])->required()->label('Payment Status'),
                        Forms\Components\Select::make('status')
                            ->options([
                                'pending' => 'Pending',
                                'processing' => 'Processing',
                                'completed' => 'Completed',
                                'cancelled' => 'Cancelled',
                            ])->required()->label('Order Status'),
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
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
                Tables\Columns\TextColumn::make('payment_method')
                    ->label('Payment Method')
                    ->searchable()
                    ->formatStateUsing(fn(string $state): string => match ($state) {
                        'bank' => 'Bank Transfer',
                        'midtrans' => 'Online Payment',
                        default => $state,
                    }),
                Tables\Columns\TextColumn::make('grand_total')->label('Grand Total')->numeric()->sortable()->money('IDR'),
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
        return $infolist
            ->schema([
                Components\Section::make(function (?Order $record): HtmlString {
                    // Jika record tidak ada, kembalikan string kosong
                    if (!$record) {
                        return new HtmlString('');
                    }
                    // Buat string HTML untuk heading
                    // $orderId = e("Order ID: #{$record->id}");
                    $orderId = "Order Information";

                    // Gabungkan menjadi satu string HTML yang akan dirender
                    return new HtmlString("<div class=\"flex items-center gap-x-3\">{$orderId}</div>");
                })
                    ->schema([
                        // Skema grid 3 kolom yang sudah ada sebelumnya
                        Components\Grid::make(3)->schema([
                            // Kolom 1: Customer Details
                            Components\Group::make()->schema([
                                Components\TextEntry::make('user.name')
                                    ->label('Customer Details')
                                    ->formatStateUsing(function (Order $record): HtmlString {
                                        $name = e($record->user->name);
                                        $email = e($record->user->email);
                                        $phone = e($record->phone_number);
                                        return new HtmlString("{$name}<br>{$email}<br>{$phone}");
                                    })
                                    ->html(),
                                Components\TextEntry::make('payment_method')
                                    ->label('Payment Method')
                                    ->formatStateUsing(fn(string $state): string => match ($state) {
                                        'bank' => 'Bank Transfer',
                                        'midtrans' => 'Midtrans',
                                        default => $state,
                                    }),
                            ]),

                            // Kolom 2: Shipping Address
                            Components\Group::make()->schema([
                                Components\TextEntry::make('shipping_address')
                                    ->label('Shipping Address')
                                    ->formatStateUsing(fn(?string $state): HtmlString => new HtmlString(nl2br(e($state))))
                                    ->html(),
                                Components\TextEntry::make('payment_status')
                                    ->label('Payment Status') // Label dikosongkan agar tidak ada ruang tambahan
                                    ->badge()
                                    ->color(fn(string $state): string => match ($state) {
                                        'pending' => 'warning',
                                        'paid' => 'success',
                                        'failed' => 'danger',
                                    }),
                            ]),

                            // Kolom 3: Order Details
                            Components\Group::make()->schema([
                                Components\TextEntry::make('id')
                                    ->label('Order Details')
                                    ->formatStateUsing(function (Order $record): HtmlString {
                                        $id = 'Order ID: #' . e($record->id);
                                        $date = 'Order Date: ' . $record->created_at->format('M d, Y');
                                        $total = 'Order Total: Rp ' . number_format($record->grand_total, 0, ',', '.');
                                        return new HtmlString("{$id}<br>{$date}<br>{$total}");
                                    })
                                    ->html(),
                                Components\TextEntry::make('status')
                                    ->label('Order Status') // Label dikosongkan agar tidak ada ruang tambahan
                                    ->badge()
                                    ->color(fn(string $state): string => match ($state) {
                                        'pending' => 'gray',
                                        'processing' => 'warning',
                                        'completed' => 'success',
                                        'cancelled' => 'danger',
                                    }),
                            ]),
                        ]),
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
