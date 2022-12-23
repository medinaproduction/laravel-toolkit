<?php

namespace MedinaProduction\Toolkit;

class ServiceProvider extends \Illuminate\Support\ServiceProvider
{
    public function register(): void
    {
        $this->mergeConfigFrom(
            __DIR__ . '/../config/toolkit.php', 'toolkit'
        );
    }

    public function boot(): void
    {
        $this->publishes([
            __DIR__ . '/../config/toolkit.php' => config_path('toolkit.php'),
        ]);
    }
}
