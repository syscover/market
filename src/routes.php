<?php

Route::group(['middleware' => ['web', 'pulsar']], function() {

    /*
    |--------------------------------------------------------------------------
    | PRODUCT
    |--------------------------------------------------------------------------
    */
    Route::any(config('pulsar.name') . '/market/products/{lang}/{offset?}',                              ['as' => 'marketProduct',                         'uses' => 'Syscover\Market\Old\Controllers\ProductController@index',                          'resource' => 'market-product',        'action' => 'access']);
    Route::any(config('pulsar.name') . '/market/products/json/data/{lang}',                              ['as' => 'jsonDataMarketProduct',                 'uses' => 'Syscover\Market\Old\Controllers\ProductController@jsonData',                       'resource' => 'market-product',        'action' => 'access']);
    Route::get(config('pulsar.name') . '/market/products/create/{lang}/{offset}/{tab}/{id?}',            ['as' => 'createMarketProduct',                   'uses' => 'Syscover\Market\Old\Controllers\ProductController@createRecord',                   'resource' => 'market-product',        'action' => 'create']);
    Route::post(config('pulsar.name') . '/market/products/store/{lang}/{offset}/{tab}/{id?}',            ['as' => 'storeMarketProduct',                    'uses' => 'Syscover\Market\Old\Controllers\ProductController@storeRecord',                    'resource' => 'market-product',        'action' => 'create']);
    Route::get(config('pulsar.name') . '/market/products/{id}/edit/{lang}/{offset}/{tab}',               ['as' => 'editMarketProduct',                     'uses' => 'Syscover\Market\Old\Controllers\ProductController@editRecord',                     'resource' => 'market-product',        'action' => 'access']);
    Route::put(config('pulsar.name') . '/market/products/update/{lang}/{id}/{offset}/{tab}',             ['as' => 'updateMarketProduct',                   'uses' => 'Syscover\Market\Old\Controllers\ProductController@updateRecord',                   'resource' => 'market-product',        'action' => 'edit']);
    Route::get(config('pulsar.name') . '/market/products/delete/{lang}/{id}/{offset}',                   ['as' => 'deleteMarketProduct',                   'uses' => 'Syscover\Market\Old\Controllers\ProductController@deleteRecord',                   'resource' => 'market-product',        'action' => 'delete']);
    Route::get(config('pulsar.name') . '/market/products/delete/translation/{lang}/{id}/{offset}',       ['as' => 'deleteTranslationMarketProduct',        'uses' => 'Syscover\Market\Old\Controllers\ProductController@deleteTranslationRecord',        'resource' => 'market-product',        'action' => 'delete']);
    Route::delete(config('pulsar.name') . '/market/products/delete/select/records/{lang}',               ['as' => 'deleteSelectMarketProduct',             'uses' => 'Syscover\Market\Old\Controllers\ProductController@deleteRecordsSelect',            'resource' => 'market-product',        'action' => 'delete']);
    Route::post(config('pulsar.name') . '/market/products/check/product/slug',                           ['as' => 'apiCheckSlugMarketProduct',             'uses' => 'Syscover\Market\Old\Controllers\ProductController@apiCheckSlug',                   'resource' => 'market-product',        'action' => 'access']);
    Route::any(config('pulsar.name') . '/market/products/{lang}/{id}/show/{api}',                        ['as' => 'apiShowMarketProduct',                  'uses' => 'Syscover\Market\Old\Controllers\ProductController@showRecord',                     'resource' => 'market-product',        'action' => 'access']);

    /*
    |--------------------------------------------------------------------------
    | CATEGORY
    |--------------------------------------------------------------------------
    */
    Route::any(config('pulsar.name') . '/market/categories/{lang}/{offset?}',                            ['as' => 'marketCategory',                         'uses' => 'Syscover\Market\Old\Controllers\CategoryController@index',                          'resource' => 'market-category',        'action' => 'access']);
    Route::any(config('pulsar.name') . '/market/categories/json/data/{lang}',                            ['as' => 'jsonDataMarketCategory',                 'uses' => 'Syscover\Market\Old\Controllers\CategoryController@jsonData',                       'resource' => 'market-category',        'action' => 'access']);
    Route::get(config('pulsar.name') . '/market/categories/create/{lang}/{offset}/{id?}',                ['as' => 'createMarketCategory',                   'uses' => 'Syscover\Market\Old\Controllers\CategoryController@createRecord',                   'resource' => 'market-category',        'action' => 'create']);
    Route::post(config('pulsar.name') . '/market/categories/store/{lang}/{offset}/{id?}',                ['as' => 'storeMarketCategory',                    'uses' => 'Syscover\Market\Old\Controllers\CategoryController@storeRecord',                    'resource' => 'market-category',        'action' => 'create']);
    Route::get(config('pulsar.name') . '/market/categories/{id}/edit/{lang}/{offset}',                   ['as' => 'editMarketCategory',                     'uses' => 'Syscover\Market\Old\Controllers\CategoryController@editRecord',                     'resource' => 'market-category',        'action' => 'access']);
    Route::put(config('pulsar.name') . '/market/categories/update/{lang}/{id}/{offset}',                 ['as' => 'updateMarketCategory',                   'uses' => 'Syscover\Market\Old\Controllers\CategoryController@updateRecord',                   'resource' => 'market-category',        'action' => 'edit']);
    Route::get(config('pulsar.name') . '/market/categories/delete/{lang}/{id}/{offset}',                 ['as' => 'deleteMarketCategory',                   'uses' => 'Syscover\Market\Old\Controllers\CategoryController@deleteRecord',                   'resource' => 'market-category',        'action' => 'delete']);
    Route::get(config('pulsar.name') . '/market/categories/delete/translation/{lang}/{id}/{offset}',     ['as' => 'deleteTranslationMarketCategory',        'uses' => 'Syscover\Market\Old\Controllers\CategoryController@deleteTranslationRecord',        'resource' => 'market-category',        'action' => 'delete']);
    Route::delete(config('pulsar.name') . '/market/categories/delete/select/records/{lang}',             ['as' => 'deleteSelectMarketCategory',             'uses' => 'Syscover\Market\Old\Controllers\CategoryController@deleteRecordsSelect',            'resource' => 'market-category',        'action' => 'delete']);
    Route::post(config('pulsar.name') . '/market/categories/check/product/slug',                         ['as' => 'apiCheckSlugMarketCategory',             'uses' => 'Syscover\Market\Old\Controllers\CategoryController@apiCheckSlug',                   'resource' => 'market-category',        'action' => 'access']);

    /*
    |--------------------------------------------------------------------------
    | ORDER STATUS
    |--------------------------------------------------------------------------
    */
    Route::any(config('pulsar.name') . '/market/order/status/{lang}/{offset?}',                              ['as' => 'marketOrderStatus',                         'uses' => 'Syscover\Market\Old\Controllers\OrderStatusController@index',                      'resource' => 'market-order-status',        'action' => 'access']);
    Route::any(config('pulsar.name') . '/market/order/status/json/data/{lang}',                              ['as' => 'jsonDataMarketOrderStatus',                 'uses' => 'Syscover\Market\Old\Controllers\OrderStatusController@jsonData',                   'resource' => 'market-order-status',        'action' => 'access']);
    Route::get(config('pulsar.name') . '/market/order/status/create/{lang}/{offset}/{id?}',                  ['as' => 'createMarketOrderStatus',                   'uses' => 'Syscover\Market\Old\Controllers\OrderStatusController@createRecord',               'resource' => 'market-order-status',        'action' => 'create']);
    Route::post(config('pulsar.name') . '/market/order/status/store/{lang}/{offset}/{id?}',                  ['as' => 'storeMarketOrderStatus',                    'uses' => 'Syscover\Market\Old\Controllers\OrderStatusController@storeRecord',                'resource' => 'market-order-status',        'action' => 'create']);
    Route::get(config('pulsar.name') . '/market/order/status/{id}/edit/{lang}/{offset}',                     ['as' => 'editMarketOrderStatus',                     'uses' => 'Syscover\Market\Old\Controllers\OrderStatusController@editRecord',                 'resource' => 'market-order-status',        'action' => 'access']);
    Route::put(config('pulsar.name') . '/market/order/status/update/{lang}/{id}/{offset}',                   ['as' => 'updateMarketOrderStatus',                   'uses' => 'Syscover\Market\Old\Controllers\OrderStatusController@updateRecord',               'resource' => 'market-order-status',        'action' => 'edit']);
    Route::get(config('pulsar.name') . '/market/order/status/delete/{lang}/{id}/{offset}',                   ['as' => 'deleteMarketOrderStatus',                   'uses' => 'Syscover\Market\Old\Controllers\OrderStatusController@deleteRecord',               'resource' => 'market-order-status',        'action' => 'delete']);
    Route::get(config('pulsar.name') . '/market/order/status/delete/translation/{lang}/{id}/{offset}',       ['as' => 'deleteTranslationMarketOrderStatus',        'uses' => 'Syscover\Market\Old\Controllers\OrderStatusController@deleteTranslationRecord',    'resource' => 'market-order-status',        'action' => 'delete']);
    Route::delete(config('pulsar.name') . '/market/order/status/delete/select/records/{lang}',               ['as' => 'deleteSelectMarketOrderStatus',             'uses' => 'Syscover\Market\Old\Controllers\OrderStatusController@deleteRecordsSelect',        'resource' => 'market-order-status',        'action' => 'delete']);

    /*
    |--------------------------------------------------------------------------
    | PAYMENT METHOD
    |--------------------------------------------------------------------------
    */
    Route::any(config('pulsar.name') . '/market/payment/methods/{lang}/{offset?}',                              ['as' => 'marketPaymentMethod',                     'uses' => 'Syscover\Market\Old\Controllers\PaymentMethodController@index',                      'resource' => 'market-payment-method',        'action' => 'access']);
    Route::any(config('pulsar.name') . '/market/payment/methods/json/data/{lang}',                              ['as' => 'jsonDataMarketPaymentMethod',             'uses' => 'Syscover\Market\Old\Controllers\PaymentMethodController@jsonData',                   'resource' => 'market-payment-method',        'action' => 'access']);
    Route::get(config('pulsar.name') . '/market/payment/methods/create/{lang}/{offset}/{id?}',                  ['as' => 'createMarketPaymentMethod',               'uses' => 'Syscover\Market\Old\Controllers\PaymentMethodController@createRecord',               'resource' => 'market-payment-method',        'action' => 'create']);
    Route::post(config('pulsar.name') . '/market/payment/methods/store/{lang}/{offset}/{id?}',                  ['as' => 'storeMarketPaymentMethod',                'uses' => 'Syscover\Market\Old\Controllers\PaymentMethodController@storeRecord',                'resource' => 'market-payment-method',        'action' => 'create']);
    Route::get(config('pulsar.name') . '/market/payment/methods/{id}/edit/{lang}/{offset}',                     ['as' => 'editMarketPaymentMethod',                 'uses' => 'Syscover\Market\Old\Controllers\PaymentMethodController@editRecord',                 'resource' => 'market-payment-method',        'action' => 'access']);
    Route::put(config('pulsar.name') . '/market/payment/methods/update/{lang}/{id}/{offset}',                   ['as' => 'updateMarketPaymentMethod',               'uses' => 'Syscover\Market\Old\Controllers\PaymentMethodController@updateRecord',               'resource' => 'market-payment-method',        'action' => 'edit']);
    Route::get(config('pulsar.name') . '/market/payment/methods/delete/{lang}/{id}/{offset}',                   ['as' => 'deleteMarketPaymentMethod',               'uses' => 'Syscover\Market\Old\Controllers\PaymentMethodController@deleteRecord',               'resource' => 'market-payment-method',        'action' => 'delete']);
    Route::get(config('pulsar.name') . '/market/payment/methods/delete/translation/{lang}/{id}/{offset}',       ['as' => 'deleteTranslationMarketPaymentMethod',    'uses' => 'Syscover\Market\Old\Controllers\PaymentMethodController@deleteTranslationRecord',    'resource' => 'market-payment-method',        'action' => 'delete']);
    Route::delete(config('pulsar.name') . '/market/payment/methods/delete/select/records/{lang}',               ['as' => 'deleteSelectMarketPaymentMethod',         'uses' => 'Syscover\Market\Old\Controllers\PaymentMethodController@deleteRecordsSelect',        'resource' => 'market-payment-method',        'action' => 'delete']);

    /*
    |--------------------------------------------------------------------------
    | ORDER
    |--------------------------------------------------------------------------
    */
    Route::any(config('pulsar.name') . '/market/order/{offset?}',                                            ['as' => 'marketOrder',                     'uses' => 'Syscover\Market\Old\Controllers\OrderController@index',                      'resource' => 'market-order',        'action' => 'access']);
    Route::any(config('pulsar.name') . '/market/order/json/data',                                            ['as' => 'jsonDataMarketOrder',             'uses' => 'Syscover\Market\Old\Controllers\OrderController@jsonData',                   'resource' => 'market-order',        'action' => 'access']);
    Route::get(config('pulsar.name') . '/market/order/create/{offset}/{tab}',                                ['as' => 'createMarketOrder',               'uses' => 'Syscover\Market\Old\Controllers\OrderController@createRecord',               'resource' => 'market-order',        'action' => 'create']);
    Route::post(config('pulsar.name') . '/market/order/store/{offset}/{tab}',                                ['as' => 'storeMarketOrder',                'uses' => 'Syscover\Market\Old\Controllers\OrderController@storeRecord',                'resource' => 'market-order',        'action' => 'create']);
    Route::get(config('pulsar.name') . '/market/order/{id}/edit/{offset}/{tab}',                             ['as' => 'editMarketOrder',                 'uses' => 'Syscover\Market\Old\Controllers\OrderController@editRecord',                 'resource' => 'market-order',        'action' => 'access']);
    Route::put(config('pulsar.name') . '/market/order/update/{id}/{offset}/{tab}',                           ['as' => 'updateMarketOrder',               'uses' => 'Syscover\Market\Old\Controllers\OrderController@updateRecord',               'resource' => 'market-order',        'action' => 'edit']);
    Route::get(config('pulsar.name') . '/market/order/delete/{id}/{offset}',                                 ['as' => 'deleteMarketOrder',               'uses' => 'Syscover\Market\Old\Controllers\OrderController@deleteRecord',               'resource' => 'market-order',        'action' => 'delete']);
    Route::delete(config('pulsar.name') . '/market/order/delete/select/records',                             ['as' => 'deleteSelectMarketOrder',         'uses' => 'Syscover\Market\Old\Controllers\OrderController@deleteRecordsSelect',        'resource' => 'market-order',        'action' => 'delete']);

    /*
    |--------------------------------------------------------------------------
    | ORDER ROW
    |--------------------------------------------------------------------------
    */
    Route::any(config('pulsar.name') . '/market/order/row/json/data/{ref}/{modal}',                          ['as' => 'jsonDataMarketOrderRow',            'uses' => 'Syscover\Market\Old\Controllers\OrderRowController@jsonData',              'resource' => 'market-order',        'action' => 'access']);
    Route::get(config('pulsar.name') . '/market/order/row/get/data/row/{id}',                                ['as' => 'apiGetDataMarketOrderRow',          'uses' => 'Syscover\Market\Old\Controllers\OrderRowController@apiGetDataRow',         'resource' => 'market-order',        'action' => 'access']);
    Route::get(config('pulsar.name') . '/market/order/row/get/gift/row/{id}',                                ['as' => 'apiGetGiftMarketOrderRow',          'uses' => 'Syscover\Market\Old\Controllers\OrderRowController@apiGetGiftRow',         'resource' => 'market-order',        'action' => 'access']);
    
    /*
    |--------------------------------------------------------------------------
    | CART PRICE RULES
    |--------------------------------------------------------------------------
    */
    Route::any(config('pulsar.name') . '/market/cart/price/rules/{lang}/{offset?}',                          ['as' => 'cartPriceRule',                     'uses' => 'Syscover\Market\Old\Controllers\CartPriceRuleController@index',                      'resource' => 'market-cart-price-rule',        'action' => 'access']);
    Route::any(config('pulsar.name') . '/market/cart/price/rules/json/data/{lang}',                          ['as' => 'jsonDataCartPriceRule',             'uses' => 'Syscover\Market\Old\Controllers\CartPriceRuleController@jsonData',                   'resource' => 'market-cart-price-rule',        'action' => 'access']);
    Route::get(config('pulsar.name') . '/market/cart/price/rules/create/{lang}/{offset}/{id?}',              ['as' => 'createCartPriceRule',               'uses' => 'Syscover\Market\Old\Controllers\CartPriceRuleController@createRecord',               'resource' => 'market-cart-price-rule',        'action' => 'create']);
    Route::post(config('pulsar.name') . '/market/cart/price/rules/store/{lang}/{offset}/{id?}',              ['as' => 'storeCartPriceRule',                'uses' => 'Syscover\Market\Old\Controllers\CartPriceRuleController@storeRecord',                'resource' => 'market-cart-price-rule',        'action' => 'create']);
    Route::get(config('pulsar.name') . '/market/cart/price/rules/{id}/edit/{lang}/{offset}',                 ['as' => 'editCartPriceRule',                 'uses' => 'Syscover\Market\Old\Controllers\CartPriceRuleController@editRecord',                 'resource' => 'market-cart-price-rule',        'action' => 'access']);
    Route::put(config('pulsar.name') . '/market/cart/price/rules/update/{lang}/{id}/{offset}',               ['as' => 'updateCartPriceRule',               'uses' => 'Syscover\Market\Old\Controllers\CartPriceRuleController@updateRecord',               'resource' => 'market-cart-price-rule',        'action' => 'edit']);
    Route::get(config('pulsar.name') . '/market/cart/price/rules/delete/{lang}/{id}/{offset}',               ['as' => 'deleteCartPriceRule',               'uses' => 'Syscover\Market\Old\Controllers\CartPriceRuleController@deleteRecord',               'resource' => 'market-cart-price-rule',        'action' => 'delete']);
    Route::get(config('pulsar.name') . '/market/cart/price/rules/delete/translation/{lang}/{id}/{offset}',   ['as' => 'deleteTranslationCartPriceRule',    'uses' => 'Syscover\Market\Old\Controllers\CartPriceRuleController@deleteTranslationRecord',    'resource' => 'market-cart-price-rule',        'action' => 'delete']);
    Route::delete(config('pulsar.name') . '/market/cart/price/rules/delete/select/records/{lang}',           ['as' => 'deleteSelectCartPriceRule',         'uses' => 'Syscover\Market\Old\Controllers\CartPriceRuleController@deleteRecordsSelect',        'resource' => 'market-cart-price-rule',        'action' => 'delete']);
    Route::post(config('pulsar.name') . '/market/cart/price/get/coupon/code',                                ['as' => 'apiGetCouponCodeCartPriceRule',     'uses' => 'Syscover\Market\Old\Controllers\CartPriceRuleController@apiGetCouponCode',           'resource' => 'market-cart-price-rule',        'action' => 'access']);

    /*
    |--------------------------------------------------------------------------
    | CUSTOMER DISCOUNT HISTORY
    |--------------------------------------------------------------------------
    */
    Route::any(config('pulsar.name') . '/market/customer/discount/history/json/data/{ref}/{modal}',          ['as' => 'jsonDataMarketCustomerDiscountHistory',            'uses' => 'Syscover\Market\Old\Controllers\CustomerDiscountHistoryController@jsonData',        'resource' => 'market-order',        'action' => 'access']);
    Route::get(config('pulsar.name') . '/market/customer/discount/history/{id}/show/{offset}/{modal}',       ['as' => 'showMarketCustomerDiscountHistory',                'uses' => 'Syscover\Market\Old\Controllers\CustomerDiscountHistoryController@showRecord',      'resource' => 'market-order',        'action' => 'access']);
    
    /*
    |--------------------------------------------------------------------------
    | CUSTOMER CLASS TAX
    |--------------------------------------------------------------------------
    */
    Route::any(config('pulsar.name') . '/market/customer/class/tax/{offset?}',                                     ['as' => 'marketCustomerClassTax',                     'uses' => 'Syscover\Market\Old\Controllers\CustomerClassTaxController@index',                      'resource' => 'market-tax-customer',        'action' => 'access']);
    Route::any(config('pulsar.name') . '/market/customer/class/tax/json/data',                                     ['as' => 'jsonDataMarketCustomerClassTax',             'uses' => 'Syscover\Market\Old\Controllers\CustomerClassTaxController@jsonData',                   'resource' => 'market-tax-customer',        'action' => 'access']);
    Route::get(config('pulsar.name') . '/market/customer/class/tax/create/{offset}',                               ['as' => 'createMarketCustomerClassTax',               'uses' => 'Syscover\Market\Old\Controllers\CustomerClassTaxController@createRecord',               'resource' => 'market-tax-customer',        'action' => 'create']);
    Route::post(config('pulsar.name') . '/market/customer/class/tax/store/{offset}',                               ['as' => 'storeMarketCustomerClassTax',                'uses' => 'Syscover\Market\Old\Controllers\CustomerClassTaxController@storeRecord',                'resource' => 'market-tax-customer',        'action' => 'create']);
    Route::get(config('pulsar.name') . '/market/customer/class/tax/{id}/edit/{offset}',                            ['as' => 'editMarketCustomerClassTax',                 'uses' => 'Syscover\Market\Old\Controllers\CustomerClassTaxController@editRecord',                 'resource' => 'market-tax-customer',        'action' => 'access']);
    Route::put(config('pulsar.name') . '/market/customer/class/tax/update/{id}/{offset}',                          ['as' => 'updateMarketCustomerClassTax',               'uses' => 'Syscover\Market\Old\Controllers\CustomerClassTaxController@updateRecord',               'resource' => 'market-tax-customer',        'action' => 'edit']);
    Route::get(config('pulsar.name') . '/market/customer/class/tax/delete/{id}/{offset}',                          ['as' => 'deleteMarketCustomerClassTax',               'uses' => 'Syscover\Market\Old\Controllers\CustomerClassTaxController@deleteRecord',               'resource' => 'market-tax-customer',        'action' => 'delete']);
    Route::delete(config('pulsar.name') . '/market/customer/class/tax/delete/select/records',                      ['as' => 'deleteSelectMarketCustomerClassTax',         'uses' => 'Syscover\Market\Old\Controllers\CustomerClassTaxController@deleteRecordsSelect',        'resource' => 'market-tax-customer',        'action' => 'delete']);

    /*
    |--------------------------------------------------------------------------
    | GROUP CUSTOMER CLASS TAX
    |--------------------------------------------------------------------------
    */
    Route::any(config('pulsar.name') . '/market/group/customer/class/tax/{offset?}',                                     ['as' => 'marketGroupCustomerClassTax',                     'uses' => 'Syscover\Market\Old\Controllers\GroupCustomerClassTaxController@index',                      'resource' => 'market-tax-customer-group',        'action' => 'access']);
    Route::any(config('pulsar.name') . '/market/group/customer/class/tax/json/data',                                     ['as' => 'jsonDataMarketGroupCustomerClassTax',             'uses' => 'Syscover\Market\Old\Controllers\GroupCustomerClassTaxController@jsonData',                   'resource' => 'market-tax-customer-group',        'action' => 'access']);
    Route::get(config('pulsar.name') . '/market/group/customer/class/tax/create/{offset}',                               ['as' => 'createMarketGroupCustomerClassTax',               'uses' => 'Syscover\Market\Old\Controllers\GroupCustomerClassTaxController@createRecord',               'resource' => 'market-tax-customer-group',        'action' => 'create']);
    Route::post(config('pulsar.name') . '/market/group/customer/class/tax/store/{offset}',                               ['as' => 'storeMarketGroupCustomerClassTax',                'uses' => 'Syscover\Market\Old\Controllers\GroupCustomerClassTaxController@storeRecord',                'resource' => 'market-tax-customer-group',        'action' => 'create']);
    Route::get(config('pulsar.name') . '/market/group/customer/class/tax/{id}/edit/{offset}',                            ['as' => 'editMarketGroupCustomerClassTax',                 'uses' => 'Syscover\Market\Old\Controllers\GroupCustomerClassTaxController@editRecord',                 'resource' => 'market-tax-customer-group',        'action' => 'access']);
    Route::put(config('pulsar.name') . '/market/group/customer/class/tax/update/{id}/{offset}',                          ['as' => 'updateMarketGroupCustomerClassTax',               'uses' => 'Syscover\Market\Old\Controllers\GroupCustomerClassTaxController@updateRecord',               'resource' => 'market-tax-customer-group',        'action' => 'edit']);
    Route::get(config('pulsar.name') . '/market/group/customer/class/tax/delete/{id}/{offset}',                          ['as' => 'deleteMarketGroupCustomerClassTax',               'uses' => 'Syscover\Market\Old\Controllers\GroupCustomerClassTaxController@deleteRecord',               'resource' => 'market-tax-customer-group',        'action' => 'delete']);
    Route::delete(config('pulsar.name') . '/market/group/customer/class/tax/delete/select/records',                      ['as' => 'deleteSelectMarketGroupCustomerClassTax',         'uses' => 'Syscover\Market\Old\Controllers\GroupCustomerClassTaxController@deleteRecordsSelect',        'resource' => 'market-tax-customer-group',        'action' => 'delete']);

    /*
    |--------------------------------------------------------------------------
    | PRODUCT CLASS TAX
    |--------------------------------------------------------------------------
    */
    Route::any(config('pulsar.name') . '/market/product/class/tax/{offset?}',                                     ['as' => 'marketProductClassTax',                     'uses' => 'Syscover\Market\Old\Controllers\ProductClassTaxController@index',                      'resource' => 'market-tax-product',        'action' => 'access']);
    Route::any(config('pulsar.name') . '/market/product/class/tax/json/data',                                     ['as' => 'jsonDataMarketProductClassTax',             'uses' => 'Syscover\Market\Old\Controllers\ProductClassTaxController@jsonData',                   'resource' => 'market-tax-product',        'action' => 'access']);
    Route::get(config('pulsar.name') . '/market/product/class/tax/create/{offset}',                               ['as' => 'createMarketProductClassTax',               'uses' => 'Syscover\Market\Old\Controllers\ProductClassTaxController@createRecord',               'resource' => 'market-tax-product',        'action' => 'create']);
    Route::post(config('pulsar.name') . '/market/product/class/tax/store/{offset}',                               ['as' => 'storeMarketProductClassTax',                'uses' => 'Syscover\Market\Old\Controllers\ProductClassTaxController@storeRecord',                'resource' => 'market-tax-product',        'action' => 'create']);
    Route::get(config('pulsar.name') . '/market/product/class/tax/{id}/edit/{offset}',                            ['as' => 'editMarketProductClassTax',                 'uses' => 'Syscover\Market\Old\Controllers\ProductClassTaxController@editRecord',                 'resource' => 'market-tax-product',        'action' => 'access']);
    Route::put(config('pulsar.name') . '/market/product/class/tax/update/{id}/{offset}',                          ['as' => 'updateMarketProductClassTax',               'uses' => 'Syscover\Market\Old\Controllers\ProductClassTaxController@updateRecord',               'resource' => 'market-tax-product',        'action' => 'edit']);
    Route::get(config('pulsar.name') . '/market/product/class/tax/delete/{id}/{offset}',                          ['as' => 'deleteMarketProductClassTax',               'uses' => 'Syscover\Market\Old\Controllers\ProductClassTaxController@deleteRecord',               'resource' => 'market-tax-product',        'action' => 'delete']);
    Route::delete(config('pulsar.name') . '/market/product/class/tax/delete/select/records',                      ['as' => 'deleteSelectMarketProductClassTax',         'uses' => 'Syscover\Market\Old\Controllers\ProductClassTaxController@deleteRecordsSelect',        'resource' => 'market-tax-product',        'action' => 'delete']);

    /*
    |--------------------------------------------------------------------------
    | TAX RATE ZONE
    |--------------------------------------------------------------------------
    */
    Route::any(config('pulsar.name') . '/market/tax/rate/zone/{offset?}',                                        ['as' => 'marketTaxRateZone',                     'uses' => 'Syscover\Market\Old\Controllers\TaxRateZoneController@index',                      'resource' => 'market-tax-rate-zone',        'action' => 'access']);
    Route::any(config('pulsar.name') . '/market/tax/rate/zone/json/data',                                        ['as' => 'jsonDataMarketTaxRateZone',             'uses' => 'Syscover\Market\Old\Controllers\TaxRateZoneController@jsonData',                   'resource' => 'market-tax-rate-zone',        'action' => 'access']);
    Route::get(config('pulsar.name') . '/market/tax/rate/zone/create/{offset}',                                  ['as' => 'createMarketTaxRateZone',               'uses' => 'Syscover\Market\Old\Controllers\TaxRateZoneController@createRecord',               'resource' => 'market-tax-rate-zone',        'action' => 'create']);
    Route::post(config('pulsar.name') . '/market/tax/rate/zone/store/{offset}',                                  ['as' => 'storeMarketTaxRateZone',                'uses' => 'Syscover\Market\Old\Controllers\TaxRateZoneController@storeRecord',                'resource' => 'market-tax-rate-zone',        'action' => 'create']);
    Route::get(config('pulsar.name') . '/market/tax/rate/zone/{id}/edit/{offset}',                               ['as' => 'editMarketTaxRateZone',                 'uses' => 'Syscover\Market\Old\Controllers\TaxRateZoneController@editRecord',                 'resource' => 'market-tax-rate-zone',        'action' => 'access']);
    Route::put(config('pulsar.name') . '/market/tax/rate/zone/update/{id}/{offset}',                             ['as' => 'updateMarketTaxRateZone',               'uses' => 'Syscover\Market\Old\Controllers\TaxRateZoneController@updateRecord',               'resource' => 'market-tax-rate-zone',        'action' => 'edit']);
    Route::get(config('pulsar.name') . '/market/tax/rate/zone/delete/{id}/{offset}',                             ['as' => 'deleteMarketTaxRateZone',               'uses' => 'Syscover\Market\Old\Controllers\TaxRateZoneController@deleteRecord',               'resource' => 'market-tax-rate-zone',        'action' => 'delete']);
    Route::delete(config('pulsar.name') . '/market/tax/rate/zone/delete/select/records',                         ['as' => 'deleteSelectMarketTaxRateZone',         'uses' => 'Syscover\Market\Old\Controllers\TaxRateZoneController@deleteRecordsSelect',        'resource' => 'market-tax-rate-zone',        'action' => 'delete']);

    /*
    |--------------------------------------------------------------------------
    | TAX RULE
    |--------------------------------------------------------------------------
    */
    Route::any(config('pulsar.name') . '/market/tax/rule/{offset?}',                                         ['as' => 'marketTaxRule',                     'uses' => 'Syscover\Market\Old\Controllers\TaxRuleController@index',                      'resource' => 'market-tax-rule',        'action' => 'access']);
    Route::any(config('pulsar.name') . '/market/tax/rule/json/data',                                         ['as' => 'jsonDataMarketTaxRule',             'uses' => 'Syscover\Market\Old\Controllers\TaxRuleController@jsonData',                   'resource' => 'market-tax-rule',        'action' => 'access']);
    Route::get(config('pulsar.name') . '/market/tax/rule/create/{offset}',                                   ['as' => 'createMarketTaxRule',               'uses' => 'Syscover\Market\Old\Controllers\TaxRuleController@createRecord',               'resource' => 'market-tax-rule',        'action' => 'create']);
    Route::post(config('pulsar.name') . '/market/tax/rule/store/{offset}',                                   ['as' => 'storeMarketTaxRule',                'uses' => 'Syscover\Market\Old\Controllers\TaxRuleController@storeRecord',                'resource' => 'market-tax-rule',        'action' => 'create']);
    Route::get(config('pulsar.name') . '/market/tax/rule/{id}/edit/{offset}',                                ['as' => 'editMarketTaxRule',                 'uses' => 'Syscover\Market\Old\Controllers\TaxRuleController@editRecord',                 'resource' => 'market-tax-rule',        'action' => 'access']);
    Route::put(config('pulsar.name') . '/market/tax/rule/update/{id}/{offset}',                              ['as' => 'updateMarketTaxRule',               'uses' => 'Syscover\Market\Old\Controllers\TaxRuleController@updateRecord',               'resource' => 'market-tax-rule',        'action' => 'edit']);
    Route::get(config('pulsar.name') . '/market/tax/rule/delete/{id}/{offset}',                              ['as' => 'deleteMarketTaxRule',               'uses' => 'Syscover\Market\Old\Controllers\TaxRuleController@deleteRecord',               'resource' => 'market-tax-rule',        'action' => 'delete']);
    Route::delete(config('pulsar.name') . '/market/tax/rule/delete/select/records',                          ['as' => 'deleteSelectMarketTaxRule',         'uses' => 'Syscover\Market\Old\Controllers\TaxRuleController@deleteRecordsSelect',        'resource' => 'market-tax-rule',        'action' => 'delete']);
    Route::get(config('pulsar.name') . '/market/tax/rule/api/get/product/taxes/{price}/{productClassTax}',   ['as' => 'apiGetProductTaxesMarketTaxRule',   'uses' => 'Syscover\Market\Old\Controllers\TaxRuleController@apiGetProductTaxes',         'resource' => 'market-tax-rule',        'action' => 'access']);
    
    /*
    |--------------------------------------------------------------------------
    | PAYPAL
    |--------------------------------------------------------------------------
    */
    Route::any(config('pulsar.name') . '/market/paypal/settings',                                            ['as' => 'marketPayPalSettings',              'uses' => 'Syscover\Market\Old\Controllers\PayPalSettingsController@index',               'resource' => 'market-tpv-paypal-setting',           'action' => 'access']);
    Route::put(config('pulsar.name') . '/market/paypal/settings/update',                                     ['as' => 'updateMarketPayPalSettings',        'uses' => 'Syscover\Market\Old\Controllers\PayPalSettingsController@updateRecord',        'resource' => 'market-tpv-paypal-setting',           'action' => 'edit']);

    /*
    |--------------------------------------------------------------------------
    | PAYPAL WEB PROFILE
    |--------------------------------------------------------------------------
    */
    Route::any(config('pulsar.name') . '/market/paypal/web/profile',                                         ['as' => 'marketPayPalWebProfile',              'uses' => 'Syscover\Market\Old\Controllers\PayPalWebProfileController@index',           'resource' => 'market-tpv-paypal-web-profile',          'action' => 'access']);
    Route::get(config('pulsar.name') . '/market/paypal/web/profile/create',                                  ['as' => 'createMarketPayPalWebProfile',        'uses' => 'Syscover\Market\Old\Controllers\PayPalWebProfileController@createRecord',    'resource' => 'market-tpv-paypal-web-profile',          'action' => 'create']);
    Route::post(config('pulsar.name') . '/market/paypal/web/profile/store',                                  ['as' => 'storeMarketPayPalWebProfile',         'uses' => 'Syscover\Market\Old\Controllers\PayPalWebProfileController@storeRecord',     'resource' => 'market-tpv-paypal-web-profile',          'action' => 'create']);
    Route::get(config('pulsar.name') . '/market/paypal/web/profile/{id}/edit',                               ['as' => 'editMarketPayPalWebProfile',          'uses' => 'Syscover\Market\Old\Controllers\PayPalWebProfileController@editRecord',      'resource' => 'market-tpv-paypal-web-profile',          'action' => 'access']);
    Route::put(config('pulsar.name') . '/market/paypal/web/profile/update/{id}',                             ['as' => 'updateMarketPayPalWebProfile',        'uses' => 'Syscover\Market\Old\Controllers\PayPalWebProfileController@updateRecord',    'resource' => 'market-tpv-paypal-web-profile',          'action' => 'edit']);
    Route::get(config('pulsar.name') . '/market/paypal/web/profile/delete/{id}',                             ['as' => 'deleteMarketPayPalWebProfile',        'uses' => 'Syscover\Market\Old\Controllers\PayPalWebProfileController@deleteRecord',    'resource' => 'market-tpv-paypal-web-profile',          'action' => 'delete']);
});

Route::group(['middleware' => ['noCsrWeb']], function() {

    /*
    |--------------------------------------------------------------------------
    | PAYPAL
    |--------------------------------------------------------------------------
    */
    Route::post(config('pulsar.name') . '/market/tpv/paypal/payment/create',                                 ['as' => 'createMarketPayPalPayment',         'uses' => 'Syscover\Market\Old\Controllers\PayPalController@createPayment']);
    Route::get(config('pulsar.name') . '/market/tpv/paypal/payment/checkout',                                ['as' => 'checkoutMarketPayPalPayment',       'uses' => 'Syscover\Market\Old\Controllers\PayPalController@checkoutPayment']);

    // web profile
    //Route::get(config('pulsar.name') . '/market/tpv/paypal/web/profile/create',                              ['as' => 'createMarketPayPalWebProfile',      'uses' => 'Syscover\Market\Controllers\PayPalController@createWebProfile']);
    //Route::get(config('pulsar.name') . '/market/tpv/paypal/web/profile',                                     ['as' => 'marketPayPalWebProfile',            'uses' => 'Syscover\Market\Controllers\PayPalController@webProfile']);

});