<?php

use Illuminate\Support\Facades\Route;


Route::get('/', 'GuestController@index');
Route::get('/nosotros', 'GuestController@nosotros');
Route::get('/contenidos', 'GuestController@contents');
Route::get('/categorias', 'GuestController@categories');
Route::get('/categoria/{id}', 'GuestController@category_show')
    ->where('id', '[0-9]+');
Route::get('/categoria/{id}/subcategorias', 'GuestController@subcategories')
    ->where('id', '[0-9]+');
Route::get('/subcategoria/{id}/contenidos', 'GuestController@subcategory_show')
    ->where('id', '[0-9]+');
Route::get('/publicaciones', 'GuestController@publications');


Route::middleware('auth')->group(function () {
    Route::get('/admin', 'Admin\AdminController@index');

    Route::get('/admin/categorias', 'Admin\AdminController@categories');
    Route::get('/admin/categoria/crear', 'Admin\CategoryController@create');
    Route::post('/admin/categoria/crear', 'Admin\CategoryController@store');
    Route::put('/admin/categoria/editar/{id}', 'Admin\CategoryController@update');
    Route::delete('/admin/categoria/borrar/{id}', 'Admin\CategoryController@destroy')
        ->where('id', '[0-9]+');
    Route::get('/admin/categoria/editar/{id}', 'Admin\CategoryController@edit')
        ->where('id', '[0-9]+');

    Route::get('/admin/subcategorias', 'Admin\AdminController@subcategories');
    Route::get('/admin/subcategoria/crear', 'Admin\SubcategoryController@create');
    Route::post('/admin/subcategoria/crear', 'Admin\SubcategoryController@store');
    Route::put('/admin/subcategoria/editar/{id}', 'Admin\SubcategoryController@update')
        ->where('id', '[0-9]+');
    Route::delete('/admin/subcategoria/borrar/{id}', 'Admin\SubcategoryController@destroy')
        ->where('id', '[0-9]+');
    Route::get('/admin/subcategoria/editar/{id}', 'Admin\SubcategoryController@edit')
        ->where('id', '[0-9]+');


    Route::get('/admin/contenidos', 'Admin\AdminController@contents');
    Route::get('/admin/contenido/crear', 'Admin\ContentController@create');
    Route::post('/admin/contenido/crear', 'Admin\ContentController@store');
    Route::put('/admin/contenido/crear/{id}', 'Admin\ContentController@update')
        ->where('id','[0-9]+');
    Route::delete('/admin/contenido/borrar/{id}', 'Admin\ContentController@destroy')
        ->where('id', '[0-9]+');
    Route::get('/admin/contenido/editar/{id}', 'Admin\ContentController@edit')
        ->where('id', '[0-9]+');

    Route::get('/admin/publicaciones','Admin\AdminController@publications');
});

Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');
