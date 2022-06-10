<?php

namespace App\Providers;

use App\Http\Repositories\ChatRepository;
use App\Http\Repositories\Interfaces\ChatRepositoryInterface;
use Illuminate\Support\ServiceProvider;

class ChatRepositoryProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(ChatRepositoryInterface::class, ChatRepository::class);
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
