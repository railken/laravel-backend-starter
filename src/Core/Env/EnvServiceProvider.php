<?php

namespace Core\Env;

use Illuminate\Support\ServiceProvider;

class EnvServiceProvider extends ServiceProvider
{
    /**
     * Register bindings in the container.
     *
     * @return void
     */
    public function register()
    {
        Env::observe(EnvObserver::class);
    }
}
