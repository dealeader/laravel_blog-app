<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Admin\TagController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\Personal\Comment\CommentController;
use App\Http\Controllers\Personal\Like\LikeController;
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

Route::get('/', [MainController::class, 'index'])->name('main');

Route::group(['namespace' => 'Post', 'prefix' => 'posts'], function () {
    Route::get('/', [App\Http\Controllers\Post\MainController::class, 'index'])->name('posts.index');
    Route::get('/{post}', [App\Http\Controllers\Post\MainController::class, 'show'])->name('posts.show');

    Route::group(['namespace' => 'Comment', 'prefix' => '{post}/comments'], function () {
        Route::post('/', [App\Http\Controllers\Post\Comment\CommentController::class, 'store'])->name('posts.comment.store');
    });

    Route::group(['namespace' => 'Like', 'prefix' => '{post}/likes'], function () {
        Route::post('/', [App\Http\Controllers\Post\Like\LikeController::class, 'store'])->name('posts.like.store');

    });
});

Auth::routes(['verify' => true]);

Route::group(['namespace' => 'Personal', 'prefix' => 'personal', 'middleware' => ['auth', ]], function () {
    Route::group([], function () {
        Route::get('/', [App\Http\Controllers\Personal\Comment\CommentController::class, 'index'])->name('personal.main');
    });

    Route::group(['namespace' => 'Like', 'prefix' => 'likes'], function () {
        Route::get('/', [LikeController::class, 'index'])->name('personal.likes.index');
        Route::delete('/{post}', [LikeController::class, 'destroy'])->name('personal.likes.destroy');
    });

    Route::group(['namespace' => 'Comment', 'prefix' => 'comments'], function () {
        Route::get('/', [App\Http\Controllers\Personal\Comment\CommentController::class, 'index'])->name('personal.comments.index');
        Route::get('/{comment}/edit', [App\Http\Controllers\Personal\Comment\CommentController::class, 'edit'])->name('personal.comments.edit');
        Route::patch('/{comment}', [App\Http\Controllers\Personal\Comment\CommentController::class, 'update'])->name('personal.comments.update');
        Route::delete('/{comment}', [App\Http\Controllers\Personal\Comment\CommentController::class, 'destroy'])->name('personal.comments.destroy');
    });
});

Route::group(['namespace' => 'Admin', 'prefix' => 'admin', 'middleware' => ['auth', 'admin']], function () {
    Route::group([], function () {
        Route::get('/', [AdminController::class, 'index'])->name('admin.main');
    });

    Route::group(['prefix' => 'categories'], function () {
        Route::get('/', [CategoryController::class, 'index'])->name('admin.categories');
        Route::get('/create', [CategoryController::class, 'create'])->name('admin.categories.create');
        Route::post('/', [CategoryController::class, 'store'])->name('admin.categories.store');
        Route::get('/{category}', [CategoryController::class, 'show'])->name('admin.categories.show');
        Route::get('/{category}/edit', [CategoryController::class, 'edit'])->name('admin.categories.edit');
        Route::patch('/{category}', [CategoryController::class, 'update'])->name('admin.categories.update');
        Route::delete('/{category}', [CategoryController::class, 'destroy'])->name('admin.categories.destroy');
    });

    Route::group(['prefix' => 'tags'], function () {
        Route::get('/', [TagController::class, 'index'])->name('admin.tags');
        Route::get('/create', [TagController::class, 'create'])->name('admin.tags.create');
        Route::post('/', [TagController::class, 'store'])->name('admin.tags.store');
        Route::get('/{tag}', [TagController::class, 'show'])->name('admin.tags.show');
        Route::get('/{tag}/edit', [TagController::class, 'edit'])->name('admin.tags.edit');
        Route::patch('/{tag}', [TagController::class, 'update'])->name('admin.tags.update');
        Route::delete('/{tag}', [TagController::class, 'destroy'])->name('admin.tags.destroy');
    });

    Route::group(['prefix' => 'posts'], function () {
        Route::get('/', [PostController::class, 'index'])->name('admin.posts');
        Route::get('/create', [PostController::class, 'create'])->name('admin.posts.create');
        Route::post('/', [PostController::class, 'store'])->name('admin.posts.store');
        Route::get('/{post}', [PostController::class, 'show'])->name('admin.posts.show');
        Route::get('/{post}/edit', [PostController::class, 'edit'])->name('admin.posts.edit');
        Route::patch('/{post}', [PostController::class, 'update'])->name('admin.posts.update');
        Route::delete('/{post}', [PostController::class, 'destroy'])->name('admin.posts.destroy');
    });

    Route::group(['prefix' => 'users'], function () {
        Route::get('/', [UserController::class, 'index'])->name('admin.users');
        Route::get('/create', [UserController::class, 'create'])->name('admin.users.create');
        Route::post('/', [UserController::class, 'store'])->name('admin.users.store');
        Route::get('/{user}', [UserController::class, 'show'])->name('admin.users.show');
        Route::get('/{user}/edit', [UserController::class, 'edit'])->name('admin.users.edit');
        Route::patch('/{user}', [UserController::class, 'update'])->name('admin.users.update');
        Route::delete('/{user}', [UserController::class, 'destroy'])->name('admin.users.destroy');
    });
});
