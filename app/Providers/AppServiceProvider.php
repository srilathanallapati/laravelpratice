<?php

namespace App\Providers;

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
        //$this->app->bind()
        $this->app->singleton('App\Example', function (){
            $dependentval = config('services.somevar'); 
            return new \App\Example($dependentval);
        });
        /*$this->app->bind('sample', function (){           
            return new \App\Sample('some-api-key');
        });*/


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
