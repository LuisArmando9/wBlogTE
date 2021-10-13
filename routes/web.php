<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Admin\CommentController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Blog\BlogController;
use App\Http\Controllers\Blog\BlogDetailsController;
use App\Http\Controllers\Blog\IndexController;


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



Route::get('/',[IndexController::class, 'index']);
Route::get('/blog',[BlogController::class, 'index']);
Route::get("/blog-details/{id}", [BlogDetailsController::class, 'index'])
->whereNumber('id');

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');
//resource
Route::resource("/post", PostController::class);
Route::resource("/category", CategoryController::class);
Route::resource("/comment", CommentController::class);
