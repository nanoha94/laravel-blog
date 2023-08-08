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

// ブログ詳細画面を表示
Route::get('/blog/{id}', [BlogController::class, 'showDetail'])->name('show');
