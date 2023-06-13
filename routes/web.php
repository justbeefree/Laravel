<?php

use App\Http\Controllers\MainController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\PersonalController;
use App\Http\Controllers\OrderController;

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

// главная страница
Route::get('/', [MainController::class, 'index'])->name('main');

// Список катгорий новостей
Route::get('/news', [NewsController::class, 'index'])->name('news');
//роут принимающий данные для создания новости
Route::post('/news', [NewsController::class, 'store'])->name('news.store');
// создание новости
Route::get('/news/create', [NewsController::class, 'create'])->name('news.create');
// Список новостей конкртеной категории
Route::get('/news/{category_code}', [NewsController::class, 'list'])->name('news.list');
// деталка новости
Route::get('/news/{category_code}/{id}', [NewsController::class, 'show'])->name('news.show');
//редактирование новости
Route::get('/news/{category_code}/{id}/edit', [NewsController::class, 'edit'])->name('news.edit');

//страница авторизации
Route::get('/personal', [PersonalController::class, 'index'])->name('personal');

Route::post('/personal', [PersonalController::class, 'auth'])->name('personal.auth');


// Страница с формой заказа
Route::get('/order', [OrderController::class, 'index'])->name('order');
Route::post('/order', [OrderController::class, 'store'])->name('order.store');
