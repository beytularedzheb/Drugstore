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

            Route::resource('ward', 'WardController', ['names' => [
                    'store' => 'ward.store',
                    'update' => 'ward.update',
                    'destroy' => 'ward.destroy'
            ]]);

            Route::resource('patient', 'PatientController', ['names' => [
                    'store' => 'patient.store',
                    'update' => 'patient.update',
                    'destroy' => 'patient.destroy'
            ]]);

            Route::resource('productCategory', 'ProductCategoryController', ['names' => [
                    'store' => 'productCategory.store',
                    'update' => 'productCategory.update',
                    'destroy' => 'productCategory.destroy'
            ]]);

            Route::resource('product', 'ProductController', ['names' => [
                    'store' => 'product.store',
                    'update' => 'product.update',
                    'destroy' => 'product.destroy'
            ]]);
            
            Route::resource('storehouse', 'StorehouseController', ['names' => [
                    'store' => 'storehouse.store',
                    'update' => 'storehouse.update',
                    'destroy' => 'storehouse.destroy'
            ]]);

            Route::resource('productProvider', 'ProductProviderController', ['names' => [
                    'store' => 'productProvider.store',
                    'update' => 'productProvider.update',
                    'destroy' => 'productProvider.destroy'
            ]]);
            
            Route::resource('pharmacyOrder', 'PharmacyOrderController', ['names' => [
                    'store' => 'pharmacyOrder.store',
                    'update' => 'pharmacyOrder.update',
                    'destroy' => 'pharmacyOrder.destroy'
            ]]);            
        });
    });
});
