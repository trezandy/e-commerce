<?php

use App\Http\Controllers\MidtransWebhookController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Livewire\CartPage;
use App\Livewire\CheckoutPage;
use App\Livewire\HomePage;
use App\Livewire\MyAccountPage;
use App\Livewire\OrderDetailPage;
use Illuminate\Support\Facades\Route;

Route::get('/', HomePage::class)->name('home');
Route::get('/cart', CartPage::class)->name('cart.index');
Route::get('/checkout', CheckoutPage::class)->name('checkout.index');
Route::get('/product/{product:slug}', [ProductController::class, 'show'])->name('product.show');

Route::post('/midtrans-webhook', [MidtransWebhookController::class, 'handle']);

Route::middleware('auth')->group(function () {
    Route::get('/order/{order:order_number}', OrderDetailPage::class)->name('order.detail');
    Route::get('/my-account', MyAccountPage::class)->name('my-account.index');
});

require __DIR__ . '/auth.php';

Route::redirect('/register', '/');
Route::redirect('/login', '/');
