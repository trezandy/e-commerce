<?php

namespace App\Observers;

use App\Models\Order;
use App\Models\Product;
use Illuminate\Support\Facades\DB;

class OrderObserver
{
    /**
     * Handle the Order "updating" event.
     *
     * @param  \App\Models\Order  $order
     * @return void
     */
    public function updating(Order $order): void
    {
        // 1. Ambil status pembayaran yang lama (sebelum diubah)
        $originalPaymentStatus = $order->getOriginal('payment_status');

        // 2. Cek apakah status pembayaran sedang diubah MENJADI 'paid' dan SEBELUMNYA BUKAN 'paid'
        // Ini adalah kondisi kunci untuk memastikan stok hanya dikurangi sekali.
        if ($order->payment_status === 'paid' && $originalPaymentStatus !== 'paid') {

            // Gunakan DB Transaction untuk keamanan. Jika salah satu pengurangan stok gagal,
            // semua proses akan dibatalkan (rollback).
            DB::transaction(function () use ($order) {
                // 3. Loop melalui setiap item dalam pesanan
                foreach ($order->items as $item) {
                    // Temukan produk yang sesuai
                    $product = Product::find($item->product_id);

                    // Jika produk ditemukan, kurangi stoknya
                    if ($product) {
                        // Pastikan stok cukup sebelum mengurangi
                        if ($product->stock >= $item->quantity) {
                            $product->decrement('stock', $item->quantity);
                        } else {
                            // Jika stok tidak cukup, batalkan transaksi dengan melempar Exception.
                            // Anda bisa menangani ini lebih lanjut dengan notifikasi ke admin.
                            throw new \Exception("Stok tidak cukup untuk produk: {$product->name}");
                        }
                    }
                }
            });
        }
    }
}
