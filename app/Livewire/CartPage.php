<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\Layout;

#[Layout('components.layouts.app')] // Menggunakan layout utama Anda
class CartPage extends Component
{

    public $cart_items = [];
    public $sub_total = 0;
    public $service_fee = 2500; // Biaya layanan tetap
    public $grand_total = 0;

    public function mount()
    {
        $this->updateCart();
    }

    public function updateCart()
    {
        $this->cart_items = session()->get('cart', []);
        $this->calculateTotals();
        $this->dispatch('cart-updated'); // Kirim event agar ikon keranjang di header juga update
    }

    public function calculateTotals()
    {
        $this->sub_total = 0;
        if ($this->cart_items) {
            foreach ($this->cart_items as $item) {
                $this->sub_total += $item['price'] * $item['quantity'];
            }
        }
        $this->grand_total = $this->sub_total + $this->service_fee;
    }

    public function increaseQuantity($productId)
    {
        $cart = session()->get('cart', []);
        if (isset($cart[$productId])) {
            $cart[$productId]['quantity']++;
            session()->put('cart', $cart);
            $this->updateCart();
        }
    }

    public function decreaseQuantity($productId)
    {
        $cart = session()->get('cart', []);
        if (isset($cart[$productId]) && $cart[$productId]['quantity'] > 1) {
            $cart[$productId]['quantity']--;
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

    public function render()
    {
        return view('livewire.cart-page');
    }
}
