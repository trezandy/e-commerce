<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function show(string $slug)
    {
        // Cari produk berdasarkan slug-nya. Jika tidak ada, otomatis tampilkan 404 Not Found.
        $product = Product::where('slug', $slug)->firstOrFail();

        return view('product-detail', [
            'product' => $product
        ]);
    }
}
