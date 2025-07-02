<?php

namespace App\Livewire;

use App\Models\Product;
use App\Models\ProductVariant; // Import model baru
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

    // Fungsi ini sekarang menjadi fungsi utama untuk menambahkan item
    #[On('add-to-cart-with-quantity')]
    public function addToCart($productId, $variantId = null, $quantity = 1)
    {
        $product = Product::find($productId);
        if (!$product) return;

        $variant = null;
        if ($variantId) {
            $variant = ProductVariant::find($variantId);
            if (!$variant) return;
        }

        // Tentukan stok dan harga berdasarkan ada atau tidaknya varian
        $stock = $variant ? $variant->stock : $product->stock;
        $price = $variant ? ($variant->sale_price ?? $variant->price) : ($product->sale_price ?? $product->price);
        $variantName = $variant ? $variant->name : null;

        // Validasi stok
        if ($stock <= 0) {
            $this->dispatch('swal:toast', ['type' => 'error', 'title' => 'Stok produk habis.']);
            return;
        }

        // Buat kunci unik untuk item di keranjang
        // Contoh: "1-5" (produkID 1, varianID 5) atau "2-null" (produkID 2, tanpa varian)
        $cartKey = $productId . '-' . ($variantId ?? 'null');

        $cart = session()->get('cart', []);
        $quantityInCart = isset($cart[$cartKey]) ? $cart[$cartKey]['quantity'] : 0;

        if (($quantityInCart + $quantity) > $stock) {
            $this->dispatch('swal:toast', ['type' => 'error', 'title' => 'Stok tidak mencukupi.']);
            return;
        }

        // Tambahkan atau perbarui item di keranjang
        if (isset($cart[$cartKey])) {
            $cart[$cartKey]['quantity'] += $quantity;
        } else {
            $cart[$cartKey] = [
                "product_id" => $product->id,
                "variant_id" => $variantId,
                "name" => $product->name,
                "variant_name" => $variantName,
                "quantity" => $quantity,
                "price" => $price,
                "image" => $product->image
            ];
        }

        session()->put('cart', $cart);
        $this->updateCart();
        $this->dispatch('swal:toast', ['type' => 'success', 'title' => 'Ditambahkan ke keranjang.']);
    }

    public function increaseQuantity($cartKey)
    {
        // Logika sama seperti di atas, tapi untuk menambah 1
        $cart = session()->get('cart', []);
        if (!isset($cart[$cartKey])) return;

        $item = $cart[$cartKey];
        $product = Product::find($item['product_id']);
        $variant = $item['variant_id'] ? ProductVariant::find($item['variant_id']) : null;
        $stock = $variant ? $variant->stock : $product->stock;

        if (($item['quantity'] + 1) > $stock) {
            $this->dispatch('swal:toast', ['type' => 'error', 'title' => 'Stok tidak mencukupi.']);
            return;
        }

        $cart[$cartKey]['quantity']++;
        session()->put('cart', $cart);
        $this->updateCart();
    }

    public function decreaseQuantity($cartKey)
    {
        $cart = session()->get('cart', []);
        if (isset($cart[$cartKey]) && $cart[$cartKey]['quantity'] > 1) {
            $cart[$cartKey]['quantity']--;
            session()->put('cart', $cart);
            $this->updateCart();
        }
    }

    public function removeItem($cartKey)
    {
        $cart = session()->get('cart', []);
        if (isset($cart[$cartKey])) {
            unset($cart[$cartKey]);
            session()->put('cart', $cart);
            $this->updateCart();
            $this->dispatch('swal:toast', ['type' => 'success', 'title' => 'Dihapus dari keranjang.']);
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
