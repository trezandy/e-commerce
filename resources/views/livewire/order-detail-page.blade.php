<div>
    <section>
        <div class="container">
            <div class="flex flex-wrap min-h-screen justify-center items-center">
                <div class="lg:w-2/3 flex flex-col gap-10">
                    <div class="flex-col lg:flex-row flex justify-center items-center gap-8">
                        <div class="lg:w-1/2 w-full">
                            <img src="{{ asset('assets/images/svg-graphics/200-success.svg') }}" alt="Payment Success"
                                class="max-w-full h-auto" />
                        </div>
                        <div class="lg:w-1/2 w-full">
                            <div class="flex flex-col gap-6 text-center lg:text-left">
                                <div class="flex flex-col gap-2">
                                    <h1 class="leading-tight text-2xl font-bold">Terima Kasih Atas Pesanan Anda!
                                    </h1>
                                    <p class="text-gray-600">
                                        Pesanan Anda telah kami terima dan akan segera diproses. Berikut adalah
                                        detail pesanan Anda:
                                    </p>
                                </div>

                                <div class="p-4 border rounded-lg text-left">
                                    <p><strong>Nomor Pesanan:</strong> #{{ $order->id }}</p>
                                    <p><strong>Tanggal:</strong> {{ $order->created_at->format('d F Y') }}</p>
                                    <p><strong>Total:</strong> Rp{{ number_format($order->grand_total, 0, ',', '.')
                                        }}</p>
                                    <p><strong>Metode Pembayaran:</strong> {{ Str::upper($order->payment_method) }}
                                    </p>
                                </div>

                                <div class="text-center lg:text-left">
                                    <a href="{{ route('my-account.index') }}"
                                        class="btn inline-flex items-center gap-x-2 bg-green-600 text-white border-green-600">
                                        Lihat Orderan Saya
                                        <span class="sr-only">Lihat Orderan Saya</span>
                                        {{-- Ikon panah ke kanan --}}
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                            stroke-linecap="round" stroke-linejoin="round"
                                            class="icon icon-tabler icons-tabler-outline icon-tabler-arrow-narrow-right">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                            <path d="M5 12l14 0" />
                                            <path d="M15 16l4 -4" />
                                            <path d="M15 8l4 4" />
                                        </svg>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>