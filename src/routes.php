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

Route::group(['middleware' => ['auth.pulsar','permission.pulsar','locale.pulsar']], function() {

    /*
    |--------------------------------------------------------------------------
    | PRODUCT
    |--------------------------------------------------------------------------
    */
    Route::any(config('pulsar.appName') . '/market/products/{offset?}',                          ['as'=>'MarketProduct',                   'uses'=>'Syscover\Market\Controllers\ProductController@index',                      'resource' => 'market-product',        'action' => 'access']);
    Route::any(config('pulsar.appName') . '/market/products/json/data',                          ['as'=>'jsonDataMarketProduct',           'uses'=>'Syscover\Market\Controllers\ProductController@jsonData',                   'resource' => 'market-product',        'action' => 'access']);
    Route::get(config('pulsar.appName') . '/market/products/create/{offset}',                    ['as'=>'createMarketProduct',             'uses'=>'Syscover\Market\Controllers\ProductController@createRecord',               'resource' => 'market-product',        'action' => 'create']);
    Route::post(config('pulsar.appName') . '/market/products/store/{offset}',                    ['as'=>'storeMarketProduct',              'uses'=>'Syscover\Market\Controllers\ProductController@storeRecord',                'resource' => 'market-product',        'action' => 'create']);
    Route::get(config('pulsar.appName') . '/market/products/{id}/edit/{offset}',                 ['as'=>'editMarketProduct',               'uses'=>'Syscover\Market\Controllers\ProductController@editRecord',                 'resource' => 'market-product',        'action' => 'access']);
    Route::put(config('pulsar.appName') . '/market/products/update/{id}/{offset}',               ['as'=>'updateMarketProduct',             'uses'=>'Syscover\Market\Controllers\ProductController@updateRecord',               'resource' => 'market-product',        'action' => 'edit']);
    Route::get(config('pulsar.appName') . '/market/products/delete/{id}/{offset}',               ['as'=>'deleteMarketProduct',             'uses'=>'Syscover\Market\Controllers\ProductController@deleteRecord',               'resource' => 'market-product',        'action' => 'delete']);
    Route::delete(config('pulsar.appName') . '/market/products/delete/select/records',           ['as'=>'deleteSelectMarketProduct',       'uses'=>'Syscover\Market\Controllers\ProductController@deleteRecordsSelect',        'resource' => 'market-product',        'action' => 'delete']);


    /*
    |--------------------------------------------------------------------------
    | FAMILY
    |--------------------------------------------------------------------------
    */
    Route::any(config('pulsar.appName') . '/marketplace/customer/tax/{offset?}',                          ['as'=>'MarketplaceCustomerTax',                   'uses'=>'Syscover\Marketplace\Controllers\CustomerTax@index',                      'resource' => 'market-customer-tax',        'action' => 'access']);
    Route::any(config('pulsar.appName') . '/marketplace/customer/tax/json/data',                          ['as'=>'jsonDataMarketplaceCustomerTax',           'uses'=>'Syscover\Marketplace\Controllers\CustomerTax@jsonData',                   'resource' => 'market-customer-tax',        'action' => 'access']);
    Route::get(config('pulsar.appName') . '/marketplace/customer/tax/create/{offset}',                    ['as'=>'createMarketplaceCustomerTax',             'uses'=>'Syscover\Marketplace\Controllers\CustomerTax@createRecord',               'resource' => 'market-customer-tax',        'action' => 'create']);
    Route::post(config('pulsar.appName') . '/marketplace/customer/tax/store/{offset}',                    ['as'=>'storeMarketplaceCustomerTax',              'uses'=>'Syscover\Marketplace\Controllers\CustomerTax@storeRecord',                'resource' => 'market-customer-tax',        'action' => 'create']);
    Route::get(config('pulsar.appName') . '/marketplace/customer/tax/{id}/edit/{offset}',                 ['as'=>'editMarketplaceCustomerTax',               'uses'=>'Syscover\Marketplace\Controllers\CustomerTax@editRecord',                 'resource' => 'market-customer-tax',        'action' => 'access']);
    Route::put(config('pulsar.appName') . '/marketplace/customer/tax/update/{id}/{offset}',               ['as'=>'updateMarketplaceCustomerTax',             'uses'=>'Syscover\Marketplace\Controllers\CustomerTax@updateRecord',               'resource' => 'market-customer-tax',        'action' => 'edit']);
    Route::get(config('pulsar.appName') . '/marketplace/customer/tax/delete/{id}/{offset}',               ['as'=>'deleteMarketplaceCustomerTax',             'uses'=>'Syscover\Marketplace\Controllers\CustomerTax@deleteRecord',               'resource' => 'market-customer-tax',        'action' => 'delete']);
    Route::delete(config('pulsar.appName') . '/marketplace/customer/tax/delete/select/records',           ['as'=>'deleteSelectMarketplaceCustomerTax',       'uses'=>'Syscover\Marketplace\Controllers\CustomerTax@deleteRecordsSelect',        'resource' => 'market-customer-tax',        'action' => 'delete']);

});