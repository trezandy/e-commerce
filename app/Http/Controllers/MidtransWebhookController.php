<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Midtrans\Config;
use Midtrans\Notification;

class MidtransWebhookController extends Controller
{
    public function handle(Request $request)
    {
        Config::$serverKey = config('services.midtrans.server_key');
        Config::$isProduction = config('services.midtrans.is_production', false);

        try {
            $notification = new Notification();

            // --- PERBAIKAN: Gunakan data sebagai array ---
            $payload = (array) $notification->getResponse();
            Log::info("Midtrans Webhook Payload Received: ", $payload);
            // ---------------------------------------------

            $receivedOrderId = $payload['order_id'];
            $transactionStatus = $payload['transaction_status'];

            // --- LOGIKA BARU: PARSING ORDER NUMBER ---
            // Pisahkan ID yang diterima berdasarkan tanda hubung terakhir
            $orderParts = explode('-', $receivedOrderId);

            // Jika ID mengandung timestamp (lebih dari 3 bagian untuk format INV-Ymd-XXXXXX),
            // maka kita gabungkan kembali tanpa bagian terakhir (timestamp).
            if (count($orderParts) > 3) {
                array_pop($orderParts); // Hapus elemen terakhir (timestamp)
                $originalOrderNumber = implode('-', $orderParts);
            } else {
                // Jika tidak, berarti ini adalah pembayaran pertama, gunakan ID apa adanya.
                $originalOrderNumber = $receivedOrderId;
            }
            // -----------------------------------------

            // Cari pesanan di database menggunakan nomor pesanan asli
            $order = Order::where('order_number', $originalOrderNumber)->firstOrFail();

            // Validasi Signature Key
            $signatureKey = hash('sha512', $payload['order_id'] . $payload['status_code'] . $payload['gross_amount'] . Config::$serverKey);
            if ($signatureKey !== $payload['signature_key']) {
                return response()->json(['message' => 'Invalid signature'], 403);
            }

            if ($order->payment_status === 'paid') {
                return response()->json(['message' => 'Order already paid.']);
            }

            // --- PERBAIKAN: Akses data dari array $payload ---
            $order->payment_channel = $payload['payment_type'];

            if ($payload['payment_type'] == 'bank_transfer' && isset($payload['va_numbers'][0]->bank)) {
                $order->payment_provider = strtoupper($payload['va_numbers'][0]->bank);
            } elseif ($payload['payment_type'] == 'qris' && isset($payload['acquirer'])) {
                $order->payment_provider = ucfirst($payload['acquirer']);
            }
            // ------------------------------------------------

            if ($transactionStatus == 'capture' || $transactionStatus == 'settlement') {
                $order->payment_status = 'paid';
            } else if ($transactionStatus == 'deny' || $transactionStatus == 'expire' || $transactionStatus == 'cancel') {
                $order->payment_status = 'failed';
            }

            $order->save();

            return response()->json(['message' => 'Notification processed successfully.']);
        } catch (\Exception $e) {
            Log::error('Midtrans Webhook Exception: ' . $e->getMessage());
            return response()->json(['message' => 'Error processing notification.'], 500);
        }
    }
}
