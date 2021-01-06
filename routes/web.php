<?php

use App\Http\Controllers\Admin\CallbackController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Auth::routes();

Route::group([
    'prefix' => 'admin'
], function () {
    # Index page
    Route::get('/', [CallbackController::class, 'index'])->name('index');
    # Callback
    Route::group([
        'prefix' => 'callback'
    ], function () {
        # Update permission
        Route::group([
            'middleware' => [
                'permission:edit invoice'
            ]
        ], function () {
            Route::get('/update/{id}', [CallbackController::class, 'update'])->name('update');
        });
        # Delete permission
        Route::group([
            'middleware' => 'permission:delete invoice'
        ], function () {
            Route::get('/delete/{id}', [CallbackController::class, 'delete'])->name('delete');
        });
    });
});

Route::get('/', [HomeController::class, 'index'])->name('index');
Route::post('/create', [HomeController::class, 'create'])->name('create');
