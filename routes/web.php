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

Route::resource('/contenidos','ContentController');

Route::get('/categorias', 'CategoryController@index');

Route::get('/categoria/{id}', 'CategoryController@show');

Route::get('/register', 'UserController@register')
    ->name('register');

Route::get('/login', 'UserController@login')
    ->name('login');

Route::get('admin/contenidos', 'AdminController@contents')
    ->name('admin.content');

Route::get('admin/categorias', 'AdminController@categories')
->name('admin.categories');

Route::get('admin/contenido/crear', 'ContentController@store')
->name('create.content');

Route::get('admin/contenido/editar/{content}', 'ContentController@edit')
->name('edit.content');

Route::post('admin/contenido/crear', 'ContentController@store');

Route::get('admin/lte', 'AdminController@ver');

Route::resource('admin', 'AdminController');

