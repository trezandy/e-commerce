<div class="flex flex-col gap-4">
    <!-- Harga Produk & Diskon -->
    <div class="text-md">
        {{-- Jika ada varian terpilih, gunakan harganya. Jika tidak, gunakan harga produk default. --}}
        @php
        $price = $selectedVariant ? $selectedVariant->price : $product->price;
        $sale_price = $selectedVariant ? $selectedVariant->sale_price : $product->sale_price;
        @endphp

        @if($sale_price)
        <span class="text-gray-900 font-semibold text-2xl">Rp{{ number_format($sale_price, 0, ',', '.') }}</span>
        <span class="line-through text-gray-500 ml-2">Rp{{ number_format($price, 0, ',', '.') }}</span>
        <span class="ml-2 bg-red-100 text-red-600 text-xs font-semibold px-2.5 py-0.5 rounded-full">-{{ round((($price -
            $sale_price) / $price) * 100) }}%</span>
        @else
        <span class="text-gray-900 font-semibold text-2xl">Rp{{ number_format($price, 0, ',', '.') }}</span>
        @endif
    </div>

    <hr />

    <!-- Pilihan Varian -->
    @if($product->variants->isNotEmpty())
    <div>
        <h3 class="text-sm font-medium text-gray-900 mb-2">Pilih Varian:</h3>
        <div class="flex flex-wrap gap-2">
            @foreach($product->variants as $variant)
            <button type="button" wire:click="selectVariant({{ $variant->id }})" class="btn border transition-colors duration-200 
                        {{ $selectedVariant && $selectedVariant->id == $variant->id 
                            ? 'bg-green-600 text-white border-green-600' 
                            : 'bg-white text-gray-800 border-gray-300 hover:bg-gray-100' }}">
                {{ $variant->name }}
            </button>
            @endforeach
        </div>
    </div>
    @endif

    <!-- Kontrol Kuantitas & Stok -->
    <div class="flex items-center gap-4">
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
        <div class="text-sm text-gray-500">
            {{-- Tampilkan stok berdasarkan varian yang dipilih --}}
            Stok: <span class="font-medium text-gray-800">{{ $selectedVariant ? $selectedVariant->stock :
                $product->stock }}</span>
        </div>
    </div>


    <!-- Tombol Add to Cart -->
    <div class="flex flex-wrap justify-start gap-2 items-center">
        <div class="lg:w-1/3 md:w-2/5 w-full grid">
            @php
            $currentStock = $selectedVariant ? $selectedVariant->stock : $product->stock;
            @endphp

            @if($currentStock > 0)
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
            <button type="button" class="btn gap-x-1 bg-gray-400 text-white border-gray-400 justify-center" disabled>
                Stok Habis
            </button>
            @endif
        </div>
    </div>
</div>