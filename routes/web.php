<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{NewsController, CategoryController};
use App\Http\Controllers\Admin\UserController as AdminUserController;
use App\Http\Controllers\Admin\CategoryController as AdminCategoryController;
use App\Http\Controllers\Admin\NewsController as AdminNewsController;
use App\Http\Controllers\Admin\FeedbackController as AdminFeedbackController;
use App\Http\Controllers\Admin\OrderToReceiveDataUploadController as AdminOrderToReceiveDataUploadController;
use App\Http\Controllers\Admin\DataSourceController as AdminDataSourceController;
//use App\Http\Controllers\Account\IndexController as AccountController;
use App\Http\Controllers\AccountController;
use App\Http\Controllers\HomeController;

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

Route::group(['middleware' => 'auth'], function () {
    //admin
    Route::group(['as' => 'admin.', 'prefix' => 'admin', 'middleware' => 'admin'], function() {
        Route::view('/', 'admin.index')
            ->name('index');
        Route::resource('/users', AdminUserController::class);
        Route::resource('/categories', AdminCategoryController::class);
        Route::resource('/news', AdminNewsController::class);
        Route::resource('/feedbacks', AdminFeedbackController::class);
        Route::resource('/ordersToReceiveDataUpload', AdminOrderToReceiveDataUploadController::class)
            ->parameter('ordersToReceiveDataUpload', 'order');
        Route::resource('/dataSources', AdminDataSourceController::class);
    });

    //account
//    Route::get('/account', AccountController::class)
//        ->name('account');
    Route::group(['as' => 'account.', 'prefix' => 'account'], function() {
        Route::get('/', [AccountController::class, 'index'])
            ->name('index');
        Route::get('/edit', [AccountController::class, 'edit'])
            ->name('edit');
        Route::post('/update', [AccountController::class, 'update'])
            ->name('update');
    });

    //logout
    Route::get('logout', function () {
        Auth::logout();
        return redirect()->route('login');
    })->name('logout');
});

//news
Route::get('/news', [NewsController::class, 'index'])
    ->name('news.index');

Route::get('/news/{news}', [NewsController::class, 'show'])
    ->where('news', '\d+')
    ->name('news.show');

//categories
Route::get('/categories', [CategoryController::class, 'index'])
    ->name('categories.index');

Route::get('/categories/{category}', [CategoryController::class, 'show'])
    ->where('category', '\d+')
    ->name('categories.show');

//form
Route::post('/form/feedbacks/add', [AdminFeedbackController::class, 'store'])
    ->name('form.feedbacks.add');

Route::post('/form/ordersToReceiveDataUpload/add', [AdminOrderToReceiveDataUploadController::class, 'store'])
    ->name('form.ordersToReceiveDataUpload.add');

//auth
Auth::routes();

Route::get('/home', [HomeController::class, 'index'])
    ->name('home');

//other
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

Route::get('/collection', function () {
    $arr = [
        1,5,6,7,8,9,1
    ];

    $arr2 = [
        'names' => [
            'Ann', 'Bill', 'John', 'Mike', 'Pike', 'Jule'
        ],
        'ages' => [
            10, 25, 16, 32, 44, 56
        ]
    ];

    $collection = collect($arr);
    $collection2 = collect($arr2);

    dd($collection->get());
});

Route::get('/session', function () {
    if (session()->has('test')) {
        dd(
            session()->all(),
            session()->get('test'),
        );
//        session()->forget(['test']);
    }

    session(['test' => rand(1,1000)]);
});
