<?php

namespace Duke\Gem\app\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Filesystem\Filesystem;

class InstallCommand extends Command
{
    protected $signature = 'gem:install';

    protected $description = 'Install the Gem resources';

    public function handle()
    {
        // NPM Packages...
        $this->updateNodePackages(function ($packages) {
            return [
                    '@coreui/coreui' => '^4.0.1',
                ] + $packages;
        });

        // Controllers...
        (new Filesystem)->ensureDirectoryExists(app_path('Http/Controllers/Admin'));
        (new Filesystem)->copyDirectory(__DIR__.'/../../stubs/app/Http/Controllers/Admin', app_path('Http/Controllers/Admin'));

        // Requests...
        (new Filesystem)->ensureDirectoryExists(app_path('Http/Requests/Admin'));
        (new Filesystem)->copyDirectory(__DIR__.'/../../stubs/app/Http/Requests/Admin', app_path('Http/Requests/Admin'));
//
//        // Views...
//        (new Filesystem)->ensureDirectoryExists(resource_path('views/auth'));
//        (new Filesystem)->ensureDirectoryExists(resource_path('views/layouts'));
//        (new Filesystem)->ensureDirectoryExists(resource_path('views/components'));
//
//        (new Filesystem)->copyDirectory(__DIR__.'/../../stubs/resources/views/auth', resource_path('views/auth'));
//        (new Filesystem)->copyDirectory(__DIR__.'/../../stubs/resources/views/layouts', resource_path('views/layouts'));
//        (new Filesystem)->copyDirectory(__DIR__.'/../../stubs/resources/views/components', resource_path('views/components'));
//
//        copy(__DIR__.'/../../stubs/resources/views/dashboard.blade.php', resource_path('views/dashboard.blade.php'));

        // Routes...
        copy(__DIR__.'/../../../stubs/routes/admin.php', base_path('routes/admin.php'));

//        // "Dashboard" Route...


//        // Tailwind / Webpack...
//        copy(__DIR__.'/../../stubs/tailwind.config.js', base_path('tailwind.config.js'));
//        copy(__DIR__.'/../../stubs/webpack.mix.js', base_path('webpack.mix.js'));
//        copy(__DIR__.'/../../stubs/resources/css/app.css', resource_path('css/app.css'));
//        copy(__DIR__.'/../../stubs/resources/js/app.js', resource_path('js/app.js'));
//
//        $this->info('Breeze scaffolding installed successfully.');
//        $this->comment('Please execute the "npm install && npm run dev" command to build your assets.');
    }

    protected static function updateNodePackages(callable $callback, $dev = true)
    {
        if (! file_exists(base_path('package.json'))) {
            return;
        }

        $configurationKey = $dev ? 'devDependencies' : 'dependencies';

        $packages = json_decode(file_get_contents(base_path('package.json')), true);

        $packages[$configurationKey] = $callback(
            array_key_exists($configurationKey, $packages) ? $packages[$configurationKey] : [],
            $configurationKey
        );

        ksort($packages[$configurationKey]);

        file_put_contents(
            base_path('package.json'),
            json_encode($packages, JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT).PHP_EOL
        );
    }
}
