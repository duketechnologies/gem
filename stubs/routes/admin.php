<?php

use App\Http\Controllers\Admin\AuthController;
use App\Http\Middleware\RedirectIfNotAdmin;
use Illuminate\Support\Facades\Route;

Route::group([
    'middleware' => ['auth', RedirectIfNotAdmin::class],
    'prefix' => 'admin',
    'name' => 'admin.',
], function () {
    Route::get('/', function () { return 'index'; })->name('index');
});

Route::get('/login', [AuthController::class, 'create'])
    ->middleware('guest');

Route::post('/login', [AuthController::class, 'store'])
    ->middleware('guest')
    ->name('admin.login.store');

Route::post('/logout', [AuthController::class, 'destroy'])
    ->middleware('auth')
    ->name('admin.logout');
