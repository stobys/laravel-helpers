<?php

namespace SylveK\LaravelHelpers;

use Illuminate\Support\ServiceProvider;

class LaravelHelpersServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $basedir = __DIR__.DIRECTORY_SEPARATOR.'helpers';

        foreach (scandir($basedir) as $helperFile) {
            $path = sprintf('%s%s%s', $basedir, DIRECTORY_SEPARATOR, $helperFile);

            if (is_file($path)) {
                require_once($path);
            }
        }
    }
}
