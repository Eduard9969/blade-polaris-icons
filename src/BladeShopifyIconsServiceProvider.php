<?php

declare(strict_types=1);

namespace Eduard9969\BladeShopifyIcons;

use BladeUI\Icons\Factory;
use Illuminate\Contracts\Container\Container;
use Illuminate\Support\ServiceProvider;

final class BladeShopifyIconsServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->registerConfig();

        $this->callAfterResolving(Factory::class, function (Factory $factory, Container $container) {
            $config = $container->make('config')->get('blade-shopify-icons', []);

            $factory->add('shopify-icons', array_merge(['path' => __DIR__.'/../resources/svg'], $config));
        });
    }

    private function registerConfig(): void
    {
        $this->mergeConfigFrom(__DIR__ . '/../config/blade-shopify-icons.php', 'blade-shopify-icons');
    }

    public function boot(): void
    {
        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__.'/../resources/svg' => public_path('vendor/blade-shopify-icons'),
            ], 'blade-shopify-icons');

            $this->publishes([
                __DIR__ . '/../config/blade-shopify-icons.php' => $this->app->configPath('blade-shopify-icons.php'),
            ], 'blade-shopify-icons-config');
        }
    }
}
