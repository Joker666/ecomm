<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/
//dd(App::environment());
/*Route::get('/', function(){
   dd(App::environment());
});*/

Route::get('/', array('uses' => 'StoreController@getIndex'));
Route::get('feed', 'RssController@index');

Route::controller('admin/categories', 'CategoriesController');
Route::controller('admin/products', 'ProductsController');
Route::controller('store', 'StoreController');
Route::controller('users', 'UsersController');

Route::post('queue/demo', function(){
   return Queue::marshal();
});

Route::resource('password_resets', 'PasswordResetsController');
Route::controller('password_resets', 'PasswordResetsController');