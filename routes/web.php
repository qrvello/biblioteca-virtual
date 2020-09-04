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

Route::get('/', 'GuestController@index');

Route::get('/nosotros', 'GuestController@nosotros');

Route::get('/contenidos', 'GuestController@contents');

Route::get('/categorias', 'GuestController@categories');

Route::get('/categoria/{id}', 'GuestController@category_show');

Route::get('admin/categorias', 'AdminController@categories')
    ->name('admin.categories');

Route::get('admin/categorias/crear', 'CategoryController@create');

Route::get('admin/contenido', 'AdminController@contents')
    ->name('admin.content');

Route::get('admin/contenido/crear', 'ContentController@create')
    ->name('create.content');

Route::post('admin/contenido/crear', 'ContentController@store');

Route::get('admin/contenido/editar/{content}', 'ContentController@edit')
    ->name('edit.content');

Route::resource('admin', 'AdminController');

Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');
