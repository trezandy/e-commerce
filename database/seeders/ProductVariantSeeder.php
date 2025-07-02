<?php

namespace Database\Seeders;

use App\Models\ProductVariant;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductVariantSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Data varian berdasarkan gambar Anda
        $variants = [
            [
                'product_id' => 1,
                'name' => '250g',
                'price' => 8000,
                'sale_price' => null, // Tidak ada harga diskon
                'stock' => 20,
            ],
            [
                'product_id' => 1,
                'name' => '500g',
                'price' => 16000,
                'sale_price' => 15000, // Ada harga diskon
                'stock' => 16,
            ],
            [
                'product_id' => 1,
                'name' => '1kg',
                'price' => 30000,
                'sale_price' => 28000, // Ada harga diskon
                'stock' => 10,
            ],
        ];

        // Loop melalui data dan buat record baru di database
        foreach ($variants as $variant) {
            ProductVariant::create($variant);
        }
    }
}
