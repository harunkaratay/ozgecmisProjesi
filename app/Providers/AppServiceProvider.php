<?php

namespace App\Providers;

use Laravel\Fortify\Contracts\LoginResponse;
use Illuminate\Support\ServiceProvider;use App\Actions\Fortify\LoginResponse as CustomLoginResponse;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(){
        $this->app->singleton(LoginResponse::class, CustomLoginResponse::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }

}
