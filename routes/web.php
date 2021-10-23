<?php

use App\Http\Controllers\TestRedisController;
use App\Http\Controllers\UserController;
use App\Models\Blog;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    // $redis = app()->make('redis');
    // $redis->set("key1","keyValue");
    // return $redis->get("key1");
    // print_r(app()->make('redis'));

    $articles = Blog::all();

    return view('welcome',compact('articles'));
});

Route::get('user-profile/',[UserController::class,'showProfile']);

Route::get('/article/{id}', [TestRedisController::class,'index']);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
