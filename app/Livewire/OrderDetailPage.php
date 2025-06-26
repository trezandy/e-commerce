<?php

namespace App\Livewire;

use App\Models\Order;
use Livewire\Component;
use Livewire\Attributes\Layout;

#[Layout('components.layouts.app')]
class OrderDetailPage extends Component
{
    // Properti ini akan diisi secara otomatis oleh Laravel
    // berkat Route Model Binding
    public Order $order;

    public function render()
    {
        return view('livewire.order-detail-page');
    }
}
