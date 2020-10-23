<?php

use Illuminate\Support\Facades\Route;


Route::get('/', 'GuestController@index');
Route::get('/nosotros', 'GuestController@nosotros');
Route::get('/contenidos', 'GuestController@contents');
Route::get('/descargar/{content}', 'GuestController@download_file');
Route::get('/categorias', 'GuestController@categories');
Route::get('/categoria/{category}', 'GuestController@category_show')
    ->where('category', '[0-9]+');
Route::get('/categoria/{category}/subcategorias', 'GuestController@subcategories')
    ->where('category', '[0-9]+');
Route::get('/subcategoria/{subcategory}/contenidos', 'GuestController@subcategory_show')
    ->where('subcategory', '[0-9]+');
Route::get('/novedades', 'GuestController@publications');
Route::get('/novedades/categorias', 'GuestController@publications_categories');
Route::get('/novedades/categoria/{category}', 'GuestController@publications_categories_show');


Route::middleware('auth')->group(function () {
    Route::get('/admin', 'Admin\AdminController@index');

    Route::get('/admin/categorias', 'Admin\AdminController@categories');
    Route::get('/admin/categoria/crear', 'Admin\CategoryController@create');
    Route::post('/admin/categoria/crear', 'Admin\CategoryController@store');
    Route::put('/admin/categoria/editar/{category}', 'Admin\CategoryController@update');
    Route::delete('/admin/categoria/borrar/{category}', 'Admin\CategoryController@destroy')
        ->where('category', '[0-9]+');
    Route::get('/admin/categoria/editar/{category}', 'Admin\CategoryController@edit')
        ->where('category', '[0-9]+');

    Route::get('/admin/subcategorias', 'Admin\AdminController@subcategories');
    Route::get('/admin/subcategoria/crear', 'Admin\SubcategoryController@create');
    Route::post('/admin/subcategoria/crear', 'Admin\SubcategoryController@store');
    Route::get('/admin/subcategoria/editar/{subcategory}', 'Admin\SubcategoryController@edit')
        ->where('subcategory', '[0-9]+');
    Route::put('/admin/subcategoria/editar/{subcategory}', 'Admin\SubcategoryController@update')
        ->where('subcategory', '[0-9]+');
    Route::delete('/admin/subcategoria/borrar/{subcategory}', 'Admin\SubcategoryController@destroy')
        ->where('subcategory', '[0-9]+');

    Route::get('/admin/contenidos', 'Admin\AdminController@contents');
    Route::get('/admin/contenido/crear', 'Admin\ContentController@create');
    Route::post('/admin/contenido/crear', 'Admin\ContentController@store');
    Route::put('/admin/contenido/editar/{content}', 'Admin\ContentController@update')
        ->where('content', '[0-9]+');
    Route::delete('/admin/contenido/borrar/{content}', 'Admin\ContentController@destroy')
        ->where('content', '[0-9]+');
    Route::get('/admin/contenido/editar/{content}', 'Admin\ContentController@edit')
        ->where('content', '[0-9]+');
    Route::post('/admin/contenido/borrar/imagen/{content}', 'Admin\ContentController@destroy_image');

    Route::get('/admin/contenidos', 'Admin\AdminController@contents');
    Route::get('/admin/contenido/crear', 'Admin\ContentController@create');
    Route::post('/admin/contenido/crear', 'Admin\ContentController@store');
    Route::put('/admin/contenido/editar/{content}', 'Admin\ContentController@update')
    ->where('content', '[0-9]+');
    Route::delete('/admin/contenido/borrar/{content}', 'Admin\ContentController@destroy')
    ->where('content', '[0-9]+');
    Route::get('/admin/contenido/editar/{content}', 'Admin\ContentController@edit')
    ->where('content', '[0-9]+');

    Route::get('/admin/publicaciones', 'Admin\AdminController@publications');
    Route::get('/admin/publicacion/crear', 'Admin\PublicationController@create');
    Route::post('/admin/publicacion/crear', 'Admin\PublicationController@store');
    Route::put('/admin/publicacion/editar/{publication}', 'Admin\PublicationController@update')
    ->where('publication', '[0-9]+');
    Route::delete('/admin/publicacion/borrar/{publication}', 'Admin\PublicationController@destroy')
    ->where('publication', '[0-9]+');
    Route::get('/admin/publicacion/editar/{publication}', 'Admin\PublicationController@edit')
    ->where('publication', '[0-9]+');
});

Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');
