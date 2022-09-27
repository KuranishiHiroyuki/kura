<?php

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

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

//ホーム画面
Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('/')->middleware('auth','can:General');

Route::group(['middleware' => ['auth', 'can:Admin']], function () {
//ユーザー一覧
Route::get('/list', [App\Http\Controllers\HomeController::class, 'list'])->name('list');
//ユーザー情報編集画面
Route::get('/user_edit/{id}', [App\Http\Controllers\HomeController::class, 'user_edit'])->name('user_edit');
//更新
Route::post('/up/{id}', [App\Http\Controllers\HomeController::class, 'up'])->name('up');
});

//ログアウト
Route::get('/logout', [App\Http\Controllers\HomeController::class, 'logout'])->name('logout');

Route::prefix('items')->group(function () {
    Route::group(['middleware' => ['auth', 'can:General']], function () {
    //一覧画面
    Route::get('/', [App\Http\Controllers\ItemController::class, 'index'])->name('top');
    //詳細画面
    Route::get('/detail/{id}', [App\Http\Controllers\ItemController::class, 'detail'])->name('detail');
    //検索フォーム
    Route::get('/show', [App\Http\Controllers\ItemController::class, 'show'])->name('show');
    //管理画面
    Route::get('/search', [App\Http\Controllers\ItemController::class, 'search'])->name('search');
    });
});
Route::prefix('items')->group(function () {
    Route::group(['middleware' => ['auth', 'can:Admin']], function () {
    //編集画面
    Route::get('/edit/{id}', [App\Http\Controllers\ItemController::class, 'edit'])->name('edit');
    
    //CSVダウンロード
    Route::get('/download', [App\Http\Controllers\ItemController::class, 'download'])->name('csv');
    //CSVアップロード画面
    Route::get('/csv_update', [App\Http\Controllers\ItemController::class, 'csv_up'])->name('csv_update');

    //登録画面
    Route::get('/item_register', [App\Http\Controllers\ItemController::class, 'register'])->name('item_register');
    //登録
    Route::post('/add', [App\Http\Controllers\ItemController::class, 'add'])->name('add');
    //更新
    Route::post('/update/{id}', [App\Http\Controllers\ItemController::class, 'update'])->name('update');
    //削除
    Route::post('/destroy/{id}', [App\Http\Controllers\ItemController::class, 'destroy'])->name('destroy');
    //CSVアップロード
    Route::post('/upload', [App\Http\Controllers\ItemController::class, 'upload'])->name('upload');
});
});