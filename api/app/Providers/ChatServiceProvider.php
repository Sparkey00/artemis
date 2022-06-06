<?php

namespace App\Providers;

use App\Http\Services\ChatService;
use Illuminate\Support\ServiceProvider;

class ChatServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->app->bind(ChatService::class, function () {
            return new ChatService(auth()->user());
        });
    }
}
