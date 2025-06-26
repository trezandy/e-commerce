<div>
    <section class="mt-8">
        <div class="container">
            <div class="swiper-container swiper" id="swiper-1" data-pagination-type="" data-speed="400"
                data-space-between="100" data-pagination="true" data-navigation="false" data-autoplay="true"
                data-autoplay-delay="3000" data-effect="fade"
                data-breakpoints='{"480": {"slidesPerView": 1}, "768": {"slidesPerView": 1}, "1024": {"slidesPerView": 1}}'>
                <div class="swiper-wrapper pb-8">
                    <div class="swiper-slide"
                        style="background: url({{ asset('assets/images/slider/slide-1.jpg') }}) no-repeat; background-size: cover; border-radius: 0.5rem; background-position: center">
                        <div class="lg:py-32 p-12 lg:pl-12 xl:w-2/5 md:w-3/5">
                            <span
                                class="inline-block p-2 text-sm align-baseline leading-none rounded-lg bg-yellow-500 text-gray-900 font-semibold">Opening
                                Sale Discount 50%</span>
                            <div class="my-7 flex flex-col gap-2">
                                <h1 class="text-gray-900 text-xl lg:text-5xl font-bold leading-tight">SuperMarket
                                    For Fresh Grocery</h1>
                                <p class="text-md font-light">Introduced a new model for online grocery shopping and
                                    convenient home delivery.</p>
                            </div>
                            <a href="#!"
                                class="btn inline-flex items-center gap-x-2 bg-gray-800 text-white border-gray-800 disabled:opacity-50 disabled:pointer-events-none hover:text-white hover:bg-gray-900 hover:border-gray-900 active:bg-gray-900 active:border-gray-900 focus:outline-none focus:ring-4 focus:ring-gray-300">
                                Shop Now
                                <svg xmlns="http://www.w3.org/2000/svg"
                                    class="icon icon-tabler icon-tabler-arrow-right inline-block" width="14" height="14"
                                    viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                    stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                    <path d="M5 12l14 0" />
                                    <path d="M13 18l6 -6" />
                                    <path d="M13 6l6 6" />
                                </svg>
                            </a>
                        </div>
                    </div>
                    <div class="swiper-slide"
                        style="background: url({{ asset('assets/images/slider/slider-2.jpg') }}) no-repeat; background-size: cover; border-radius: 0.5rem; background-position: center">
                        <div class="lg:py-32 lg:pl-12 lg:pr-6 px-12 py-12 xl:w-2/5 md:w-3/5">
                            <span
                                class="inline-block p-2 text-sm align-baseline leading-none rounded-lg bg-yellow-500 text-gray-900 font-semibold">Free
                                Shipping - orders over $100</span>
                            <div class="my-7 flex flex-col gap-2">
                                <h2 class="text-gray-900 text-xl lg:text-5xl font-bold leading-tight">
                                    Free Shipping on
                                    <br />
                                    orders over
                                    <span class="text-green-600">$100</span>
                                </h2>
                                <p class="text-md font-light">Free Shipping to First-Time Customers Only, After
                                    promotions and discounts are applied.</p>
                            </div>
                            <a href="#!"
                                class="btn inline-flex items-center gap-x-2 bg-gray-800 text-white border-gray-800 disabled:opacity-50 disabled:pointer-events-none hover:text-white hover:bg-gray-900 hover:border-gray-900 active:bg-gray-900 active:border-gray-900 focus:outline-none focus:ring-4 focus:ring-gray-300">
                                Shop Now
                                <svg xmlns="http://www.w3.org/2000/svg"
                                    class="icon icon-tabler icon-tabler-arrow-right inline-block" width="14" height="14"
                                    viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                    stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                    <path d="M5 12l14 0" />
                                    <path d="M13 18l6 -6" />
                                    <path d="M13 6l6 6" />
                                </svg>
                            </a>
                        </div>
                    </div>

                </div>
                <div class="swiper-pagination !bottom-14"></div>
                <div class="swiper-navigation">
                    <div class="swiper-button-next"></div>
                    <div class="swiper-button-prev"></div>
                </div>
            </div>
        </div>
    </section>
    <section class="mt-8">
        <div class="container">
            <div class="flex flex-wrap">
                <div class="w-full">
                    <h2 class="text-lg absolute z-10">Featured Categories</h2>
                </div>
            </div>
            <div class="swiper-container swiper" id="swiper-1" data-pagination-type="" data-speed="400"
                data-space-between="20" data-pagination="false" data-navigation="true" data-autoplay="true"
                data-autoplay-delay="3000" data-effect="slide"
                data-breakpoints='{"480": {"slidesPerView": 2}, "768": {"slidesPerView": 3}, "1024": {"slidesPerView": 6}}'>
                <div class="swiper-wrapper py-12">
                    <div class="swiper-slide">
                        <a href="./shop.html">
                            <div
                                class="relative rounded-lg break-words border bg-white border-gray-300 transition duration-75 hover:transition hover:duration-500 ease-in-out hover:border-green-600 hover:shadow-md">
                                <div class="py-8 text-center">
                                    <img src="{{ asset('assets/images/category/category-dairy-bread-eggs.jpg') }}"
                                        alt="Grocery Ecommerce Template" class="mb-3 m-auto" />
                                    <div class="text-base">Dairy, Bread & Eggs</div>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="swiper-slide">
                        <a href="./shop.html">
                            <div
                                class="relative rounded-lg break-words border bg-white border-gray-300 transition duration-75 hover:transition hover:duration-500 ease-in-out hover:border-green-600 hover:shadow-md">
                                <div class="py-8 text-center">
                                    <img src="{{ asset('assets/images/category/category-snack-munchies.jpg') }}"
                                        alt="Grocery Ecommerce Template" class="mb-3 m-auto" />
                                    <div class="text-base">Snack & Munchies</div>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="swiper-slide">
                        <a href="./shop.html">
                            <div
                                class="relative rounded-lg break-words border bg-white border-gray-300 transition duration-75 hover:transition hover:duration-500 ease-in-out hover:border-green-600 hover:shadow-md">
                                <div class="py-8 text-center">
                                    <img src="{{ asset('assets/images/category/category-bakery-biscuits.jpg') }}"
                                        alt="Grocery Ecommerce Template" class="mb-3 m-auto" />
                                    <div class="text-base">Bakery & Biscuits</div>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="swiper-slide">
                        <a href="./shop.html">
                            <div
                                class="relative rounded-lg break-words border bg-white border-gray-300 transition duration-75 hover:transition hover:duration-500 ease-in-out hover:border-green-600 hover:shadow-md">
                                <div class="py-8 text-center">
                                    <img src="{{ asset('assets/images/category/category-instant-food.jpg') }}"
                                        alt="Grocery Ecommerce Template" class="mb-3 m-auto" />
                                    <div class="text-base">Instant Food</div>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="swiper-slide">
                        <a href="./shop.html">
                            <div
                                class="relative rounded-lg break-words border bg-white border-gray-300 transition duration-75 hover:transition hover:duration-500 ease-in-out hover:border-green-600 hover:shadow-md">
                                <div class="py-8 text-center">
                                    <img src="{{ asset('assets/images/category/category-tea-coffee-drinks.jpg') }}"
                                        alt="Grocery Ecommerce Template" class="mb-3 m-auto" />
                                    <div class="text-base">Tea, Coffee & Drinks</div>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="swiper-slide">
                        <a href="./shop.html">
                            <div
                                class="relative rounded-lg break-words border bg-white border-gray-300 transition duration-75 hover:transition hover:duration-500 ease-in-out hover:border-green-600 hover:shadow-md">
                                <div class="py-8 text-center">
                                    <img src="{{ asset('assets/images/category/category-atta-rice-dal.jpg') }}"
                                        alt="Grocery Ecommerce Template" class="mb-3 m-auto" />
                                    <div class="text-base">Atta, Rice & Dal</div>
                                </div>
                            </div>
                        </a>
                    </div>

                    <div class="swiper-slide">
                        <a href="./shop.html">
                            <div
                                class="relative rounded-lg break-words border bg-white border-gray-300 transition duration-75 hover:transition hover:duration-500 ease-in-out hover:border-green-600 hover:shadow-md">
                                <div class="py-8 text-center">
                                    <img src="{{ asset('assets/images/category/category-baby-care.jpg') }}"
                                        alt="Grocery Ecommerce Template" class="mb-3 m-auto" />
                                    <div class="text-base">Baby Care</div>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="swiper-slide">
                        <a href="./shop.html">
                            <div
                                class="relative rounded-lg break-words border bg-white border-gray-300 transition duration-75 hover:transition hover:duration-500 ease-in-out hover:border-green-600 hover:shadow-md">
                                <div class="py-8 text-center">
                                    <img src="{{ asset('assets/images/category/category-chicken-meat-fish.jpg') }}"
                                        alt="Grocery Ecommerce Template" class="mb-3 m-auto" />
                                    <div class="text-base">Chicken, Meat & Fish</div>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="swiper-slide">
                        <a href="./shop.html">
                            <div
                                class="relative rounded-lg break-words border bg-white border-gray-300 transition duration-75 hover:transition hover:duration-500 ease-in-out hover:border-green-600 hover:shadow-md">
                                <div class="py-8 text-center">
                                    <img src="{{ asset('assets/images/category/category-cleaning-essentials.jpg') }}"
                                        alt="Grocery Ecommerce Template" class="mb-3 m-auto" />
                                    <div class="text-base">Cleaning Essentials</div>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="swiper-slide">
                        <a href="./shop.html">
                            <div
                                class="relative rounded-lg break-words border bg-white border-gray-300 transition duration-75 hover:transition hover:duration-500 ease-in-out hover:border-green-600 hover:shadow-md">
                                <div class="py-8 text-center">
                                    <img src="{{ asset('assets/images/category/category-pet-care.jpg') }}"
                                        alt="Grocery Ecommerce Template" class="mb-3 m-auto" />
                                    <div class="text-base">Pet Care</div>
                                </div>
                            </div>
                        </a>
                    </div>

                </div>
                <div class="swiper-pagination"></div>
                <div class="swiper-navigation">
                    <div class="swiper-button-next top-[28px]"></div>
                    <div class="swiper-button-prev top-[28px] !right-0 !left-auto mx-10"></div>
                </div>
            </div>
        </div>
    </section>

    <section>
        <div class="container">
            <div class="flex md:space-x-2 lg:space-x-6 flex-wrap md:flex-nowrap">
                <div class="w-full md:w-1/2 mb-3 lg:">
                    <div class="py-10 px-8 rounded-lg"
                        style="background: url({{ asset('assets/images/banner/grocery-banner.png') }}) no-repeat; background-size: cover; background-position: center">
                        <div class="flex flex-col gap-5">
                            <div class="flex flex-col gap-1">
                                <h2 class="font-bold text-xl">Fruits & Vegetables</h2>
                                <p>
                                    Get Upto
                                    <span class="font-bold text-gray-800">30%</span>
                                    Off
                                </p>
                            </div>

                            <div class="flex flex-wrap">
                                <a href="#!"
                                    class="btn inline-flex items-center gap-x-2 bg-gray-800 text-white border-gray-800 disabled:opacity-50 disabled:pointer-events-none hover:text-white hover:bg-gray-900 hover:border-gray-900 active:bg-gray-900 active:border-gray-900 focus:outline-none focus:ring-4 focus:ring-gray-300">
                                    Shop Now
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="w-full md:w-1/2">
                    <div class="py-10 px-8 rounded-lg"
                        style="background: url({{ asset('assets/images/banner/grocery-banner-2.jpg') }}) no-repeat; background-size: cover; background-position: center">
                        <div class="flex flex-col gap-5">
                            <div class="flex flex-col gap-1">
                                <h2 class="font-bold text-xl">Freshly Baked Buns</h2>
                                <p>
                                    Get Upto
                                    <span class="font-bold text-gray-800">25%</span>
                                    Off
                                </p>
                            </div>

                            <div class="flex flex-wrap">
                                <a href="#!"
                                    class="btn inline-flex items-center gap-x-2 bg-gray-800 text-white border-gray-800 disabled:opacity-50 disabled:pointer-events-none hover:text-white hover:bg-gray-900 hover:border-gray-900 active:bg-gray-900 active:border-gray-900 focus:outline-none focus:ring-4 focus:ring-gray-300">
                                    Shop Now
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="lg:my-14 my-8">
        <div class="container">
            <div class="flex flex-wrap">
                <div class="w-full mb-6">
                    <h2 class="text-lg">New Products</h2>
                </div>
            </div>

            <div class="grid gap-4 grid-cols-1 md:grid-cols-2 lg:gap-4 xl:grid-cols-5">
                @foreach($products as $product)
                <div class="relative rounded-lg break-words border bg-white border-gray-300 card-product">
                    <div class="flex-auto p-4">
                        <div class="text-center relative flex justify-center">
                            {{-- <div class="absolute top-0 left-0">
                                <span
                                    class="inline-block p-1 text-center font-semibold text-sm align-baseline leading-none rounded bg-green-600 text-white">14%</span>
                            </div> --}}
                            <a href="{{ route('product.show', $product->slug) }}"><img
                                    src="{{ asset('storage/' . $product->image) }}" alt="Grocery Ecommerce Template"
                                    class="w-full h-auto" /></a>
                        </div>
                        <div class="flex flex-col gap-3">
                            <a href="#!" class="text-decoration-none text-gray-500"><small>{{
                                    $product->category->name }}</small></a>
                            <div class="flex flex-col gap-2">
                                <h3 class="text-base truncate"><a href="{{ route('product.show', $product->slug) }}">{{
                                        $product->name }}</a>
                                </h3>
                            </div>
                            <div class="flex justify-between items-center">
                                <div>
                                    <span class="text-gray-900 font-semibold">Rp {{ number_format($product->price,
                                        0, ',', '.') }}</span>
                                </div>
                                <div>
                                    <button type="button"
                                        wire:click.prevent="$dispatch('add-to-cart', { productId: {{ $product->id }} })"
                                        class="btn inline-flex items-center gap-x-1 bg-green-600 text-white border-green-600 disabled:opacity-50 disabled:pointer-events-none hover:text-white hover:bg-green-700 hover:border-green-700 active:bg-green-700 active:border-green-700 focus:outline-none focus:ring-4 focus:ring-green-300 btn-sm">
                                        <svg xmlns="http://www.w3.org/2000/svg"
                                            class="icon icon-tabler icon-tabler-plus" width="14" height="14"
                                            viewBox="0 0 24 24" stroke-width="3" stroke="currentColor" fill="none"
                                            stroke-linecap="round" stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                            <path d="M12 5l0 14" />
                                            <path d="M5 12l14 0" />
                                        </svg>
                                        <span>Add</span>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
    <section class="lg:my-14 my-8">
        <div class="container">
            <div class="flex flex-wrap gap-y-6">
                <div class="md:w-1/2 lg:w-1/4 px-3">
                    <div class="flex flex-col gap-4">
                        <div class="inline-block"><img src="{{ asset('assets/images/icons/clock.svg') }}" alt="" />
                        </div>
                        <div class="flex flex-col gap-2">
                            <h3 class="text-md">10 minute grocery now</h3>
                            <p>Get your order delivered to your doorstep at the earliest from FreshCart pickup
                                stores near you.</p>
                        </div>
                    </div>
                </div>
                <div class="md:w-1/2 lg:w-1/4 px-3">
                    <div class="flex flex-col gap-4">
                        <div class="inline-block"><img src="{{ asset('assets/images/icons/gift.svg') }}" alt="" />
                        </div>
                        <div class="flex flex-col gap-2">
                            <h3 class="text-md">Best Prices & Offers</h3>
                            <p>Cheaper prices than your local supermarket, great cashback offers to top it off. Get
                                best pricess & offers.</p>
                        </div>
                    </div>
                </div>
                <div class="md:w-1/2 lg:w-1/4 px-3">
                    <div class="flex flex-col gap-4">
                        <div class="inline-block"><img src="{{ asset('assets/images/icons/package.svg') }}" alt="" />
                        </div>
                        <div class="flex flex-col gap-2">
                            <h3 class="text-md">Wide Assortment</h3>
                            <p>Choose from 5000+ products across food, personal care, household, bakery, veg and
                                non-veg & other categories.</p>
                        </div>
                    </div>
                </div>
                <div class="md:w-1/2 lg:w-1/4 px-3">
                    <div class="flex flex-col gap-4">
                        <div class="inline-block"><img src="{{ asset('assets/images/icons/refresh-cw.svg') }}" alt="" />
                        </div>
                        <div class="flex flex-col gap-2">
                            <h3 class="text-md">Easy Returns</h3>
                            <p>
                                Not satisfied with a product? Return it at the doorstep & get a refund within hours.
                                No questions asked
                                <a href="#!" class="text-green-600">policy</a>
                                .
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>