# Laravel Crisp

[![Latest Version on Packagist](https://img.shields.io/packagist/v/ziming/laravel-crisp.svg?style=flat-square)](https://packagist.org/packages/ziming/laravel-crisp)
[![GitHub Tests Action Status](https://img.shields.io/github/actions/workflow/status/ziming/laravel-crisp/run-tests.yml?branch=main&label=tests&style=flat-square)](https://github.com/ziming/laravel-crisp/actions?query=workflow%3Arun-tests+branch%3Amain)
[![GitHub Code Style Action Status](https://img.shields.io/github/actions/workflow/status/ziming/laravel-crisp/fix-php-code-style-issues.yml?branch=main&label=code%20style&style=flat-square)](https://github.com/ziming/laravel-crisp/actions?query=workflow%3A"Fix+PHP+code+style+issues"+branch%3Amain)
[![Total Downloads](https://img.shields.io/packagist/dt/ziming/laravel-crisp.svg?style=flat-square)](https://packagist.org/packages/ziming/laravel-crisp)

A laravel Crisp library for Crisp Chat REST API. Still in progress.

As in, it is used in my production environment, but I do not recommend it for
others to use on their production yet as I am still fine-tuning the API design
& creating the various DTOs (still some way to go) for a nicer developer experience

## Support me

You can use my [referral link to sign up for Crisp & be a paid customer.](https://crisp.chat/?track=9fH4AdXJwg)

I highly recommend Crisp Chat if you are looking for a chat support SaaS for your business website. As it charges a flat
monthly fee instead of charging by per seat.

## Installation

You can install the package via composer:

```bash
composer require ziming/laravel-crisp
```

You can publish the config file with:

```bash
php artisan vendor:publish --tag="crisp-config"
```

This is the contents of the published config file:

```php
return [
    'website_id' => env('CRISP_WEBSITE_ID'),
    'tier' => env('CRISP_TIER', 'plugin'),
    'access_key_id' => env('CRISP_ACCESS_KEY_ID'),
    'secret_access_key' => env('CRISP_SECRET_ACCESS_KEY'),
];
```

## Usage

So what are the differences between the Crisp's official PHP SDK and this package?

The 1st main difference is that you don't have to set the tier & api credentials every time after instantiating

You also do not have to pass in the `website_id` every time.

I hope through the examples below, you can see how much more convenient this brings for those of us who only have a single
Crisp workspace.


```php
// Official PHP Crisp SDK
use Crisp\CrispClient;
$officialCrisp = new CrispClient();
$officialCrisp->setTier('plugin');
$officialCrisp->authenticate(
    config('crisp.access_key_id'), 
    config('crisp.secret_access_key')
);

$officialCrisp->websitePeople->findByEmail(config('crisp.website_id'), 'abc@example.com');

// This Package
$laravelCrisp = new Ziming\LaravelCrisp();
$laravelCrisp->websitePeople->findByEmail('abc@example.com');

// If you prefer the laravel facade approach you can just do this
\Ziming\LaravelCrisp\Facades\LaravelCrisp::websitePeople()
    ->findByEmail('abc@example.com');

// If for some reason you want to use a different website_id,
// the official Crisp client is always available too
$laravelCrisp->officialClient->websitePeople->findByEmail(
    config('crisp.website_id'), 
    'abc@example.com'
);
```

The second main difference is extra methods that I think are useful but are not in Crisp official SDK when I 1st
added them.

```php
// Gives you the Crisp Profile Link in Crisp
\Ziming\LaravelCrisp\Resources\WebsitePeople::getProfileLink('people-id');

// Gives you the conversation link in Crisp
\Ziming\LaravelCrisp\Resources\WebsiteConversations::getConversationLink('session-id');

// Get the first people id that matches the search text if 1 or more results are returned
$laravelCrisp = new Ziming\LaravelCrisp();
$laravelCrisp->websitePeople->getFirstPeopleIdBySearchText('abc@example.com');

// Get you the last message of a conversation
$laravelCrisp->websiteConversations->getOneLastMessage('session-id');

// Gives you a nice DTO object for a crisp conversation. Which give really nice hints to your IDEs
$crispConversation = $laravelCrisp->websiteConversations->getOneCrispConversation('session-id');

// Because it is a DTO object, you can access all the various properties
// of the object with IDE hints!
$crispConversation->is_verified;
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
