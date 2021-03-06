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

Route::get('/', 'ProductsController@index');
Route::get('cart', 'ProductsController@cart');
Route::post('add-to-cart', 'ProductsController@addToCart');
Route::patch('update-cart', 'ProductsController@update');
Route::delete('remove-from-cart', 'ProductsController@remove');
Route::get('check-out', 'ProductsController@checkout');
Route::post('confirm', 'ProductsController@confirm');


Auth::routes();

Route::get('/home', 'ProductsController@index')->name('home');


Route::group(['middleware' => 'auth'], function () {
    Route::get('/orders', 'OrdersController@index');
    Route::get('/order-show/{id}', 'OrdersController@show')->name('order-show');
    Route::resource('dashboard', 'DashboardController');
});

Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');
/*
admin :

- index 
- show

user:

- sumbit order

*/