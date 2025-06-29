<div class="flex flex-col gap-4">
    <!-- Harga Produk -->
    <div class="text-md">
        <span class="text-gray-900 font-semibold text-2xl">Rp{{ number_format($product->price, 0, ',', '.') }}</span>
        {{-- Jika ada harga diskon, bisa ditambahkan di sini --}}
        {{-- <span class="line-through text-gray-500">$35</span> --}}
    </div>

    <hr />

    <!-- Pilihan Varian (jika ada, bisa dikembangkan nanti) -->
    <div>
        <button type="button"
            class="btn inline-flex items-center gap-x-2 bg-white text-gray-800 border-gray-300 border">250g</button>
        <button type="button"
            class="btn inline-flex items-center gap-x-2 bg-white text-gray-800 border-gray-300 border">500g</button>
    </div>

    <!-- Kontrol Kuantitas -->
    <div class="w-1/3 md:w-1/4 lg:w-1/5">
        <div class="input-group input-spinner rounded-lg flex justify-between items-center border">
            <button wire:click="decreaseQuantity" type="button"
                class="button-minus w-8 py-1 border-r cursor-pointer border-gray-300">-</button>
            <input type="text" value="{{ $quantity }}"
                class="quantity-field w-9 px-2 text-center h-7 border-0 bg-transparent" readonly />
            <button wire:click="increaseQuantity" type="button"
                class="button-plus w-8 py-1 border-l cursor-pointer border-gray-300">+</button>
        </div>
    </div>

    <!-- Tombol Add to Cart & Wishlist -->
    <div class="flex flex-wrap justify-start gap-2 items-center">
        <div class="lg:w-1/3 md:w-2/5 w-full grid">
            {{-- Kondisi untuk mengecek stok --}}
            @if($product->stock > 0)
            <button wire:click="addToCart" type="button"
                class="inline-flex items-center gap-2 bg-green-600 text-white font-semibold px-4 py-2 rounded">
                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                    class="icon icon-tabler icon-tabler-shopping-bag">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                    <path
                        d="M6.331 8h11.339a2 2 0 0 1 1.977 2.304l-1.255 8.152a3 3 0 0 1 -2.966 2.544h-6.852a3 3 0 0 1 -2.965 -2.544l-1.255 -8.152a2 2 0 0 1 1.977 -2.304z" />
                    <path d="M9 11v-5a3 3 0 0 1 6 0v5" />
                </svg>
                <span class="whitespace-nowrap">Tambahkan ke Keranjang</span>
            </button>

            @else
            <span class="text-center font-semibold text-red-600 bg-red-100 px-4 py-2 rounded-lg">Stok Habis</span>
            @endif
        </div>
    </div>
</div>