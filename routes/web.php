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

Route::get('/users/{id}', function ($id){
    return 'This is user ' .$id;
});

Route::get('/', function () {
    return view('welcome');
});

Route::get('/users/{id}/{name}', function ($id, $name){
    return 'This is user ' .$name.' with an ID of '.$id;
});

Route::get('/about', function () {
    return view('pages.about');
    return view('pages/about'); is also acceptable
});
*/

Route::get('/welcome', function () {
    return view('welcome');
});

Route::get('/add_to_cart{id}',[
    'uses' => 'ProductsController@getAddToCart',
    'as' => 'product.addToCart'
]);

Route::get('/shopping-cart',[
    'uses' => 'ProductsController@getCart',
    'as' => 'product.shoppingCart'
]);

//Route::post('/dashboard','UserController@update_profile');
//Route::get('/dashboard','UserController@dashboard');
Route::get('pages.about', 'PagesController@about');
Route::get('/', 'PagesController@index');
Route::get('/about', 'PagesController@about');
Route::get('/services', 'ServicesController@index');
Route::resource('posts', 'PostsController');
Route::resource('pets', 'PetsController');
Route::resource('products', 'ProductsController');
//Route::resource('users', 'UserController');
Auth::routes();
Route::get('/dashboard', 'DashboardController@index');
Route::post('/dashboard','DashboardController@update');

Route::prefix('admin')->group(function(){
  Route::get('/login', 'Auth\AdminLoginController@showLoginForm')->name('admin.login');
  Route::post('/login', 'Auth\AdminLoginController@login')->name('admin.login.submit');
  Route::get('/users', 'AdminController@showUsers')->name('admin.users');
  Route::delete('/users/{id}', 'AdminController@destroyUser')->name('admin.users.delete');
  Route::get('/products', 'AdminController@showProducts')->name('admin.products');
  //Route::post('/products/{id}', 'AdminController@updateProducts')->name('admin.products.update');
  Route::delete('/products/{id}', 'ProductsController@destroy')->name('admin.products.delete');
  Route::get('/','AdminController@index')->name('admin.dashboard');
});
