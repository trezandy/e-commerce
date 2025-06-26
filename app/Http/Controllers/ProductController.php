<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Menampilkan halaman detail untuk satu produk.
     */
    public function show(Product $product)
    {
        // Laravel secara otomatis akan mencari produk berdasarkan slug dari URL.
        // Kemudian kita mengirim data '$product' ke view 'product-detail'.
        return view('product-detail', ['product' => $product]);
    }
}
