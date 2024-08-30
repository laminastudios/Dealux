<?php

namespace App\Providers;

use App\Services\StripeApi;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        // Register the StripeApi service
        $this->app->singleton(StripeApi::class, function ($app) {
            return new StripeApi;
        });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
