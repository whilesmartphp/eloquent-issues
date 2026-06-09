<?php

namespace Whilesmart\Issues;

use Illuminate\Support\ServiceProvider;

class IssuesServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->mergeConfigFrom(__DIR__ . '/../config/issues.php', 'issues');
    }

    public function boot(): void
    {
        $this->loadMigrationsFrom(__DIR__ . '/../database/migrations');

        $this->publishes([
            __DIR__ . '/../config/issues.php' => config_path('issues.php'),
        ], 'issues-config');
    }
}
