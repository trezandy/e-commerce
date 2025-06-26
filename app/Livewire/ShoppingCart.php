<?php

namespace App\Livewire;

use App\Models\Product;
use Livewire\Component;
use Livewire\Attributes\On;

class ShoppingCart extends Component
{
    public $cart_items = [];
    public $grand_total = 0;

    public function mount()
    {
        $this->updateCart();
    }

    #[On('add-to-cart')]
    public function addToCart($productId)
    {
        $cart = session()->get('cart', []);
        $product = Product::find($productId);
        if (!$product) {
            return;
        }

        if (isset($cart[$productId])) {
            $cart[$productId]['quantity']++;
        } else {
            $cart[$productId] = [
                "name" => $product->name,
                "quantity" => 1,
                "price" => $product->price,
                "image" => $product->image
            ];
        }
        session()->put('cart', $cart);
        $this->updateCart();

        $this->dispatch('swal:toast', [
            'type' => 'success',
            'title' => 'Ditambah ke keranjang.'
        ]);
    }

    // -- METHOD BARU UNTUK MENGURANGI KUANTITAS --
    public function decreaseQuantity($productId)
    {
        $cart = session()->get('cart', []);

        if (isset($cart[$productId])) {
            // Hanya kurangi jika kuantitas lebih dari 1
            if ($cart[$productId]['quantity'] > 1) {
                $cart[$productId]['quantity']--;
                session()->put('cart', $cart);
                $this->updateCart();
            }
        }
    }

    // -- METHOD BARU UNTUK MENAMBAH KUANTITAS --
    public function increaseQuantity($productId)
    {
        $cart = session()->get('cart', []);

        if (isset($cart[$productId])) {
            $cart[$productId]['quantity']++;
            session()->put('cart', $cart);
            $this->updateCart();
        }
    }

    public function removeItem($productId)
    {
        $cart = session()->get('cart', []);

        if (isset($cart[$productId])) {
            unset($cart[$productId]);
            session()->put('cart', $cart);
            $this->updateCart();

            $this->dispatch('swal:toast', [
                'type' => 'success',
                'title' => 'Dihapus dari keranjang.'
            ]);
        }
    }

    public function updateCart()
    {
        $this->cart_items = session()->get('cart', []);
        $this->calculateGrandTotal();

        // KIRIM EVENT GLOBAL DENGAN JUMLAH ITEM TERBARU
        $this->dispatch('cart-updated');
    }

    public function calculateGrandTotal()
    {
        $this->grand_total = 0;
        if ($this->cart_items) {
            foreach ($this->cart_items as $item) {
                $this->grand_total += $item['price'] * $item['quantity'];
            }
        }
    }

    public function render()
    {
        return view('livewire.shopping-cart');
    }
}
