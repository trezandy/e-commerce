<!doctype html>
<html lang="en">

<head>
	<meta charset="utf-t" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />

	<link href="{{ asset('assets/libs/tiny-slider/dist/tiny-slider.css') }}" rel="stylesheet" />
	<link rel="stylesheet" href="{{ asset('assets/libs/swiper/swiper-bundle.min.css') }}" />
	<link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets/images/favicon/favicon.ico') }}" />

	<link rel="preconnect" href="https://fonts.googleapis.com" />
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
	<link rel="stylesheet"
		href="https://fonts.googleapis.com/css2?family=Inter:wght@100;200;300;400;500;600;700;800;900&display=swap" />
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@tabler/icons-webfont@2.46.0/tabler-icons.min.css" />
	<link rel="stylesheet" href="{{ asset('assets/libs/simplebar/dist/simplebar.min.css') }}" />

	<link rel="stylesheet" href="{{ asset('assets/css/theme.min.css') }}">


	<title>E-Commerce Project</title>
</head>

<body>
	<header>
		<div class="border-b">
			<div class="pt-5">
				<div class="container">
					<div class="flex flex-wrap w-full items-center justify-between">
						<div class="lg:w-1/6 md:w-1/2 w-2/5">
							<a class="navbar-brand" href="{{route('home')}}">
								<img src="{{ asset('assets/images/logo/freshcart-logo.svg') }}"
									alt="TailwindCSS eCommerce HTML Template" />
							</a>
						</div>
						<div class="lg:w-2/5 hidden lg:block">
							<form action="#">
								<div class="relative">
									<label for="searchProducts" class="invisible hidden">Search</label>
									<input
										class="border border-gray-300 text-gray-900 rounded-lg focus:shadow-[0_0_0_.25rem_rgba(10,173,10,.25)] focus:ring-green-600 focus:ring-0 focus:border-green-600 block p-2 px-3 disabled:opacity-50 disabled:pointer-events-none w-full text-base"
										type="search" placeholder="Search for products" id="searchProducts" />
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
						<div class="lg:w-1/5 text-end md:w-1/2 w-3/5">
							<div class="flex gap-7 items-center justify-end">
								<div>
									<a href="#!" class="text-gray-600" data-bs-toggle="modal"
										data-bs-target="#userModal">
										<svg xmlns="http://www.w3.org/2000/svg"
											class="icon icon-tabler icon-tabler-user" width="22" height="22"
											viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
											stroke-linecap="round" stroke-linejoin="round">
											<path stroke="none" d="M0 0h24v24H0z" fill="none" />
											<path d="M8 7a4 4 0 1 0 8 0a4 4 0 0 0 -8 0" />
											<path d="M6 21v-2a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v2" />
										</svg>
									</a>
								</div>
								<div>
									<button type="button" class="text-gray-600 relative" data-bs-toggle="offcanvas"
										data-bs-target="#offcanvasRight" role="button" aria-controls="offcanvasRight">
										<svg xmlns="http://www.w3.org/2000/svg"
											class="icon icon-tabler icon-tabler-shopping-bag" width="24" height="24"
											viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
											stroke-linecap="round" stroke-linejoin="round">
											<path stroke="none" d="M0 0h24v24H0z" fill="none" />
											<path
												d="M6.331 8h11.339a2 2 0 0 1 1.977 2.304l-1.255 8.152a3 3 0 0 1 -2.966 2.544h-6.852a3 3 0 0 1 -2.965 -2.544l-1.255 -8.152a2 2 0 0 1 1.977 -2.304z" />
											<path d="M9 11v-5a3 3 0 0 1 6 0v5" />
										</svg>
										<span id="cartCount"
											class="absolute top-0 -mt-1 left-full rounded-full h-5 w-5 -ml-3 bg-green-600 text-white text-center font-semibold text-sm">
											0
											<span class="invisible">unread messages</span>
										</span>
									</button>
								</div>
								<div class="lg:hidden leading-none">
									<button class="collapsed" type="button" data-bs-toggle="offcanvas"
										data-bs-target="#navbar-default" aria-controls="navbar-default"
										aria-label="Toggle navigation">
										<svg xmlns="http://www.w3.org/2000/svg"
											class="icon icon-tabler icon-tabler-menu-2 text-gray-800" width="24"
											height="24" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
											fill="none" stroke-linecap="round" stroke-linejoin="round">
											<path stroke="none" d="M0 0h24v24H0z" fill="none" />
											<path d="M4 6l16 0" />
											<path d="M4 12l16 0" />
											<path d="M4 18l16 0" />
										</svg>
									</button>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<nav class="navbar relative navbar-expand-lg lg:flex lg:flex-wrap items-center content-between text-black navbar-default"
				aria-label="Offcanvas navbar large">
				<div class="container max-w-7xl mx-auto w-full xl:px-4 lg:px-0">
					<div class="offcanvas offcanvas-left lg:visible" tabindex="-1" id="navbar-default">
						<div class="offcanvas-header pb-1">
							<a href="./index.html"><img src="{{ asset('assets/images/logo/freshcart-logo.svg') }}"
									alt="TailwindCSS eCommerce HTML Template" /></a>
							<button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close">
								<svg xmlns="http://www.w3.org/2000/svg"
									class="icon icon-tabler icon-tabler-x text-gray-700" width="24" height="24"
									viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
									stroke-linecap="round" stroke-linejoin="round">
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
									data-bs-toggle="collapse" href="#collapseExample" role="button"
									aria-expanded="false" aria-controls="collapseExample">
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
									All Category
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
									type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown"
									aria-expanded="false">
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
										<a class="nav-link" href="index.html">
											Home
										</a>
									</li>
									<li class="nav-item dropdown w-full lg:w-auto">
										<a class="nav-link" href="shop.html">Shop</a>
									</li>
									<li class="nav-item dropdown w-full lg:w-auto">
										<a class="nav-link" href="account-orders.html">My Account</a>
									</li>
								</ul>
							</div>
						</div>
					</div>
				</div>
			</nav>
		</div>
	</header>
	<div class="modal fade" id="userModal" tabindex="-1" aria-labelledby="userModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered">
			<div class="modal-content p-8">
				<div class="flex justify-between items-center mb-4">
					<h3 class="font-bold text-gray-800" id="userModalLabel">Sign Up</h3>

					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
						<svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-x text-gray-700"
							width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
							fill="none" stroke-linecap="round" stroke-linejoin="round">
							<path stroke="none" d="M0 0h24v24H0z" fill="none" />
							<path d="M18 6l-12 12" />
							<path d="M6 6l12 12" />
						</svg>
					</button>
				</div>
				<div class="modal-body">
					<form class="needs-validation" novalidate>
						<div class="mb-3">
							<label for="fullName" class="mb-2 block text-gray-800">Name</label>
							<input type="text"
								class="form-control border border-gray-300 text-gray-900 rounded-lg focus:shadow-[0_0_0_.25rem_rgba(10,173,10,.25)] focus:ring-green-600 focus:ring-0 focus:border-green-600 block p-2 px-3 disabled:opacity-50 disabled:pointer-events-none w-full text-base"
								id="fullName" placeholder="Enter Your Name" required />
							<div class="invalid-feedback">Please enter name.</div>
						</div>
						<div class="mb-3">
							<label for="email" class="mb-2 block text-gray-800">Email address</label>
							<input type="email"
								class="form-control border border-gray-300 text-gray-900 rounded-lg focus:shadow-[0_0_0_.25rem_rgba(10,173,10,.25)] focus:ring-green-600 focus:ring-0 focus:border-green-600 block p-2 px-3 disabled:opacity-50 disabled:pointer-events-none w-full text-base"
								id="email" placeholder="Enter Email address" autocomplete="email" required />
							<div class="invalid-feedback">Please enter email.</div>
						</div>
						<div class="mb-5">
							<label for="password" class="mb-2 block text-gray-800">Password</label>
							<input type="password"
								class="form-control border border-gray-300 text-gray-900 rounded-lg focus:shadow-[0_0_0_.25rem_rgba(10,173,10,.25)] focus:ring-green-600 focus:ring-0 focus:border-green-600 block p-2 px-3 disabled:opacity-50 disabled:pointer-events-none w-full text-base"
								id="password" placeholder="Enter Password" required />
							<div class="invalid-feedback">Please enter password.</div>
							<span class="block mt-1 text-sm text-gray-500">
								By Signup, you agree to our
								<a href="#!" class="text-green-600">Terms of Service</a>
								&
								<a href="#!" class="text-green-600">Privacy Policy</a>
							</span>
						</div>

						<button type="submit"
							class="btn inline-flex items-center gap-x-2 bg-green-600 text-white border-green-600 disabled:opacity-50 disabled:pointer-events-none hover:text-white hover:bg-green-700 hover:border-green-700 active:bg-green-700 active:border-green-700 focus:outline-none focus:ring-4 focus:ring-green-300 justify-center">
							Sign Up
						</button>
					</form>
				</div>
				<div class="modal-footer flex border-0 justify-center mt-3">
					Already have an account?
					<a href="./signin.html" class="text-green-600 ml-1">Sign in</a>
				</div>
			</div>
		</div>
	</div>

	<div class="offcanvas offcanvas-right" tabindex="-1" id="offcanvasRight" aria-labelledby="offcanvasRightLabel">
		<div class="offcanvas-header border-b">
			<div>
				<h5 id="offcanvasRightLabel">Shop Cart</h5>
			</div>
			<button type="button" class="btn-close text-inherit" data-bs-dismiss="offcanvas" aria-label="Close">
				<svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-x text-gray-700" width="24"
					height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
					stroke-linecap="round" stroke-linejoin="round">
					<path stroke="none" d="M0 0h24v24H0z" fill="none" />
					<path d="M18 6l-12 12" />
					<path d="M6 6l12 12" />
				</svg>
			</button>
		</div>
		<div class="offcanvas-body p-4">
			<div>
				<div class="text-red-800 mb-3 rounded-lg p-4 text-right" role="alert">
					<a href="./shop-cart.html" class="text-blue-600">Lihat Semua</a>
				</div>
				<ul class="list-none">
					<li class="py-3 border-t">
						<div class="flex items-center">
							<div class="w-1/2 md:w-1/2 lg:w-3/5">
								<div class="flex">
									<img src="{{ asset('assets/images/products/product-img-1.jpg') }}" alt="Ecommerce"
										class="w-16 h-16" />
									<div class="ml-3">
										<a href="./shop-single.html" class="text-inherit">
											<h6>Haldiram's Sev Bhujia</h6>
										</a>
										<span><small class="text-gray-500">.98 / lb</small></span>
										<div class="mt-2 small leading-none">
											<a href="#!" class="text-green-600 flex items-center">
												<span class="mr-1 align-text-bottom">
													<svg xmlns="http://www.w3.org/2000/svg"
														class="icon icon-tabler icon-tabler-trash" width="14"
														height="14" viewBox="0 0 24 24" stroke-width="2"
														stroke="currentColor" fill="none" stroke-linecap="round"
														stroke-linejoin="round">
														<path stroke="none" d="M0 0h24v24H0z" fill="none" />
														<path d="M4 7l16 0" />
														<path d="M10 11l0 6" />
														<path d="M14 11l0 6" />
														<path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12" />
														<path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3" />
													</svg>
												</span>
												<span class="text-gray-500 text-sm">Remove</span>
											</a>
										</div>
									</div>
								</div>
							</div>
							<div class="w-1/3 md:w-1/4 lg:w-1/5">
								<div class="input-group input-spinner rounded-lg flex justify-between items-center">
									<input type="button" value="-"
										class="button-minus w-8 py-1 border-r cursor-pointer border-gray-300"
										data-field="quantity" />
									<input type="number" step="1" max="10" value="1" name="quantity"
										class="quantity-field w-9 px-2 text-center h-7 border-0 bg-transparent" />
									<input type="button" value="+"
										class="button-plus w-8 py-1 border-l cursor-pointer border-gray-300"
										data-field="quantity" />
								</div>
							</div>
							<div class="w-1/5 text-center md:w-1/5">
								<span class="font-bold text-gray-800">$5.00</span>
							</div>
						</div>
					</li>
					<li class="py-3 border-t">
						<div class="flex items-center">
							<div class="w-1/2 md:w-1/2 lg:w-3/5">
								<div class="flex">
									<img src="{{ asset('assets/images/products/product-img-2.jpg') }}" alt="Ecommerce"
										class="w-16 h-16" />
									<div class="ml-3">
										<a href="./shop-single.html" class="text-inherit">
											<h6>NutriChoice Digestive</h6>
										</a>
										<span><small class="text-gray-500">250g</small></span>
										<div class="mt-2 small leading-none">
											<a href="#!" class="text-green-600 flex items-center">
												<span class="mr-1 align-text-bottom">
													<svg xmlns="http://www.w3.org/2000/svg"
														class="icon icon-tabler icon-tabler-trash" width="14"
														height="14" viewBox="0 0 24 24" stroke-width="2"
														stroke="currentColor" fill="none" stroke-linecap="round"
														stroke-linejoin="round">
														<path stroke="none" d="M0 0h24v24H0z" fill="none" />
														<path d="M4 7l16 0" />
														<path d="M10 11l0 6" />
														<path d="M14 11l0 6" />
														<path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12" />
														<path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3" />
													</svg>
												</span>
												<span class="text-gray-500 text-sm">Remove</span>
											</a>
										</div>
									</div>
								</div>
							</div>

							<div class="w-1/3 md:w-1/4 lg:w-1/5">
								<div class="input-group input-spinner rounded-lg flex justify-between items-center">
									<input type="button" value="-"
										class="button-minus w-8 py-1 border-r cursor-pointer border-gray-300"
										data-field="quantity" />
									<input type="number" step="1" max="10" value="1" name="quantity"
										class="quantity-field w-9 px-2 text-center h-7 border-0 bg-transparent" />
									<input type="button" value="+"
										class="button-plus w-8 py-1 border-l cursor-pointer border-gray-300"
										data-field="quantity" />
								</div>
							</div>
							<div class="w-1/5 text-center md:w-1/5">
								<span class="font-bold text-red-600">$20.00</span>
								<div class="line-through text-gray-500 small">$26.00</div>
							</div>
						</div>
					</li>
					<li class="py-3 border-t">
						<div class="flex items-center">
							<div class="w-1/2 md:w-1/2 lg:w-3/5">
								<div class="flex">
									<img src="{{ asset('assets/images/products/product-img-3.jpg') }}" alt="Ecommerce"
										class="w-16 h-16" />
									<div class="ml-3">
										<a href="./shop-single.html" class="text-inherit">
											<h6>Cadbury 5 Star Chocolate</h6>
										</a>
										<span><small class="text-gray-500">1 kg</small></span>
										<div class="mt-2 small leading-none">
											<a href="#!" class="text-green-600 flex items-center">
												<span class="mr-1 align-text-bottom">
													<svg xmlns="http://www.w3.org/2000/svg"
														class="icon icon-tabler icon-tabler-trash" width="14"
														height="14" viewBox="0 0 24 24" stroke-width="2"
														stroke="currentColor" fill="none" stroke-linecap="round"
														stroke-linejoin="round">
														<path stroke="none" d="M0 0h24v24H0z" fill="none" />
														<path d="M4 7l16 0" />
														<path d="M10 11l0 6" />
														<path d="M14 11l0 6" />
														<path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12" />
														<path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3" />
													</svg>
												</span>
												<span class="text-gray-500 text-sm">Remove</span>
											</a>
										</div>
									</div>
								</div>
							</div>

							<div class="w-1/3 md:w-1/4 lg:w-1/5">
								<div class="input-group input-spinner rounded-lg flex justify-between items-center">
									<input type="button" value="-"
										class="button-minus w-8 py-1 border-r cursor-pointer border-gray-300"
										data-field="quantity" />
									<input type="number" step="1" max="10" value="1" name="quantity"
										class="quantity-field w-9 px-2 text-center h-7 border-0 bg-transparent" />
									<input type="button" value="+"
										class="button-plus w-8 py-1 border-l cursor-pointer border-gray-300"
										data-field="quantity" />
								</div>
							</div>
							<div class="w-1/5 text-center md:w-1/5">
								<span class="font-bold text-gray-800">$15.00</span>
								<div class="line-through text-gray-500 small">$20.00</div>
							</div>
						</div>
					</li>
					<li class="py-3 border-t">
						<div class="flex items-center">
							<div class="w-1/2 md:w-1/2 lg:w-3/5">
								<div class="flex">
									<img src="{{ asset('assets/images/products/product-img-4.jpg') }}" alt="Ecommerce"
										class="w-16 h-16" />
									<div class="ml-3">
										<a href="./shop-single.html" class="text-inherit">
											<h6>Onion Flavour Potato</h6>
										</a>
										<span><small class="text-gray-500">250g</small></span>
										<div class="mt-2 small leading-none">
											<a href="#!" class="text-green-600 flex items-center">
												<span class="mr-1 align-text-bottom">
													<svg xmlns="http://www.w3.org/2000/svg"
														class="icon icon-tabler icon-tabler-trash" width="14"
														height="14" viewBox="0 0 24 24" stroke-width="2"
														stroke="currentColor" fill="none" stroke-linecap="round"
														stroke-linejoin="round">
														<path stroke="none" d="M0 0h24v24H0z" fill="none" />
														<path d="M4 7l16 0" />
														<path d="M10 11l0 6" />
														<path d="M14 11l0 6" />
														<path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12" />
														<path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3" />
													</svg>
												</span>
												<span class="text-gray-500 text-sm">Remove</span>
											</a>
										</div>
									</div>
								</div>
							</div>

							<div class="w-1/3 md:w-1/4 lg:w-1/5">
								<div class="input-group input-spinner rounded-lg flex justify-between items-center">
									<input type="button" value="-"
										class="button-minus w-8 py-1 border-r cursor-pointer border-gray-300"
										data-field="quantity" />
									<input type="number" step="1" max="10" value="1" name="quantity"
										class="quantity-field w-9 px-2 text-center h-7 border-0 bg-transparent" />
									<input type="button" value="+"
										class="button-plus w-8 py-1 border-l cursor-pointer border-gray-300"
										data-field="quantity" />
								</div>
							</div>
							<div class="w-1/5 text-center md:w-1/5">
								<span class="font-bold text-gray-800">$15.00</span>
								<div class="line-through text-gray-500 small">$20.00</div>
							</div>
						</div>
					</li>
					<li class="py-3 border-t border-b">
						<div class="flex items-center">
							<div class="w-1/2 md:w-1/2 lg:w-3/5">
								<div class="flex">
									<img src="{{ asset('assets/images/products/product-img-5.jpg') }}" alt="Ecommerce"
										class="w-16 h-16" />
									<div class="ml-3">
										<a href="./shop-single.html" class="text-inherit">
											<h6>Salted Instant Popcorn</h6>
										</a>
										<span><small class="text-gray-500">100g</small></span>
										<div class="mt-2 small leading-none">
											<a href="#!" class="text-green-600 flex items-center">
												<span class="mr-1 align-text-bottom">
													<svg xmlns="http://www.w3.org/2000/svg"
														class="icon icon-tabler icon-tabler-trash" width="14"
														height="14" viewBox="0 0 24 24" stroke-width="2"
														stroke="currentColor" fill="none" stroke-linecap="round"
														stroke-linejoin="round">
														<path stroke="none" d="M0 0h24v24H0z" fill="none" />
														<path d="M4 7l16 0" />
														<path d="M10 11l0 6" />
														<path d="M14 11l0 6" />
														<path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12" />
														<path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3" />
													</svg>
												</span>
												<span class="text-gray-500 text-sm">Remove</span>
											</a>
										</div>
									</div>
								</div>
							</div>

							<div class="w-1/3 md:w-1/4 lg:w-1/5">
								<div class="input-group input-spinner rounded-lg flex justify-between items-center">
									<input type="button" value="-"
										class="button-minus w-8 py-1 border-r cursor-pointer border-gray-300"
										data-field="quantity" />
									<input type="number" step="1" max="10" value="1" name="quantity"
										class="quantity-field w-9 px-2 text-center h-7 border-0 bg-transparent" />
									<input type="button" value="+"
										class="button-plus w-8 py-1 border-l cursor-pointer border-gray-300"
										data-field="quantity" />
								</div>
							</div>
							<div class="w-1/5 text-center md:w-1/5">
								<span class="font-bold text-gray-800">$15.00</span>
								<div class="line-through text-gray-500 small">$25.00</div>
							</div>
						</div>
					</li>
				</ul>
				<div class="flex justify-between mt-4">
					<a href="#!"
						class="btn inline-flex items-center gap-x-2 bg-green-600 text-white border-green-600 disabled:opacity-50 disabled:pointer-events-none hover:text-white hover:bg-green-700 hover:border-green-700 active:bg-green-700 active:border-green-700 focus:outline-none focus:ring-4 focus:ring-green-300">
						Continue Shopping
					</a>
					<a href="#!"
						class="btn inline-flex items-center gap-x-2 bg-gray-800 text-white border-gray-800 disabled:opacity-50 disabled:pointer-events-none hover:text-white hover:bg-gray-900 hover:border-gray-900 active:bg-gray-900 active:border-gray-900 focus:outline-none focus:ring-4 focus:ring-gray-300">
						Update Cart
					</a>
				</div>
			</div>
		</div>
	</div>

	<div class="modal fade" id="locationModal" tabindex="-1" aria-labelledby="locationModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered">
			<div class="modal-content">
				<div class="modal-body p-6">
					<div class="flex justify-between items-start">
						<div>
							<h5 class="mb-1" id="locationModalLabel">Choose your Delivery Location</h5>
							<p class="text-sm">Enter your address and we will specify the offer you area.</p>
						</div>
						<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
							<svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-x text-gray-700"
								width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
								fill="none" stroke-linecap="round" stroke-linejoin="round">
								<path stroke="none" d="M0 0h24v24H0z" fill="none" />
								<path d="M18 6l-12 12" />
								<path d="M6 6l12 12" />
							</svg>
						</button>
					</div>
					<div class="my-5">
						<label for="searhNavbarSecond" class="invisible hidden">Search</label>
						<input
							class="border border-gray-300 text-gray-900 rounded-lg focus:shadow-[0_0_0_.25rem_rgba(10,173,10,.25)] focus:ring-green-600 focus:ring-0 focus:border-green-600 block p-2 px-3 disabled:opacity-50 disabled:pointer-events-none w-full text-base"
							type="search" placeholder="Search for products" id="searhNavbarSecond" />
					</div>
					<div class="flex justify-between items-center mb-2">
						<h6>Select Location</h6>
						<a href="#" class="btn btn-outline-gray-400 text-gray-500 btn-sm">Clear All</a>
					</div>
					<div>
						<div data-simplebar style="height: 300px">
							<div class="list-none">
								<a href="#"
									class="border-b hover:bg-gray-100 flex justify-between items-center px-2 py-3 active active:bg-gray-100 bg-gray-100">
									<span>Alabama</span>
									<span>Min:$20</span>
								</a>
								<a href="#"
									class="border-b hover:bg-gray-100 flex justify-between items-center px-2 py-3">
									<span>Alaska</span>
									<span>Min:$30</span>
								</a>
								<a href="#"
									class="border-b hover:bg-gray-100 flex justify-between items-center px-2 py-3">
									<span>Arizona</span>
									<span>Min:$50</span>
								</a>
								<a href="#"
									class="border-b hover:bg-gray-100 flex justify-between items-center px-2 py-3">
									<span>California</span>
									<span>Min:$29</span>
								</a>
								<a href="#"
									class="border-b hover:bg-gray-100 flex justify-between items-center px-2 py-3">
									<span>Colorado</span>
									<span>Min:$80</span>
								</a>
								<a href="#"
									class="border-b hover:bg-gray-100 flex justify-between items-center px-2 py-3">
									<span>Florida</span>
									<span>Min:$90</span>
								</a>
								<a href="#"
									class="border-b hover:bg-gray-100 flex justify-between items-center px-2 py-3">
									<span>Arizona</span>
									<span>Min:$50</span>
								</a>
								<a href="#"
									class="border-b hover:bg-gray-100 flex justify-between items-center px-2 py-3">
									<span>California</span>
									<span>Min:$29</span>
								</a>
								<a href="#"
									class="border-b hover:bg-gray-100 flex justify-between items-center px-2 py-3">
									<span>Colorado</span>
									<span>Min:$80</span>
								</a>
								<a href="#"
									class="border-b hover:bg-gray-100 flex justify-between items-center px-2 py-3">
									<span>Florida</span>
									<span>Min:$90</span>
								</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<main>
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
										class="icon icon-tabler icon-tabler-arrow-right inline-block" width="14"
										height="14" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
										fill="none" stroke-linecap="round" stroke-linejoin="round">
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
										class="icon icon-tabler icon-tabler-arrow-right inline-block" width="14"
										height="14" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
										fill="none" stroke-linecap="round" stroke-linejoin="round">
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
								<div class="absolute top-0 left-0">
									<span
										class="inline-block p-1 text-center font-semibold text-sm align-baseline leading-none rounded bg-green-600 text-white">14%</span>
								</div>
								<a href="{{ route('product.show', $product->slug) }}"><img
										src="{{ asset('storage/' . $product->image) }}" alt="Grocery Ecommerce Template"
										class="w-full h-auto" /></a>

								<div class="absolute w-full bottom-[15%] opacity-0 invisible card-product-action">
									<a href="#!"
										class="h-[34px] w-[34px] leading-[34px] bg-white shadow inline-flex items-center justify-center rounded-lg hover:bg-green-600 hover:text-white"
										data-bs-toggle="tooltip" data-bs-html="true" title="Quick View">
										<span data-bs-toggle="modal" data-bs-target="#quickViewModal">
											<svg xmlns="http://www.w3.org/2000/svg"
												class="icon icon-tabler icon-tabler-eye" width="16" height="16"
												viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
												stroke-linecap="round" stroke-linejoin="round">
												<path stroke="none" d="M0 0h24v24H0z" fill="none" />
												<path d="M10 12a2 2 0 1 0 4 0a2 2 0 0 0 -4 0" />
												<path
													d="M21 12c-2.4 4 -5.4 6 -9 6c-3.6 0 -6.6 -2 -9 -6c2.4 -4 5.4 -6 9 -6c3.6 0 6.6 2 9 6" />
											</svg>
										</span>
									</a>
								</div>
							</div>
							<div class="flex flex-col gap-3">
								<a href="#!" class="text-decoration-none text-gray-500"><small>{{
										$product->category->name }}</small></a>
								<div class="flex flex-col gap-2">
									<h3 class="text-base truncate"><a
											href="{{ route('product.show', $product->slug) }}">{{ $product->name }}</a>
									</h3>
								</div>
								<div class="flex justify-between items-center">
									<div>
										<span class="text-gray-900 font-semibold">Rp {{ number_format($product->price,
											0, ',', '.') }}</span>
									</div>
									<div>
										<button type="button"
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
							<div class="inline-block"><img src="{{ asset('assets/images/icons/package.svg') }}"
									alt="" /></div>
							<div class="flex flex-col gap-2">
								<h3 class="text-md">Wide Assortment</h3>
								<p>Choose from 5000+ products across food, personal care, household, bakery, veg and
									non-veg & other categories.</p>
							</div>
						</div>
					</div>
					<div class="md:w-1/2 lg:w-1/4 px-3">
						<div class="flex flex-col gap-4">
							<div class="inline-block"><img src="{{ asset('assets/images/icons/refresh-cw.svg') }}"
									alt="" /></div>
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
	</main>
	<footer class="bg-gray-200 py-8">
		<div class="container">
			<div class="flex flex-wrap md:gap-4 lg:gap-0 py-4 mb-6">
				<div class="w-full md:w-full lg:w-1/3 flex flex-col gap-4 mb-6">
					<h6>Categories</h6>
					<div class="flex flex-wrap">
						<div class="w-1/2">
							<ul class="flex flex-col gap-2">
								<li><a href="#!" class="inline-block hover:text-green-600">Vegetables & Fruits</a></li>
								<li><a href="#!" class="inline-block hover:text-green-600">Breakfast & instant food</a>
								</li>
								<li><a href="#!" class="inline-block hover:text-green-600">Bakery & Biscuits</a></li>
								<li><a href="#!" class="inline-block hover:text-green-600">Atta, rice & dal</a></li>
								<li><a href="#!" class="inline-block hover:text-green-600">Sauces & spreads</a></li>
								<li><a href="#!" class="inline-block hover:text-green-600">Organic & gourmet</a></li>
								<li><a href="#!" class="inline-block hover:text-green-600">Baby care</a></li>
								<li><a href="#!" class="inline-block hover:text-green-600">Cleaning essentials</a></li>
								<li><a href="#!" class="inline-block hover:text-green-600">Personal care</a></li>
							</ul>
						</div>
						<div class="w-1/2">
							<ul class="flex flex-col gap-2">
								<li><a href="#!" class="inline-block hover:text-green-600">Dairy, bread & eggs</a></li>
								<li><a href="#!" class="inline-block hover:text-green-600">Cold drinks & juices</a></li>
								<li><a href="#!" class="inline-block hover:text-green-600">Tea, coffee & drinks</a></li>
								<li><a href="#!" class="inline-block hover:text-green-600">Masala, oil & more</a></li>
								<li><a href="#!" class="inline-block hover:text-green-600">Chicken, meat & fish</a></li>
								<li><a href="#!" class="inline-block hover:text-green-600">Paan corner</a></li>
								<li><a href="#!" class="inline-block hover:text-green-600">Pharma & wellness</a></li>
								<li><a href="#!" class="inline-block hover:text-green-600">Home & office</a></li>
								<li><a href="#!" class="inline-block hover:text-green-600">Pet care</a></li>
							</ul>
						</div>
					</div>
				</div>
				<div class="w-full md:w-full lg:w-2/3">
					<div class="flex flex-wrap">
						<div class="w-1/2 sm:w-1/2 md:w-1/4 flex flex-col gap-4 mb-6">
							<h6>Get to know us</h6>
							<ul class="flex flex-col gap-2">
								<li><a href="#!" class="inline-block hover:text-green-600">Company</a></li>
								<li><a href="#!" class="inline-block hover:text-green-600">About</a></li>
								<li><a href="#!" class="inline-block">Blog</a></li>
								<li><a href="#!" class="inline-block hover:text-green-600">Help Center</a></li>
								<li><a href="#!" class="inline-block hover:text-green-600">Our Value</a></li>
							</ul>
						</div>
						<div class="w-1/2 sm:w-1/2 md:w-1/4 flex flex-col gap-4 mb-6">
							<h6>For Consumers</h6>
							<ul class="flex flex-col gap-2">
								<li><a href="#!" class="inline-block hover:text-green-600">Payments</a></li>
								<li><a href="#!" class="inline-block hover:text-green-600">Shipping</a></li>
								<li><a href="#!" class="inline-block hover:text-green-600">Product Returns</a></li>
								<li><a href="#!" class="inline-block hover:text-green-600">FAQ</a></li>
								<li><a href="./shop-checkout.html" class="inline-block">Shop Checkout</a></li>
							</ul>
						</div>
						<div class="w-1/2 sm:w-1/2 md:w-1/4 flex flex-col gap-4">
							<h6>Become a Shopper</h6>
							<ul class="flex flex-col gap-2">
								<li><a href="#!" class="inline-block hover:text-green-600">Shopper Opportunities</a>
								</li>
								<li><a href="#!" class="inline-block hover:text-green-600">Become a Shopper</a></li>
								<li><a href="#!" class="inline-block hover:text-green-600">Earnings</a></li>
								<li><a href="#!" class="inline-block hover:text-green-600">Ideas & Guides</a></li>
								<li><a href="#!" class="inline-block hover:text-green-600">New Retailers</a></li>
							</ul>
						</div>
						<div class="w-1/2 sm:w-1/2 md:w-1/4 flex flex-col gap-4">
							<h6>Freshcart programs</h6>
							<ul class="flex flex-col gap-2">
								<li><a href="#!" class="inline-block hover:text-green-600">Freshcart programs</a></li>
								<li><a href="#!" class="inline-block hover:text-green-600">Gift Cards</a></li>
								<li><a href="#!" class="inline-block hover:text-green-600">Promos & Coupons</a></li>
								<li><a href="#!" class="inline-block hover:text-green-600">Freshcart Ads</a></li>
								<li><a href="#!" class="inline-block hover:text-green-600">Careers</a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
			<div class="border-t py-4 border-gray-300">
				<div class="gap-y-4 flex flex-wrap items-center justify-center lg:justify-start">
					<div class="lg:w-2/5 lg:text-left text-center">
						<div class="flex md:flex-row flex-col gap-3 md:gap-6 items-center">
							<div class="text-gray-900">Payment Partners</div>
							<ul class="flex items-center flex-row gap-4">
								<li>
									<a href="#!"><img src="{{ asset('assets/images/payment/amazonpay.svg') }}"
											alt="amazon pay" /></a>
								</li>
								<li>
									<a href="#!"><img src="{{ asset('assets/images/payment/american-express.svg') }}"
											alt="american express" /></a>
								</li>
								<li>
									<a href="#!"><img src="{{ asset('assets/images/payment//mastercard.svg') }}"
											alt="mastercard" /></a>
								</li>
								<li>
									<a href="#!"><img src="{{ asset('assets/images/payment/paypal.svg') }}"
											alt="paypal" /></a>
								</li>
								<li>
									<a href="#!"><img src="{{ asset('assets/images/payment/visa.svg') }}"
											alt="visa" /></a>
								</li>
							</ul>
						</div>
					</div>
					<div class="lg:w-3/5 flex justify-end">
						<div class="flex flex-col md:flex-row items-center gap-3 md:gap-6">
							<div class="text-gray-900">Get deliveries with FreshCart</div>
							<ul class="flex flex-row gap-2">
								<li>
									<a href="#!"><img src="{{ asset('assets/images/appbutton/appstore-btn.svg') }}"
											alt="" style="width: 140px" /></a>
								</li>
								<li>
									<a href="#!"><img src="{{ asset('assets/images/appbutton/googleplay-btn.svg') }}"
											alt="" style="width: 140px" /></a>
								</li>
							</ul>
						</div>
					</div>
				</div>
			</div>
			<div class="border-t py-4 border-gray-300">
				<div class="flex flex-col md:flex-row items-center gap-3">
					<div class="md:w-1/2">
						<span class="text-sm text-gray-500">
							<span id="copyright">
								<script>
									document.getElementById('copyright').appendChild(document.createTextNode(new Date().getFullYear()));
								</script>
							</span>
							©
							Build with ❤ by
							<a href="https://www.instagram.com/trezandy" target="_blank">Nouval Trezandy</a>
							.
						</span>
					</div>
					<div class="md:w-1/2 flex md:justify-end items-center">
						<div class="flex flex-row gap-5 items-center">
							<div class="text-gray-500">Follow us on</div>
							<ul class="flex items-center justify-end text-sm gap-1">
								<li>
									<a href="#!"
										class="inline-flex justify-center items-center align-middle text-center select-none border font-normal whitespace-no-wrap rounded leading-normal no-underline h-8 w-8 border-gray-300 hover:border-green-600 hover:text-green-600 transition ease-in-out">
										<svg xmlns="http://www.w3.org/2000/svg"
											class="icon icon-tabler icon-tabler-brand-facebook" width="16" height="16"
											viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none"
											stroke-linecap="round" stroke-linejoin="round">
											<path stroke="none" d="M0 0h24v24H0z" fill="none" />
											<path
												d="M7 10v4h3v7h4v-7h3l1 -4h-4v-2a1 1 0 0 1 1 -1h3v-4h-3a5 5 0 0 0 -5 5v2h-3" />
										</svg>
									</a>
								</li>
								<li>
									<a href="#!"
										class="inline-flex justify-center items-center align-middle text-center select-none border font-normal whitespace-no-wrap rounded leading-normal no-underline h-8 w-8 border-gray-300 hover:border-green-600 hover:text-green-600 transition ease-in-out">
										<svg xmlns="http://www.w3.org/2000/svg"
											class="icon icon-tabler icon-tabler-brand-x" width="16" height="16"
											viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none"
											stroke-linecap="round" stroke-linejoin="round">
											<path stroke="none" d="M0 0h24v24H0z" fill="none" />
											<path d="M4 4l11.733 16h4.267l-11.733 -16z" />
											<path d="M4 20l6.768 -6.768m2.46 -2.46l6.772 -6.772" />
										</svg>
									</a>
								</li>
								<li>
									<a href="#!"
										class="inline-flex justify-center items-center align-middle text-center select-none border font-normal whitespace-no-wrap rounded leading-normal no-underline h-8 w-8 border-gray-300 hover:border-green-600 hover:text-green-600 transition ease-in-out">
										<svg xmlns="http://www.w3.org/2000/svg"
											class="icon icon-tabler icon-tabler-brand-instagram" width="16" height="16"
											viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none"
											stroke-linecap="round" stroke-linejoin="round">
											<path stroke="none" d="M0 0h24v24H0z" fill="none" />
											<path
												d="M4 4m0 4a4 4 0 0 1 4 -4h8a4 4 0 0 1 4 4v8a4 4 0 0 1 -4 4h-8a4 4 0 0 1 -4 -4z" />
											<path d="M12 12m-3 0a3 3 0 1 0 6 0a3 3 0 1 0 -6 0" />
											<path d="M16.5 7.5l0 .01" />
										</svg>
									</a>
								</li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
	</footer>
	<div class="modal fade" id="quickViewModal" tabindex="-1" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered lg:min-w-[1140px]">
			<div class="modal-content">
				<div class="modal-body p-8">
					<div class="absolute top-0 right-0 p-3">
						<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
							<svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-x text-gray-700"
								width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
								fill="none" stroke-linecap="round" stroke-linejoin="round">
								<path stroke="none" d="M0 0h24v24H0z" fill="none" />
								<path d="M18 6l-12 12" />
								<path d="M6 6l12 12" />
							</svg>
						</button>
					</div>
					<div class="flex flex-wrap">
						<div class="md:w-1/2">
							<div class="product productModal" id="productModal">
								<div class="zoom" onmousemove="zoom(event)"
									style="background-image: url({{ asset('assets/images/products/product-single-img-1.jpg') }})">
									<img src="{{ asset('assets/images/products/product-single-img-1.jpg') }}" alt="" />
								</div>
								<div>
									<div class="zoom" onmousemove="zoom(event)"
										style="background-image: url({{ asset('assets/images/products/product-single-img-2.jpg') }})">
										<img src="{{ asset('assets/images/products/product-single-img-2.jpg') }}"
											alt="" />
									</div>
								</div>
								<div>
									<div class="zoom" onmousemove="zoom(event)"
										style="background-image: url({{ asset('assets/images/products/product-single-img-3.jpg') }})">
										<img src="{{ asset('assets/images/products/product-single-img-3.jpg') }}"
											alt="" />
									</div>
								</div>
								<div>
									<div class="zoom" onmousemove="zoom(event)"
										style="background-image: url({{ asset('assets/images/products/product-single-img-4.jpg') }})">
										<img src="{{ asset('assets/images/products/product-single-img-4.jpg') }}"
											alt="" />
									</div>
								</div>
							</div>
							<div class="product-tools">
								<div class="thumbnails flex gap-3" id="productModalThumbnails">
									<div class="w-1/4">
										<div class="thumbnails-img">
											<img src="{{ asset('assets/images/products/product-single-img-1.jpg') }}"
												alt="" />
										</div>
									</div>
									<div class="w-1/4">
										<div class="thumbnails-img">
											<img src="{{ asset('assets/images/products/product-single-img-2.jpg') }}"
												alt="" />
										</div>
									</div>
									<div class="w-1/4">
										<div class="thumbnails-img">
											<img src="{{ asset('assets/images/products/product-single-img-3.jpg') }}"
												alt="" />
										</div>
									</div>
									<div class="w-1/4">
										<div class="thumbnails-img">
											<img src="{{ asset('assets/images/products/product-single-img-4.jpg') }}"
												alt="" />
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="md:w-1/2 pr-4 pl-4">
							<div class="lg:pl-10 mt-6 md:mt-0">
								<div class="flex flex-col gap-4">
									<a href="#!" class="block text-green-600">Bakery Biscuits</a>
									<h1>Napolitanke Ljesnjak</h1>
									<div class="flex flex-col gap-2">
										<div class="flex items-center">
											<small class="text-yellow-500 inline-flex items-center">
												<svg xmlns="http://www.w3.org/2000/svg"
													class="icon icon-tabler icon-tabler-star-filled" width="14"
													height="14" viewBox="0 0 24 24" stroke-width="2"
													stroke="currentColor" fill="none" stroke-linecap="round"
													stroke-linejoin="round">
													<path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
													<path
														d="M8.243 7.34l-6.38 .925l-.113 .023a1 1 0 0 0 -.44 1.684l4.622 4.499l-1.09 6.355l-.013 .11a1 1 0 0 0 1.464 .944l5.706 -3l5.693 3l.1 .046a1 1 0 0 0 1.352 -1.1l-1.091 -6.355l4.624 -4.5l.078 -.085a1 1 0 0 0 -.633 -1.62l-6.38 -.926l-2.852 -5.78a1 1 0 0 0 -1.794 0l-2.853 5.78z"
														stroke-width="0" fill="currentColor"></path>
												</svg>
												<svg xmlns="http://www.w3.org/2000/svg"
													class="icon icon-tabler icon-tabler-star-filled" width="14"
													height="14" viewBox="0 0 24 24" stroke-width="2"
													stroke="currentColor" fill="none" stroke-linecap="round"
													stroke-linejoin="round">
													<path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
													<path
														d="M8.243 7.34l-6.38 .925l-.113 .023a1 1 0 0 0 -.44 1.684l4.622 4.499l-1.09 6.355l-.013 .11a1 1 0 0 0 1.464 .944l5.706 -3l5.693 3l.1 .046a1 1 0 0 0 1.352 -1.1l-1.091 -6.355l4.624 -4.5l.078 -.085a1 1 0 0 0 -.633 -1.62l-6.38 -.926l-2.852 -5.78a1 1 0 0 0 -1.794 0l-2.853 5.78z"
														stroke-width="0" fill="currentColor"></path>
												</svg>
												<svg xmlns="http://www.w3.org/2000/svg"
													class="icon icon-tabler icon-tabler-star-filled" width="14"
													height="14" viewBox="0 0 24 24" stroke-width="2"
													stroke="currentColor" fill="none" stroke-linecap="round"
													stroke-linejoin="round">
													<path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
													<path
														d="M8.243 7.34l-6.38 .925l-.113 .023a1 1 0 0 0 -.44 1.684l4.622 4.499l-1.09 6.355l-.013 .11a1 1 0 0 0 1.464 .944l5.706 -3l5.693 3l.1 .046a1 1 0 0 0 1.352 -1.1l-1.091 -6.355l4.624 -4.5l.078 -.085a1 1 0 0 0 -.633 -1.62l-6.38 -.926l-2.852 -5.78a1 1 0 0 0 -1.794 0l-2.853 5.78z"
														stroke-width="0" fill="currentColor"></path>
												</svg>
												<svg xmlns="http://www.w3.org/2000/svg"
													class="icon icon-tabler icon-tabler-star-filled" width="14"
													height="14" viewBox="0 0 24 24" stroke-width="2"
													stroke="currentColor" fill="none" stroke-linecap="round"
													stroke-linejoin="round">
													<path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
													<path
														d="M8.243 7.34l-6.38 .925l-.113 .023a1 1 0 0 0 -.44 1.684l4.622 4.499l-1.09 6.355l-.013 .11a1 1 0 0 0 1.464 .944l5.706 -3l5.693 3l.1 .046a1 1 0 0 0 1.352 -1.1l-1.091 -6.355l4.624 -4.5l.078 -.085a1 1 0 0 0 -.633 -1.62l-6.38 -.926l-2.852 -5.78a1 1 0 0 0 -1.794 0l-2.853 5.78z"
														stroke-width="0" fill="currentColor"></path>
												</svg>
												<svg xmlns="http://www.w3.org/2000/svg"
													class="icon icon-tabler icon-tabler-star-filled" width="14"
													height="14" viewBox="0 0 24 24" stroke-width="2"
													stroke="currentColor" fill="none" stroke-linecap="round"
													stroke-linejoin="round">
													<path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
													<path
														d="M8.243 7.34l-6.38 .925l-.113 .023a1 1 0 0 0 -.44 1.684l4.622 4.499l-1.09 6.355l-.013 .11a1 1 0 0 0 1.464 .944l5.706 -3l5.693 3l.1 .046a1 1 0 0 0 1.352 -1.1l-1.091 -6.355l4.624 -4.5l.078 -.085a1 1 0 0 0 -.633 -1.62l-6.38 -.926l-2.852 -5.78a1 1 0 0 0 -1.794 0l-2.853 5.78z"
														stroke-width="0" fill="currentColor"></path>
												</svg>
											</small>
											<a href="#" class="text-green-600">(30 reviews)</a>
										</div>
										<div class="text-md">
											<span class="text-gray-900 font-semibold">$18</span>
											<span class="line-through text-gray-500">$24</span>

											<span><small class="text-red-600">26% Off</small></span>
										</div>
									</div>
									<div class="flex flex-col gap-6">
										<hr />
										<div>
											<button type="button"
												class="btn inline-flex items-center gap-x-2 bg-white text-gray-800 border-gray-300 border disabled:opacity-50 disabled:pointer-events-none hover:text-white hover:bg-gray-700 hover:border-gray-700 active:bg-gray-700 active:border-gray-700 focus:outline-none focus:ring-4 focus:ring-gray-300">
												250g
											</button>
											<button type="button"
												class="btn inline-flex items-center gap-x-2 bg-white text-gray-800 border-gray-300 border disabled:opacity-50 disabled:pointer-events-none hover:text-white hover:bg-gray-700 hover:border-gray-700 active:bg-gray-700 active:border-gray-700 focus:outline-none focus:ring-4 focus:ring-gray-300">
												500g
											</button>
											<button type="button"
												class="btn inline-flex items-center gap-x-2 bg-white text-gray-800 border-gray-300 border disabled:opacity-50 disabled:pointer-events-none hover:text-white hover:bg-gray-700 hover:border-gray-700 active:bg-gray-700 active:border-gray-700 focus:outline-none focus:ring-4 focus:ring-gray-300">
												1kg
											</button>
										</div>
										<div>
											<div class="w-1/3 md:w-1/4 lg:w-1/5">
												<div
													class="input-group input-spinner rounded-lg flex justify-between items-center">
													<input type="button" value="-"
														class="button-minus w-8 py-1 border-r cursor-pointer border-gray-300"
														data-field="quantity" />
													<input type="number" step="1" max="10" value="1" name="quantity"
														class="quantity-field w-9 px-2 text-center h-7 border-0 bg-transparent" />
													<input type="button" value="+"
														class="button-plus w-8 py-1 border-l cursor-pointer border-gray-300"
														data-field="quantity" />
												</div>
											</div>
										</div>
										<div class="flex flex-wrap justify-start gap-2 items-center">
											<div class="lg:w-1/3 md:w-2/5 w-full grid">
												<button type="button"
													class="btn bg-green-600 text-white border-green-600 disabled:opacity-50 disabled:pointer-events-none hover:text-white hover:bg-green-700 hover:border-green-700 active:bg-green-700 active:border-green-700 focus:outline-none focus:ring-4 focus:ring-green-300 justify-center">
													<svg xmlns="http://www.w3.org/2000/svg"
														class="icon icon-tabler icon-tabler-plus mr-2" width="12"
														height="12" viewBox="0 0 24 24" stroke-width="3"
														stroke="currentColor" fill="none" stroke-linecap="round"
														stroke-linejoin="round">
														<path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
														<path d="M12 5l0 14"></path>
														<path d="M5 12l14 0"></path>
													</svg>
													Add to cart
												</button>
											</div>
											<div class="md:w-1/3 w-full">
												<a href="#"
													class="mr-1 btn inline-flex items-center gap-x-2 px-0 h-10 w-10 justify-center bg-white text-gray-800 border-gray-300 border disabled:opacity-50 disabled:pointer-events-none hover:text-white hover:bg-gray-700 hover:border-gray-700 active:bg-gray-700 active:border-gray-700 focus:outline-none focus:ring-4 focus:ring-gray-300">
													<svg xmlns="http://www.w3.org/2000/svg"
														class="icon icon-tabler icon-tabler-arrows-exchange" width="20"
														height="20" viewBox="0 0 24 24" stroke-width="2"
														stroke="currentColor" fill="none" stroke-linecap="round"
														stroke-linejoin="round">
														<path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
														<path d="M7 10h14l-4 -4"></path>
														<path d="M17 14h-14l4 4"></path>
													</svg>
												</a>
												<a href="#"
													class="btn inline-flex items-center gap-x-2 px-0 h-10 w-10 justify-center bg-white text-gray-800 border-gray-300 border disabled:opacity-50 disabled:pointer-events-none hover:text-white hover:bg-gray-700 hover:border-gray-700 active:bg-gray-700 active:border-gray-700 focus:outline-none focus:ring-4 focus:ring-gray-300">
													<svg xmlns="http://www.w3.org/2000/svg"
														class="icon icon-tabler icon-tabler-heart" width="20"
														height="20" viewBox="0 0 24 24" stroke-width="2"
														stroke="currentColor" fill="none" stroke-linecap="round"
														stroke-linejoin="round">
														<path stroke="none" d="M0 0h24v24H0z" fill="none" />
														<path
															d="M19.5 12.572l-7.5 7.428l-7.5 -7.428a5 5 0 1 1 7.5 -6.566a5 5 0 1 1 7.5 6.572" />
													</svg>
												</a>
											</div>
										</div>
										<hr />
									</div>
									<div>
										<table class="text-left w-full">
											<tbody>
												<tr>
													<td class="px-6 py-3">Product Code:</td>
													<td class="px-6 py-3">FBB00255</td>
												</tr>
												<tr>
													<td class="px-6 py-3">Availability:</td>
													<td class="px-6 py-3">In Stock</td>
												</tr>
												<tr>
													<td class="px-6 py-3">Type:</td>
													<td class="px-6 py-3">Fruits</td>
												</tr>
												<tr>
													<td class="px-6 py-3">Shipping:</td>
													<td class="px-6 py-3">
														<small>
															01 day shipping.
															<span class="text-gray-700">( Free pickup today)</span>
														</small>
													</td>
												</tr>
											</tbody>
										</table>
									</div>
									<div>
										<div class="relative">
											<a class="dropdown-toggle btn inline-flex items-center gap-x-2 bg-white text-gray-800 border-gray-300 border disabled:opacity-50 disabled:pointer-events-none hover:text-white hover:bg-gray-700 hover:border-gray-700 active:bg-gray-700 active:border-gray-700 focus:outline-none focus:ring-4 focus:ring-gray-300"
												href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
												Share
											</a>

											<ul class="dropdown-menu">
												<li>
													<a class="dropdown-item" href="#">
														<svg xmlns="http://www.w3.org/2000/svg"
															class="icon icon-tabler icon-tabler-brand-facebook inline-block"
															width="18" height="18" viewBox="0 0 24 24" stroke-width="2"
															stroke="currentColor" fill="none" stroke-linecap="round"
															stroke-linejoin="round">
															<path stroke="none" d="M0 0h24v24H0z" fill="none" />
															<path
																d="M7 10v4h3v7h4v-7h3l1 -4h-4v-2a1 1 0 0 1 1 -1h3v-4h-3a5 5 0 0 0 -5 5v2h-3" />
														</svg>
														Facebook
													</a>
												</li>
												<li>
													<a class="dropdown-item" href="#">
														<svg xmlns="http://www.w3.org/2000/svg"
															class="icon icon-tabler icon-tabler-brand-x" width="18"
															height="18" viewBox="0 0 24 24" stroke-width="2"
															stroke="currentColor" fill="none" stroke-linecap="round"
															stroke-linejoin="round">
															<path stroke="none" d="M0 0h24v24H0z" fill="none" />
															<path d="M4 4l11.733 16h4.267l-11.733 -16z" />
															<path d="M4 20l6.768 -6.768m2.46 -2.46l6.772 -6.772" />
														</svg>
														Twitter
													</a>
												</li>
												<li>
													<a class="dropdown-item" href="#">
														<svg xmlns="http://www.w3.org/2000/svg"
															class="icon icon-tabler icon-tabler-brand-instagram"
															width="18" height="18" viewBox="0 0 24 24" stroke-width="2"
															stroke="currentColor" fill="none" stroke-linecap="round"
															stroke-linejoin="round">
															<path stroke="none" d="M0 0h24v24H0z" fill="none" />
															<path
																d="M4 4m0 4a4 4 0 0 1 4 -4h8a4 4 0 0 1 4 4v8a4 4 0 0 1 -4 4h-8a4 4 0 0 1 -4 -4z" />
															<path d="M12 12m-3 0a3 3 0 1 0 6 0a3 3 0 1 0 -6 0" />
															<path d="M16.5 7.5l0 .01" />
														</svg>
														Instagram
													</a>
												</li>
											</ul>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<script src="{{ asset('assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
	<script src="{{ asset('assets/libs/simplebar/dist/simplebar.min.js') }}"></script>

	<script src="{{ asset('assets/js/theme.min.js') }}"></script>


	<script src="{{ asset('assets/js/vendors/countdown.js') }}"></script>

	<script src="{{ asset('assets/libs/tiny-slider/dist/min/tiny-slider.js') }}"></script>
	<script src="{{ asset('assets/js/vendors/tns-slider.js') }}"></script>
	<script src="{{ asset('assets/js/vendors/zoom.js') }}"></script>
	<script src="{{ asset('assets/js/vendors/language.js') }}"></script>
	<script src="{{ asset('assets/libs/swiper/swiper-bundle.min.js') }}"></script>
	<script src="{{ asset('assets/js/vendors/swiper.js') }}"></script>
	<script src="{{ asset('assets/js/vendors/validation.js') }}"></script>
</body>

</html>