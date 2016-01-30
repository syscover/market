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

Route::group(['middleware' => ['web', 'pulsar']], function() {

    /*
    |--------------------------------------------------------------------------
    | PRODUCT
    |--------------------------------------------------------------------------
    */
    Route::any(config('pulsar.appName') . '/market/products/{lang}/{offset?}',                              ['as'=>'marketProduct',                         'uses'=>'Syscover\Market\Controllers\ProductController@index',                          'resource' => 'market-product',        'action' => 'access']);
    Route::any(config('pulsar.appName') . '/market/products/json/data/{lang}',                              ['as'=>'jsonDataMarketProduct',                 'uses'=>'Syscover\Market\Controllers\ProductController@jsonData',                       'resource' => 'market-product',        'action' => 'access']);
    Route::get(config('pulsar.appName') . '/market/products/create/{lang}/{offset}/{tab}/{id?}',            ['as'=>'createMarketProduct',                   'uses'=>'Syscover\Market\Controllers\ProductController@createRecord',                   'resource' => 'market-product',        'action' => 'create']);
    Route::post(config('pulsar.appName') . '/market/products/store/{lang}/{offset}/{tab}/{id?}',            ['as'=>'storeMarketProduct',                    'uses'=>'Syscover\Market\Controllers\ProductController@storeRecord',                    'resource' => 'market-product',        'action' => 'create']);
    Route::get(config('pulsar.appName') . '/market/products/{id}/edit/{lang}/{offset}/{tab}',               ['as'=>'editMarketProduct',                     'uses'=>'Syscover\Market\Controllers\ProductController@editRecord',                     'resource' => 'market-product',        'action' => 'access']);
    Route::put(config('pulsar.appName') . '/market/products/update/{lang}/{id}/{offset}/{tab}',             ['as'=>'updateMarketProduct',                   'uses'=>'Syscover\Market\Controllers\ProductController@updateRecord',                   'resource' => 'market-product',        'action' => 'edit']);
    Route::get(config('pulsar.appName') . '/market/products/delete/{lang}/{id}/{offset}',                   ['as'=>'deleteMarketProduct',                   'uses'=>'Syscover\Market\Controllers\ProductController@deleteRecord',                   'resource' => 'market-product',        'action' => 'delete']);
    Route::get(config('pulsar.appName') . '/market/products/delete/translation/{lang}/{id}/{offset}',       ['as'=>'deleteTranslationMarketProduct',        'uses'=>'Syscover\Market\Controllers\ProductController@deleteTranslationRecord',        'resource' => 'market-product',        'action' => 'delete']);
    Route::delete(config('pulsar.appName') . '/market/products/delete/select/records/{lang}',               ['as'=>'deleteSelectMarketProduct',             'uses'=>'Syscover\Market\Controllers\ProductController@deleteRecordsSelect',            'resource' => 'market-product',        'action' => 'delete']);
    Route::post(config('pulsar.appName') . '/market/products/check/product/slug',                           ['as'=>'apiCheckSlugMarketProduct',             'uses'=>'Syscover\Market\Controllers\ProductController@apiCheckSlug',                   'resource' => 'market-product',        'action' => 'access']);


    /*
    |--------------------------------------------------------------------------
    | CATEGORY
    |--------------------------------------------------------------------------
    */
    Route::any(config('pulsar.appName') . '/market/categories/{lang}/{offset?}',                            ['as'=>'marketCategory',                         'uses'=>'Syscover\Market\Controllers\CategoryController@index',                          'resource' => 'market-category',        'action' => 'access']);
    Route::any(config('pulsar.appName') . '/market/categories/json/data/{lang}',                            ['as'=>'jsonDataMarketCategory',                 'uses'=>'Syscover\Market\Controllers\CategoryController@jsonData',                       'resource' => 'market-category',        'action' => 'access']);
    Route::get(config('pulsar.appName') . '/market/categories/create/{lang}/{offset}/{id?}',                ['as'=>'createMarketCategory',                   'uses'=>'Syscover\Market\Controllers\CategoryController@createRecord',                   'resource' => 'market-category',        'action' => 'create']);
    Route::post(config('pulsar.appName') . '/market/categories/store/{lang}/{offset}/{id?}',                ['as'=>'storeMarketCategory',                    'uses'=>'Syscover\Market\Controllers\CategoryController@storeRecord',                    'resource' => 'market-category',        'action' => 'create']);
    Route::get(config('pulsar.appName') . '/market/categories/{id}/edit/{lang}/{offset}',                   ['as'=>'editMarketCategory',                     'uses'=>'Syscover\Market\Controllers\CategoryController@editRecord',                     'resource' => 'market-category',        'action' => 'access']);
    Route::put(config('pulsar.appName') . '/market/categories/update/{lang}/{id}/{offset}',                 ['as'=>'updateMarketCategory',                   'uses'=>'Syscover\Market\Controllers\CategoryController@updateRecord',                   'resource' => 'market-category',        'action' => 'edit']);
    Route::get(config('pulsar.appName') . '/market/categories/delete/{lang}/{id}/{offset}',                 ['as'=>'deleteMarketCategory',                   'uses'=>'Syscover\Market\Controllers\CategoryController@deleteRecord',                   'resource' => 'market-category',        'action' => 'delete']);
    Route::get(config('pulsar.appName') . '/market/categories/delete/translation/{lang}/{id}/{offset}',     ['as'=>'deleteTranslationMarketCategory',        'uses'=>'Syscover\Market\Controllers\CategoryController@deleteTranslationRecord',        'resource' => 'market-category',        'action' => 'delete']);
    Route::delete(config('pulsar.appName') . '/market/categories/delete/select/records/{lang}',             ['as'=>'deleteSelectMarketCategory',             'uses'=>'Syscover\Market\Controllers\CategoryController@deleteRecordsSelect',            'resource' => 'market-category',        'action' => 'delete']);
    Route::post(config('pulsar.appName') . '/market/categories/check/product/slug',                         ['as'=>'apiCheckSlugMarketCategory',             'uses'=>'Syscover\Market\Controllers\CategoryController@apiCheckSlug',                   'resource' => 'market-category',        'action' => 'access']);


    /*
    |--------------------------------------------------------------------------
    | ORDER STATUS
    |--------------------------------------------------------------------------
    */
    Route::any(config('pulsar.appName') . '/market/order/status/{lang}/{offset?}',                              ['as'=>'marketOrderStatus',                         'uses'=>'Syscover\Market\Controllers\OrderStatusController@index',                      'resource' => 'market-order-status',        'action' => 'access']);
    Route::any(config('pulsar.appName') . '/market/order/status/json/data/{lang}',                              ['as'=>'jsonDataMarketOrderStatus',                 'uses'=>'Syscover\Market\Controllers\OrderStatusController@jsonData',                   'resource' => 'market-order-status',        'action' => 'access']);
    Route::get(config('pulsar.appName') . '/market/order/status/create/{lang}/{offset}/{id?}',                  ['as'=>'createMarketOrderStatus',                   'uses'=>'Syscover\Market\Controllers\OrderStatusController@createRecord',               'resource' => 'market-order-status',        'action' => 'create']);
    Route::post(config('pulsar.appName') . '/market/order/status/store/{lang}/{offset}/{id?}',                  ['as'=>'storeMarketOrderStatus',                    'uses'=>'Syscover\Market\Controllers\OrderStatusController@storeRecord',                'resource' => 'market-order-status',        'action' => 'create']);
    Route::get(config('pulsar.appName') . '/market/order/status/{id}/edit/{lang}/{offset}',                     ['as'=>'editMarketOrderStatus',                     'uses'=>'Syscover\Market\Controllers\OrderStatusController@editRecord',                 'resource' => 'market-order-status',        'action' => 'access']);
    Route::put(config('pulsar.appName') . '/market/order/status/update/{lang}/{id}/{offset}',                   ['as'=>'updateMarketOrderStatus',                   'uses'=>'Syscover\Market\Controllers\OrderStatusController@updateRecord',               'resource' => 'market-order-status',        'action' => 'edit']);
    Route::get(config('pulsar.appName') . '/market/order/status/delete/{lang}/{id}/{offset}',                   ['as'=>'deleteMarketOrderStatus',                   'uses'=>'Syscover\Market\Controllers\OrderStatusController@deleteRecord',               'resource' => 'market-order-status',        'action' => 'delete']);
    Route::get(config('pulsar.appName') . '/market/order/status/delete/translation/{lang}/{id}/{offset}',       ['as'=>'deleteTranslationMarketOrderStatus',        'uses'=>'Syscover\Market\Controllers\OrderStatusController@deleteTranslationRecord',    'resource' => 'market-order-status',        'action' => 'delete']);
    Route::delete(config('pulsar.appName') . '/market/order/status/delete/select/records/{lang}',               ['as'=>'deleteSelectMarketOrderStatus',             'uses'=>'Syscover\Market\Controllers\OrderStatusController@deleteRecordsSelect',        'resource' => 'market-order-status',        'action' => 'delete']);


    /*
    |--------------------------------------------------------------------------
    | PAYMENT METHOD
    |--------------------------------------------------------------------------
    */
    Route::any(config('pulsar.appName') . '/market/payment/methods/{lang}/{offset?}',                              ['as'=>'marketPaymentMethod',                     'uses'=>'Syscover\Market\Controllers\PaymentMethodController@index',                      'resource' => 'market-payment-method',        'action' => 'access']);
    Route::any(config('pulsar.appName') . '/market/payment/methods/json/data/{lang}',                              ['as'=>'jsonDataMarketPaymentMethod',             'uses'=>'Syscover\Market\Controllers\PaymentMethodController@jsonData',                   'resource' => 'market-payment-method',        'action' => 'access']);
    Route::get(config('pulsar.appName') . '/market/payment/methods/create/{lang}/{offset}/{id?}',                  ['as'=>'createMarketPaymentMethod',               'uses'=>'Syscover\Market\Controllers\PaymentMethodController@createRecord',               'resource' => 'market-payment-method',        'action' => 'create']);
    Route::post(config('pulsar.appName') . '/market/payment/methods/store/{lang}/{offset}/{id?}',                  ['as'=>'storeMarketPaymentMethod',                'uses'=>'Syscover\Market\Controllers\PaymentMethodController@storeRecord',                'resource' => 'market-payment-method',        'action' => 'create']);
    Route::get(config('pulsar.appName') . '/market/payment/methods/{id}/edit/{lang}/{offset}',                     ['as'=>'editMarketPaymentMethod',                 'uses'=>'Syscover\Market\Controllers\PaymentMethodController@editRecord',                 'resource' => 'market-payment-method',        'action' => 'access']);
    Route::put(config('pulsar.appName') . '/market/payment/methods/update/{lang}/{id}/{offset}',                   ['as'=>'updateMarketPaymentMethod',               'uses'=>'Syscover\Market\Controllers\PaymentMethodController@updateRecord',               'resource' => 'market-payment-method',        'action' => 'edit']);
    Route::get(config('pulsar.appName') . '/market/payment/methods/delete/{lang}/{id}/{offset}',                   ['as'=>'deleteMarketPaymentMethod',               'uses'=>'Syscover\Market\Controllers\PaymentMethodController@deleteRecord',               'resource' => 'market-payment-method',        'action' => 'delete']);
    Route::get(config('pulsar.appName') . '/market/payment/methods/delete/translation/{lang}/{id}/{offset}',       ['as'=>'deleteTranslationMarketPaymentMethod',    'uses'=>'Syscover\Market\Controllers\PaymentMethodController@deleteTranslationRecord',    'resource' => 'market-payment-method',        'action' => 'delete']);
    Route::delete(config('pulsar.appName') . '/market/payment/methods/delete/select/records/{lang}',               ['as'=>'deleteSelectMarketPaymentMethod',         'uses'=>'Syscover\Market\Controllers\PaymentMethodController@deleteRecordsSelect',        'resource' => 'market-payment-method',        'action' => 'delete']);


    /*
    |--------------------------------------------------------------------------
    | CUSTOMER TAX
    |--------------------------------------------------------------------------
    */
    Route::any(config('pulsar.appName') . '/market/customer/tax/{offset?}',                                     ['as'=>'marketCustomerTax',                     'uses'=>'Syscover\Market\Controllers\CustomerTaxController@index',                      'resource' => 'market-customer-tax',        'action' => 'access']);
    Route::any(config('pulsar.appName') . '/market/customer/tax/json/data',                                     ['as'=>'jsonDataMarketCustomerTax',             'uses'=>'Syscover\Market\Controllers\CustomerTaxController@jsonData',                   'resource' => 'market-customer-tax',        'action' => 'access']);
    Route::get(config('pulsar.appName') . '/market/customer/tax/create/{offset}',                               ['as'=>'createMarketCustomerTax',               'uses'=>'Syscover\Market\Controllers\CustomerTaxController@createRecord',               'resource' => 'market-customer-tax',        'action' => 'create']);
    Route::post(config('pulsar.appName') . '/market/customer/tax/store/{offset}',                               ['as'=>'storeMarketCustomerTax',                'uses'=>'Syscover\Market\Controllers\CustomerTaxController@storeRecord',                'resource' => 'market-customer-tax',        'action' => 'create']);
    Route::get(config('pulsar.appName') . '/market/customer/tax/{id}/edit/{offset}',                            ['as'=>'editMarketCustomerTax',                 'uses'=>'Syscover\Market\Controllers\CustomerTaxController@editRecord',                 'resource' => 'market-customer-tax',        'action' => 'access']);
    Route::put(config('pulsar.appName') . '/market/customer/tax/update/{id}/{offset}',                          ['as'=>'updateMarketCustomerTax',               'uses'=>'Syscover\Market\Controllers\CustomerTaxController@updateRecord',               'resource' => 'market-customer-tax',        'action' => 'edit']);
    Route::get(config('pulsar.appName') . '/market/customer/tax/delete/{id}/{offset}',                          ['as'=>'deleteMarketCustomerTax',               'uses'=>'Syscover\Market\Controllers\CustomerTaxController@deleteRecord',               'resource' => 'market-customer-tax',        'action' => 'delete']);
    Route::delete(config('pulsar.appName') . '/market/customer/tax/delete/select/records',                      ['as'=>'deleteSelectMarketCustomerTax',         'uses'=>'Syscover\Market\Controllers\CustomerTaxController@deleteRecordsSelect',        'resource' => 'market-customer-tax',        'action' => 'delete']);


    /*
    |--------------------------------------------------------------------------
    | ORDER
    |--------------------------------------------------------------------------
    */
    Route::any(config('pulsar.appName') . '/market/order/{offset?}',                                            ['as'=>'marketOrder',                     'uses'=>'Syscover\Market\Controllers\OrderController@index',                      'resource' => 'market-order',        'action' => 'access']);
    Route::any(config('pulsar.appName') . '/market/order/json/data',                                            ['as'=>'jsonDataMarketOrder',             'uses'=>'Syscover\Market\Controllers\OrderController@jsonData',                   'resource' => 'market-order',        'action' => 'access']);
    Route::get(config('pulsar.appName') . '/market/order/create/{offset}/{tab}',                                ['as'=>'createMarketOrder',               'uses'=>'Syscover\Market\Controllers\OrderController@createRecord',               'resource' => 'market-order',        'action' => 'create']);
    Route::post(config('pulsar.appName') . '/market/order/store/{offset}/{tab}',                                ['as'=>'storeMarketOrder',                'uses'=>'Syscover\Market\Controllers\OrderController@storeRecord',                'resource' => 'market-order',        'action' => 'create']);
    Route::get(config('pulsar.appName') . '/market/order/{id}/edit/{offset}/{tab}',                             ['as'=>'editMarketOrder',                 'uses'=>'Syscover\Market\Controllers\OrderController@editRecord',                 'resource' => 'market-order',        'action' => 'access']);
    Route::put(config('pulsar.appName') . '/market/order/update/{id}/{offset}/{tab}',                           ['as'=>'updateMarketOrder',               'uses'=>'Syscover\Market\Controllers\OrderController@updateRecord',               'resource' => 'market-order',        'action' => 'edit']);
    Route::get(config('pulsar.appName') . '/market/order/delete/{id}/{offset}',                                 ['as'=>'deleteMarketOrder',               'uses'=>'Syscover\Market\Controllers\OrderController@deleteRecord',               'resource' => 'market-order',        'action' => 'delete']);
    Route::delete(config('pulsar.appName') . '/market/order/delete/select/records',                             ['as'=>'deleteSelectMarketOrder',         'uses'=>'Syscover\Market\Controllers\OrderController@deleteRecordsSelect',        'resource' => 'market-order',        'action' => 'delete']);


    /*
    |--------------------------------------------------------------------------
    | SETTING TAXES
    |--------------------------------------------------------------------------
    */
    Route::any(config('pulsar.appName') . '/market/tax/settings',                                               ['as'=>'marketTaxSettings',                 'uses'=>'Syscover\Market\Controllers\TaxSettingsController@index',                  'resource' => 'market-tax-setting',        'action' => 'access']);
    Route::put(config('pulsar.appName') . '/market/tax/settings/update',                                        ['as'=>'updateMarketTaxSettings',           'uses'=>'Syscover\Market\Controllers\TaxSettingsController@updateRecord',           'resource' => 'market-tax-setting',        'action' => 'edit']);


    /*
    |--------------------------------------------------------------------------
    | PAYPAL
    |--------------------------------------------------------------------------
    */
    Route::any(config('pulsar.appName') . '/market/paypal/settings',                                            ['as'=>'marketPayPalSettings',              'uses'=>'Syscover\Market\Controllers\PayPalSettingsController@index',                  'resource' => 'market-tpv-paypal-setting',        'action' => 'access']);
    Route::put(config('pulsar.appName') . '/market/paypal/settings/update',                                     ['as'=>'updateMarketPayPalSettings',        'uses'=>'Syscover\Market\Controllers\PayPalSettingsController@updateRecord',           'resource' => 'market-tpv-paypal-setting',        'action' => 'edit']);
});

Route::group(['middleware' => ['noCsrWeb']], function() {

    /*
    |--------------------------------------------------------------------------
    | PAYPAL
    |--------------------------------------------------------------------------
    */
    Route::post(config('pulsar.appName') . '/market/tpv/paypal/payment/create',                                 ['as'=>'createMarketPayPalPayment',         'uses'=>'Syscover\Market\Controllers\PayPalController@createPayment']);
    Route::get(config('pulsar.appName') . '/market/tpv/paypal/payment/checkout',                                ['as'=>'checkoutMarketPayPalPayment',       'uses'=>'Syscover\Market\Controllers\PayPalController@checkoutPayment']);

    // web profile
    Route::get(config('pulsar.appName') . '/market/tpv/paypal/web/profile/create',                              ['as'=>'createMarketPayPalWebProfile',      'uses'=>'Syscover\Market\Controllers\PayPalController@createWebProfile']);
    Route::get(config('pulsar.appName') . '/market/tpv/paypal/web/profile',                                     ['as'=>'marketPayPalWebProfile',            'uses'=>'Syscover\Market\Controllers\PayPalController@webProfile']);

});