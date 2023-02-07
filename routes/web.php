<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\CategoryController;

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
//投稿一覧ページ
Route::get('/',[ArticleController::class, 'index']);
//管理者用ページの投稿機能
Route::post('/articles', [ArticleController::class, 'store']);
//管理者用ページから編集画面への遷移
Route::get('/articles/edit', [ArticleController::class, 'transitionToEdit']);
//編集画面から編集実行画面への遷移
Route::get('/articles/{article}/compile', [ArticleController::class, 'transitionToCompile']);
//管理者用ページから削除画面への遷移
Route::get('/articles/delete', [ArticleController::class, 'transitionToDelete']);
//管理者用ページ
Route::get('/articles/create', [ArticleController::class, 'create']);
//タグ検索機能
Route::post('/articles/search', [ArticleController::class, 'search']);
//投稿詳細ページ
Route::get('/articles/{article}', [ArticleController::class, 'show']);
//投稿のアップデート
Route::put('/articles/{article}', [ArticleController::class, 'update']);
//投稿の削除機能
Route::delete('/articles/{article}', [ArticleController::class, 'deleteArticle']);
//カテゴリー別投稿一覧ページ
Route::get('/categories/{category}', [CategoryController::class, 'index']);


