<?php

use Illuminate\Support\Facades\Route;

Route::group(
    [
        'prefix' => 'admin',
        'as' => 'admin.',
    ],
    function () {
        /*----------- Dashboard --------*/
        include_once 'dashboard/dashboard.php';
        /*----------- !Dashboard -------*/

        /*----------- Exam --------*/
        include_once 'exam/exam.php';
        /*----------- !Exam -------*/
    }
);
