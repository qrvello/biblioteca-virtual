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

Route::get('/', 'IndexController@index')
    ->name('index');

Route::get('/nosotros', 'IndexController@nosotros')
    ->name('nosotros');

Route::resource('content','ContentController');

Route::resource('search', 'SearchController' );

Route::get('/register', 'UserController@register')
    ->name('register');

Route::get('/login', 'UserController@login')
    ->name('login');

Route::resource('admin', 'AdminController');

Route::get('admin/create/content', 'AdminController@createContent');

Route::get('admin/create/category', 'AdminController@createCategory');
// Route::get('/content/search', 'ContentController@search');
