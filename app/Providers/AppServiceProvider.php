<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Foundation\DevCommands;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        if ($this->app->environment('local') && class_exists(\Laravel\Telescope\TelescopeServiceProvider::class)) {
        $this->app->register(\Laravel\Telescope\TelescopeServiceProvider::class);
        $this->app->register(TelescopeServiceProvider::class);
    }
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        /**Run dev server on different port */
        DevCommands::artisan('serve --host=127.0.0.1 --port=8001', 'server');
    }


}
