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


        if (Schema::hasTable('configs')) {
            $configs = (new \Core\Config\ConfigManager())->getRepository()->findToLoad();

            $configs = $configs->mapWithKeys(function($config, $key) {
                return [$config->resolveKey($config->key) => $config->value];
            })->toArray();

            config($configs);
        }


        if (Schema::hasTable('disks')) {

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
