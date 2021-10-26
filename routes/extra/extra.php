<?php
use App\Http\Controllers\UserController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\TestRedisController;
use Illuminate\Support\Facades\Route;
use App\Models\Blog;


Route::get('/', function () {
    $articles = Blog::all();
    return view('welcome',compact('articles'));
});

Route::get('user-profile/',[UserController::class,'showProfile']);
Route::get('/article/{id}', [TestRedisController::class,'index']);
Route::get('/store-view-count', [TestRedisController::class,'storeInDb']);

Route::get('/home', [HomeController::class, 'index'])->name('home');
