<?php

namespace Duke\Gem;

use Illuminate\Support\ServiceProvider;

class GemServiceProvider extends ServiceProvider
{
    public function boot()
    {
        if (! $this->app->runningInConsole()) {
            return;
        }

        $this->commands([
            app\Console\Commands\InstallCommand::class,
        ]);
    }

    public function provides()
    {
        return [app\Console\Commands\InstallCommand::class];
    }
}
