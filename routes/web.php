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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::resource('/article','App\Http\Controllers\ArticleController');
Route::resource('/category','App\Http\Controllers\CategoryController');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/search',[App\Http\Controllers\SearchController::class, 'search'])->name('search');


Route::post('/comment',[App\Http\Controllers\CommentsController::class, 'post'])->name('comment.post');
