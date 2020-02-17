<?php

namespace App\Modules\Clinics\Providers;

use Caffeinated\Modules\Support\ServiceProvider;

class ModuleServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the module services.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadTranslationsFrom(module_path('clinics', 'Resources/Lang', 'app'), 'clinics');
        $this->loadViewsFrom(module_path('clinics', 'Resources/Views', 'app'), 'clinics');
        $this->loadMigrationsFrom(module_path('clinics', 'Database/Migrations', 'app'), 'clinics');
        $this->loadConfigsFrom(module_path('clinics', 'Config', 'app'));
        $this->loadFactoriesFrom(module_path('clinics', 'Database/Factories', 'app'));
    }

    /**
     * Register the module services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->register(RouteServiceProvider::class);
    }
}
