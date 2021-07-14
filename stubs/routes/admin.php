<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Middleware\RedirectIfNotAdmin;
use Illuminate\Support\Facades\Route;

Route::group([
    'middleware' => ['auth', RedirectIfNotAdmin::class],
    'prefix' => 'admin',
    'name' => 'admin.',
], function () {

});

Route::get('/login', [AuthController::class, 'create'])
                ->middleware('guest')
                ->name('login');

Route::post('/login', [AuthController::class, 'store'])
                ->middleware('guest');

Route::post('/logout', [AuthController::class, 'destroy'])
                ->name('logout')
                ->middleware('auth');