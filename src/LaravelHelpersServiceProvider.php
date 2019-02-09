<?php

namespace SylveK\LaravelHelpers;

use Illuminate\Support\ServiceProvider;

class LaravelHelpersServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $path = sprintf('%s%s%s%s%s',
            __DIR__,
            DIRECTORY_SEPARATOR,
            'helpers',
            DIRECTORY_SEPARATOR,
            'helpers.php'
        );

        if ( is_file($path) ) {
            require($path);
        }
    }
}