<?php

namespace Justijndepover\GoogleRecaptchaV2;

use Illuminate\Support\ServiceProvider;

class GoogleRecaptchaV2ServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->mergeConfigFrom(__DIR__ . '/../config/google-recaptcha-v2.php', 'google-recaptcha-v2');
    }

    public function boot()
    {
        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__ . '/../config/google-recaptcha-v2.php' => config_path('google-recaptcha-v2.php'),
            ], 'laravel-google-recaptcha-v2-config');
        }
    }
}
