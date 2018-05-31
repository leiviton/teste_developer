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
Auth::routes();

Route::group(['prefix'=>'api/v1','middleware' => 'auth:api'],function () {

    Route::group(['prefix' => 'admin','namespace'=>'Api\V1\Admin'],function (){
        /*bookings*/
       Route::post('bookings','BookingsController@store');
       Route::get('sessions/{id}','SessionsController@edit');
    });
    Route::get('user','Api\UserController@authenticated');
});

Route::group(['prefix'=>'api/v1'],function () {
    Route::get('sessions', 'SessionsController@index');
});
Route::get('/home', 'HomeController@index')->name('home');