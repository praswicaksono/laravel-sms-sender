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

Route::group(['middleware' => ['web','auth'], 'prefix' => config('backpack.base.route_prefix')], function () {
    Route::get('/', 'DashboardController@indexAction');

    Route::get('/sms/send', 'SmsController@indexAction')->name('sms.index');
    Route::post('/sms/send', 'SmsController@sendAction')->name('sms.send');

    Route::get('/buy/credit', 'BuyCreditController@indexAction')->name('buy.credit.index');
    Route::post('/buy/credit', 'BuyCreditController@buyAction')->name('buy.credit.pay');
});
