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

Route::post('registry','Api\V1\Admin\UserController@store');

Route::group(['prefix'=>'api/v1','middleware' => 'auth:api'],function () {
    Route::get('user','Api\UserController@authenticated');
    Route::group(['prefix' => 'admin','namespace'=>'Api\V1\Admin'],function (){
        /*Secret*/
       Route::post('secret/friend','SecretFriendsController@store');
       Route::get('secret/friend','SecretFriendsController@index');
       Route::get('secret/send/{id}','SecretFriendsController@lottery');
       Route::get('secret/friend/{id}','SecretFriendsController@edit');
       Route::put('secret/friend/{id}','SecretFriendsController@update');
       Route::delete('secret/friend/{id}','SecretFriendsController@delete');
       Route::get('secret/lottery/{id}','SecretFriendsController@lottery');
        /*Participant*/
        Route::post('participant','ParticipantsController@store');
        Route::get('participant','ParticipantsController@index');
        Route::get('participant/{id}','ParticipantsController@edit');
        Route::put('participant/{id}','ParticipantsController@update');
        Route::delete('participant/{id}','ParticipantsController@delete');

        /*SecretFriendParticipants*/
        Route::post('secret/friends','SecretFriendParticipantController@store');
        Route::get('secret/friends','SecretFriendParticipantController@index');
        Route::get('secret/friends/{id}','SecretFriendParticipantController@edit');
        Route::put('secret/friends/{id}','SecretFriendParticipantController@update');
        Route::delete('secret/friends/{id}','SecretFriendParticipantController@delete');

        /*Wishlist*/
        Route::post('wishlist','WishlistController@store');
        Route::get('wishlist','WishlistController@index');
        Route::get('wishlist/{id}','WishlistController@edit');
        Route::put('wishlist/{id}','WishlistController@update');
        Route::delete('wishlist/{id}','WishlistController@delete');

        /*Users*/
        Route::post('user','UserController@store');
        Route::get('user','UserController@index');
        Route::get('user/{id}','UserController@edit');
        Route::put('user/{id}','UserController@update');
        Route::delete('user/{id}','UserController@delete');
    });
});

Route::get('/home', 'HomeController@index')->name('home');