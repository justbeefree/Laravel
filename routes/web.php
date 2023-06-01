<?php

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


//страница приветствия
Route::get('/', function () {
    return view('welcome');
});


//страница о проекте
Route::get('/about/', function () {
    return view('about');
});

//страница со списком новостей
Route::get('/news/', function () {
    return view('news.index');
});

//детальная страница новости
Route::get('/news/{id}', function () {
    return view('news.detail');
});
