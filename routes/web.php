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

Route::get('/', 'Homecontroller@home');

Route::get('/login', 'LoginController@login_page');
Route::post('/signin', 'LoginController@login');

//dashboard

Route::get('/dashboard', 'DashboardController@dash');

Route::get('/logout', 'LogoutController@logout');

//sign up routes

Route::get('/signup', 'SignUpController@page');
Route::post('/signuserup', 'SignUpController@signup');


Route::get('/mat', 'MatricesController@makeMatrix');
