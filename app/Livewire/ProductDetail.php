<?php

namespace App\Livewire;

use App\Models\Product;
use Livewire\Component;

class ProductDetail extends Component
{
    public Product $product;
    public $quantity = 1;

    // Properti untuk menyimpan varian yang sedang dipilih
    public $selectedVariant;

    public function mount(Product $product)
    {
        $this->product = $product;
        // Jika produk memiliki varian, secara otomatis pilih varian pertama sebagai default
        if ($this->product->variants->isNotEmpty()) {
            $this->selectVariant($this->product->variants->first()->id);
        }
    }

    /**
     * Fungsi ini akan dipanggil saat pelanggan mengklik tombol varian.
     */
    public function selectVariant($variantId)
    {
        // Cari varian berdasarkan ID dan update properti
        $this->selectedVariant = $this->product->variants()->find($variantId);
        // Reset kuantitas ke 1 setiap kali ganti varian
        $this->quantity = 1;
    }

    public function increaseQuantity()
    {
        // Kontrol stok berdasarkan stok varian yang dipilih
        if ($this->selectedVariant && $this->quantity < $this->selectedVariant->stock) {
            $this->quantity++;
        } elseif (!$this->selectedVariant && $this->quantity < $this->product->stock) {
            $this->quantity++;
        }
    }

    public function decreaseQuantity()
    {
        if ($this->quantity > 1) {
            $this->quantity--;
        }
    }

    public function addToCart()
    {
        // Sekarang kita kirim ID varian juga
        $this->dispatch(
            'add-to-cart-with-quantity',
            productId: $this->product->id,
            variantId: $this->selectedVariant->id ?? null, // Kirim ID varian, atau null jika tidak ada
            quantity: $this->quantity
        );
    }

    public function render()
    {
        return view('livewire.product-detail');
    }
}
