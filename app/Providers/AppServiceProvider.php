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

        foreach ((new \Core\Config\ConfigManager())->getRepository()->newQuery()->get() as $env) {
            if ($env->value != null) {

                $key = $env->resolveKey($env->key);
                config([$key => $env->value]);
            }
        }
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
