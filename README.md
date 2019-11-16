# Roles/Permission UI for Laravel Application

[![Latest Version on Packagist](https://img.shields.io/packagist/v/devfaysal/laravel-admin.svg?style=flat-square)](https://packagist.org/packages/devfaysal/laravel-admin)
[![Build Status](https://img.shields.io/travis/devfaysal/laravel-admin/master.svg?style=flat-square)](https://travis-ci.org/devfaysal/laravel-admin)
[![Quality Score](https://img.shields.io/scrutinizer/g/devfaysal/laravel-admin.svg?style=flat-square)](https://scrutinizer-ci.com/g/devfaysal/laravel-admin)
[![Total Downloads](https://img.shields.io/packagist/dt/devfaysal/laravel-admin.svg?style=flat-square)](https://packagist.org/packages/devfaysal/laravel-admin)

This is where your description should go. Try and limit it to a paragraph or two, and maybe throw in a mention of what PSRs you support to avoid any confusion with users and contributors.

## Installation

You can install the package via composer:

```bash
composer require devfaysal/laravel-admin
```

Then add the following middleware to the ``` $routeMiddleware ``` array in ``` app/Http/kernel.php ```

Add ``` use HasRoles, SoftDeletes ``` in user model

Publish Assets
```bash
php artisan vendor:publish --tag=laravel-admin-public
```

Publish Seeds
```bash
php artisan vendor:publish --tag=laravel-admin-seeds
```

Run Migration
```bash
php artisan migrate
```
Run seeder
```bash
php artisan db:seed --class=LaravelAdminSeeder
```

## Usage

``` php
// Usage description here
```

### Testing

``` bash
composer test
```

### Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information what has changed recently.

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

### Security

If you discover any security related issues, please email hello@faysal.me instead of using the issue tracker.

## Credits

- [Faysal Ahamed](https://github.com/devfaysal)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
