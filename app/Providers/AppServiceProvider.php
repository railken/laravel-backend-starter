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
        \Core\User\User::observe(UserObserver::class);
        Schema::defaultStringLength(191);


        $configs = (new \Core\Config\ConfigManager())->getRepository()->newQuery()->get();
        foreach ($configs as $env) {
            if ($env->value != null) {

                $key = $env->resolveKey($env->key);
                config([$key => $env->value]);
            }
        }

        $disks = (new \Core\Disk\DiskManager())->getRepository()->newQuery()->get();

        foreach ($disks as $disk) {

            if ($disk->config) {

                $base = 'filesystems.disks';
                $name = $disk->getConfigName();

                config([$base . '.' . $name . '.driver' => $disk->driver]);

                foreach ($disk->config as $key => $value) {
                    config([$base . '.' . $name . '.' . $key => $value]);
                }
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
