<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\On;

class CartIcon extends Component
{
    public $itemCount = 0;

    public function mount()
    {
        // Ambil jumlah item awal dari session
        $this->updateItemCount();
    }

    #[On('cart-updated')] // Listener untuk event global
    public function updateItemCount()
    {
        $this->itemCount = count(session()->get('cart', []));
    }

    public function render()
    {
        return view('livewire.cart-icon');
    }
}
