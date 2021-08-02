# Roles/Permission UI for Laravel Application

![Screenshot_2019-12-20 Laravel](https://user-images.githubusercontent.com/16212149/73057065-c3eab700-3eba-11ea-802a-1f564d3af4ad.png)

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
'admin.auth' => \Devfaysal\LaravelAdmin\Http\Middleware\AdminAuthenticate::class,
'admin.guest' => \Devfaysal\LaravelAdmin\Http\Middleware\AdminRedirectIfAuthenticated::class,
'role' => \Spatie\Permission\Middlewares\RoleMiddleware::class,
'permission' => \Spatie\Permission\Middlewares\PermissionMiddleware::class,
'role_or_permission' => \Spatie\Permission\Middlewares\RoleOrPermissionMiddleware::class,
```

Publish Assets
```bash
php artisan vendor:publish --tag=laravel-admin-public
```

Publish Seeds
```bash
php artisan vendor:publish --tag=laravel-admin-seeders
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

For javascript and css, ```javascript.blade.php``` and ```styles.blade.php```

### Dashboard modification
To update Dashboard, register ```/admin/dashboard``` route and use your own controller and view.
If you want the current html design, check vendor folder and copy dashboard.blade.php file from ```resource/views``` folder inside the package.

#### Blade components
Add a stats section component:
``` php
<x-laravel-admin::stats-section title="Another title">
    <x-laravel-admin::stats-item count="50" label="Lorem" icon="fa fa-user"/>
    <x-laravel-admin::stats-item count="50" label="Lorem"/>
    <x-laravel-admin::stats-item count="50" label="Lorem"/>
    <x-laravel-admin::stats-item/>
</x-laravel-admin::stats-section>
```
![stats-section](https://user-images.githubusercontent.com/16212149/95416732-23a7c600-0955-11eb-9de8-6393fe1596e0.png)

Form field components
``` php
<x-text-field name="text" value="Some Value" label="Text Field" tooltip="Tooltip" placeholder="lorem"/>
<x-textarea-field name="textarea" value="Some Text" label="Textarea Field"/>
<x-select-field name="select" :data="[1,2,3,4,5]" label="Select Field"/>
<x-password-field name="password" label="Password Field"/>
<x-number-field name="number" value="5" label="Number Field" min="0"/>
<x-hidden-field name="hidden"/>
<x-file-field name="file" label="File Field"/>
<x-email-field name="email" value="email@example.com" label="Email Field"/>
<x-date-field name="date" value="2020-12-12" label="Date Field"/>
<x-checkbox-field name="checkbox" label="Checkbox Field" value="1"/>
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
