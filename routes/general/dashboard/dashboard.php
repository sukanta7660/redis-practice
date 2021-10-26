<?php

use App\Http\Controllers\User\Dashboard\DashboardController;
use Illuminate\Support\Facades\Route;

Route::group(
    [
        'prefix' => '',
        'as' => 'dashboard.'
    ],
    function () {
        Route::get('dashboard', [DashboardController::class, 'index'])->name('index');
    }
);
