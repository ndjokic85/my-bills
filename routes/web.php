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


Route::get('/', function () {
  return view('welcome');
});

Route::group(['middleware' => ['auth']], function () {
  Route::resource('billCategory', 'Front\BillCategoryController');
});

Route::get('/logout', 'Front\SessionsController@destroy')->name('sessions.logout');
Route::get('/login', 'Front\SessionsController@create')->name('sessions.create');
Route::post('/login', 'Front\SessionsController@store')->name('sessions.store');
Route::get('/register', 'Front\RegistrationController@create')->name('registration.create');
Route::post('/register', 'Front\RegistrationController@store')->name('registration.store');
