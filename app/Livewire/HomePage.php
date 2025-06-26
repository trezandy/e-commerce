<?php

namespace App\Livewire;

use App\Models\Product; // Jangan lupa import model Product
use Livewire\Component;
use Livewire\Attributes\Layout; // Import atribut Layout

#[Layout('components.layouts.app')] // <-- Memberitahu Livewire untuk menggunakan layout kita
class HomePage extends Component
{
    public function render()
    {
        // Ambil data produk dari database
        $products = Product::latest()->take(10)->get();

        // Kirim data produk ke view
        return view('livewire.home-page', [
            'products' => $products,
        ]);
    }
}
