<?php

namespace App\Livewire;

use App\Models\Order;
use Illuminate\Support\Facades\Storage; // <-- Tambahkan ini
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\Attributes\Layout;

#[Layout('components.layouts.app')]
class OrderDetailPage extends Component
{
    use WithFileUploads;

    public Order $order;
    public $paymentProofFile;

    /**
     * Metode untuk menangani proses unggah bukti pembayaran.
     */
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
