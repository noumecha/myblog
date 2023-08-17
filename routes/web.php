<?php

use Illuminate\Support\Facades\Auth;
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
Route::post('/comments/store', 'App\Http\Controllers\CommentController@store')->name('comments.store');

Route::middleware('admin')->group(function () {

    // route for admin
    Route::get('/admin', 'App\Http\Controllers\Admin\AdminHomeController@index')->name('admin.home.index');
    Route::get('/admin/articles','App\Http\Controllers\Admin\AdminArticleController@index')->name('admin.article.index');
    Route::post('/admin/articles/store','App\Http\Controllers\Admin\AdminArticleController@store')->name('admin.article.store');
    Route::delete('/admin/articles/{id}/delete','App\Http\Controllers\Admin\AdminArticleController@delete')->name('admin.article.delete');
    Route::get('/admin/articles/{id}/edit','App\Http\Controllers\Admin\AdminArticleController@edit')->name('admin.article.edit');
    Route::put('/admin/articles/{id}/update','App\Http\Controllers\Admin\AdminArticleController@update')->name('admin.article.update');

    // route for categories
    Route::get('/admin/categories','App\Http\Controllers\Admin\AdminCategorieController@index')->name('admin.categorie.index');
    Route::post('/admin/categories/store','App\Http\Controllers\Admin\AdminCategorieController@store')->name('admin.categorie.store');
    Route::delete('/admin/categories/{id}/delete','App\Http\Controllers\Admin\AdminCategorieController@delete')->name('admin.categorie.delete');
    Route::get('/admin/categories/{id}/edit','App\Http\Controllers\Admin\AdminCategorieController@edit')->name('admin.categorie.edit');
    Route::put('/admin/categories/{id}/update','App\Http\Controllers\Admin\AdminCategorieController@update')->name('admin.categorie.update');


    // route for tags
    Route::get('/admin/tags','App\Http\Controllers\Admin\AdminTagController@index')->name('admin.tag.index');
    Route::post('/admin/tags/store','App\Http\Controllers\Admin\AdminTagController@store')->name('admin.tag.store');
    Route::delete('/admin/tags/{id}/delete','App\Http\Controllers\Admin\AdminTagController@delete')->name('admin.tag.delete');
    Route::get('/admin/tags/{id}/edit','App\Http\Controllers\Admin\AdminTagController@edit')->name('admin.tag.edit');
    Route::put('/admin/tags/{id}/update','App\Http\Controllers\Admin\AdminTagController@update')->name('admin.tag.update');

    // route for admin users
    Route::get('/admin/users','App\Http\Controllers\Admin\AdminUserController@index')->name('admin.user.index');
    Route::post('/admin/users/store','App\Http\Controllers\Admin\AdminUserController@store')->name('admin.user.store');
    Route::delete('/admin/users/{id}/delete','App\Http\Controllers\Admin\AdminUserController@delete')->name('admin.user.delete');
    Route::get('/admin/users/{id}/edit','App\Http\Controllers\Admin\AdminUserController@edit')->name('admin.user.edit');
    Route::put('/admin/users/{id}/update','App\Http\Controllers\Admin\AdminArticleController@update')->name('admin.user.update');

});

// route for uploading image from ckeditor :
Route::post('/upload/image', 'App\Http\Controllers\Admin\ImageUploadController@upload');//->name('upload.image');
Route::post('/upload', [App\Http\Controllers\ImageUploadController::class, 'storeImage'])->name('upload.image');

Auth::routes();
