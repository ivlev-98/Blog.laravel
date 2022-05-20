<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\LikePostController;
use App\Http\Controllers\CommentLikeController;
use App\Http\Controllers\BookmarkController;
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
Route::get('/categories',[CategoryController::class, 'index'])->name('category.index');
Route::group([
    'prefix' => '/category',
    'as' => 'category.',
    'controller' => CategoryController::class
    ], function() {
        Route::get('/create', 'create')->name('create');
        Route::post('/store', 'store')->name('store');
        Route::delete('/{category}/delete', 'destroy')->name('delete');
        Route::get('/{category}/edit', 'edit')->name('edit');
        Route::patch('/{category}/update', 'update')->name('update');
        Route::get('/{category}', 'show')->name('show');
});
Route::resource('/post', PostController::class);
Route::post('/post/{post}/comment', [CommentController::class, 'store'])->name('post.comment');
Route::get('/post/{post}/like', LikePostController::class)->name('post.like');
Route::get('post/{post}/bookmark', [BookmarkController::class, 'store'])->name('post.bookmark');
Route::get('/comment/{comment}/like', CommentLikeController::class)->name('comment.like');
Route::delete('/comment/{comment}', [CommentController::class, 'destroy'])->name('comment.delete');
Route::resource('/home', HomeController::class);
