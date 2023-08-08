<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BlogController;

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

// ブログ一覧画面を表示
Route::get('/', [BlogController::class, 'showList'])->name('blogs');

// ブログ登録画面を表示
Route::get('/blog/create', [BlogController::class, 'showCreate'])->name('create');

// ブログ登録画面を表示
Route::post('/blog/store', [BlogController::class, 'exeStore'])->name('store');

// ブログ詳細画面を表示
Route::get('/blog/{id}', [BlogController::class, 'showDetail'])->name('show');

// ブログ編集画面を表示
Route::get('/blog/edit/{id}', [BlogController::class, 'showEdit'])->name('edit');
Route::post('/blog/update', [BlogController::class, 'exeUpdate'])->name('update');
