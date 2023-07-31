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

/*Route::get('/', function () {
    return view('welcome');
});*/

// primary route for the app :
Route::get('/', 'App\Http\Controllers\HomeController@index')->name('home.index');
Route::get('/contact', 'App\Http\Controllers\ContactController@index')->name('contact.index');
Route::get('/about', 'App\Http\Controllers\AboutController@index')->name('about.index');
// article routes
Route::get('/articles', 'App\Http\Controllers\ArticleController@index')->name('article.index');
Route::get('/articles/{id}', 'App\Http\Controllers\ArticleController@show')->name('article.show');
// route for admin
Route::get('/admin', 'App\Http\Controllers\Admin\AdminHomeController@index')->name('admin.home.index');
Route::get('/admin/articles','App\Http\Controllers\Admin\AdminArticleController@index')->name('admin.article.index');
Route::post('/admin/articles/store','App\Http\Controllers\Admin\AdminArticleController@store')->name('admin.article.store');
Route::delete('/admin/articles/{id}/delete','App\Http\Controllers\Admin\AdminArticleController@delete')->name('admin.article.delete');
Route::get('/admin/articles/{id}/edit','App\Http\Controllers\Admin\AdminArticleController@edit')->name('admin.article.edit');
Route::put('/admin/articles/{id}/update','App\Http\Controllers\Admin\AdminArticleController@update')->name('admin.article.update');
