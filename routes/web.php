<?php

// use Illuminate\Support\Facades\Route;

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

// Route::get('/', function () {
//     return view('welcome');
// });

// Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');
Route::get('/', 'PagesController@index');
Route::get('/welcome', 'PagesController@index');
Route::get('/login', 'PagesController@login');


Route::get('/trackorder', 'PagesController@trackorder');

Route::get('/signup', 'PagesController@signup');
Route::post('/users/create', 'UsersController@create');


// Route::get('/productdetails/{id}', 'PagesController@productdetails');
Route::get('/mycart', 'CartController@index');
Route::post('/cart/create', 'CartController@create');
Route::get('/productdetails/{id}', 'CartController@show');

Route::get('/profile', 'ProfileController@index');
Route::get('/checkout', 'ProfileController@order');


// Route::get('/mycart', 'PagesController@mycart');
// Route::get('/mycart/{id}', 'ProfileController@cart');
// Route::get('/mycart', 'ProfileController@cart');


Route::get('/welcomeseller', 'PagesController@welcomeseller');

Route::get('/logindetails', 'LoginController@details');
Route::post('/validatelogin', 'LoginController@login');
Route::get('/logout', 'LoginController@logout');
