<?php

use App\Http\Controllers\MainController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\PersonalController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\FeedbackController;

use \App\Http\Controllers\Admin\IndexController;
use \App\Http\Controllers\Admin\CategoryController;
use \App\Http\Controllers\Admin\NewsController as AdminNewsController;
use \App\Http\Controllers\Admin\OrderController as AdminOrderController;
use \App\Http\Controllers\Admin\FeedbackController as AdminFeedbackController;
use \App\Http\Controllers\Admin\SourceController;

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
// Список новостей конкртеной категории
Route::get('/news/{category_code}', [NewsController::class, 'list'])->name('news.list');
// деталка новости
Route::get('/news/{category_code}/{id}', [NewsController::class, 'show'])->name('news.show');

//страница авторизации
Route::get('/personal', [PersonalController::class, 'index'])->name('personal');
Route::post('/personal', [PersonalController::class, 'auth'])->name('personal.auth');

// Страница с формой заказа
Route::get('/order', [OrderController::class, 'index'])->name('order');
Route::post('/order', [OrderController::class, 'store'])->name('order.store');

// Страница с формой обратной связи
Route::get('/feedback', [FeedbackController::class, 'index'])->name('feedback');
Route::post('/feedback', [FeedbackController::class, 'store'])->name('feedback.store');

//админка
Route::prefix('admin')->group(function () {


    Route::get('/',[IndexController::class, 'index'])->name('admin.index');

    //Категории
    Route::get('/category',[CategoryController::class, 'index'])->name('admin.category.index');
    Route::post('/category',[CategoryController::class, 'store'])->name('admin.category.store');
    Route::get('/category/create',[CategoryController::class, 'create'])->name('admin.category.create');
    Route::get('/category/{category}/edit',[CategoryController::class, 'edit'])->name('admin.category.edit');
    Route::put('/category/{category}',[CategoryController::class, 'update'])->name('admin.category.update');
    Route::delete('/category/{category}',[CategoryController::class, 'destroy'])->name('admin.category.destroy');

    //Новости
    Route::get('/news',[AdminNewsController::class, 'index'])->name('admin.news.index');
    Route::post('/news',[AdminNewsController::class, 'store'])->name('admin.news.store');
    Route::get('/news/create',[AdminNewsController::class, 'create'])->name('admin.news.create');
    Route::get('/news/{news}/edit',[AdminNewsController::class, 'edit'])->name('admin.news.edit');
    Route::put('/news/{news}',[AdminNewsController::class, 'update'])->name('admin.news.update');
    Route::delete('/news/{news}',[AdminNewsController::class, 'destroy'])->name('admin.news.destroy');

    //Источники
    Route::get('/source',[SourceController::class, 'index'])->name('admin.source.index');
    Route::post('/source',[SourceController::class, 'store'])->name('admin.source.store');
    Route::get('/source/create',[SourceController::class, 'create'])->name('admin.source.create');
    Route::get('/source/{source}/edit',[SourceController::class, 'edit'])->name('admin.source.edit');
    Route::put('/source/{source}',[SourceController::class, 'update'])->name('admin.source.update');
    Route::delete('/source/{source}',[SourceController::class, 'destroy'])->name('admin.source.destroy');


    //Заказы
    Route::get('/order',[AdminOrderController::class, 'index'])->name('admin.order.index');
    Route::post('/order',[AdminOrderController::class, 'store'])->name('admin.order.store');
    Route::get('/order/create',[AdminOrderController::class, 'create'])->name('admin.order.create');
    Route::get('/order/{order}/edit',[AdminOrderController::class, 'edit'])->name('admin.order.edit');
    Route::put('/order/{order}',[AdminOrderController::class, 'update'])->name('admin.order.update');
    Route::delete('/order/{order}',[AdminOrderController::class, 'destroy'])->name('admin.order.destroy');


    //FeedBack
    Route::get('/feedback',[AdminFeedbackController::class, 'index'])->name('admin.feedback.index');
    Route::post('/feedback',[AdminFeedbackController::class, 'store'])->name('admin.feedback.store');
    Route::get('/feedback/create',[AdminFeedbackController::class, 'create'])->name('admin.feedback.create');
    Route::get('/feedback/{feedback}/edit',[AdminFeedbackController::class, 'edit'])->name('admin.feedback.edit');
    Route::put('/feedback/{feedback}',[AdminFeedbackController::class, 'update'])->name('admin.feedback.update');
    Route::delete('/feedback/{feedback}',[AdminFeedbackController::class, 'destroy'])->name('admin.feedback.destroy');
});

