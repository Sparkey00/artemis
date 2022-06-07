<?php

namespace App\Providers;

use App;
use App\Http\Services\tests\TestUserService;
use App\Http\Services\UserService;
use Illuminate\Support\ServiceProvider;

class UserServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register(): void
    {
        if (App::runningUnitTests()) {
            $this->app->bind(App\Http\Interfaces\UserServiceInterface::class, function () {
                return new TestUserService(App\Models\User::find(1));
            });
        } else {
            $this->app->bind(App\Http\Interfaces\UserServiceInterface::class, function () {
                return new UserService(auth()->user());
            });
        }
    }


    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
