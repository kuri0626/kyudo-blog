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
Route::get('/',[ArticleController::class, 'index']);
Route::get('/articles', [ArticleController::class, 'index']);
Route::post('/articles', [ArticleController::class, 'store']);
//Route::get('/articles/create', [ArticleController::class, 'create']);
Route::get('/articles/create', [ArticleController::class, 'create']);
Route::get('/articles/delete', [ArticleController::class, 'delete2']);
Route::get('/articles/{article}', [ArticleController::class, 'show']);
Route::get('/articles/{article}/edit', [ArticleController::class, 'edit']);
Route::put('/articles/{article}', [ArticleController::class, 'update']);
Route::delete('/articles/{article}', [ArticleController::class, 'delete']);
Route::get('/categories/{category}', [CategoryController::class, 'index']);


