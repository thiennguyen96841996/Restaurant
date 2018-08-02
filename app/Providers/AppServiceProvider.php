<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(
            \App\Repositories\Vacation\VacationRepositoryInterface::class,
            \App\Repositories\Vacation\VacationEloquentRepository::class
        );

        $this->app->singleton(
            \App\Repositories\Overtime\OvertimeRepositoryInterface::class,
            \App\Repositories\Overtime\OvertimeEloquentRepository::class
        );
    }
}
