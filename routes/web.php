<?php

use App\Http\Controllers\Admin\ApplicationController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Auth::routes();

Route::group([
    'prefix' => 'admin',
    'middleware' => 'web'
], function () {
    # Index page
    Route::get('/', [ApplicationController::class, 'index'])->name('index');
    # Callback
    Route::group([
        'prefix' => 'application'
    ], function () {
        # Update permission
        Route::group([
            'middleware' => 'permission:edit invoice'
        ], function () {
            Route::get('/update/{application}', [ApplicationController::class, 'update'])->name('update');
        });
        # Delete permission
        Route::group([
            'middleware' => 'permission:delete invoice'
        ], function () {
            Route::get('/delete/{application}', [ApplicationController::class, 'delete'])->name('delete');
        });
    });
});

Route::get('/', [HomeController::class, 'index'])->name('index');
Route::post('/create', [HomeController::class, 'create'])->name('create');
