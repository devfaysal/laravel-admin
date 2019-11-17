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

    Route::group(['middleware' => ['admin','permission:access_admin_dashboard']], function () {

        Route::post('/logout', [LoginController::class, 'logout']);
        
        Route::get('/dashboard', [DashboardController::class, 'index']);

        //Users
        Route::get('/users', [UserController::class, 'index']);
        Route::get('/users/create', [UserController::class, 'create']);
        Route::post('/users', [UserController::class, 'store']);
        Route::get('/users/{user}', [UserController::class, 'show']);
        Route::get('/users/{user}/edit', [UserController::class, 'edit']);
        Route::patch('/users/{user}', [UserController::class, 'update']);
        Route::delete('/users/{user}', [UserController::class, 'destroy']);
        Route::get('/users/{user}/restore', [UserController::class, 'restore']);

        //Permissions
        Route::get('/permissions', [PermissionController::class, 'index']);
        Route::get('/permissions/create', [PermissionController::class, 'create']);
        Route::post('/permissions', [PermissionController::class, 'store']);

        //Roles
        Route::get('/roles', [RoleController::class, 'index']);
        Route::get('/roles/create', [RoleController::class, 'create']);
        Route::post('/roles', [RoleController::class, 'store']);
        Route::get('/roles/{role}', [RoleController::class, 'show']);
        Route::get('/roles/{role}/edit', [RoleController::class, 'edit']);
        Route::patch('/roles/{role}', [RoleController::class, 'update']);

    });
});