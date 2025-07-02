<?php

namespace App\Livewire;

use App\Models\Order;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\Attributes\Layout;
use Midtrans\Config;
use Midtrans\Snap;

#[Layout('components.layouts.app')]
class OrderDetailPage extends Component
{
    use WithFileUploads;

    public Order $order;
    public $paymentProofFile;

    /**
     * Metode untuk menangani proses unggah bukti pembayaran.
     */

    public function cancelOrder()
    {
        // Hanya izinkan pembatalan jika status masih pending
        if ($this->order->status === 'pending' && $this->order->payment_status === 'pending') {
            $this->order->update(['status' => 'cancelled']);

            // Pengembalian stok akan dihandle secara otomatis oleh OrderObserver

            $this->dispatch('swal:toast', [
                'type' => 'success',
                'title' => 'Pesanan berhasil dibatalkan.'
            ]);

            return $this->redirect(route('my-account.index'), navigate: true);
        }
    }

    /**
     * Metode untuk membayar ulang dengan Midtrans.
     */
    public function retryMidtransPayment()
    {
        // Konfigurasi Midtrans
        Config::$serverKey = config('services.midtrans.server_key');
        Config::$isProduction = config('services.midtrans.is_production', false);
        Config::$isSanitized = true;
        Config::$is3ds = true;

        // Buat detail item untuk dikirim ke Midtrans
        $midtransItems = [];
        foreach ($this->order->items as $item) {
            $itemName = $item->product->name;
            if ($item->variant) {
                $itemName .= ' (' . $item->variant->name . ')';
            }
            $midtransItems[] = [
                'id' => 'item-' . $item->id,
                'price' => (int) $item->price,
                'quantity' => (int) $item->quantity,
                'name' => $itemName
            ];
        }

        // Tambahkan biaya layanan jika ada (sekarang diambil dari DB)
        if ($this->order->service_fee > 0) {
            $midtransItems[] = [
                'id' => 'SERVICE_FEE',
                'price' => (int) $this->order->service_fee,
                'quantity' => 1,
                'name' => 'Biaya Layanan'
            ];
        }

        // Buat ID transaksi unik untuk percobaan ini
        $retryOrderId = $this->order->order_number . '-' . time();

        $params = [
            'transaction_details' => [
                'order_id' => $retryOrderId,
                'gross_amount' => (int) $this->order->grand_total,
            ],
            'item_details' => $midtransItems,
            'customer_details' => [ /* ... detail pelanggan ... */],
        ];

        try {
            $snapToken = Snap::getSnapToken($params);
            // Langsung kirim token ke frontend tanpa menyimpan apa pun
            $this->dispatch('snap-redirect', token: $snapToken);
        } catch (\Exception $e) {
            Log::error('Midtrans Snap Token Error on Retry: ' . $e->getMessage());
            $this->dispatch('swal:toast', ['type' => 'error', 'title' => 'Gagal memproses pembayaran.']);
        }
    }

    public function uploadProof()
    {
        // 1. Validasi file yang diunggah
        $this->validate([
            'paymentProofFile' => 'required|image|max:2048', // Maksimal 2MB
        ]);

        // 2. Cek jika ada bukti pembayaran lama di database
        if ($this->order->payment_proof) {
            // Hapus file lama dari disk 'public'
            Storage::disk('public')->delete($this->order->payment_proof);
        }
        // ------------------------------------

        // 3. Simpan file yang baru diunggah ke storage/app/public/payment_proofs
        $path = $this->paymentProofFile->store('payment_proofs', 'public');

        // 4. Update database dengan path file yang baru dan ubah status order
        $this->order->update([
            'payment_proof' => $path,
            // 'status' => 'processing', // Ubah status menjadi 'processing' agar admin tahu ada konfirmasi baru
        ]);

        // 5. Reset input file agar bersih setelah diunggah
        $this->reset('paymentProofFile');

        // 6. Beri notifikasi sukses kepada pengguna
        $this->dispatch('swal:toast', [
            'type' => 'success',
            'title' => 'Bukti bayar diperbarui.'
        ]);

        // Tidak perlu redirect, biarkan pengguna melihat bukti baru yang terunggah di halaman yang sama.
    }

    public function render()
    {
        return view('livewire.order-detail-page');
    }
}
