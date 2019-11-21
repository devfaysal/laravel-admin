# This package is in very early stage, I do not recommend to use in production application yet.

# Roles/Permission UI for Laravel Application

### Following packages/Libraries used
- [Laravel Permission by Spatie](https://github.com/spatie/laravel-permission)
- [Modular Admin Html](https://github.com/modularcode/modular-admin-html)

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
```php
'admin' => \Devfaysal\LaravelAdmin\Http\Middleware\Admin::class,
'role' => \Spatie\Permission\Middlewares\RoleMiddleware::class,
'permission' => \Spatie\Permission\Middlewares\PermissionMiddleware::class,
'role_or_permission' => \Spatie\Permission\Middlewares\RoleOrPermissionMiddleware::class,
```
Update the user mode with the following..
```php
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Database\Eloquent\SoftDeletes;
...
class User extends Authenticatable
{
    use HasRoles, SoftDeletes, Notifiable;
    ....
}
```

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
composer dump-autoload

php artisan db:seed --class=LaravelAdminSeeder
```

## Usage

``` php
php artisan serve
```
Then visit localhost:8000/admin/login

username: hello@faysal.me
password: password

Additionally if you want to customize the blade view files and want to add other options and menu in the admin panel, you can publish the views and extend

```php
php artisan vendor:publish --tag=laravel-admin-views
```
If you want to add menu items in the sidebar menu, you need to create a file named ```menus.blade.php``` in your root view directoray.
It will automatically register menus in the sidebar.

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
