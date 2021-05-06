<?php

namespace Justijndepover\GoogleRecaptchaV2;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\ServiceProvider;
use Justijndepover\GoogleRecaptchaV2\Validators\GoogleRecaptchaValidator;

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

        Blade::directive('recaptcha', function ($siteKey = null) {
            if (! $siteKey) {
                $siteKey = config('google-recaptcha-v2.key');
            }

            return "
                <div class='g-recaptcha' data-sitekey='{$siteKey}'></div>
            ";
        });

        Blade::directive('recaptchaScript', function ($siteKey = null) {
            return "
                <script src='https://www.google.com/recaptcha/api.js?hl=<?php echo(app()->getLocale()); ?>' async defer></script>
            ";
        });

        Validator::extend('recaptcha', GoogleRecaptchaValidator::class);
    }
}
