<?php

use Devfaysal\LaravelAdmin\Http\Controllers\RoleController;
use Devfaysal\LaravelAdmin\Http\Controllers\UserController;
use Devfaysal\LaravelAdmin\Http\Controllers\DashboardController;
use Devfaysal\LaravelAdmin\Http\Controllers\LoginController;
use Devfaysal\LaravelAdmin\Http\Controllers\PermissionController;

Route::middleware(['web'])->prefix('admin')->group(function () {
    Route::get('/', function(){
        return redirect('/admin/login');
    });
    Route::get('/login', [LoginController::class, 'show']);
    Route::post('/login', [LoginController::class, 'login']);

    Route::group(['middleware' => ['admin','permission:access_admin_dashboard', 'permission:manage_users']], function () {

        Route::post('/logout', [LoginController::class, 'logout']);
        
        Route::get('/dashboard', [DashboardController::class, 'index']);

        Route::group(['middleware' => ['permission:manage_users']], function(){
            //Users
            Route::get('/users', [UserController::class, 'index']);
            Route::get('/users/datatable', [UserController::class, 'datatable'])->name('users.datatable');
            Route::get('/users/create', [UserController::class, 'create'])->name('users.create');
            Route::post('/users', [UserController::class, 'store']);
            Route::get('/users/{user}', [UserController::class, 'show'])->name('users.show');
            Route::get('/users/{user}/edit', [UserController::class, 'edit'])->name('users.edit');
            Route::patch('/users/{user}', [UserController::class, 'update']);
            Route::delete('/users/{user}', [UserController::class, 'destroy']);
            Route::get('/users/{user}/restore', [UserController::class, 'restore'])->name('users.restore');

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