<!doctype html>
<html lang="en">

<head>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />

	<link href="{{ asset('assets/libs/dropzone/dist/min/dropzone.min.css') }}" rel="stylesheet" />
	<link href="{{ asset('assets/libs/tiny-slider/dist/tiny-slider.css')}}" rel="stylesheet" />
	<link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets/images/favicon/favicon.ico')}}" />

	<link rel="preconnect" href="https://fonts.googleapis.com" />
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
	<link rel="stylesheet"
		href="https://fonts.googleapis.com/css2?family=Inter:wght@100;200;300;400;500;600;700;800;900&display=swap" />
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@tabler/icons-webfont@2.46.0/tabler-icons.min.css" />
	<link rel="stylesheet" href="{{ asset('assets/libs/simplebar/dist/simplebar.min.css')}}" />

	<link rel="stylesheet" href="{{ asset('assets/css/theme.min.css')}}">


	<title>Shop Single - Sayur Project</title>
</head>

<body>
	<header>
		<div class="border-b">
			<div class="pt-5">
				<div class="container">
					<div class="flex flex-wrap w-full items-center justify-between">
						<div class="lg:w-1/6 md:w-1/2 w-2/5">
							<a class="navbar-brand" href="{{ url('/') }}">
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
							<a href="{{ url('/') }}"><img src="{{ asset('assets/images/logo/freshcart-logo.svg') }}"
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
											<li><a class="dropdown-item" href="{{ url('shop') }}">Dairy, Bread &
													Eggs</a>
											</li>
											<li><a class="dropdown-item" href="{{ url('shop') }}">Snacks & Munchies</a>
											</li>
											<li><a class="dropdown-item" href="{{ url('shop') }}">Fruits &
													Vegetables</a>
											</li>
											<li><a class="dropdown-item" href="{{ url('shop') }}">Cold Drinks &
													Juices</a></li>
											<li><a class="dropdown-item" href="{{ url('shop') }}">Breakfast & Instant
													Food</a></li>
											<li><a class="dropdown-item" href="{{ url('shop') }}">Bakery & Biscuits</a>
											</li>
											<li><a class="dropdown-item" href="{{ url('shop') }}">Chicken, Meat &
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
									<li><a class="dropdown-item" href="{{ url('shop') }}">Dairy, Bread & Eggs</a></li>
									<li><a class="dropdown-item" href="{{ url('shop') }}">Snacks & Munchies</a></li>
									<li><a class="dropdown-item" href="{{ url('shop') }}">Fruits & Vegetables</a></li>
									<li><a class="dropdown-item" href="{{ url('shop') }}">Cold Drinks & Juices</a></li>
									<li><a class="dropdown-item" href="{{ url('shop') }}">Breakfast & Instant Food</a>
									</li>
									<li><a class="dropdown-item" href="{{ url('shop') }}">Bakery & Biscuits</a></li>
									<li><a class="dropdown-item" href="{{ url('shop') }}">Chicken, Meat & Fish</a></li>
								</ul>
							</div>
							<div>
								<ul class="navbar-nav lg:flex gap-3 lg:items-center">
									<li class="nav-item dropdown w-full lg:w-auto">
										<a class="nav-link" href="{{ url('/') }}">
											Home
										</a>
									</li>
									<li class="nav-item dropdown w-full lg:w-auto">
										<a class="nav-link" href="{{ url('shop') }}">Shop</a>
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
					<a href="#" class="text-green-600 ml-1">Sign in</a>
				</div>
			</div>
		</div>
	</div>

	<div class="offcanvas offcanvas-right" tabindex="-1" id="offcanvasRight" aria-labelledby="offcanvasRightLabel">
		<div class="offcanvas-header border-b">
			<div>
				<h5 id="offcanvasRightLabel">Shop Cart</h5>
				<span>Location in 382480</span>
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
				<div class="bg-red-500 bg-opacity-25 text-red-800 mb-3 rounded-lg p-4" role="alert">
					You’ve got FREE delivery. Start
					<a href="#!" class="alert-link">checkout now!</a>
				</div>
				<ul class="list-none">
					<li class="py-3 border-t">
						<div class="flex items-center">
							<div class="w-1/2 md:w-1/2 lg:w-3/5">
								<div class="flex">
									<img src="{{ asset('assets/images/products/product-img-1.jpg') }}" alt="Ecommerce"
										class="w-16 h-16" />
									<div class="ml-3">
										<a href="{{ url('shop-single') }}" class="text-inherit">
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
										<a href="{{ url('shop-single') }}" class="text-inherit">
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
										<a href="{{ url('shop-single') }}" class="text-inherit">
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
										<a href="{{ url('shop-single') }}" class="text-inherit">
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
										<a href="{{ url('shop-single') }}" class="text-inherit">
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


	<main>
		<div class="container">
			<div class="flex flex-wrap mt-4">
				<div class="w-full">
					<nav aria-label="breadcrumb">
						<ol class="flex flex-wrap">
							<li class="inline-block text-green-600 mr-2">
								<a href="{{ url('/') }}">
									Home
									<svg xmlns="http://www.w3.org/2000/svg"
										class="icon icon-tabler icon-tabler-chevron-right inline-block" width="14"
										height="14" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
										fill="none" stroke-linecap="round" stroke-linejoin="round">
										<path stroke="none" d="M0 0h24v24H0z" fill="none" />
										<path d="M9 6l6 6l-6 6" />
									</svg>
								</a>
							</li>
							<li class="inline-block text-green-600 mr-2">
								<a href="{{ url('shop') }}">
									Bakery Biscuits

									<svg xmlns="http://www.w3.org/2000/svg"
										class="icon icon-tabler icon-tabler-chevron-right inline-block" width="14"
										height="14" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
										fill="none" stroke-linecap="round" stroke-linejoin="round">
										<path stroke="none" d="M0 0h24v24H0z" fill="none" />
										<path d="M9 6l6 6l-6 6" />
									</svg>
								</a>
							</li>
							<li class="inline-block text-gray-500 active" aria-current="page">Napolitanke Ljesnjak</li>
						</ol>
					</nav>
				</div>
			</div>
		</div>
		<section class="my-10">
			<div class="container">
				<div class="flex flex-wrap">
					<div class="lg:w-1/2">
						<div class="product" id="product">
							<div class="zoom" onmousemove="zoom(event)"
								style="background-image: url({{ asset('assets/images/products/product-single-img-1.jpg') }})">
								<img src="{{ asset('assets/images/products/product-single-img-1.jpg') }}" alt="" />
							</div>
							<div>
								<div class="zoom" onmousemove="zoom(event)"
									style="background-image: url({{ asset('assets/images/products/product-single-img-2.jpg') }})">
									<img src="{{ asset('assets/images/products/product-single-img-2.jpg') }}" alt="" />
								</div>
							</div>
							<div>
								<div class="zoom" onmousemove="zoom(event)"
									style="background-image: url({{ asset('assets/images/products/product-single-img-3.jpg') }})">
									<img src="{{ asset('assets/images/products/product-single-img-3.jpg') }}" alt="" />
								</div>
							</div>
							<div>
								<div class="zoom" onmousemove="zoom(event)"
									style="background-image: url({{ asset('assets/images/products/product-single-img-4.jpg') }})">
									<img src="{{ asset('assets/images/products/product-single-img-4.jpg') }}" alt="" />
								</div>
							</div>
						</div>
						<div class="product-tools">
							<div class="thumbnails flex gap-3" id="productThumbnails">
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
					<div class="lg:w-1/2 pr-4 pl-4">
						<div class="lg:pl-10 mt-6 md:mt-0">
							<div class="flex flex-col gap-4">
								<a href="#!" class="block text-green-600">Bakery Biscuits</a>
								<div class="flex flex-col">
									<h1>Napolitanke Ljesnjak</h1>
									<div class="flex flex-col gap-4">
										<div class="text-md">
											<span class="text-gray-900 font-semibold">$32</span>
											<span class="line-through text-gray-500">$35</span>

											<span><small class="text-red-600">26% Off</small></span>
										</div>
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
												class="btn gap-x-1 bg-green-600 text-white border-green-600 disabled:opacity-50 disabled:pointer-events-none hover:text-white hover:bg-green-700 hover:border-green-700 active:bg-green-700 active:border-green-700 focus:outline-none focus:ring-4 focus:ring-green-300 justify-center">
												<svg xmlns="http://www.w3.org/2000/svg" width="18" height="18"
													viewBox="0 0 24 24" fill="none" stroke="currentColor"
													stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
													class="icon icon-tabler icons-tabler-outline icon-tabler-shopping-bag">
													<path stroke="none" d="M0 0h24v24H0z" fill="none" />
													<path
														d="M6.331 8h11.339a2 2 0 0 1 1.977 2.304l-1.255 8.152a3 3 0 0 1 -2.966 2.544h-6.852a3 3 0 0 1 -2.965 -2.544l-1.255 -8.152a2 2 0 0 1 1.977 -2.304z" />
													<path d="M9 11v-5a3 3 0 0 1 6 0v5" />
												</svg>
												Add to cart
											</button>
										</div>
										<div class="md:w-1/3 w-full">
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
												<td class="px-6 py-3">10</td>
											</tr>
											<tr>
												<td class="px-6 py-3">Type:</td>
												<td class="px-6 py-3">Fruits</td>
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
														class="icon icon-tabler icon-tabler-brand-instagram" width="18"
														height="18" viewBox="0 0 24 24" stroke-width="2"
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
		</section>
		<section class="mb-10">
			<div class="container">
				<div class="flex flex-wrap">
					<div class="w-full">
						<ul class="nav nav-line-bottom border-b border-gray-300 pl-0" id="myTab" role="tablist">
							<li class="nav-item" role="presentation">
								<button class="inline-block py-3 font-semibold px-4 no-underline nav-link active"
									id="product-tab" data-bs-toggle="tab" data-bs-target="#product-tab-pane"
									type="button" role="tab" aria-controls="product-tab-pane" aria-selected="true">
									Product Details
								</button>
							</li>
							<li class="nav-item" role="presentation">
								<button class="inline-block py-3 font-semibold px-4 no-underline nav-link"
									id="details-tab" data-bs-toggle="tab" data-bs-target="#details-tab-pane"
									type="button" role="tab" aria-controls="details-tab-pane" aria-selected="false"
									tabindex="-1">
									Information
								</button>
							</li>
						</ul>
						<div class="tab-content" id="myTabContent">
							<div class="tab-pane active opacity-100 block" id="product-tab-pane" role="tabpanel"
								aria-labelledby="product-tab" tabindex="0">
								<div class="my-8 flex flex-col gap-5">
									<div class="flex flex-col gap-1">
										<h3 class="text-lg font-semibold">Nutrient Value &amp; Benefits</h3>
										<p>
											Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nisi, tellus
											iaculis urna bibendum in lacus, integer. Id imperdiet vitae varius sed
											magnis eu nisi nunc sit. Vel,
											varius habitant ornare ac rhoncus. Consequat risus facilisis ante ipsum
											netus risus adipiscing sagittis sed. Lorem ipsum dolor sit amet, consectetur
											adipiscing elit.
										</p>
									</div>
									<div class="flex flex-col gap-1">
										<h4 class="text-md font-semibold">Variant</h4>
										<p>3 variant</p>
									</div>
									<div class="flex flex-col gap-1">
										<h4 class="text-md font-semibold">Disclaimer</h4>
										<p>Image shown is a representation and may slightly vary from the actual
											product. Every effort is made to maintain accuracy of all information
											displayed.</p>
									</div>
								</div>
							</div>
							<div class="tab-pane block" id="details-tab-pane" role="tabpanel"
								aria-labelledby="details-tab" tabindex="0">
								<div class="my-8">
									<div class="flex flex-wrap gap-6 mb-4">
										<div class="w-full">
											<h3 class="text-md font-semibold">Details</h3>
										</div>
									</div>
									<div class="flex flex-wrap lg:flex-nowrap gap-4">
										<div class="w-full lg:w-1/2">
											<table class="text-left w-full">
												<tbody>
													<tr class="border-gray-300 border-b bg-gray-100">
														<th class="px-6 py-3">Weight</th>
														<td class="px-6 py-3">1000 Grams</td>
													</tr>
													<tr class="border-gray-300 border-b">
														<th class="px-6 py-3">Ingredient Type</th>
														<td class="px-6 py-3">Vegetarian</td>
													</tr>
													<tr class="border-gray-300 border-b bg-gray-100">
														<th class="px-6 py-3">Brand</th>
														<td class="px-6 py-3">Dmart</td>
													</tr>
													<tr class="border-gray-300 border-b">
														<th class="px-6 py-3">Item Package Quantity</th>
														<td class="px-6 py-3">1</td>
													</tr>
													<tr class="border-gray-300 border-b bg-gray-100">
														<th class="px-6 py-3">Form</th>
														<td class="px-6 py-3">Larry the Bird</td>
													</tr>
													<tr class="border-gray-300 border-b">
														<th class="px-6 py-3">Manufacturer</th>
														<td class="px-6 py-3">Dmart</td>
													</tr>
													<tr class="border-gray-300 border-b bg-gray-100">
														<th class="px-6 py-3">Net Quantity</th>
														<td class="px-6 py-3">340.0 Gram</td>
													</tr>
													<tr class="border-gray-300 border-b">
														<th class="px-6 py-3">Product Dimensions</th>
														<td class="px-6 py-3">9.6 x 7.49 x 18.49 cm</td>
													</tr>
												</tbody>
											</table>
										</div>
										<div class="w-full lg:w-1/2">
											<table class="text-left w-full">
												<tbody>
													<tr class="border-gray-300 border-b bg-gray-100">
														<th class="px-6 py-3">ASIN</th>
														<td class="px-6 py-3">SB0025UJ75W</td>
													</tr>
													<tr class="border-gray-300 border-b">
														<th class="px-6 py-3">Best Sellers Rank</th>
														<td class="px-6 py-3">#2 in Fruits</td>
													</tr>
													<tr class="border-gray-300 border-b bg-gray-100">
														<th class="px-6 py-3">Date First Available</th>
														<td class="px-6 py-3">30 April 2024</td>
													</tr>
													<tr class="border-gray-300 border-b">
														<th class="px-6 py-3">Item Weight</th>
														<td class="px-6 py-3">500g</td>
													</tr>
													<tr class="border-gray-300 border-b bg-gray-100">
														<th class="px-6 py-3">Generic Name</th>
														<td class="px-6 py-3">Banana Robusta</td>
													</tr>
												</tbody>
											</table>
										</div>
									</div>
								</div>
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
								<li><a href="{{ url('shop-checkout') }}" class="inline-block">Shop Checkout</a></li>
							</ul>
						</div>
						<div class="w-1/2 sm:w-1/2 md:w-1/4 flex flex-col gap-4">
							<h6>Become a Seller</h6>
							<ul class="flex flex-col gap-2">
								<li><a href="#!" class="inline-block hover:text-green-600">Seller Opportunities</a>
								</li>
								<li><a href="#!" class="inline-block hover:text-green-600">Become a Seller</a></li>
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
									<a href="#!"><img src="{{ asset('assets/images/payment/mastercard.svg') }}"
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
							©
							<span id="copyright">
								<script>
									document.getElementById('copyright').appendChild(document.createTextNode(new Date().getFullYear()));
								</script>
							</span>
							FreshCart TailwindCSS eCommerce HTML Template. Powered by
							<a href="https://codescandy.com/" target="_blank" class="text-green-600">Codescandy</a>
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


	<script src="{{ asset('assets/libs/rater-js/index.js') }}"></script>
	<script src="{{ asset('assets/libs/dropzone/dist/min/dropzone.min.js') }}"></script>
	<script src="{{ asset('assets/libs/tiny-slider/dist/min/tiny-slider.js') }}"></script>
	<script src="{{ asset('assets/js/vendors/tns-slider.js') }}"></script>
	<script src="{{ asset('assets/js/vendors/zoom.js') }}"></script>
	<script src="{{ asset('assets/js/vendors/dropzone.js') }}"></script>
	<script src="{{ asset('assets/js/vendors/language.js') }}"></script>
	<script src="{{ asset('assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
	<script src="{{ asset('assets/libs/simplebar/dist/simplebar.min.js') }}"></script>

	<script src="{{ asset('assets/js/theme.min.js') }}"></script>

</body>

</html>