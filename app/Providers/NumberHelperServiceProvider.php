<?php

namespace App\Providers;

use App;
use App\Helpers\Numbers\OrdinalStringHelper;
use Illuminate\Support\ServiceProvider;

class NumberHelperServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        App::bind('OrdinalStringHelper', function(){

            // Create and return object of class.
                return new OrdinalStringHelper;
        });

//        require_once app_path() . '/Helpers/Numbers/OrdinalStringHelper.php';
    }
}
