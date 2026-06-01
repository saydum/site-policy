<?php
namespace Saydum\SitePolicy;

use Illuminate\Support\ServiceProvider;

class SitePolicyServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        // Загрузка вьюх
        $this->loadViewsFrom(__DIR__.'/../resources/views', 'sitepolicy');

        // Автоматическая загрузка маршрутов пакета
        $this->loadRoutesFrom(__DIR__.'/../routes/sitepolicy.php');

        // Публикация ресурсов
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
