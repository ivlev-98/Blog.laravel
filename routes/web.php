<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\LikePostController;
use App\Http\Controllers\CommentLikeController;

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

Route::get('/', IndexController::class)->name('index');
Route::get('/category/{category}', CategoryController::class)->name('category.show');
Route::resource('/post', PostController::class);
Route::post('/post/{post}/comment', [CommentController::class, 'store'])->name('post.comment');
Route::get('/post/{post}/like', LikePostController::class)->name('post.like');
Route::get('/comment/{comment}/like', CommentLikeController::class)->name('comment.like');
Route::delete('/comment/{comment}', [CommentController::class, 'destroy'])->name('comment.delete');
Route::resource('/home', HomeController::class);
