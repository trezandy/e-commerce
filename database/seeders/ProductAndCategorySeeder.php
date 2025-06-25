<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ProductAndCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // 1. Kosongkan tabel untuk menghindari duplikasi data saat seeder dijalankan ulang
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        Product::truncate();
        Category::truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        // 2. Definisikan dan buat Kategori
        $categories = [
            'Snack & Munchies',
            'Bakery & Biscuits',
            'Instant Food',
            'Dairy, Bread & Eggs',
        ];

        $categoryObjects = [];
        foreach ($categories as $categoryName) {
            $categoryObjects[$categoryName] = Category::create([
                'name' => $categoryName,
                'slug' => Str::slug($categoryName),
            ]);
        }

        // 3. Definisikan Produk berdasarkan gambar
        $products = [
            // Baris 1
            [
                'name' => 'Haldiram\'s Sev Bhujia',
                'category' => 'Snack & Munchies',
                'price' => 28000,
                'image' => 'products/product-img-1.jpg'
            ],
            [
                'name' => 'NutriChoice Digestive',
                'category' => 'Bakery & Biscuits',
                'price' => 22500,
                'image' => 'products/product-img-2.jpg'
            ],
            [
                'name' => 'Cadbury 5 Star Chocolate',
                'category' => 'Bakery & Biscuits',
                'price' => 12500,
                'image' => 'products/product-img-3.jpg'
            ],
            [
                'name' => 'Lay\'s Onion Flavour Potato Chips',
                'category' => 'Snack & Munchies',
                'price' => 11000,
                'image' => 'products/product-img-4.jpg'
            ],
            [
                'name' => 'Act II Salted Instant Popcorn',
                'category' => 'Instant Food',
                'price' => 15000,
                'image' => 'products/product-img-5.jpg'
            ],

            // Baris 2
            [
                'name' => 'Epigamia Blueberry Greek Yogurt',
                'category' => 'Dairy, Bread & Eggs',
                'price' => 35000,
                'image' => 'products/product-img-6.jpg'
            ],
            [
                'name' => 'Britannia Cheese Slices',
                'category' => 'Dairy, Bread & Eggs',
                'price' => 42000,
                'image' => 'products/product-img-7.jpg'
            ],
            [
                'name' => 'Kellogg\'s Original Cereals',
                'category' => 'Instant Food',
                'price' => 48500,
                'image' => 'products/product-img-8.jpg'
            ],
            [
                'name' => 'Slurrp Farm Millet Pancake Chocolate',
                'category' => 'Snack & Munchies',
                'price' => 65000,
                'image' => 'products/product-img-9.jpg'
            ],
            [
                'name' => 'Amul Butter - 500g',
                'category' => 'Dairy, Bread & Eggs',
                'price' => 75000,
                'image' => 'products/product-img-10.jpg'
            ],
        ];

        // 4. Buat Produk
        foreach ($products as $productData) {
            Product::create([
                'name' => $productData['name'],
                'slug' => Str::slug($productData['name']),
                'description' => 'Ini adalah deskripsi standar untuk ' . $productData['name'] . '. Deskripsi lengkap akan menyusul.',
                'price' => $productData['price'],
                'stock' => rand(10, 50), // Stok diisi angka acak antara 10 s/d 50
                'image' => $productData['image'],
                'category_id' => $categoryObjects[$productData['category']]->id,
            ]);
        }
    }
}
