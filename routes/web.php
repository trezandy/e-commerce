<?php

use App\Http\Controllers\ProductController;
use App\Livewire\CartPage;
use App\Livewire\CheckoutPage;
use App\Livewire\HomePage;
use App\Livewire\OrderDetailPage;
use Illuminate\Support\Facades\Route;

Route::get('/', HomePage::class)->name('home');
Route::get('/cart', CartPage::class)->name('cart.index');
Route::get('/checkout', CheckoutPage::class)->name('checkout.index');
Route::get('/order/{order}', OrderDetailPage::class)->name('order.detail');

Route::get('/produk/{slug}', [ProductController::class, 'show'])->name('product.show');
