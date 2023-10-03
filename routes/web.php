<?php

use App\Http\Controllers\Admin\ArticleController;
use App\Http\Controllers\Admin\CompanyController;
use App\Http\Controllers\Admin\IndexController;
use App\Http\Controllers\Admin\ReviewCategoryController;
use App\Http\Controllers\Admin\ReviewController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Review\CommentStoreController;
use App\Http\Controllers\Review\LikeStoreController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::group([
    'as' => 'admin.',
    'prefix' => 'admin',
    'middleware' => ['auth', 'admin', 'verified']
], function () {
    Route::group(['namespace' => 'Main'], function () {
        Route::get('/', [IndexController::class, '__invoke'])->name('index');
    });
    Route::resource('review', ReviewController::class);
    Route::resource('category', ReviewCategoryController::class);
    Route::resource('user', UserController::class);
    Route::resource('article', ArticleController::class);
    Route::resource('company', CompanyController::class);
});

Route::group([
    'as' => 'reviews.',
    'prefix' => 'reviews'
], function () {
    Route::resource('review', \App\Http\Controllers\Review\ReviewController::class);
    Route::post('/{review}', [CommentStoreController::class, '__invoke'])->name('comment.store');
    Route::post('/{review}/likes', [LikeStoreController::class, '__invoke'])->name('like.store');
});

Route::group([
    'as' => 'articles.',
    'prefix' => 'articles'
], function () {
    Route::get('/', [ArticleController::class, 'index'])->name('index');
    Route::get('/{article}', [ArticleController::class, 'show'])->name('show');
    Route::post('/{article}/likes', [\App\Http\Controllers\Article\LikeStoreController::class, '__invoke'])->name('like.store');
});

Route::group([
    'as' => 'companies.',
    'prefix' => 'companies'
], function () {
    Route::get('/', [\App\Http\Controllers\Company\CompanyController::class, 'index'])->name('index');
    Route::get('/{company}', [\App\Http\Controllers\Company\CompanyController::class, 'show'])->name('show');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
