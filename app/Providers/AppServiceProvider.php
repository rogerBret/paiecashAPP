<?php

namespace App\Providers;

use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->register(\L5Swagger\L5SwaggerServiceProvider::class);

    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength('200');

        Validator::extend('float', function ($attribute, $value, $parameters, $validator) {
            $thousandsSeparator = env('APP_NUMBER_THOUSANDS_SEPARATOR') == '.' ? '\\' . env('APP_NUMBER_THOUSANDS_SEPARATOR') : env('APP_NUMBER_THOUSANDS_SEPARATOR');
            $commaSeparator = env('APP_NUMBER_COMMA_SEPARATOR') == '.' ? '\\' . env('APP_NUMBER_COMMA_SEPARATOR') : env('APP_NUMBER_COMMA_SEPARATOR');
            $regex = '~^[0-9]{1,3}(' . $thousandsSeparator . '[0-9]{3})*' . $commaSeparator . '[0-9]+$~';
            $validate = preg_match($regex, $value);

            if ($validate === 1) {
                return true;
            }

            return false;
        });
    }
}
