<?php

namespace App\Livewire;

use App\Models\Order;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\Attributes\Layout;
use Midtrans\Config;
use Midtrans\Snap;

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
                'type' => 'info', // Use 'info' for neutral messages
                'title' => 'Keranjang anda kosong.'
            ]);

            return $this->redirect('/cart', navigate: true);
        }

        if (Auth::check()) {
            $this->full_name = Auth::user()->name;
            $this->email = Auth::user()->email;
        }

        $this->calculateTotals();
    }

    public function calculateTotals()
    {
        $this->sub_total = collect($this->cart_items)->sum(fn($item) => $item['price'] * $item['quantity']);
        $this->grand_total = $this->sub_total + $this->service_fee;
    }

    /**
     * Metode placeOrder yang sudah diperbaiki dengan logika kondisional.
     */
    public function placeOrder()
    {
        // 0. Cek jika pengguna adalah tamu (guest)
        if (Auth::guest()) {
            // Beri notifikasi untuk login
            // $this->dispatch('swal:toast', [
            //     'type' => 'info',
            //     'title' => 'Silakan masuk untuk melanjutkan pesanan.'
            // ]);
            // Kirim event untuk membuka modal login
            $this->dispatch('open-auth-modal');
            return; // Hentikan eksekusi lebih lanjut
        }

        // 1. Validasi semua input dari form
        $this->validate([
            'full_name' => 'required|string|max:255',
            'phone_number' => 'required|string|max:255',
            'shipping_address' => 'required|string|max:500',
            'payment_method' => 'required|in:bank,midtrans' // Pastikan hanya menerima 'bank' atau 'midtrans'
        ]);

        // 2. Cek stok setiap item di keranjang sebelum membuat pesanan
        foreach ($this->cart_items as $cartKey => $item) {
            $stock = 0;
            $productName = $item['name'];

            // Jika ada variant_id, cek stok varian
            if ($item['variant_id']) {
                $variant = \App\Models\ProductVariant::find($item['variant_id']);
                if ($variant) {
                    $stock = $variant->stock;
                    $productName .= ' - ' . $variant->name;
                }
            }
            // Jika tidak, cek stok produk utama
            else {
                $product = \App\Models\Product::find($item['product_id']);
                if ($product) {
                    $stock = $product->stock;
                }
            }

            // Lakukan pengecekan
            if ($stock < $item['quantity']) {
                $this->dispatch('swal:toast', [
                    'type' => 'error',
                    'title' => 'Stok untuk ' . $productName . ' tidak mencukupi. Harap perbarui keranjang Anda.'
                ]);
                return; // Hentikan proses
            }
        }

        // 3. Buat pesanan di database. Langkah ini sama untuk kedua metode.
        $order = Order::create([
            'user_id' => Auth::id(),
            'grand_total' => $this->grand_total,
            'service_fee' => $this->service_fee,
            'shipping_address' => $this->shipping_address,
            'phone_number' => $this->phone_number,
            'status' => 'pending',
            'payment_method' => $this->payment_method,
            'payment_status' => 'pending',
        ]);

        // 4. Simpan semua item dari keranjang ke dalam order_items
        foreach ($this->cart_items as $cartKey => $item) {
            $order->items()->create([
                'product_id' => $item['product_id'],
                'product_variant_id' => $item['variant_id'], // <-- Simpan ID varian
                'quantity' => $item['quantity'],
                'price' => $item['price']
            ]);
        }

        // 5. Handle logika spesifik berdasarkan metode pembayaran yang dipilih
        if ($this->payment_method == 'bank') {
            // --- LOGIKA UNTUK TRANSFER BANK ---
            // Kosongkan keranjang setelah order dibuat
            session()->forget('cart');
            $this->dispatch('cart-updated');

            // Beri notifikasi sukses
            $this->dispatch('swal:toast', [
                'type' => 'success',
                'title' => 'Pesanan berhasil dibuat.'
            ]);

            // Redirect ke halaman detail pesanan untuk melihat instruksi transfer
            return $this->redirect(route('order.detail', ['order' => $order]), navigate: true);
        } elseif ($this->payment_method == 'midtrans') {
            // --- LOGIKA UNTUK ONLINE PAYMENT ---
            // Konfigurasi Midtrans
            Config::$serverKey = config('services.midtrans.server_key');
            Config::$isProduction = config('services.midtrans.is_production', false);
            Config::$isSanitized = true;
            Config::$is3ds = true;

            $midtransItems = [];
            foreach ($this->cart_items as $cartKey => $item) {
                // Gabungkan nama produk dengan varian jika ada
                $itemName = $item['name'];
                if ($item['variant_name']) {
                    $itemName .= ' (' . $item['variant_name'] . ')';
                }

                $midtransItems[] = [
                    'id' => $cartKey, // Gunakan kunci unik keranjang sebagai ID
                    'price' => $item['price'],
                    'quantity' => $item['quantity'],
                    'name' => $itemName
                ];
            }

            // Jangan lupa tambahkan biaya layanan sebagai item terpisah
            if ($this->service_fee > 0) {
                $midtransItems[] = [
                    'id' => 'BIAYA_LAYANAN',
                    'price' => $this->service_fee,
                    'quantity' => 1,
                    'name' => 'Biaya Layanan'
                ];
            }

            // Buat parameter transaksi untuk Midtrans
            $params = [
                'transaction_details' => [
                    'order_id' => $order->order_number,
                    'gross_amount' => $order->grand_total,
                ],
                'item_details' => $midtransItems,
                'customer_details' => [
                    'first_name' => $this->full_name,
                    'email' => $this->email,
                    'phone' => $this->phone_number,
                    'shipping_address' => ['address' => $this->shipping_address]
                ],
            ];

            // Dapatkan Snap Token dari Midtrans
            $snapToken = Snap::getSnapToken($params);

            // Simpan token ke database
            $order->payment_token = $snapToken;
            $order->save();

            // Kosongkan keranjang
            session()->forget('cart');
            $this->dispatch('cart-updated');

            // Kirim Snap Token ke frontend untuk memicu pop-up pembayaran
            $this->dispatch('snap-redirect', token: $snapToken);

            // Tidak perlu redirect dari sini, frontend yang akan handle setelah pembayaran
        }
    }

    public function render()
    {
        return view('livewire.checkout-page');
    }
}
