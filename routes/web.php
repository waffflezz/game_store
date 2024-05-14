<?php

use App\Http\Controllers\Admin\GameController;
use App\Http\Controllers\Admin\GenreController;
use App\Http\Controllers\Admin\IndexController;
use App\Http\Controllers\Admin\PlatformController;
use App\Http\Controllers\Main\CartController;
use Illuminate\Support\Facades\Route;

Route::get('/', [\App\Http\Controllers\Main\IndexController::class, 'index'])->name('main.index');
Route::get('/show/{game}', [\App\Http\Controllers\Main\IndexController::class, 'show'])->name('main.show');

Route::get('/cart', [CartController::class, 'show'])->name('cart.show');
Route::post('/cart/{game}', [CartController::class, 'store'])->name('cart.add');
Route::delete('/cart/{game}', [CartController::class, 'delete'])->name('cart.delete');
Route::post('/cart', [CartController::class, 'buy'])->name('cart.buy');

Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/', IndexController::class)->name('main.index');
    Route::resources([
        'platform' => PlatformController::class,
        'genre' => GenreController::class,
        'game' => GameController::class
    ]);
});

Route::apiResource('/api/game', \App\Http\Controllers\Api\GameController::class);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
