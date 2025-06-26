<?php

namespace App\Livewire;

use App\Models\Product;
use Livewire\Component;

class ProductDetail extends Component
{
    public Product $product;
    public $quantity = 1;

    public function mount(Product $product)
    {
        $this->product = $product;
    }

    public function increaseQuantity()
    {
        $this->quantity++;
    }

    public function decreaseQuantity()
    {
        if ($this->quantity > 1) {
            $this->quantity--;
        }
    }

    public function addToCart()
    {
        // Mengirim event ke komponen ShoppingCart untuk menambahkan produk
        // Kita juga kirim kuantitasnya
        $this->dispatch('add-to-cart-with-quantity', productId: $this->product->id, quantity: $this->quantity);

        $this->dispatch('swal:toast', [
            'type' => 'success',
            'title' => 'Ditambahkan ke keranjang.'
        ]);
    }

    public function render()
    {
        return view('livewire.product-detail');
    }
}
