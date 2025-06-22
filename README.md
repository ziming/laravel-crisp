# Laravel Crisp

[![Latest Version on Packagist](https://img.shields.io/packagist/v/ziming/laravel-crisp.svg?style=flat-square)](https://packagist.org/packages/ziming/laravel-crisp)
[![GitHub Tests Action Status](https://img.shields.io/github/actions/workflow/status/ziming/laravel-crisp/run-tests.yml?branch=main&label=tests&style=flat-square)](https://github.com/ziming/laravel-crisp/actions?query=workflow%3Arun-tests+branch%3Amain)
[![GitHub Code Style Action Status](https://img.shields.io/github/actions/workflow/status/ziming/laravel-crisp/fix-php-code-style-issues.yml?branch=main&label=code%20style&style=flat-square)](https://github.com/ziming/laravel-crisp/actions?query=workflow%3A"Fix+PHP+code+style+issues"+branch%3Amain)
[![Total Downloads](https://img.shields.io/packagist/dt/ziming/laravel-crisp.svg?style=flat-square)](https://packagist.org/packages/ziming/laravel-crisp)

Just a simple wrapper for crisp php library for now. More documentation will be added later.

## Support us

To be added later

## Installation

You can install the package via composer:

```bash
composer require ziming/laravel-crisp
```

You can publish the config file with:

```bash
php artisan vendor:publish --tag="laravel-crisp-config"
```

This is the contents of the published config file:

```php
return [
    'website_id' => env('CRISP_WEBSITE_ID'),
    'access_key_id' => env('CRISP_ACCESS_KEY_ID'),
    'secret_access_key' => env('CRISP_SECRET_ACCESS_KEY'),
];
```

## Usage

```php
$crisp = new Ziming\LaravelCrisp();

// Notice you don't have to pass in the website_id every time.
$crisp->websitePeople->findByEmail('abc@example.com');

// Alternatively you can use the crisp php api sdk but that would need you to pass in the website_id every time
$crisp->client->websitePeople->findByEmail('crisp-website-id', 'abc@example.com');
```

## Testing

```bash
composer test
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

## Security Vulnerabilities

Please review [our security policy](../../security/policy) on how to report security vulnerabilities.

## Credits

- [ziming](https://github.com/ziming)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
