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

Route::get('/categoria/{id}', 'GuestController@category_show')
->name('category_show');

Route::get('/categoria/{id}/subcategorias', 'GuestController@subcategories');

Route::get('/categorias/subcategoria/{subcategory:title}/contenidos','GuestController@subcategory_show');

Route::get('admin/categorias', 'AdminController@categories')
    ->name('admin.categories');

Route::get('admin/subcategorias', 'AdminController@subcategories');

Route::get('admin/categorias/crear', 'CategoryController@create');

Route::post('admin/categoria/crear', 'CategoryController@store');

Route::delete('admin/categorias/borrar', 'CategoryController@destroy');

Route::get('admin/categorias/editar/{category}', 'CategoryController@edit')
    ->name('edit.category');

Route::get('admin/contenido', 'AdminController@contents')
    ->name('admin.content');

Route::get('admin/contenido/crear', 'ContentController@create')
    ->name('create.content');

Route::post('admin/contenido/crear', 'ContentController@store');

Route::delete('admin/contenido/borrar', 'ContentController@destroy');

Route::get('admin/contenido/editar/{content}', 'ContentController@edit')
    ->name('edit.content');

Route::resource('admin', 'AdminController');

Route::resource('categorias/admin', 'CategoryController');
Route::resource('/contenidos/admin', 'ContentController');

Route::get('/contenidos/admin/{content}', 'ContentController@show');
// Route::resource('admin/contenido/', 'ContentController');

Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');

Route::get('publicaciones', 'GuestController@publications');
