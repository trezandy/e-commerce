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
        $product = Product::find($productId);
        if (!$product) {
            return; // Produk tidak ditemukan
        }

        // Jika stok habis, jangan lakukan apa-apa dan kirim notifikasi
        if ($product->stock <= 0) {
            $this->dispatch('swal:toast', ['type' => 'error', 'title' => 'Stok produk habis.']);
            return;
        }

        $cart = session()->get('cart', []);

        // Cek kuantitas di keranjang vs stok produk
        $quantityInCart = isset($cart[$productId]) ? $cart[$productId]['quantity'] : 0;
        if ($quantityInCart >= $product->stock) {
            $this->dispatch('swal:toast', ['type' => 'error', 'title' => 'Stok tidak mencukupi.']);
            return;
        }

        // Jika semua aman, tambahkan ke keranjang
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

        $this->dispatch('swal:toast', ['type' => 'success', 'title' => 'Ditambahkan ke keranjang.']);
    }

    #[On('add-to-cart-with-quantity')]
    public function addToCartWithQuantity($productId, $quantity = 1)
    {
        $product = Product::find($productId);
        if (!$product) {
            return; // Produk tidak ditemukan
        }

        // Jika stok habis, jangan lakukan apa-apa
        if ($product->stock <= 0) {
            $this->dispatch('swal:toast', ['type' => 'error', 'title' => 'Stok produk habis.']);
            return;
        }

        $cart = session()->get('cart', []);

        // Ambil kuantitas yang sudah ada di keranjang
        $quantityInCart = isset($cart[$productId]) ? $cart[$productId]['quantity'] : 0;

        // Hitung total kuantitas yang akan ada di keranjang
        $totalQuantity = $quantityInCart + $quantity;

        // Cek apakah total kuantitas melebihi stok yang tersedia
        if ($totalQuantity > $product->stock) {
            $this->dispatch('swal:toast', ['type' => 'error', 'title' => 'Stok tidak mencukupi.']);
            return;
        }

        // Jika semua aman, tambahkan ke keranjang
        if (isset($cart[$productId])) {
            $cart[$productId]['quantity'] += $quantity;
        } else {
            $cart[$productId] = [
                "name" => $product->name,
                "quantity" => $quantity,
                "price" => $product->price,
                "image" => $product->image
            ];
        }

        session()->put('cart', $cart);
        $this->updateCart();

        $this->dispatch('swal:toast', [
            'type' => 'success',
            'title' => 'Ditambahkan ke keranjang.'
        ]);
    }

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
        $product = Product::find($productId);

        if (isset($cart[$productId]) && $product) {
            // Cek apakah penambahan kuantitas akan melebihi stok
            if (($cart[$productId]['quantity'] + 1) > $product->stock) {
                $this->dispatch('swal:toast', ['type' => 'error', 'title' => 'Stok tidak mencukupi.']);
                return;
            }
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
