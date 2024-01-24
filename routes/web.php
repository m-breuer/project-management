<?php

use App\Http\Controllers\CustomerController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\TrackingController;

use Illuminate\Support\Facades\Route;

Auth::routes([
    'register' => true,
    'reset' => false,
    'password.request' => false,
]);

Route::middleware(['auth'])->group(function () {


    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

    Route::group(['prefix' => 'customer', 'as' => 'customer.'], function () {
        Route::get('/', [CustomerController::class, 'index'])->name('index');
        Route::get('/create', [CustomerController::class, 'create'])->name('create');
        Route::post('/store', [CustomerController::class, 'store'])->name('store');
        Route::get('{customer}/edit/', [CustomerController::class, 'edit'])->name('edit');
        Route::patch('{customer}/update/', [CustomerController::class, 'update'])->name('update');
        Route::delete('{customer}/delete/', [CustomerController::class, 'destroy'])->name('delete');
    });

    Route::group(['prefix' => 'project', 'as' => 'project.'], function () {
        Route::get('/', [ProjectController::class, 'index'])->name('index');
        Route::get('/create', [ProjectController::class, 'create'])->name('create');
        Route::post('/store', [ProjectController::class, 'store'])->name('store');
        Route::get('{project}/', [ProjectController::class, 'show'])->name('show');
        Route::get('{project}/edit/', [ProjectController::class, 'edit'])->name('edit');
        Route::patch('{project}/update/', [ProjectController::class, 'update'])->name('update');
        Route::delete('{project}/delete/', [ProjectController::class, 'destroy'])->name('delete');

        Route::group(['prefix' => '{project}/task', 'as' => 'task.'], function () {
            Route::get('/create', [TaskController::class, 'create'])->name('create');
            Route::post('/store', [TaskController::class, 'store'])->name('store');
            Route::get('{task}/edit/', [TaskController::class, 'edit'])->name('edit');
            Route::patch('{task}/update/', [TaskController::class, 'update'])->name('update');
            Route::delete('{task}/delete/', [TaskController::class, 'destroy'])->name('delete');

            Route::group(['prefix' => '{task}/tracking', 'as' => 'tracking.'], function () {
                Route::post('/start', [TrackingController::class, 'start'])->name('start');
                Route::patch('{tracking}/stop', [TrackingController::class, 'stop'])->name('stop');
            });
        });
    });
});
