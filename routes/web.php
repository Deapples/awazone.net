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
//pay stage 2
Route::get('/pay2', 'StageOnepaymentsController@payStageTwo');
Route::get('/pay2', 'StageOnepaymentsController@payStageThree');
Route::get('/pay2', 'StageOnepaymentsController@payStageFour');
Route::get('/pay2', 'StageOnepaymentsController@payStageFive');

//stage 2 pairing
Route::get('/pair2', 'StagesController@stageTwo');
Route::get('/pair2', 'StagesController@stageThree');
Route::get('/pair2', 'StagesController@stageFour');
Route::get('/pair2', 'StagesController@stageFive');


//get tree

Route::get('/tree', 'TreesController@getTree');

//upgrade route
Route::get('/upgrade', 'UgradesController@showUpgrade');

Route::get('/profile', 'ProfilesController@showProfile');

Route::get('/transactions', 'TransactionsController@showTransactions');

Route::get('/withdraw', 'withdrawEarningsController@showWithdraw');

Route::post('/withdrawal', 'withdrawEarningsController@withdrawFunds');

Route::get('/incentives', 'IncentivesController@showIncentive');

Route::post('/package', 'UgradesController@createPackage');

Route::get('/test', 'TestsController@sayHello');


Route::get('/packagepayment', 'PaymentsController@packagesPayment');

Route::get('/forgetpassword', 'ForgetPasswordsController@forgetPassword');

Route::post('/resetpassword', 'ForgetPasswordsController@resetPassword');