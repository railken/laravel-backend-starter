<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/



Route::group(['middleware' => ['cors', 'errors', 'logger'], 'prefix' => 'v1'], function() {


	Route::post('/sign-in', ['as' => 'login', 'uses' => '\Api\Http\Controllers\Auth\SignInController@signIn']);
	Route::post('/sign-up', ['uses' => '\Api\Http\Controllers\Auth\RegistrationController@index']);
    Route::post('/confirm-email', ['uses' => '\Api\Http\Controllers\Auth\RegistrationController@confirmEmail']);
    Route::post('/request-confirm-email', ['uses' => '\Api\Http\Controllers\Auth\RegistrationController@requestConfirmEmail']);

    Route::post('/oauth/{name}/access_token', ['uses' => '\Api\Http\Controllers\Auth\SignInController@accessToken']);
    Route::post('/oauth/{name}/exchange_token', ['uses' => '\Api\Http\Controllers\Auth\SignInController@exchangeToken']);

    Route::post('/files/upload', ['uses' => '\Api\Http\Controllers\File\FilesController@upload']);
    Route::get('/files/{token}', ['uses' => '\Api\Http\Controllers\File\FilesController@get']);
    Route::delete('/files/{token}', ['uses' => '\Api\Http\Controllers\File\FilesController@remove']);


    Route::group(['middleware' => ['auth:api']], function() {

        Route::group(['prefix' => 'notifications'], function() {
            Route::get('/', ['uses' => '\Api\Http\Controllers\User\NotificationsController@index']);
            Route::get('/{id}', ['uses' => '\Api\Http\Controllers\User\NotificationsController@show']);
            Route::post('/{id}/read', ['uses' => '\Api\Http\Controllers\User\NotificationsController@markAsRead']);
            Route::post('/{id}/unread', ['uses' => '\Api\Http\Controllers\User\NotificationsController@markAsUnread']);
        });

        Route::get('/user', ['uses' => '\Api\Http\Controllers\User\UserController@index']);
    });


    Route::group(['middleware' => ['auth:api', 'admin'], 'prefix' => 'admin'], function() {

        Route::post('/files/upload', ['uses' => '\Api\Http\Controllers\Admin\FilesController@upload']);
        Route::get('/files/{id}', ['uses' => '\Api\Http\Controllers\Admin\FilesController@show']);
        Route::delete('/files/{id}', ['uses' => '\Api\Http\Controllers\Admin\FilesController@remove']);


        Route::group(['prefix' => 'configs'], function() {
            Route::get('/', ['uses' => '\Api\Http\Controllers\Admin\ConfigsController@index']);
            Route::patch('/', ['uses' => '\Api\Http\Controllers\Admin\ConfigsController@update']);
        });

        Route::group(['prefix' => 'users'], function() {
            Route::get('/', ['uses' => '\Api\Http\Controllers\Admin\UsersController@index']);
            Route::post('/', ['uses' => '\Api\Http\Controllers\Admin\UsersController@create']);
            Route::put('/{id}', ['uses' => '\Api\Http\Controllers\Admin\UsersController@update']);
            Route::delete('/{id}', ['uses' => '\Api\Http\Controllers\Admin\UsersController@remove']);
            Route::get('/{id}', ['uses' => '\Api\Http\Controllers\Admin\UsersController@show']);
        });

        Route::group(['prefix' => 'addresses'], function() {
            Route::get('/', ['uses' => '\Api\Http\Controllers\Admin\AddressesController@index']);
            Route::post('/', ['uses' => '\Api\Http\Controllers\Admin\AddressesController@create']);
            Route::put('/{id}', ['uses' => '\Api\Http\Controllers\Admin\AddressesController@update']);
            Route::delete('/{id}', ['uses' => '\Api\Http\Controllers\Admin\AddressesController@remove']);
            Route::get('/{id}', ['uses' => '\Api\Http\Controllers\Admin\AddressesController@show']);
        });

        Route::group(['prefix' => 'files'], function() {
            Route::get('/', ['uses' => '\Api\Http\Controllers\Admin\FilesController@index']);
            Route::post('/', ['uses' => '\Api\Http\Controllers\Admin\FilesController@create']);
            Route::put('/{id}', ['uses' => '\Api\Http\Controllers\Admin\FilesController@update']);
            Route::delete('/{id}', ['uses' => '\Api\Http\Controllers\Admin\FilesController@remove']);
            Route::get('/{id}', ['uses' => '\Api\Http\Controllers\Admin\FilesController@show']);
        });

        Route::group(['prefix' => 'http-logs'], function() {
            Route::get('/', ['uses' => '\Api\Http\Controllers\Admin\HttpLogsController@index']);
            Route::post('/', ['uses' => '\Api\Http\Controllers\Admin\HttpLogsController@create']);
            Route::put('/{id}', ['uses' => '\Api\Http\Controllers\Admin\HttpLogsController@update']);
            Route::delete('/{id}', ['uses' => '\Api\Http\Controllers\Admin\HttpLogsController@remove']);
            Route::get('/{id}', ['uses' => '\Api\Http\Controllers\Admin\HttpLogsController@show']);
        });

        Route::group(['prefix' => 'logs'], function() {
            Route::get('/', ['uses' => '\Api\Http\Controllers\Admin\LogsController@index']);
            Route::delete('/{id}', ['uses' => '\Api\Http\Controllers\Admin\LogsController@remove']);
            Route::get('/{id}', ['uses' => '\Api\Http\Controllers\Admin\LogsController@show']);
        });
        
        Route::group(['prefix' => 'mail-logs'], function() {
            Route::get('/', ['uses' => '\Api\Http\Controllers\Admin\MailLogsController@index']);
            Route::delete('/{id}', ['uses' => '\Api\Http\Controllers\Admin\MailLogsController@remove']);
            Route::get('/{id}', ['uses' => '\Api\Http\Controllers\Admin\MailLogsController@show']);
        });
    });
});
