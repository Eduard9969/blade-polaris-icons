<?php

declare(strict_types=1);

namespace Eduard9969\BladePolarisIcons;

use BladeUI\Icons\Factory;
use Illuminate\Contracts\Container\Container;
use Illuminate\Support\ServiceProvider;

final class BladePolarisIconsServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->registerConfig();

        $this->callAfterResolving(Factory::class, function (Factory $factory, Container $container) {
            $config = $container->make('config')->get('blade-polaris-icons', []);

            $factory->add('polaris-icons', array_merge(['path' => __DIR__ . '/../resources/svg'], $config));
        });
    }

    private function registerConfig(): void
    {
        $this->mergeConfigFrom(__DIR__ . '/../config/blade-polaris-icons.php', 'blade-polaris-icons');
    }

    public function boot(): void
    {
        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__ . '/../resources/svg' => public_path('vendor/blade-polaris-icons'),
            ], 'blade-polaris-icons');

            $this->publishes([
                __DIR__ . '/../config/blade-polaris-icons.php' => $this->app->configPath('blade-polaris-icons.php'),
            ], 'blade-polaris-icons-config');
        }
    }
}
