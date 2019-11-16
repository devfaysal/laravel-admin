# Very short description of the package

[![Latest Version on Packagist](https://img.shields.io/packagist/v/devfaysal/laravel-admin.svg?style=flat-square)](https://packagist.org/packages/devfaysal/laravel-admin)
[![Build Status](https://img.shields.io/travis/devfaysal/laravel-admin/master.svg?style=flat-square)](https://travis-ci.org/devfaysal/laravel-admin)
[![Quality Score](https://img.shields.io/scrutinizer/g/devfaysal/laravel-admin.svg?style=flat-square)](https://scrutinizer-ci.com/g/devfaysal/laravel-admin)
[![Total Downloads](https://img.shields.io/packagist/dt/devfaysal/laravel-admin.svg?style=flat-square)](https://packagist.org/packages/devfaysal/laravel-admin)

This is where your description should go. Try and limit it to a paragraph or two, and maybe throw in a mention of what PSRs you support to avoid any confusion with users and contributors.

## Installation

You can install the package via composer:

```bash
composer require devfaysal/laravel-admin

php artisan migrate

php artisan vendor:publish --tag=laravel-admin-public

php artisan vendor:publish --tag=laravel-admin-seeds

Add use Notifiable, HasRoles, SoftDeletes; in usermodel

run seeder php artisan db:seed --class=LaravelAdminSeeder


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

If you discover any security related issues, please email devfaysal@gmail.com instead of using the issue tracker.

## Credits

- [Faysal Ahamed](https://github.com/devfaysal)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.

## Laravel Package Boilerplate

This package was generated using the [Laravel Package Boilerplate](https://laravelpackageboilerplate.com).