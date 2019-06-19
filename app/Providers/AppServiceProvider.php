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
        require_once app_path().'/Helpers/helpers.php';
        require_once app_path().'/Helpers/date_time.php';

        \Validator::extend('not_exists', function ($attribute, $value, $parameters) {
            return \DB::table($parameters[0])
                ->where($parameters[1], $value)
                ->count() < 1;
        });

        Schema::defaultStringLength(191);
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
