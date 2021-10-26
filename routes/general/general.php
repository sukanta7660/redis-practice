<?php

use Illuminate\Support\Facades\Route;

Route::group(
    [
        'prefix' => 'general',
        'as' => 'general.',
    ],
    function () {
        /*----------- Dashboard --------*/
        include_once 'dashboard/dashboard.php';
        /*----------- Dashboard --------*/
    }
);
