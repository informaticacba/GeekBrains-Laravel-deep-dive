<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{NewsController, CategoryController};
use App\Http\Controllers\Admin\CategoryController as AdminCategoryController;
use App\Http\Controllers\Admin\NewsController as AdminNewsController;

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

Route::view('/', 'welcome')
    ->name('home');

Route::view('/info', 'info')
    ->name('info');

//admin
Route::group(['as' => 'admin.', 'prefix' => 'admin'], function() {
    Route::view('/', 'admin.index')
        ->name('index');
    Route::resource('/categories', AdminCategoryController::class);
    Route::resource('/news', AdminNewsController::class);
});

//news
Route::get('/news', [NewsController::class, 'index'])
    ->name('news.index');

Route::get('/news/{id}', [NewsController::class, 'show'])
    ->where('id', '\d+')
    ->name('news.show');

//categories
Route::get('/categories', [CategoryController::class, 'index'])
    ->name('categories.index');

Route::get('/categories/{id}', [CategoryController::class, 'show'])
    ->where('id', '\d+')
    ->name('categories.show');
