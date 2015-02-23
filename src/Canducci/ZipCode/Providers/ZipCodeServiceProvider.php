<?php namespace Canducci\ZipCode\Providers;

use Illuminate\Support\ServiceProvider;

class ZipCodeServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind('Canducci\ZipCode\Contracts\ZipCodeServiceContract', function ($app) {
            return $app->make($app['config']['zipcode.service']);
        });

        $this->app->singleton('zipcode', 'Canducci\ZipCode\ZipCode');
    }

    public function boot()
    {
        $this->publishes([
            __DIR__ . '/../../config/zipcode.php' => config_path('zipcode.php')
        ]);

        $this->mergeConfigFrom(
            __DIR__ . '/../../config/zipcode.php', 'zipcode'
        );
    }
}
