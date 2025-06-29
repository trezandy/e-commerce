<div>
    <main>
        {{-- Bagian Breadcrumb --}}
        <div class="mt-4">
            <div class="container">
                <div class="flex flex-wrap">
                    <div class="w-full">
                        <nav aria-label="breadcrumb">
                            <ol class="flex flex-wrap">
                                <li class="inline-block text-green-600 mr-2">
                                    <a href="{{ route('home') }}">Home
                                        <svg xmlns="http://www.w3.org/2000/svg"
                                            class="icon icon-tabler icon-tabler-chevron-right inline-block" width="14"
                                            height="14" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                            fill="none" stroke-linecap="round" stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                            <path d="M9 6l6 6l-6 6" />
                                        </svg>
                                    </a>
                                </li>
                                <li class="inline-block text-gray-500 active" aria-current="page">Shop Cart</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>

        {{-- Konten Utama Halaman Keranjang --}}
        <div class="my-10">
            <div class="container">
                <div class="flex flex-wrap mb-6">
                    <h1 class="text-xl">Keranjang Belanja</h1>
                </div>

                @if (!empty($cart_items))
                <div class="flex flex-wrap lg:flex-nowrap lg:gap-x-12 gap-y-6">
                    {{-- Kolom Kiri: Daftar Item --}}
                    <div class="lg:w-2/3 w-full">
                        <div class="flex flex-col gap-5">
                            <ul class="list-none">
                                @foreach ($cart_items as $productId => $item)
                                <li class="py-3 border-gray-300 border-t">
                                    <div class="flex items-center justify-between">
                                        <div class="w-1/2 md:w-1/2 lg:w-3/5">
                                            <div class="flex flex-row gap-5">
                                                <img src="{{ url('storage/' . $item['image']) }}"
                                                    alt="{{ $item['name'] }}" class="w-16 h-16" />
                                                <div class="flex flex-col gap-2">
                                                    <div>
                                                        <a href="#" class="text-inherit">
                                                            <h6>{{ $item['name'] }}</h6>
                                                        </a>
                                                    </div>
                                                    <div class="text-sm leading-none">
                                                        <a href="#!" wire:click.prevent="removeItem('{{ $productId }}')"
                                                            class="text-green-600 flex items-center gap-1">
                                                            <span class="align-text-bottom"><svg
                                                                    xmlns="http://www.w3.org/2000/svg"
                                                                    class="icon icon-tabler icon-tabler-trash"
                                                                    width="14" height="14" viewBox="0 0 24 24"
                                                                    stroke-width="2" stroke="currentColor" fill="none"
                                                                    stroke-linecap="round" stroke-linejoin="round">
                                                                    <path stroke="none" d="M0 0h24v24H0z" fill="none">
                                                                    </path>
                                                                    <path d="M4 7l16 0"></path>
                                                                    <path d="M10 11l0 6"></path>
                                                                    <path d="M14 11l0 6"></path>
                                                                    <path
                                                                        d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12">
                                                                    </path>
                                                                    <path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3">
                                                                    </path>
                                                                </svg></span>
                                                            <span class="text-gray-500 text-sm">Hapus</span>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="w-1/3 md:w-1/4 lg:w-1/6">
                                            <div
                                                class="input-group input-spinner rounded-lg flex justify-between items-center border border-gray-300">
                                                <button wire:click.prevent="decreaseQuantity('{{ $productId }}')"
                                                    class="button-minus w-8 py-1 border-r cursor-pointer border-gray-300">-</button>
                                                <input type="text" value="{{ $item['quantity'] }}"
                                                    class="quantity-field w-9 px-2 text-center h-7 border-0 bg-transparent"
                                                    readonly />
                                                <button wire:click.prevent="increaseQuantity('{{ $productId }}')"
                                                    class="button-plus w-8 py-1 border-l cursor-pointer border-gray-300">+</button>
                                            </div>
                                        </div>
                                        <div class="w-1/5 md:w-1/5 text-right">
                                            <span class="font-bold text-gray-800">Rp {{ number_format($item['price'],
                                                0, ',', '.') }}</span>
                                        </div>
                                    </div>
                                </li>
                                @endforeach
                            </ul>
                            <div class="flex justify-between">
                                <a href="{{ route('home') }}"
                                    class="btn inline-flex items-center gap-x-2 bg-gray-200 text-black border-gray-200 disabled:opacity-50 disabled:pointer-events-none hover:text-black hover:bg-gray-300 hover:border-gray-300 active:bg-gray-300 active:border-gray-300 focus:outline-none focus:ring-4 focus:ring-gray-200">
                                    Lanjut Belanja</a>
                            </div>
                        </div>
                    </div>

                    {{-- Kolom Kanan: Summary --}}
                    <div class="w-full lg:w-1/3 md:w-full">
                        <div class="relative card min-w-0">
                            <div class="card-body flex flex-col gap-4">
                                <h2 class="text-md">Ringkasan Belanja</h2>
                                <div
                                    class="relative flex flex-col min-w-0 rounded-lg break-words border bg-white border-1 border-gray-300">
                                    <ul class="flex flex-col">
                                        <li
                                            class="relative py-3 px-4 -mb-px border-b border-r-0 border-l-0 border-gray-300 no-underline flex justify-between items-start">
                                            <div>Harga Produk</div>
                                            <span>Rp {{ number_format($sub_total, 0, ',', '.') }}</span>
                                        </li>
                                        <li
                                            class="relative py-3 px-4 -mb-px border-b border-r-0 border-l-0 border-gray-300 no-underline flex justify-between items-start">
                                            <div class="flex items-center gap-2 justify-center"><span>Biaya
                                                    Layanan</span>
                                                <span class="text-gray-700" data-bs-toggle="tooltip"
                                                    aria-label="Biaya Layanan"
                                                    data-bs-original-title="Biaya ini mencakup biaya administrasi dan pengemasan.">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14"
                                                        viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                        class="icon icon-tabler icons-tabler-outline icon-tabler-info-circle">
                                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                        <path d="M3 12a9 9 0 1 0 18 0a9 9 0 0 0 -18 0"></path>
                                                        <path d="M12 9h.01"></path>
                                                        <path d="M11 12h1v4h1"></path>
                                                    </svg>
                                                </span>
                                            </div>
                                            <span>Rp {{ number_format($service_fee, 0, ',', '.') }}</span>
                                        </li>
                                        <li
                                            class="relative py-3 px-4 -mb-px border-r-0 border-l-0 border-gray-300 no-underline flex justify-between items-start">
                                            <div>
                                                <div class="font-bold text-gray-800">Total Bayar</div>
                                            </div>
                                            <span class="font-bold text-gray-800">Rp {{ number_format($grand_total, 0,
                                                ',', '.') }}</span>
                                        </li>
                                    </ul>
                                </div>
                                <div>
                                    <div class="grid">
                                        <a href="{{ route('checkout.index') }}"
                                            class="btn flex justify-between bg-green-600 text-white border-green-600 btn-lg">
                                            Bayar Sekarang
                                            <span class="font-bold">Rp {{ number_format($grand_total, 0,
                                                ',', '.') }}</span>
                                        </a>
                                    </div>
                                    {{-- <p class="mt-1">
                                        <span class="text-sm">By placing your order, you agree to be bound by the
                                            Freshcart <a href="#!" class="text-green-600">Terms of Service</a> and <a
                                                href="#!" class="text-green-600">Privacy Policy.</a></span>
                                    </p> --}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @else
                <div class="text-center p-10 border rounded-lg">
                    <h3 class="text-lg">Keranjang Belanja Anda Kosong</h3>
                    <p class="text-gray-500 mb-4">Ayo mulai belanja dan isi keranjang Anda!</p>
                    <a href="{{ route('home') }}" class="btn bg-green-600 text-white">Lanjutkan Belanja</a>
                </div>
                @endif
            </div>
        </div>
    </main>
</div>