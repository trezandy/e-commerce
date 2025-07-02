<div>
    @if (!empty($cart_items))
    {{-- <div class="text-red-800 mb-3 rounded-lg p-4 text-right" role="alert"> --}}
        {{-- Ganti link jika Anda punya halaman khusus untuk keranjang belanja --}}
        {{-- <a href="#" class="text-blue-600">Lihat Semua</a> --}}
        {{-- </div> --}}
    <ul class="list-none">

        {{-- Loop untuk setiap item di keranjang --}}
        @foreach ($cart_items as $productId => $item)
        <li class="py-3 border-t">
            <div class="flex items-center">
                <div class="w-1/2 md:w-1/2 lg:w-3/5">
                    <div class="flex">
                        {{-- Gambar Produk --}}
                        <img src="{{ url('storage/' . $item['image']) }}" alt="{{ $item['name'] }}" class="w-16 h-16" />
                        <div class="ml-3">
                            {{-- Nama Produk --}}
                            <a href="#" class="text-inherit">
                                <h6>{{ $item['name'] }}</h6>
                            </a>
                            <div class="flex items-center text-sm text-gray-500 space-x-2">
                                @if($item['variant_name'])
                                <span>{{ $item['variant_name'] }}</span>
                                {{-- Pemisah --}}
                                <span>-</span>
                                @endif

                                {{-- Tombol Remove --}}
                                <a href="#!" wire:click.prevent="removeItem('{{ $productId }}')"
                                    class="text-green-600 flex items-center">
                                    <span class="mr-1 align-text-bottom">
                                        <svg xmlns="http://www.w3.org/2000/svg"
                                            class="icon icon-tabler icon-tabler-trash" width="14" height="14"
                                            viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                            stroke-linecap="round" stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                            <path d="M4 7l16 0" />
                                            <path d="M10 11l0 6" />
                                            <path d="M14 11l0 6" />
                                            <path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12" />
                                            <path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3" />
                                        </svg>
                                    </span>
                                    <span class="text-gray-500 text-sm">Hapus</span>
                                </a>
                            </div>


                        </div>
                    </div>
                </div>

                {{-- Kontrol Kuantitas --}}
                <div class="w-1/3 md:w-1/4 lg:w-1/5">
                    <div
                        class="input-group input-spinner rounded-lg flex justify-between items-center border border-gray-300">
                        <button wire:click.prevent="decreaseQuantity('{{ $productId }}')"
                            class="w-8 py-1 border-r cursor-pointer border-gray-300">
                            -
                        </button>
                        <input type="text" value="{{ $item['quantity'] }}" readonly
                            class="quantity-field w-9 px-2 text-center h-7 border-0 bg-transparent text-sm" />
                        <button wire:click.prevent="increaseQuantity('{{ $productId }}')"
                            class="w-8 py-1 border-l cursor-pointer border-gray-300">
                            +
                        </button>
                    </div>
                </div>

                {{-- Harga per Item (Harga * Kuantitas) --}}
                <div class="w-1/5 text-center md:w-1/5 ml-3">
                    <span class="font-bold text-gray-800">Rp{{ number_format($item['price'] * $item['quantity'])
                        }}</span>
                    {{-- Jika ada harga diskon, logikanya bisa ditambahkan di sini --}}
                    {{-- <div class="line-through text-gray-500 small">$25.00</div> --}}
                </div>
            </div>
        </li>
        @endforeach

    </ul>

    {{-- Menampilkan Subtotal Keseluruhan --}}
    <div class="flex justify-between font-bold mt-4 pt-3 border-t text-green-600">
        <span>Subtotal</span>
        <span>Rp{{ number_format($grand_total) }}</span>
    </div>

    {{-- Tombol Continue & Update --}}
    <div class="flex justify-between mt-4">
        <a href="!#" data-bs-dismiss="offcanvas"
            class="btn inline-flex items-center gap-x-2 bg-gray-200 text-black border-gray-200 disabled:opacity-50 disabled:pointer-events-none hover:text-black hover:bg-gray-300 hover:border-gray-300 active:bg-gray-300 active:border-gray-300 focus:outline-none focus:ring-4 focus:ring-gray-200">
            Lanjut Belanja
        </a>
        <a href="{{ route('cart.index') }}"
            class="btn inline-flex items-center gap-x-2 bg-green-600 text-white border-green-600 disabled:opacity-50 disabled:pointer-events-none hover:text-white hover:bg-green-700 hover:border-green-700 active:bg-green-700 active:border-green-700 focus:outline-none focus:ring-4 focus:ring-green-300">
            Proses Bayar
        </a>
    </div>

    @else
    {{-- Tampilan jika keranjang kosong --}}
    <div class="text-center p-5">
        <p>Keranjang belanja Anda kosong.</p>
    </div>
    @endif
</div>