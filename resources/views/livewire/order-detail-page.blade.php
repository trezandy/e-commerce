<div>
    <main>
        <div class="my-10">
            <div class="container">
                {{-- Pastikan ada data order yang valid --}}
                {{-- =================================================================== --}}
                {{-- 1. TAMPILAN JIKA PEMBAYARAN SUDAH LUNAS (PAID) --}}
                {{-- =================================================================== --}}
                @if ($order->payment_status == 'paid')

                <div class="flex flex-col items-center justify-center py-8 mx-auto md:h-screen lg:py-0">
                    <div
                        class="w-full p-6 bg-white rounded-lg border border-gray-200 dark:border md:mt-0 sm:max-w-md dark:bg-gray-800 dark:border-gray-700 sm:p-8">
                        <div class="flex justify-center mb-6">
                            {{-- <img src="{{ asset('assets/images/png/success.png') }}" alt="Payment Success"
                                class="h-auto" /> --}}
                            <div id="lottie-container" style="width: 150px; height: 150px;"></div>
                        </div>
                        <h2
                            class="mb-1 text-xl font-bold leading-tight tracking-tight text-center text-gray-900 md:text-2xl dark:text-white">
                            Terima Kasih Atas Pesanan Anda!
                        </h2>
                        <p class="font-light text-center text-gray-500 dark:text-gray-400">Pesanan Anda telah kami
                            terima dan
                            akan segera diproses.</p>

                        <div
                            class="mt-4 p-4 space-y-2 border border-gray-200 rounded-lg text-sm text-gray-700 dark:text-gray-300 dark:border-gray-600">
                            <div class="flex justify-between"><span class="font-medium">Nomor Pesanan:</span><span
                                    class="font-mono">#{{ $order->id }}</span></div>
                            <div class="flex justify-between"><span class="font-medium">Tanggal:</span><span>{{
                                    $order->created_at->format('d F Y') }}</span></div>
                            <div class="flex justify-between"><span class="font-medium">Metode
                                    Pembayaran:</span><span class="font-semibold">{{
                                    Str::upper($order->payment_method) }}</span></div>
                            <div class="flex justify-between pt-2 mt-2 border-t border-gray-200 dark:border-gray-600">
                                <span class="text-base font-bold">Total:</span>
                                <span class="text-base font-bold">Rp{{ number_format($order->grand_total, 0, ',',
                                    '.') }}</span>
                            </div>
                        </div>

                        <div class="mt-6">
                            <a href="{{ route('my-account.index') }}"
                                class="btn inline-flex w-full items-center justify-center gap-x-2 bg-gray-200 text-black border-gray-200 disabled:opacity-50 disabled:pointer-events-none hover:text-black hover:bg-gray-300 hover:border-gray-300 active:bg-gray-300 active:border-gray-300 focus:outline-none focus:ring-4 focus:ring-gray-200">
                                Kembali ke Riwayat Pesanan
                            </a>
                        </div>
                    </div>
                </div>

                {{-- =================================================================== --}}
                {{-- 2. TAMPILAN JIKA PEMBAYARAN BELUM LUNAS (PENDING) --}}
                {{-- =================================================================== --}}
                @else

                <section class="max-w-4xl p-4 mx-auto my-10">
                    <!-- Order Details Card -->
                    <div class="bg-white rounded-lg border border-gray-200 dark:bg-gray-800 dark:border-gray-700">
                        <div class="px-6 py-4 border-b border-gray-200 dark:border-gray-700">
                            <h4 class="text-lg font-semibold text-gray-800 dark:text-white">Detail Order #{{ $order->id
                                }}</h4>
                        </div>
                        <div class="p-6">
                            <div class="grid grid-cols-1 gap-8 md:grid-cols-2">
                                <div class="text-sm text-gray-700 dark:text-gray-300 space-y-2">
                                    <h5 class="mb-2 text-base font-semibold text-gray-900 dark:text-white">Detail
                                        Penerima</h5>
                                    <p><strong class="font-medium text-gray-900 dark:text-white">Nama:</strong> {{
                                        $order->user->name }}</p>
                                    <p><strong class="font-medium text-gray-900 dark:text-white">Email:</strong> {{
                                        $order->user->email }}</p>
                                    <p><strong class="font-medium text-gray-900 dark:text-white">Telepon:</strong> {{
                                        $order->phone_number }}</p>
                                    <p><strong class="font-medium text-gray-900 dark:text-white">Alamat
                                            Pengiriman:</strong><br>{{
                                        $order->shipping_address }}</p>
                                </div>
                                <div class="text-sm text-gray-700 dark:text-gray-300 space-y-2">
                                    <h5 class="mb-2 text-base font-semibold text-gray-900 dark:text-white">Ringkasan
                                        Pesanan</h5>
                                    <p><strong class="font-medium text-gray-900 dark:text-white">Tanggal:</strong> {{
                                        $order->created_at->format('d F Y') }}</p>
                                    <p><strong class="font-medium text-gray-900 dark:text-white">Metode
                                            Pembayaran:</strong> <span class="font-semibold text-green-600">{{
                                            Str::upper($order->payment_method) }}</span></p>
                                    <p class="flex items-center gap-2"><strong
                                            class="font-medium text-gray-900 dark:text-white">Status Pesanan:</strong>
                                        <span
                                            class="px-2 py-1 text-xs font-semibold text-blue-800 bg-blue-100 rounded-full">{{
                                            Str::ucfirst($order->status) }}</span>
                                    </p>
                                    <p class="flex items-center gap-2"><strong
                                            class="font-medium text-gray-900 dark:text-white">Status
                                            Pembayaran:</strong> <span
                                            class="px-2 py-1 text-xs font-semibold text-yellow-800 bg-yellow-100 rounded-full">{{
                                            Str::ucfirst($order->payment_status) }}</span></p>
                                    <p class="pt-2 mt-2 border-t border-gray-200 dark:border-gray-600"><strong
                                            class="text-base font-bold text-gray-900 dark:text-white">Total:</strong>
                                        <span class="text-base font-bold text-gray-900 dark:text-white">Rp{{
                                            number_format($order->grand_total, 0, ',', '.') }}</span>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Payment Instructions & Upload Form -->
                    @if ($order->payment_method == 'bank')
                    <div class="mt-6 bg-white rounded-lg border border-gray-200 dark:bg-gray-800 dark:border-gray-700">
                        <div class="px-6 py-4 border-b border-gray-200 dark:border-gray-700">
                            <h4 class="text-lg font-semibold text-gray-800 dark:text-white">Instruksi & Konfirmasi
                                Pembayaran</h4>
                        </div>
                        <div class="p-6">
                            <p class="text-gray-700 dark:text-gray-300">Silakan lakukan transfer sejumlah <strong
                                    class="text-gray-900 dark:text-white">Rp{{ number_format($order->grand_total, 0,
                                    ',', '.')
                                    }}</strong> ke rekening berikut:</p>
                            <div
                                class="p-4 my-4 text-blue-800 bg-blue-50 border border-blue-200 rounded-lg dark:bg-gray-700 dark:text-blue-300 dark:border-blue-600">
                                <p><strong class="font-semibold">Bank BCA</strong></p>
                                <p>Nomor Rekening: <strong class="font-mono">1234567890</strong></p>
                                <p>Atas Nama: <strong class="font-semibold">PT E-Commerce Sejahtera</strong></p>
                            </div>

                            <hr class="my-6 border-gray-200 dark:border-gray-700">

                            @if ($order->payment_proof)
                            <div class="mb-6">
                                <h5 class="mb-3 text-base font-semibold text-gray-900 dark:text-white">Bukti Pembayaran
                                    Terunggah
                                </h5>
                                <a href="{{ asset('storage/' . $order->payment_proof) }}" target="_blank">
                                    <img src="{{ asset('storage/' . $order->payment_proof) }}" alt="Bukti Pembayaran"
                                        class="object-cover rounded-lg h-32 max-w-xs hover:opacity-90">
                                </a>
                            </div>
                            @endif

                            <h5 class="mb-3 text-base font-semibold text-gray-900 dark:text-white">{{
                                $order->payment_proof ?
                                'Unggah Ulang Bukti (jika perlu)' : 'Unggah Bukti Pembayaran' }}</h5>
                            <form wire:submit.prevent="uploadProof" class="space-y-4">
                                <div>
                                    <input type="file" wire:model="paymentProofFile"
                                        class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400">
                                    @if ($paymentProofFile)
                                    <div class="mt-3">
                                        <img src="{{ $paymentProofFile->temporaryUrl() }}"
                                            class="object-cover rounded-lg h-32 max-w-xs"
                                            alt="Preview Bukti Pembayaran">
                                    </div>
                                    @endif
                                    @error('paymentProofFile') <span
                                        class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message
                                        }}</span> @enderror
                                </div>
                                <div class="flex items-center justify-between">
                                    <!-- Tombol Unggah (Primary) -->
                                    <button type="submit"
                                        class="btn inline-flex items-center gap-x-2 bg-green-600 text-white border-green-600 disabled:opacity-50 disabled:pointer-events-none hover:text-white hover:bg-green-700 hover:border-green-700 active:bg-green-700 active:border-green-700 focus:outline-none focus:ring-4 focus:ring-green-300"
                                        wire:loading.attr="disabled">
                                        <span wire:loading.remove wire:target="uploadProof">Unggah Sekarang</span>
                                        <span wire:loading wire:target="uploadProof">Mengunggah...</span>
                                    </button>
                                    <!-- Tombol Kembali (Secondary) -->
                                    <a href="{{ route('my-account.index') }}"
                                        class="btn inline-flex items-center gap-x-2 bg-gray-200 text-black border-gray-200 disabled:opacity-50 disabled:pointer-events-none hover:text-black hover:bg-gray-300 hover:border-gray-300 active:bg-gray-300 active:border-gray-300 focus:outline-none focus:ring-4 focus:ring-gray-200">
                                        Kembali
                                    </a>
                                </div>
                            </form>
                        </div>
                    </div>
                    @endif
                </section>

                @endif
            </div>
        </div>
    </main>
</div>

@push('scripts')
<script>
    var animation = lottie.loadAnimation({
        container: document.getElementById('lottie-container'),
        renderer: 'svg',
        loop: true,
        autoplay: true,
        path: '{{ asset('assets/images/lottie/success.json') }}'
    });
</script>
@endpush