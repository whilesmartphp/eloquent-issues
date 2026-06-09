# Eloquent Issues

[![Latest Version on Packagist](https://img.shields.io/packagist/v/whilesmart/webhooks.svg?style=flat-square)](https://packagist.org/packages/whilesmart/issues)
[![GitHub Tests Action Status](https://img.shields.io/github/actions/workflow/status/whilesmart/eloquent-webhooks/tests.yml?branch=main&label=tests&style=flat-square)](https://github.com/whilesmart/eloquent-issues/actions?query=workflow%3Atests+branch%3Amain)
[![Total Downloads](https://img.shields.io/packagist/dt/whilesmart/webhooks.svg?style=flat-square)](https://packagist.org/packages/whilesmart/issues)


## Installation

You can install the package via composer:

```bash
composer require whilesmart/eloquent-issues
```

You should publish and run the migrations with:

```bash
php artisan vendor:publish --tag="issues-migrations"
php artisan migrate
```

You can publish the config file with:

```bash
php artisan vendor:publish --tag="issues-config"
```


## Usage


## Testing

```bash
composer test
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.


## License

The MIT License (MIT). Please see [License File](LICENSE) for more information.
