<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        // Ambil semua data dari tabel products
        $products = Product::latest()->take(10)->get(); // Ambil 8 produk terbaru

        // "Oper" variabel $products ke dalam view 'home'
        return view('home', [
            'products' => $products
        ]);
    }
}
