<?php
/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can any all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::group(['middleware' => ['auth.pulsar','permission.pulsar']], function() {

    /*
    |--------------------------------------------------------------------------
    | FAMILY
    |--------------------------------------------------------------------------
    */
    Route::any(config('pulsar.appName') . '/marketplace/customer/tax/{offset?}',                          ['as'=>'CustomerTax',                   'uses'=>'Syscover\Marketplace\Controllers\CustomerTax@index',                      'resource' => 'market-customer-tax',        'action' => 'access']);
    Route::any(config('pulsar.appName') . '/marketplace/customer/tax/json/data',                          ['as'=>'jsonDataCustomerTax',           'uses'=>'Syscover\Marketplace\Controllers\CustomerTax@jsonData',                   'resource' => 'market-customer-tax',        'action' => 'access']);
    Route::get(config('pulsar.appName') . '/marketplace/customer/tax/create/{offset}',                    ['as'=>'createCustomerTax',             'uses'=>'Syscover\Marketplace\Controllers\CustomerTax@createRecord',               'resource' => 'market-customer-tax',        'action' => 'create']);
    Route::post(config('pulsar.appName') . '/marketplace/customer/tax/store/{offset}',                    ['as'=>'storeCustomerTax',              'uses'=>'Syscover\Marketplace\Controllers\CustomerTax@storeRecord',                'resource' => 'market-customer-tax',        'action' => 'create']);
    Route::get(config('pulsar.appName') . '/marketplace/customer/tax/{id}/edit/{offset}',                 ['as'=>'editCustomerTax',               'uses'=>'Syscover\Marketplace\Controllers\CustomerTax@editRecord',                 'resource' => 'market-customer-tax',        'action' => 'access']);
    Route::put(config('pulsar.appName') . '/marketplace/customer/tax/update/{id}/{offset}',               ['as'=>'updateCustomerTax',             'uses'=>'Syscover\Marketplace\Controllers\CustomerTax@updateRecord',               'resource' => 'market-customer-tax',        'action' => 'edit']);
    Route::get(config('pulsar.appName') . '/marketplace/customer/tax/delete/{id}/{offset}',               ['as'=>'deleteCustomerTax',             'uses'=>'Syscover\Marketplace\Controllers\CustomerTax@deleteRecord',               'resource' => 'market-customer-tax',        'action' => 'delete']);
    Route::delete(config('pulsar.appName') . '/marketplace/customer/tax/delete/select/records',           ['as'=>'deleteSelectCustomerTax',       'uses'=>'Syscover\Marketplace\Controllers\CustomerTax@deleteRecordsSelect',        'resource' => 'market-customer-tax',        'action' => 'delete']);

});