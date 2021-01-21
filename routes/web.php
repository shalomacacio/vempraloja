<?php

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

Route::get('/', 'SiteController@home')->name('site.home');
Route::get('/offer/{id}', 'SiteController@offer')->name('site.offer');
Route::get('/black', 'SiteController@black')->name('site.black');
Route::get('/search', 'SiteController@search')->name('site.search');
Route::get('/cursos', 'SiteController@cursos')->name('site.cursos');

Route::get('/login', 'AuthController@login')->name('login');
Route::post('/auth', 'AuthController@auth')->name('auth');

Route::group([ 'prefix' => 'admin' ,'middleware' => ['auth']], function () {

    Route::get('/logout', 'AuthController@logout')->name('login');
    Route::resource('links', 'LinksController');
    Route::resource('products', 'ProductsController');
    Route::resource('offers', 'OffersController');
    Route::resource('stores', 'StoresController');
    Route::resource('categories', 'CategoriesController');

    // Route::get('/ofertas', 'OffersController@getByCategory')->name('ofertas');
    // Route::get('/categorias', 'OffersController@categorias')->name('categorias');
});
  
