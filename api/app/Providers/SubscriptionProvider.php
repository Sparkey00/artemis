<?php

namespace App\Providers;

use App\Http\Services\SubscriptionService;
use Illuminate\Support\ServiceProvider;

class SubscriptionProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register(): void
    {
        $this->app->bind(SubscriptionService::class, function () {
            return new SubscriptionService();
        });
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot(): void
    {
        //
    }
}
