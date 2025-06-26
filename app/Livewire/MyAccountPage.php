<?php

namespace App\Livewire;

use App\Models\Order;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\Attributes\Layout;

#[Layout('components.layouts.app')]
class MyAccountPage extends Component
{
    public $orders;

    public function mount()
    {
        // Ambil semua pesanan milik user yang sedang login,
        // urutkan dari yang paling baru.
        $this->orders = Order::where('user_id', Auth::id())
            ->with('items.product') // Eager load relasi
            ->latest()
            ->get();
    }

    public function render()
    {
        return view('livewire.my-account-page');
    }
}
