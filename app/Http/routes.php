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

    Route::group([
        'prefix' => LaravelLocalization::setLocale()], function() {

        Route::auth();

        Route::get('/', 'HomeController@index');

        Route::group(['middleware' => 'auth'], function () {

            Route::group(['prefix' => 'customer'], function () {

                Route::get('/', [
                    'uses' => 'CustomerController@index',
                    'as' => 'customer',
                ]);

                Route::controller('product', 'Customer\ProductController');

                Route::controller('cart', 'Customer\ShoppingCartController');
            });

            Route::group(['middleware' => 'role:admin'], function () {

                Route::group(['prefix' => 'admin'], function () {
                    Route::resource('user', 'UserController', [
                        'only' => ['index', 'show', 'destroy']
                    ]);

                    Route::get('/', [
                        'uses' => 'AdminController@index',
                    ]);

                    Route::get('new-orders', [
                        'uses' => 'AdminController@newOrders',
                    ]);

                    Route::get('confirm-order/{id}', [
                        'uses' => 'AdminController@confirmOrder',
                    ]);

                    Route::get('reject-order/{id}', [
                        'uses' => 'AdminController@rejectOrder',
                    ]);

                    Route::get('update-sender/{id}', 'AdminController@updateSenderName');

                    Route::controller('report', 'ReportController');

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

                    Route::resource('pharmacyOrderLine', 'PharmacyOrderLineController', ['names' => [
                            'store' => 'pharmacyOrderLine.store',
                            'update' => 'pharmacyOrderLine.update',
                            'destroy' => 'pharmacyOrderLine.destroy'
                    ]]);

                    Route::resource('wardOrder', 'WardOrderController', ['names' => [
                            'store' => 'wardOrder.store',
                            'update' => 'wardOrder.update',
                            'destroy' => 'wardOrder.destroy'
                    ]]);

                    Route::resource('wardOrderLine', 'WardOrderLineController', ['names' => [
                            'store' => 'wardOrderLine.store',
                            'update' => 'wardOrderLine.update',
                            'destroy' => 'wardOrderLine.destroy'
                    ]]);
                });
            });
        });
    });
});
