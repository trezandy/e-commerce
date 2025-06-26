<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\Layout;
use App\Models\Order;
use App\Models\OrderItem;

#[Layout('components.layouts.app')]
class CheckoutPage extends Component
{

    public $cart_items = [];
    public $sub_total = 0;
    public $service_fee = 2500; // Biaya layanan tetap
    public $grand_total = 0;

    // Properti untuk form
    public $full_name;
    public $phone_number;
    public string $shipping_address;
    public $delivery_instructions = ''; // Properti baru
    public $payment_method;

    public function mount()
    {
        $this->cart_items = session()->get('cart', []);

        if (count($this->cart_items) == 0) {
            $this->dispatch('swal:toast', [
                'type' => 'danger',
                'title' => 'Keranjang anda kosong.'
            ]);
            return $this->redirect('/cart', navigate: true);
        }

        $this->calculateTotals();
    }

    public function calculateTotals()
    {
        $this->sub_total = collect($this->cart_items)->sum(function ($item) {
            return $item['price'] * $item['quantity'];
        });
        $this->grand_total = $this->sub_total + $this->service_fee;
    }

    public function placeOrder()
    {
        // 1. Validasi data dari form
        $this->validate([
            'full_name' => 'required|string|max:255',
            'phone_number' => 'required|string|max:15',
            'shipping_address' => 'required|string|max:500',
            'payment_method' => 'required'
        ]);

        // 2. Simpan data utama pesanan ke tabel 'orders'
        $order = new Order();
        // $order->user_id = auth()->id(); // Aktifkan ini jika sudah ada sistem login
        $order->grand_total = $this->grand_total;
        $order->shipping_address = $this->shipping_address;
        $order->phone_number = $this->phone_number;
        $order->status = 'pending'; // Status awal pesanan
        $order->payment_method = $this->payment_method;
        $order->payment_status = 'pending'; // Status awal pembayaran

        // Simpan ke database untuk mendapatkan ID pesanan
        $order->save();

        // 3. Loop melalui item di keranjang dan simpan ke tabel 'order_items'
        foreach ($this->cart_items as $productId => $item) {
            OrderItem::create([
                'order_id' => $order->id, // Gunakan ID dari pesanan yang baru saja dibuat
                'product_id' => $productId,
                'quantity' => $item['quantity'],
                'price' => $item['price']
            ]);
        }

        // 4. Kosongkan keranjang belanja setelah pesanan berhasil dibuat
        session()->forget('cart');
        $this->dispatch('cart-updated'); // Kirim event agar ikon keranjang di header menjadi 0

        // 5. Beri notifikasi sukses dan arahkan pengguna ke halaman "Terima Kasih"
        $this->alert('success', 'Pesanan Anda berhasil dibuat!');

        // return $this->redirect('/order-success', navigate: true);
        return $this->redirect(route('order.detail', ['order' => $order]), navigate: true);
    }

    public function render()
    {
        return view('livewire.checkout-page');
    }
}
