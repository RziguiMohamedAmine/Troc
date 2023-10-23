<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Stripe\Stripe; 

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
    public function boot(): void
    {
        if (config('app.env') !== 'testing') {
            // Set your Stripe API key here
            Stripe::setApiKey(config('services.stripe.secret'));
        }
    }
}
