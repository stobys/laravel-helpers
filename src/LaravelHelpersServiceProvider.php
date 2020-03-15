<?php

namespace SylveK\LaravelHelpers;

use Illuminate\Support\ServiceProvider;

class LaravelHelpersServiceProvider extends ServiceProvider
{
    public function boot()
    {
        foreach (scandir(__DIR__.DIRECTORY_SEPARATOR.'LaravelHelpers') as $helperFile) {
            $path = sprintf('%s%s%s%s%s', __DIR__, DIRECTORY_SEPARATOR, 'helpers', DIRECTORY_SEPARATOR, $helperFile);

            if (is_file($path)) {
                require_once($path);
            }
        }
    }
}
