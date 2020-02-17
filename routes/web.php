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

Route::post('/logout', 'LogoutController@logout');

//sign up routes

Route::get('/signup', 'SignUpController@page');
Route::post('/signup', 'SignUpController@signup');


Route::get('/mat', 'MatricesController@makeMatrix');

//make payment for stage 1

Route::get('/pay1', 'StageOnepaymentsController@payStageOne');

//stage 2 pairing
Route::get('/pair2', 'StagesController@stageTwo');
