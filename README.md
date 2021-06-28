# Laravel Google Recaptcha V2

[![Latest Version on Packagist](https://img.shields.io/packagist/v/justijndepover/laravel-google-recaptcha-v2.svg?style=flat-square)](https://packagist.org/packages/justijndepover/laravel-google-recaptcha-v2)
[![Software License](https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square)](LICENSE.md)
[![Total Downloads](https://img.shields.io/packagist/dt/justijndepover/laravel-google-recaptcha-v2.svg?style=flat-square)](https://packagist.org/packages/justijndepover/laravel-google-recaptcha-v2)

Easily add Google Recaptcha V2 to your Laravel application forms

## Caution
This application is still in development and could implement breaking changes. Please use at your own risk.

## Explanation
This package adds an easy integration to implement google recaptcha v2 in your Laravel application and validate your request.

## Installation
You can install the package with composer
```sh
composer require justijndepover/laravel-google-recaptcha-v2
```

After installation you can optionally publish your configuration file
```
php artisan vendor:publish --tag="laravel-google-recaptcha-v2-config"
```

## configuration

This is the config file

```php
return [

    /*
     * Your Google Recaptcha key
     */
    'key' => env('GOOGLE_RECAPTCHA_KEY'),

    /*
     * Your Google Recaptcha key
     */
    'secret' => env('GOOGLE_RECAPTCHA_SECRET'),

    /*
     * Skip recaptcha validation in local development
     */
    'skip_in_local_development' => true,

];
```

The package has a default option to skip validation in local development

## Usage
include the following API keys in your `.env` files:
```env
GOOGLE_RECAPTCHA_KEY=yourkey
GOOGLE_RECAPTCHA_SECRET=yoursecret
```

include the following in your app layout to render the recaptcha:
```blade
@recaptcha
```

Because some js frameworks (like Vue) don't allow to have script tags inside your components, this line is required as well:
```blade
// before the closing body tag
@recaptchaScript
```

After that, your request can be validated with the `recaptcha` validation rule:
```php
$request->validate([
    'g-recaptcha-response' => ['recaptcha'],
])
```

## Security
If you find any security related issues, please open an issue or contact me directly at [justijndepover@gmail.com](justijndepover@gmail.com).

## Contribution
If you wish to make any changes or improvements to the package, feel free to make a pull request.

## License
The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
