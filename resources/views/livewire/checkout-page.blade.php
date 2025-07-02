<div>
    <main>
        <div class="mt-4">
            <div class="container">
                <div class="flex flex-wrap">
                    <div class="w-full">
                        <nav aria-label="breadcrumb">
                            <ol class="flex flex-wrap">
                                <li class="inline-block text-green-600 mr-2">
                                    <a href="{{ route('home') }}">Home<svg xmlns="http://www.w3.org/2000/svg"
                                            class="icon icon-tabler icon-tabler-chevron-right inline-block" width="14"
                                            height="14" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                            fill="none" stroke-linecap="round" stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                            <path d="M9 6l6 6l-6 6" />
                                        </svg></a>
                                </li>
                                <li class="inline-block text-green-600 mr-2">
                                    <a href="{{ route('cart.index') }}">Shop Cart<svg xmlns="http://www.w3.org/2000/svg"
                                            class="icon icon-tabler icon-tabler-chevron-right inline-block" width="14"
                                            height="14" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                            fill="none" stroke-linecap="round" stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                            <path d="M9 6l6 6l-6 6" />
                                        </svg></a>
                                </li>
                                <li class="inline-block text-gray-500 active" aria-current="page">Shop Checkout</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
        <div class="my-10">
            <div class="container">
                <div class="flex flex-wrap">
                    <div class="w-full mb-6">
                        <h1 class="text-xl">Checkout</h1>
                        @auth
                        <p>Hai, <span class="font-semibold text-green-600">{{ Auth::user()->name }}</span>.
                            Silakan lengkapi informasi di bawah ini untuk menyelesaikan
                            pesanan Anda.</p>

                        @else
                        <p>Sudah memiliki akun? Klik di sini untuk <a href="#!" class="text-green-600"
                                data-bs-toggle="modal" data-bs-target="#authModal">Masuk atau Daftar</a>.</p>
                        @endguest
                    </div>
                </div>

                <form wire:submit.prevent="placeOrder">
                    <div class="flex flex-wrap lg:flex-nowrap gap-10">
                        {{-- Kolom Kiri: Accordion --}}
                        <div class="lg:w-3/5 md:w-full">
                            <div class="accordion accordion-flush" id="accordionFlushExample">
                                {{-- Item 1: Alamat Pengiriman --}}
                                <div class="border-b border-gray-300 py-4">
                                    <a href="#" class="flex flex-row gap-2 items-center text-gray-900 text-md font-bold"
                                        data-bs-toggle="collapse" data-bs-target="#flush-collapseOne"
                                        aria-expanded="false" aria-controls="flush-collapseOne">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                            stroke-linecap="round" stroke-linejoin="round"
                                            class="icon icon-tabler icons-tabler-outline icon-tabler-user-check inline-block text-gray-500">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                            <path d="M8 7a4 4 0 1 0 8 0a4 4 0 0 0 -8 0" />
                                            <path d="M6 21v-2a4 4 0 0 1 4 -4h4" />
                                            <path d="M15 19l2 2l4 -4" />
                                        </svg>
                                        Data Penerima
                                    </a>
                                    <div id="flush-collapseOne" class="accordion-collapse collapse show"
                                        data-bs-parent="#accordionFlushExample">
                                        <div class="mt-4 flex flex-col gap-4">
                                            <div>
                                                <label for="full_name" class="mb-2 block text-sm font-medium">Nama
                                                    Lengkap</label>
                                                <input type="text" id="full_name" wire:model.defer="full_name"
                                                    class="border border-gray-300 text-gray-900 rounded-lg focus:ring-green-600 focus:border-green-600 block w-full p-2.5"
                                                    placeholder="Masukkan Nama Lengkap">
                                                @error('full_name') <span class="text-red-500 text-sm mt-1">{{ $message
                                                    }}</span> @enderror
                                            </div>
                                            <div>
                                                <label for="phone_number" class="mb-2 block text-sm font-medium">Nomor
                                                    Telepon</label>
                                                <input type="tel" id="phone_number" wire:model.defer="phone_number"
                                                    class="border border-gray-300 text-gray-900 rounded-lg focus:ring-green-600 focus:border-green-600 block w-full p-2.5"
                                                    placeholder="Masukkan Nomor Telepon">
                                                @error('phone_number') <span class="text-red-500 text-sm mt-1">{{
                                                    $message
                                                    }}</span> @enderror
                                            </div>
                                            <div>
                                                <label for="shipping_address"
                                                    class="mb-2 block text-sm font-medium">Alamat
                                                    Lengkap Pengiriman</label>
                                                <textarea id="shipping_address" wire:model.defer="shipping_address"
                                                    class="border border-gray-300 text-gray-900 rounded-lg focus:ring-green-600 focus:border-green-600 block w-full p-2.5"
                                                    rows="3"
                                                    placeholder="Contoh: Jl. Sudirman No. 123, Kel. Suka Maju, Kec. Damai, Kota Palu."></textarea>
                                                @error('shipping_address') <span class="text-red-500 text-sm mt-1">{{
                                                    $message
                                                    }}</span> @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                {{-- Item 2: Instruksi Pengiriman --}}
                                <div class="border-b border-gray-300 py-4">
                                    <a href="#" class="flex flex-row gap-2 items-center text-gray-900 text-md font-bold"
                                        data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo"
                                        aria-expanded="false" aria-controls="flush-collapseTwo">
                                        <svg xmlns="http://www.w3.org/2000/svg"
                                            class="icon icon-tabler icon-tabler-shopping-bag inline-block text-gray-500"
                                            width="20" height="20" viewBox="0 0 24 24" stroke-width="1.5"
                                            stroke="currentColor" fill="none" stroke-linecap="round"
                                            stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                            <path
                                                d="M6.331 8h11.339a2 2 0 0 1 1.977 2.304l-1.255 8.152a3 3 0 0 1 -2.966 2.544h-6.852a3 3 0 0 1 -2.965 -2.544l-1.255 -8.152a2 2 0 0 1 1.977 -2.304z" />
                                            <path d="M9 11v-5a3 3 0 0 1 6 0v5" />
                                        </svg>
                                        Catatan Pengiriman
                                    </a>
                                    <div id="flush-collapseTwo" class="accordion-collapse collapse"
                                        data-bs-parent="#accordionFlushExample">
                                        <div class="my-6">
                                            <textarea wire:model.defer="delivery_instructions"
                                                class="border border-gray-300 text-gray-900 rounded-lg w-full text-base"
                                                rows="3" placeholder="Tulis instruksi pengiriman di sini"></textarea>
                                        </div>
                                    </div>
                                </div>

                                {{-- Item 3: Metode Pembayaran --}}
                                <div class="py-4">
                                    <a href="#" class="flex flex-row gap-2 items-center text-gray-900 text-md font-bold"
                                        data-bs-toggle="collapse" data-bs-target="#flush-collapseThree"
                                        aria-expanded="false" aria-controls="flush-collapseThree">
                                        <svg xmlns="http://www.w3.org/2000/svg"
                                            class="icon icon-tabler icon-tabler-credit-card inline-block text-gray-500"
                                            width="20" height="20" viewBox="0 0 24 24" stroke-width="1.5"
                                            stroke="currentColor" fill="none" stroke-linecap="round"
                                            stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                            <path
                                                d="M3 5m0 3a3 3 0 0 1 3 -3h12a3 3 0 0 1 3 3v8a3 3 0 0 1 -3 3h-12a3 3 0 0 1 -3 -3z" />
                                            <path d="M3 10l18 0" />
                                            <path d="M7 15l.01 0" />
                                            <path d="M11 15l2 0" />
                                        </svg>
                                        Metode Pembayaran
                                    </a>
                                    <div id="flush-collapseThree" class="accordion-collapse collapse"
                                        data-bs-parent="#accordionFlushExample">
                                        <div class="mt-6 flex flex-col gap-4">
                                            <div class="card p-6">
                                                <div class="flex gap-3">
                                                    <input wire:model.defer="payment_method" value="bank"
                                                        class="w-4 h-4 text-green-600" type="radio"
                                                        name="payment_method_radio" id="bankTransfer" />
                                                    <div class="flex flex-col gap-1">
                                                        <h5 class="text-base">Transfer Bank</h5>
                                                        <p class="text-sm">Anda akan menerima nomor rekening
                                                            setelah
                                                            membuat pesanan.</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card p-6">
                                                <div class="flex gap-3">
                                                    {{-- Kita beri value 'midtrans' untuk membedakannya --}}
                                                    <input wire:model.defer="payment_method" value="midtrans"
                                                        class="w-4 h-4 text-green-600" type="radio"
                                                        name="payment_method_radio" id="midtransPayment" />
                                                    <div class="flex flex-col gap-1">
                                                        <h5 class="text-base">Online Payment</h5>
                                                        <p class="text-sm">Bayar dengan Kartu Kredit, QRIS,
                                                            GoPay,
                                                            Virtual Account, dll.</p>
                                                    </div>
                                                </div>
                                            </div>
                                            @error('payment_method') <span class="text-red-500 text-sm">{{
                                                $message
                                                }}</span> @enderror
                                            <div class="flex justify-end">
                                                <button type="submit"
                                                    class="ml-3 btn inline-flex items-center gap-x-2 bg-green-600 text-white border-green-600">Buat
                                                    Pesanan</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        {{-- Kolom Kanan: Order Details --}}
                        <div class="w-full md:w-full lg:w-1/3 lg:ml-14">
                            <div>
                                <div class="card shadow-sm">
                                    <h5 class="px-6 py-4 border-b border-gray-300">Ringkasan Belanja</h5>
                                    <ul class="flex flex-col">
                                        @foreach ($cart_items as $item)
                                        <li class="py-3 px-6 border-b border-gray-300">
                                            <div class="flex flex-wrap items-center">
                                                <div class="w-1/5 md:w-1/5"><img
                                                        src="{{ url('storage/' . $item['image']) }}"
                                                        alt="{{ $item['name'] }}" class="w-10" /></div>
                                                <div class="w-2/5 md:w-2/5 flex flex-col flex-wrap gap-1">
                                                    <h6>{{ $item['name'] }}</h6>
                                                    @if($item['variant_name'])
                                                    <span class="text-gray-500 text-sm">{{ $item['variant_name']
                                                        }}</span>
                                                    @endif
                                                </div>
                                                <div class="w-1/5 md:w-1/5 text-center text-gray-700"><span>x{{
                                                        $item['quantity'] }}</span></div>
                                                <div class="w-1/5 text-center md:w-1/5"><span
                                                        class="font-bold text-gray-800">Rp {{
                                                        number_format($item['price'], 0,
                                                        ',', '.') }}</span></div>
                                            </div>
                                        </li>
                                        @endforeach
                                        <li class="py-3 px-6 border-b border-gray-300 flex flex-col gap-2">
                                            <div class="flex items-center justify-between">
                                                <div>Harga Produk</div>
                                                <div class="font-bold text-gray-800">Rp {{
                                                    number_format($sub_total, 0,
                                                    ',', '.') }}
                                                </div>
                                            </div>
                                            <div class="flex items-center justify-between">
                                                <div class="flex items-center gap-2 justify-center"><span>Biaya
                                                        Layanan</span>
                                                    <span class="text-gray-700" data-bs-toggle="tooltip"
                                                        aria-label="Biaya Layanan"
                                                        data-bs-original-title="Biaya ini mencakup biaya administrasi dan pengemasan.">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14"
                                                            viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                            stroke-width="2" stroke-linecap="round"
                                                            stroke-linejoin="round"
                                                            class="icon icon-tabler icons-tabler-outline icon-tabler-info-circle">
                                                            <path stroke="none" d="M0 0h24v24H0z" fill="none">
                                                            </path>
                                                            <path d="M3 12a9 9 0 1 0 18 0a9 9 0 0 0 -18 0">
                                                            </path>
                                                            <path d="M12 9h.01"></path>
                                                            <path d="M11 12h1v4h1"></path>
                                                        </svg>
                                                    </span>
                                                </div>
                                                <div class="font-bold text-gray-800">Rp {{
                                                    number_format($service_fee,
                                                    0,
                                                    ',', '.') }}</div>
                                            </div>
                                        </li>
                                        <li class="py-3 px-6 ">
                                            <div
                                                class="flex items-center justify-between font-bold text-md text-green-600 ">
                                                <div>Total Bayar</div>
                                                <div>Rp {{ number_format($grand_total, 0,
                                                    ',', '.') }}</div>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </main>
</div>