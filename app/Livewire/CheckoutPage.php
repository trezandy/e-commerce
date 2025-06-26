<?php

namespace App\Livewire;

use App\Models\Order;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\Attributes\Layout;

#[Layout('components.layouts.app')]
class CheckoutPage extends Component
{

    public $cart_items = [];
    public $sub_total = 0;
    public $service_fee = 2500;
    public $grand_total = 0;

    public $full_name;
    public $email;
    public $phone_number;
    public string $shipping_address;
    public $delivery_instructions = '';
    public $payment_method;

    public function mount()
    {
        $this->cart_items = session()->get('cart', []);

        if (count($this->cart_items) == 0) {

            $this->dispatch('swal:toast', [
                'type' => 'success',
                'title' => 'Keranjang anda kosong.'
            ]);

            return $this->redirect('/cart', navigate: true);
        }
        // Jika user sudah login, ambil data dari Auth
        if (Auth::check()) {
            $this->full_name = Auth::user()->name;
            $this->email = Auth::user()->email;
            // Anda bisa tambahkan ini jika ada kolom 'phone_number' di tabel users
            // $this->phone_number = Auth::user()->phone_number;
        }

        $this->calculateTotals();
    }

    public function calculateTotals()
    {
        $this->sub_total = collect($this->cart_items)->sum(fn($item) => $item['price'] * $item['quantity']);
        $this->grand_total = $this->sub_total + $this->service_fee;
    }

    public function placeOrder()
    {
        $this->validate([
            'full_name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone_number' => 'required|string|max:255',
            'shipping_address' => 'required|string|max:500',
            'payment_method' => 'required'
        ]);

        $order = Order::create([
            'user_id' => Auth::id(),
            'grand_total' => $this->grand_total,
            'shipping_address' => $this->shipping_address,
            'phone_number' => $this->phone_number,
            'status' => 'pending',
            'payment_method' => $this->payment_method,
            'payment_status' => 'pending',
        ]);

        foreach ($this->cart_items as $productId => $item) {
            $order->items()->create([
                'product_id' => $productId,
                'quantity' => $item['quantity'],
                'price' => $item['price']
            ]);
        }

        session()->forget('cart');
        $this->dispatch('cart-updated');

        $this->dispatch('swal:toast', [
            'type' => 'success',
            'title' => 'Pesanan berhasil dibuat.'
        ]);

        return $this->redirect(route('order.detail', ['order' => $order]), navigate: true);
    }

    public function render()
    {
        return view('livewire.checkout-page');
    }
}
