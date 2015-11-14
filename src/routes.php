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
    Route::any(config('pulsar.appName') . '/market/products/{lang}/{offset?}',                              ['as'=>'MarketProduct',                         'uses'=>'Syscover\Market\Controllers\ProductController@index',                          'resource' => 'market-product',        'action' => 'access']);
    Route::any(config('pulsar.appName') . '/market/products/json/data/{lang}',                              ['as'=>'jsonDataMarketProduct',                 'uses'=>'Syscover\Market\Controllers\ProductController@jsonData',                       'resource' => 'market-product',        'action' => 'access']);
    Route::get(config('pulsar.appName') . '/market/products/create/{lang}/{offset}/{tab}/{id?}',            ['as'=>'createMarketProduct',                   'uses'=>'Syscover\Market\Controllers\ProductController@createRecord',                   'resource' => 'market-product',        'action' => 'create']);
    Route::post(config('pulsar.appName') . '/market/products/store/{lang}/{offset}/{tab}/{id?}',            ['as'=>'storeMarketProduct',                    'uses'=>'Syscover\Market\Controllers\ProductController@storeRecord',                    'resource' => 'market-product',        'action' => 'create']);
    Route::get(config('pulsar.appName') . '/market/products/{id}/edit/{lang}/{offset}/{tab}',               ['as'=>'editMarketProduct',                     'uses'=>'Syscover\Market\Controllers\ProductController@editRecord',                     'resource' => 'market-product',        'action' => 'access']);
    Route::put(config('pulsar.appName') . '/market/products/update/{lang}/{id}/{offset}/{tab}',             ['as'=>'updateMarketProduct',                   'uses'=>'Syscover\Market\Controllers\ProductController@updateRecord',                   'resource' => 'market-product',        'action' => 'edit']);
    Route::get(config('pulsar.appName') . '/market/products/delete/{lang}/{id}/{offset}',                   ['as'=>'deleteMarketProduct',                   'uses'=>'Syscover\Market\Controllers\ProductController@deleteRecord',                   'resource' => 'market-product',        'action' => 'delete']);
    Route::get(config('pulsar.appName') . '/market/products/delete/translation/{lang}/{id}/{offset}',       ['as'=>'deleteTranslationMarketProduct',        'uses'=>'Syscover\Market\Controllers\ProductController@deleteTranslationRecord',        'resource' => 'market-product',        'action' => 'delete']);
    Route::delete(config('pulsar.appName') . '/market/products/delete/select/records/{lang}',               ['as'=>'deleteSelectMarketProduct',             'uses'=>'Syscover\Market\Controllers\ProductController@deleteRecordsSelect',            'resource' => 'market-product',        'action' => 'delete']);


    /*
    |--------------------------------------------------------------------------
    | CUSTOMER TAX
    |--------------------------------------------------------------------------
    */
    Route::any(config('pulsar.appName') . '/market/customer/tax/{offset?}',                                 ['as'=>'MarketCustomerTax',                     'uses'=>'Syscover\Market\Controllers\CustomerTaxController@index',                      'resource' => 'market-customer-tax',        'action' => 'access']);
    Route::any(config('pulsar.appName') . '/market/customer/tax/json/data',                                 ['as'=>'jsonDataMarketCustomerTax',             'uses'=>'Syscover\Market\Controllers\CustomerTaxController@jsonData',                   'resource' => 'market-customer-tax',        'action' => 'access']);
    Route::get(config('pulsar.appName') . '/market/customer/tax/create/{offset}',                           ['as'=>'createMarketCustomerTax',               'uses'=>'Syscover\Market\Controllers\CustomerTaxController@createRecord',               'resource' => 'market-customer-tax',        'action' => 'create']);
    Route::post(config('pulsar.appName') . '/market/customer/tax/store/{offset}',                           ['as'=>'storeMarketCustomerTax',                'uses'=>'Syscover\Market\Controllers\CustomerTaxController@storeRecord',                'resource' => 'market-customer-tax',        'action' => 'create']);
    Route::get(config('pulsar.appName') . '/market/customer/tax/{id}/edit/{offset}',                        ['as'=>'editMarketCustomerTax',                 'uses'=>'Syscover\Market\Controllers\CustomerTaxController@editRecord',                 'resource' => 'market-customer-tax',        'action' => 'access']);
    Route::put(config('pulsar.appName') . '/market/customer/tax/update/{id}/{offset}',                      ['as'=>'updateMarketCustomerTax',               'uses'=>'Syscover\Market\Controllers\CustomerTaxController@updateRecord',               'resource' => 'market-customer-tax',        'action' => 'edit']);
    Route::get(config('pulsar.appName') . '/market/customer/tax/delete/{id}/{offset}',                      ['as'=>'deleteMarketCustomerTax',               'uses'=>'Syscover\Market\Controllers\CustomerTaxController@deleteRecord',               'resource' => 'market-customer-tax',        'action' => 'delete']);
    Route::delete(config('pulsar.appName') . '/market/customer/tax/delete/select/records',                  ['as'=>'deleteSelectMarketCustomerTax',         'uses'=>'Syscover\Market\Controllers\CustomerTaxController@deleteRecordsSelect',        'resource' => 'market-customer-tax',        'action' => 'delete']);
});