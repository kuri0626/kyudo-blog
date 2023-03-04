<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\BbController;
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
//管理者とそれ以外の認証機能
/*Route::group(['prefix' => 'admin', 'middleware' => ['auth', 'can:admin']], function () {
    Route::get('/articles/create', function () {
        return 'admin only';
    });
});
*/

//ログイン画面
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::controller(ArticleController::class)->group(function(){
   
    //投稿一覧ページ
   Route::get('/', 'index')->name('index');
    //自己紹介ページ
   Route::get('/articles/introduction', 'introduction')->name('introduction');
   //管理者用ページの投稿機能
   Route::post('/articles', 'store')->name('store');
   //管理者用ページから編集画面への遷移
   Route::get('/articles/edit', 'transitionToEdit')->name('transitionToEdit');
   //編集画面から編集実行画面への遷移
   Route::get('/articles/{article}/compile', 'transitionToCompile')->name('transitionToCompile');
   //管理者用ページから削除画面への遷移
   Route::get('/articles/delete', 'transitionToDelete')->name('transitionToDelete');
   //管理者用ページ
   Route::get('/articles/create', 'create')->middleware(['auth'])->name('create');
   //タグ検索機能
   Route::post('/articles/search', 'search')->name('search');
   //投稿詳細ページ
   Route::get('/articles/{article}', 'show')->name('show');
   //投稿のアップデート
   Route::put('/articles/{article}', 'update')->name('update');
   //投稿の削除機能
   Route::delete('/articles/{article}', 'deleteArticle')->name('deleteArticle');
});

Route::controller(CategoryController::class)->group(function(){
    //カテゴリー別投稿一覧ページ
    Route::get('/categories/{category}', 'index')->name('index');
});

Route::resource('/bbs/bbs', BbController::class);

Route::middleware('auth')->group(function (){
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
