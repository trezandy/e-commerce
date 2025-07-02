<?php

namespace App\Observers;

use App\Models\Order;
use App\Models\Product;
use App\Models\ProductVariant;
use Illuminate\Support\Facades\DB;

class OrderObserver
{
    /**
     * Handle the Order "updating" event.
     *
     * @param  \App\Models\Order  $order
     * @return void
     */

    public function creating(Order $order): void
    {
        // Format: TAHUN_BULAN_TANGGAL_ID_UNIK
        // Contoh: 20250629A5B1C2
        $uniqueId = strtoupper(bin2hex(random_bytes(6))); // Generate 6 random hex characters
        $order->order_number = date('Ymd') . $uniqueId;
    }

    public function updating(Order $order): void
    {
        $originalPaymentStatus = $order->getOriginal('payment_status');

        // Skenario 1: Stok DIKURANGI saat pembayaran LUNAS
        // (Berubah dari BUKAN 'paid' menjadi 'paid')
        if ($order->payment_status === 'paid' && $originalPaymentStatus !== 'paid') {
            DB::transaction(function () use ($order) {
                foreach ($order->items as $item) {
                    if ($item->product_variant_id) {
                        $variant = ProductVariant::find($item->product_variant_id);
                        if ($variant && $variant->stock >= $item->quantity) {
                            $variant->decrement('stock', $item->quantity);
                        } else {
                            throw new \Exception("Stok tidak cukup untuk varian: {$item->product->name} - {$variant->name}");
                        }
                    } else {
                        $product = Product::find($item->product_id);
                        if ($product && $product->stock >= $item->quantity) {
                            $product->decrement('stock', $item->quantity);
                        } else {
                            throw new \Exception("Stok tidak cukup untuk produk: {$product->name}");
                        }
                    }
                }
            });
        }
        // --- LOGIKA BARU: PENGEMBALIAN STOK ---
        // Skenario 2: Stok DIKEMBALIKAN saat pembayaran GAGAL/DIBATALKAN
        // (Berubah dari 'paid' menjadi BUKAN 'paid')
        elseif ($originalPaymentStatus === 'paid' && $order->payment_status !== 'paid') {
            DB::transaction(function () use ($order) {
                foreach ($order->items as $item) {
                    if ($item->product_variant_id) {
                        $variant = ProductVariant::find($item->product_variant_id);
                        if ($variant) {
                            $variant->increment('stock', $item->quantity);
                        }
                    } else {
                        $product = Product::find($item->product_id);
                        if ($product) {
                            $product->increment('stock', $item->quantity);
                        }
                    }
                }
            });
        }
        // --- AKHIR LOGIKA BARU ---
    }
}
