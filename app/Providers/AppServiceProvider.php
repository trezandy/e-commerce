<?php

namespace App\Providers;

use App\Models\Order;
use App\Observers\OrderObserver;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot()
    {
        if (
            app()->environment('local') &&
            request()->header('x-forwarded-proto') === 'https'
        ) {
            URL::forceScheme('https');
        }

        Order::observe(OrderObserver::class);
    }
}
