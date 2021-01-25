<?php

use Devfaysal\LaravelAdmin\Http\Controllers\AdminController;
use Devfaysal\LaravelAdmin\Http\Controllers\DashboardController;
use Devfaysal\LaravelAdmin\Http\Controllers\ExampleController;
use Devfaysal\LaravelAdmin\Http\Controllers\LoginController;
use Devfaysal\LaravelAdmin\Http\Controllers\PasswordController;
use Devfaysal\LaravelAdmin\Http\Controllers\PermissionController;
use Devfaysal\LaravelAdmin\Http\Controllers\RoleController;
use Devfaysal\LaravelAdmin\Http\Controllers\UserController;
use Devfaysal\LaravelAdmin\LaravelAdmin;
use Rap2hpoutre\LaravelLogViewer\LogViewerController;

Route::middleware(['web'])->prefix(LaravelAdmin::prefix())->group(function () {
    Route::get('/', function(){
        return redirect(route('admins.login'));
    });
    Route::get('/login', [LoginController::class, 'show'])->name('admins.login');
    Route::post('/login', [LoginController::class, 'login']);

    Route::group(['middleware' => ['admin.auth:admin','permission:access_admin_dashboard']], function () {
        Route::view('/example', 'laravel-admin::formFields');
        Route::post('/example', ExampleController::class);
        Route::post('/logout', [LoginController::class, 'logout'])->name('admins.logout');
        Route::get('/password/change', [PasswordController::class, 'index'])->name('admins.changePassword');
        Route::patch('/password/change', [PasswordController::class, 'update'])->name('admins.updatePassword');
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('admins.dashboard');

        Route::get('/profile', function(){
            return abort(404);
        })->name('admins.profile');
        Route::get('/settings', function(){
            return abort(404);
        })->name('admins.settings');

        Route::group(['middleware' => ['permission:manage_admins']], function(){
            Route::get('/errorlogs', [LogViewerController::class,'index'])->middleware('permission:manage_error_logs');

            //Admins
            Route::get('/admins', [AdminController::class, 'index']);
            Route::get('/admins/datatable', [AdminController::class, 'datatable'])->name('admins.datatable');
            Route::get('/admins/create', [AdminController::class, 'create'])->name('admins.create');
            Route::post('/admins', [AdminController::class, 'store']);
            Route::get('/admins/{admin}', [AdminController::class, 'show'])->name('admins.show');
            Route::get('/admins/{admin}/edit', [AdminController::class, 'edit'])->name('admins.edit');
            Route::patch('/admins/{admin}', [AdminController::class, 'update']);
            Route::delete('/admins/{admin}', [AdminController::class, 'destroy']);
            Route::get('/admins/{admin}/restore', [AdminController::class, 'restore'])->name('admins.restore');

            //Permissions
            Route::get('/permissions', [PermissionController::class, 'index']);
            Route::get('/permissions/datatable', [PermissionController::class, 'datatable'])->name('permissions.datatable');
            Route::get('/permissions/create', [PermissionController::class, 'create']);
            Route::post('/permissions', [PermissionController::class, 'store']);

            //Roles
            Route::get('/roles', [RoleController::class, 'index']);
            Route::get('/roles/datatable', [RoleController::class, 'datatable'])->name('roles.datatable');
            Route::get('/roles/create', [RoleController::class, 'create'])->name('roles.create');
            Route::post('/roles', [RoleController::class, 'store']);
            Route::get('/roles/{role}', [RoleController::class, 'show'])->name('roles.show');
            Route::get('/roles/{role}/edit', [RoleController::class, 'edit'])->name('roles.edit');
            Route::patch('/roles/{role}', [RoleController::class, 'update']);
        });
    });
});