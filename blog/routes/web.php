<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\PostsController;
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
    return view('welcome');
});

Route::get('/home', [HomeController::class,'index']);

Route::get('/blog', [BlogController::class,'blog']);

Route::get('/post', [PostController::class, 'create'])->middleware('login','role')->name('post.create');

Route::post('/post', [PostController::class, 'store'])->name('post.store');

Route::get('/login', function () {
    return view('login');
})->name('login');

Route::get('/profile', function (){
    return view('profile');
});

Route::resource('posts', PostsController::class);
