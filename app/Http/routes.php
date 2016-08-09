<?php

/*
  |--------------------------------------------------------------------------
  | Application Routes
  |--------------------------------------------------------------------------
  |
  | Here is where you can register all of the routes for an application.
  | It's a breeze. Simply tell Laravel the URIs it should respond to
  | and give it the controller to call when that URI is requested.
  |
 */

Route::group(['middlewareGroups' => 'web'], function () {
    
    Route::auth();
    Route::get('/', 'HomeController@index');

    Route::group(['middleware' => 'auth'], function () {
        
        Route::get('/admin', [
            'uses' => 'AdminController@index',
            'as' => 'admin',
        ]);

        Route::group(['prefix' => 'admin'], function () {
            Route::resource('user', 'UserController', [
                'only' => ['index', 'show']
            ]);
            
            Route::resource('pharmacy', 'PharmacyController', ['names' => [
                'store' => 'pharmacy.store',
                'update' => 'pharmacy.update',
                'destroy' => 'pharmacy.destroy'
            ]]);
        });
        
    });
    
});
