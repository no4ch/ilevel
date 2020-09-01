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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/categories', 'Categories\CategoryController@index')->name('categories');

Route::get('/categories/{id}/products', 'Products\ProductController@index');

Route::get('dashboard', 'Dashboard\DashboardController@index');

Route::name('dashboard.')
    ->namespace('Dashboard')
    ->prefix('dashboard')
    ->middleware(['auth'])
    ->group(function () {
        Route::get('/', 'DashboardController@index');

        Route::namespace('Categories')->group(function (){
            Route::resource('categories', 'CategoryController');
        });

        Route::namespace('Products')->group(function (){
            Route::delete('products/destroy-category/{id}', 'CategoryProductController@destroyCategory')->name('destroyCategory');
            Route::resource('categories.products', 'CategoryProductController');
        });
    });
