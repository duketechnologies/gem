<?php

namespace Duke\Gem\app\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;

class InstallCommand extends Command
{
    protected $signature = 'gem:install';

    protected $description = 'Install the Gem resources';

    public function handle()
    {
        // NPM Packages...
        $this->updateNodePackages(function ($packages) {
            return [
                    '@coreui/coreui' => '^3.3.0',
                    "@fortawesome/fontawesome-free" => "^5.15.3",
                ] + $packages;
        });

        // Controllers...
        File::copyDirectory(__DIR__.'/../../../../stubs/app/Http/Controllers/Admin', app_path('Http/Controllers/Admin'));

        // Requests...
        File::copyDirectory(__DIR__.'/../../../../stubs/app/Http/Requests/Admin', app_path('Http/Requests/Admin'));

        //Middleware
        File::copy(__DIR__.'/../../../../stubs/app/Http/Middleware/RedirectIfNotAdmin.php', app_path('Http/Middleware/RedirectIfNotAdmin.php'));


        // Routes...
        File::copy(__DIR__.'/../../../../stubs/routes/admin.php', base_path('routes/admin.php'));
        file_put_contents(base_path('routes/web.php'),PHP_EOL.'include_once "admin.php";',FILE_APPEND);

        // Config...
        File::copy(__DIR__.'/../../../../stubs/config/admin.php', base_path('config/admin.php'));

        // Styles & Scripts
        File::copyDirectory(__DIR__.'/../../../../stubs/resources/sass', base_path('resources/admin/sass'));
        File::copyDirectory(__DIR__.'/../../../../stubs/resources/js', base_path('resources/admin/js'));
        file_put_contents(base_path('webpack.mix.js'),PHP_EOL."mix.sass('resources/admin/sass/admin.scss', 'public/css')".PHP_EOL."   .js('resources/admin/js/admin.js', 'public/js');",FILE_APPEND);

        // Views...
        File::copyDirectory(__DIR__.'/../../../../stubs/resources/views', base_path('resources/views/admin'));

        $this->comment('Please execute the "npm install && npm run dev" command to build your assets.');
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
