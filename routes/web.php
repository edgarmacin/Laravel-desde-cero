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

Route::get('/', 'MainController@index')->name('main');

Route::resource('products', 'ProductController');// se puede tener el uso de only o except para indica que rutas queremos

//Route::get('products', 'ProductController@index')->name('products.index');

//Route::get('products/create', 'ProductController@create')->name('products.create');

//Route::post('products/create', 'ProductController@store')->name('products.store');

//Route::get('products/{product}', 'ProductController@show')->name('products.show');
// Route::get('products/{product:title}', 'ProductController@show')->name('products.show') busca por medio del titulo y no del id

//Route::get('products/{product}/edit', 'ProductController@edit')->name('products.edit');

//Route::match(['put' , 'patch'], 'products/{product}', 'ProductController@update')->name('products.update');

//Route::delete('products/{product}', 'ProductController@destroy')->name('products.destroy');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
