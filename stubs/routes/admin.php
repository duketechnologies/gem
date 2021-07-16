<?php

use App\Http\Controllers\Admin\AuthController;
use App\Http\Middleware\RedirectIfNotAdmin;
use Illuminate\Support\Facades\Route;

Route::group([
    'middleware' => ['auth', RedirectIfNotAdmin::class],
    'prefix' => 'admin',
    'as' => 'admin.',
], function () {
    Route::view('/', 'admin.base.dashboard')->name('index');
});

Route::get('/login', [AuthController::class, 'create'])
    ->middleware('guest');

Route::post('/login', [AuthController::class, 'store'])
    ->middleware('guest')
    ->name('admin.login.store');

Route::get('/logout', [AuthController::class, 'destroy'])
    ->middleware('auth')
    ->name('admin.logout');
