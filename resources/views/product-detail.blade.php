<x-layouts.app>
	{{-- Menggunakan layout utama Anda --}}

	<main>
		<div class="mt-4">
			<div class="container">
				<!-- Breadcrumb -->
				<nav aria-label="breadcrumb">
					<ol class="flex flex-wrap">
						<li class="inline-block text-green-600 mr-2">
							<a href="{{ route('home') }}">
								Home
								<svg xmlns="http://www.w3.org/2000/svg"
									class="icon icon-tabler icon-tabler-chevron-right inline-block" width="14"
									height="14" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
									stroke-linecap="round" stroke-linejoin="round">
									<path stroke="none" d="M0 0h24v24H0z" fill="none" />
									<path d="M9 6l6 6l-6 6" />
								</svg>
							</a>
						</li>
						<li class="inline-block text-green-600 mr-2">
							{{-- Link ke kategori (bisa dikembangkan nanti) --}}
							<a href="#">
								{{ $product->category->name }}
								<svg xmlns="http://www.w3.org/2000/svg"
									class="icon icon-tabler icon-tabler-chevron-right inline-block" width="14"
									height="14" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
									stroke-linecap="round" stroke-linejoin="round">
									<path stroke="none" d="M0 0h24v24H0z" fill="none" />
									<path d="M9 6l6 6l-6 6" />
								</svg>
							</a>
						</li>
						<li class="inline-block text-gray-500 active" aria-current="page">{{ $product->name }}</li>
					</ol>
				</nav>
			</div>
		</div>

		<section class="my-10">
			<div class="container">
				<div class="flex flex-wrap">
					<div class="lg:w-1/2">
						<!-- Gambar utama (slider) -->
						<div class="product" id="product">
							<div class="zoom" onmousemove="zoom(event)"
								style="background-image: url({{ url('storage/' . $product->image) }})">
								<img src="{{ url('storage/' . $product->image) }}" alt="{{ $product->name }}" />
							</div>
							@if(!empty($product->images))
							@foreach($product->images as $galleryImage)
							@if(isset($galleryImage['path']))
							<div>
								<div class="zoom" onmousemove="zoom(event)"
									style="background-image: url({{ url('storage/' . $galleryImage['path']) }})">
									<img src="{{ url('storage/' . $galleryImage['path']) }}"
										alt="Gambar galeri produk" />
								</div>
							</div>
							@endif
							@endforeach
							@endif
						</div>
						<!-- Gambar kecil (thumbnails) -->
						<div class="product-tools">
							<div class="thumbnails flex gap-3" id="productThumbnails">
								<div class="w-1/4">
									<div class="thumbnails-img">
										<img src="{{ url('storage/' . $product->image) }}" alt="{{ $product->name }}" />
									</div>
								</div>
								@if(!empty($product->images))
								@foreach($product->images as $galleryImage)
								@if(isset($galleryImage['path']))
								<div class="w-1/4">
									<div class="thumbnails-img">
										<img src="{{ url('storage/' . $galleryImage['path']) }}"
											alt="Thumbnail galeri" />
									</div>
								</div>
								@endif
								@endforeach
								@endif
							</div>
						</div>
					</div>

					{{-- Kolom Kanan: Detail & Aksi --}}
					<div class="lg:w-1/2 pr-4 pl-4">
						<div class="lg:pl-10 mt-6 md:mt-0">
							<a href="#" class="block text-green-600">{{ $product->category->name }}</a>
							<div class="flex flex-col mt-2">
								<h1>{{ $product->name }}</h1>
							</div>

							{{-- Memanggil Komponen Livewire --}}
							<livewire:product-detail :product="$product" />
						</div>
					</div>
				</div>

				<!-- Tab Deskripsi -->
				<div class="w-full mt-10">
					<ul class="nav nav-line-bottom border-b border-gray-300 pl-0" id="myTab" role="tablist">
						<li class="nav-item" role="presentation">
							<button class="inline-block py-3 font-semibold px-4 no-underline nav-link active"
								id="product-tab" data-bs-toggle="tab" data-bs-target="#product-tab-pane" type="button"
								role="tab">
								Detail Produk
							</button>
						</li>
					</ul>
					<div class="tab-content" id="myTabContent">
						<div class="tab-pane active opacity-100 block" id="product-tab-pane" role="tabpanel">
							<div class="my-8">
								<h3 class="text-md font-semibold">Deskripsi Produk</h3>
								<div class="prose max-w-none text-gray-600 mt-2">
									{!! nl2br(e($product->description)) !!}
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
	</main>

	@push('scripts')
	<script>
		// Menunggu sampai seluruh halaman dimuat sebelum menjalankan script galeri
        document.addEventListener('DOMContentLoaded', function () {
            // Inisialisasi slider utama
            if (document.querySelector('#product')) {
                var slider = tns({
                    container: '#product',
                    items: 1,
                    startIndex: 0,
                    navContainer: "#productThumbnails",
                    navAsThumbnails: true,
                    autoplay: false,
                    autoplayTimeout: 4000,
                    swipeAngle: false,
                    speed: 400,
                    controls: false,
                });
            }
        });
	</script>
	@endpush

</x-layouts.app>