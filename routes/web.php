<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Auth::routes();

/*--------- Admin Route -----------*/
Route::group(
    [
        'middleware' => ['auth','admin']
    ],
    function () {
        include_once 'admin/admin.php';
    }
);
/*--------- !Admin Route ----------*/

/*--------- General Route -----------*/
Route::group(
    [
        'middleware' => ['auth']
    ],
    function () {
        include_once 'general/general.php';
    }
);
/*--------- !General Route ----------*/


/*---------- Extra Route ----------*/
    include_once 'extra/extra.php';
/*--------- !Extra Route ----------*/


