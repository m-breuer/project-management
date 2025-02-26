<?php

use App\Http\Controllers\CustomerController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\TrackingController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Auth::routes([
    'register' => false,
    'reset' => false,
    'password.request' => false,
]);

Route::middleware(['auth'])->group(function () {

    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

    Route::resource('customers', CustomerController::class);
    Route::resource('projects', ProjectController::class);
    Route::resource('projects.tasks', TaskController::class)->except(['index', 'show']);

    Route::prefix('projects/{project}/tasks/{task}/trackings')->group(function () {
        Route::post('start', [TrackingController::class, 'start'])->name('projects.tasks.trackings.start');
        Route::patch('{tracking}/stop', [TrackingController::class, 'stop'])->name('projects.tasks.trackings.stop');
    });
});
