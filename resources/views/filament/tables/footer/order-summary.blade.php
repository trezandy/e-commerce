@php
// Logika kalkulasi tetap sama
$subtotal = $record->items->sum(function($item) {
return $item->price * $item->quantity;
});
// Anda bisa menggantinya dengan kolom dari database, misal: $record->shipping_cost
$serviceFee = 2500; // Biaya pengiriman tetap
$grandTotal = $record->grand_total; // Ambil grand total langsung dari order
@endphp

{{--
Ganti total dari div ke <tfoot> untuk integrasi yang benar dengan tabel.
    Ini akan memastikan perataan kolom yang sempurna.
    --}}
    <tfoot class="text-sm">
        <tr class="border-t-2 border-gray-200 dark:border-gray-700">
            {{-- Kolom kosong untuk meratakan ke kanan --}}
            <td colspan="4" class="px-4 py-3 text-right text-gray-800 dark:text-white">
                Sub Total :
            </td>
            {{-- Kolom untuk nilai Sub Total --}}
            <td class="px-4 py-3 text-left text-gray-800 dark:text-white">
                IDR {{ number_format($subtotal, 2, ',', '.') }}
            </td>
        </tr>
        {{-- Baris untuk Shipping Cost --}}
        <tr>
            <td colspan="4" class="px-4 py-3 text-right text-gray-800 dark:text-white">
                Shipping Cost :
            </td>
            <td class="px-4 py-3 text-left text-gray-800 dark:text-white">
                IDR {{ number_format($serviceFee, 2, ',', '.') }}
            </td>
        </tr>
        {{-- Baris untuk Grand Total --}}
        <tr class="border-t border-gray-300 dark:border-gray-700">
            <td colspan="4" class="px-4 py-3 text-md font-bold text-right text-gray-900 dark:text-white">
                Grand Total :
            </td>
            <td class="px-4 py-3 text-lg font-bold text-left text-gray-900 dark:text-white">
                IDR {{ number_format($grandTotal, 2, ',', '.') }}
            </td>
        </tr>
    </tfoot>