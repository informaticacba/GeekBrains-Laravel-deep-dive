<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{NewsController, CategoryController, FormController};
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

//form
Route::post('/form/feedback/add', [FormController::class, 'addFeedback'])
    ->name('form.feedback.add');

Route::post('/form/dataUpload', [FormController::class, 'dataUpload'])
    ->name('form.dataUpload');

Route::get('/sql', function () {
    dump(
//            DB::table('news')
//                ->join('categories_has_news as chn', 'news.id', '=', 'chn.news_id')
//                ->join('categories', 'chn.category_id', '=', 'categories.id')
//                ->select('news.*', 'categories.title as categoryTitle')
//                ->get()
        DB::table('news')
//            ->where([
//                ['title', 'like', '%' . request()->get('q') . '%'],
//                ['id', '<', 10]
//            ])
//            ->where('id', '>', 5)
//            ->where('isImage', '=', false)
//            ->orWhere('author', '=', 'Admin')
//            ->whereNotIn('id', [1, 7, 9])
//            ->whereBetween('id', ['3', '7'])
            ->orderBy('id', 'desc')
            ->get()
    );
});
