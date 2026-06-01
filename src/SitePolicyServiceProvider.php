<?php
namespace Saydum\SitePolicy;

use Illuminate\Support\ServiceProvider;

class SitePolicyServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        $this->loadViewsFrom(__DIR__.'/../resources/views', 'sitepolicy');

        $this->publishes([
            __DIR__.'/../config/sitepolicy.php' => config_path('sitepolicy.php'),
            __DIR__.'/../resources/views' => resource_path('views/vendor/sitepolicy'),
        ], 'sitepolicy');
    }

    public function register(): void
    {
        $this->mergeConfigFrom(
            __DIR__.'/../config/sitepolicy.php', 'sitepolicy'
        );
    }
}
