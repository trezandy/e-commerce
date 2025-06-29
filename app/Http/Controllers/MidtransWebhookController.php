<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Midtrans\Config;
use Midtrans\Notification;

class MidtransWebhookController extends Controller
{
    public function handle(Request $request)
    {
        // 1. Konfigurasi
        Config::$serverKey = config('services.midtrans.server_key');
        Config::$isProduction = config('services.midtrans.is_production');

        // 2. Buat objek notifikasi dari request body
        $notification = new Notification();

        // 3. Ambil data dari notifikasi
        $orderId = $notification->order_id;
        $statusCode = $notification->status_code;
        $grossAmount = $notification->gross_amount;
        $signatureKey = $notification->signature_key;
        $transactionStatus = $notification->transaction_status;

        // 4. Buat signature key versi kita untuk validasi
        $serverKey = Config::$serverKey;
        $hashed = hash('sha512', $orderId . $statusCode . $grossAmount . $serverKey);

        // 5. Validasi Signature Key
        if ($hashed !== $signatureKey) {
            // Jika signature tidak cocok, batalkan proses.
            // Ini mungkin permintaan palsu.
            return response()->json(['message' => 'Invalid signature'], 403);
        }

        // 6. Jika signature cocok, lanjutkan proses update status
        $order = Order::find($orderId);
        if (!$order) {
            return response()->json(['message' => 'Order not found.'], 404);
        }

        if ($transactionStatus == 'capture' || $transactionStatus == 'settlement') {
            $order->payment_status = 'paid';
        } else if ($transactionStatus == 'pending') {
            $order->payment_status = 'pending';
        } else if ($transactionStatus == 'deny' || $transactionStatus == 'expire' || $transactionStatus == 'cancel') {
            $order->payment_status = 'failed';
        }

        $order->save();
        return response()->json(['message' => 'Notification processed successfully.']);
    }
}
