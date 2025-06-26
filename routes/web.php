<?php

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

Route::middleware('auth')->group(function () {
    Route::get('/order/{order}', OrderDetailPage::class)->name('order.detail');
    Route::get('/my-account', MyAccountPage::class)->name('my-account.index');

    // Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    // Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    // Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/produk/{slug}', [ProductController::class, 'show'])->name('product.show');

require __DIR__ . '/auth.php';
