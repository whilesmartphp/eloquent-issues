# Installation

You can install the **Eloquent Issues** package via composer:

```bash
composer require whilesmart/issues
```

## Publishing Assets

After installing the package, you should publish and run the migrations:

```bash
php artisan vendor:publish --tag="issues-migrations"
php artisan migrate
```

You can optionally publish the configuration file to customize the default behavior:

```bash
php artisan vendor:publish --tag="issues-config"
```

This will create a `config/issues.php` file in your application where you can adjust the model configuration, route configuration, and feature flags.
