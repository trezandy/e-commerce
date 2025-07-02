<header>
    <div class="border-b">
        <div class="pt-5">
            <div class="container">
                <div class="flex flex-wrap w-full items-center justify-between">
                    <div class="lg:w-1/6 md:w-1/2 w-2/5">
                        <a class="navbar-brand" href="{{ route('home') }}">
                            <img src="{{ asset('assets/images/logo/freshcart-logo.svg') }}" alt="Logo" />
                        </a>
                    </div>
                    <div class="lg:w-2/5 hidden lg:block">
                        {{-- Form Pencarian --}}
                    </div>

                    <div class="lg:w-1/5 text-end md:w-1/2 w-3/5">
                        <div class="flex gap-4 md:gap-7 items-center justify-end">
                            @guest
                            {{-- Tampilkan ini jika pengguna belum login --}}
                            <div>
                                <a href="#!" data-bs-toggle="modal" data-bs-target="#authModal">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-user"
                                        width="22" height="22" viewBox="0 0 24 24" stroke-width="1.5"
                                        stroke="currentColor" fill="none" stroke-linecap="round"
                                        stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                        <path d="M8 7a4 4 0 1 0 8 0a4 4 0 0 0 -8 0" />
                                        <path d="M6 21v-2a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v2" />
                                    </svg>
                                </a>
                            </div>
                            @endguest

                            @auth
                            <div class="dropdown">
                                <a href="{{ route('my-account.index') }}" class="text-green-600 dropdown-toggle"
                                    role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    {{ Auth::user()->name }}
                                </a>

                                {{-- Konten Dropdown --}}
                                <div class="dropdown-menu dropdown-menu-end w-56">
                                    <div class="px-4 py-3 border-b border-gray-200">
                                        <p class="text-sm text-gray-500">Masuk sebagai</p>
                                        <p class="text-sm font-medium text-gray-900 truncate">{{ auth()->user()->email
                                            }}</p>
                                    </div>
                                    <a href="{{ route('my-account.index') }}"
                                        class="dropdown-item flex items-center gap-3">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-id"
                                            width="18" height="18" viewBox="0 0 24 24" stroke-width="1.5"
                                            stroke="currentColor" fill="none" stroke-linecap="round"
                                            stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                            <path
                                                d="M3 4m0 3a3 3 0 0 1 3 -3h12a3 3 0 0 1 3 3v10a3 3 0 0 1 -3 3h-12a3 3 0 0 1 -3 -3z" />
                                            <path d="M9 10m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0" />
                                            <path d="M15 8l2 0" />
                                            <path d="M15 12l2 0" />
                                            <path d="M7 16l10 0" />
                                        </svg>
                                        <span>Akun Saya</span>
                                    </a>
                                    <div class="border-t border-gray-200"></div>
                                    <form method="POST" action="{{ route('logout') }}" class="w-full">
                                        @csrf
                                        <button type="submit" class="dropdown-item flex items-center gap-3 w-full">
                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                class="icon icon-tabler icon-tabler-logout text-red-600" width="18"
                                                height="18" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                                fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                <path
                                                    d="M14 8v-2a2 2 0 0 0 -2 -2h-7a2 2 0 0 0 -2 2v12a2 2 0 0 0 2 2h7a2 2 0 0 0 2 -2v-2" />
                                                <path d="M9 12h12l-3 -3" />
                                                <path d="M18 15l3 -3" />
                                            </svg>
                                            <span class="text-red-600">Logout</span>
                                        </button>
                                    </form>
                                </div>
                            </div>
                            @endauth


                            <div>
                                <livewire:cart-icon />
                            </div>
                            <div class="lg:hidden leading-none">
                                {{-- Tombol menu mobile --}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <nav class="navbar relative navbar-expand-lg lg:flex lg:flex-wrap items-center content-between text-black navbar-default"
            aria-label="Offcanvas navbar large">
            <div class="container max-w-7xl mx-auto w-full xl:px-0 lg:px-0">
                <div class="offcanvas offcanvas-left lg:visible" tabindex="-1" id="navbar-default">
                    <div class="offcanvas-header pb-1">
                        <a href="./index.html"><img src="{{ asset('assets/images/logo/freshcart-logo.svg') }}"
                                alt="TailwindCSS eCommerce HTML Template" /></a>
                        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close">
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-x text-gray-700"
                                width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                <path d="M18 6l-12 12" />
                                <path d="M6 6l12 12" />
                            </svg>
                        </button>
                    </div>
                    <div class="offcanvas-body lg:flex lg:items-center">
                        <div class="block lg:hidden mb-4">
                            <form action="#">
                                <div class="relative">
                                    <label for="searhNavbar" class="invisible hidden">Search</label>
                                    <input
                                        class="border border-gray-300 text-gray-900 rounded-lg focus:shadow-[0_0_0_.25rem_rgba(10,173,10,.25)] focus:ring-green-600 focus:ring-0 focus:border-green-600 block p-2 px-3 disabled:opacity-50 disabled:pointer-events-none w-full text-base"
                                        type="search" placeholder="Search for products" id="searhNavbar" />
                                    <button class="absolute right-0 top-0 p-3" type="button">
                                        <svg xmlns="http://www.w3.org/2000/svg"
                                            class="icon icon-tabler icon-tabler-search" width="16" height="16"
                                            viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                            stroke-linecap="round" stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                            <path d="M10 10m-7 0a7 7 0 1 0 14 0a7 7 0 1 0 -14 0" />
                                            <path d="M21 21l-6 -6" />
                                        </svg>
                                    </button>
                                </div>
                            </form>
                        </div>
                        <div class="block lg:hidden mb-4">
                            <a class="btn inline-flex items-center gap-x-2 bg-green-600 text-white border-green-600 disabled:opacity-50 disabled:pointer-events-none hover:text-white hover:bg-green-700 hover:border-green-700 active:bg-green-700 active:border-green-700 focus:outline-none focus:ring-4 focus:ring-green-300 justify-center"
                                data-bs-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false"
                                aria-controls="collapseExample">
                                <span class="mr-2">
                                    <svg xmlns="http://www.w3.org/2000/svg"
                                        class="icon icon-tabler icon-tabler-layout-grid" width="16" height="16"
                                        viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                        stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                        <path
                                            d="M4 4m0 1a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v4a1 1 0 0 1 -1 1h-4a1 1 0 0 1 -1 -1z" />
                                        <path
                                            d="M14 4m0 1a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v4a1 1 0 0 1 -1 1h-4a1 1 0 0 1 -1 -1z" />
                                        <path
                                            d="M4 14m0 1a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v4a1 1 0 0 1 -1 1h-4a1 1 0 0 1 -1 -1z" />
                                        <path
                                            d="M14 14m0 1a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v4a1 1 0 0 1 -1 1h-4a1 1 0 0 1 -1 -1z" />
                                    </svg>
                                </span>
                                All Categories
                            </a>
                            <div class="collapse mt-2" id="collapseExample">
                                <div class="card card-body">
                                    <ul class="list-unstyled">
                                        <li><a class="dropdown-item" href="./shop.html">Dairy, Bread & Eggs</a>
                                        </li>
                                        <li><a class="dropdown-item" href="./shop.html">Snacks & Munchies</a>
                                        </li>
                                        <li><a class="dropdown-item" href="./shop.html">Fruits & Vegetables</a>
                                        </li>
                                        <li><a class="dropdown-item" href="./shop.html">Cold Drinks &
                                                Juices</a></li>
                                        <li><a class="dropdown-item" href="./shop.html">Breakfast & Instant
                                                Food</a></li>
                                        <li><a class="dropdown-item" href="./shop.html">Bakery & Biscuits</a>
                                        </li>
                                        <li><a class="dropdown-item" href="./shop.html">Chicken, Meat &
                                                Fish</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="dropdown hidden lg:block">
                            <button
                                class="mr-4 btn inline-flex items-center gap-x-2 bg-green-600 text-white border-green-600 disabled:opacity-50 disabled:pointer-events-none hover:text-white hover:bg-green-700 hover:border-green-700 active:bg-green-700 active:border-green-700 focus:outline-none focus:ring-4 focus:ring-green-300"
                                type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                <span>
                                    <svg xmlns="http://www.w3.org/2000/svg"
                                        class="icon icon-tabler icon-tabler-layout-grid" width="16" height="16"
                                        viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                        stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                        <path
                                            d="M4 4m0 1a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v4a1 1 0 0 1 -1 1h-4a1 1 0 0 1 -1 -1z" />
                                        <path
                                            d="M14 4m0 1a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v4a1 1 0 0 1 -1 1h-4a1 1 0 0 1 -1 -1z" />
                                        <path
                                            d="M4 14m0 1a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v4a1 1 0 0 1 -1 1h-4a1 1 0 0 1 -1 -1z" />
                                        <path
                                            d="M14 14m0 1a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v4a1 1 0 0 1 -1 1h-4a1 1 0 0 1 -1 -1z" />
                                    </svg>
                                </span>
                                All Category
                            </button>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="./shop.html">Dairy, Bread & Eggs</a></li>
                                <li><a class="dropdown-item" href="./shop.html">Snacks & Munchies</a></li>
                                <li><a class="dropdown-item" href="./shop.html">Fruits & Vegetables</a></li>
                                <li><a class="dropdown-item" href="./shop.html">Cold Drinks & Juices</a></li>
                                <li><a class="dropdown-item" href="./shop.html">Breakfast & Instant Food</a>
                                </li>
                                <li><a class="dropdown-item" href="./shop.html">Bakery & Biscuits</a></li>
                                <li><a class="dropdown-item" href="./shop.html">Chicken, Meat & Fish</a></li>
                            </ul>
                        </div>
                        <div>
                            <ul class="navbar-nav lg:flex gap-3 lg:items-center">
                                <li class="nav-item dropdown w-full lg:w-auto">
                                    <a class="nav-link" href="{{ route('home') }}">
                                        Home
                                    </a>
                                </li>
                                <li class="nav-item dropdown w-full lg:w-auto">
                                    <a class="nav-link" href="{{ route('home') }}">Shop</a>
                                </li>
                                <li class="nav-item dropdown w-full lg:w-auto">
                                    @guest
                                    <a href="#!" data-bs-toggle="modal" data-bs-target="#authModal">My Account</a>
                                    @endguest
                                    @auth
                                    <a class="nav-link" href="{{ route('my-account.index') }}">My Orders</a>
                                    @endauth
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </nav>
    </div>
</header>