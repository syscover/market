<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Market
    |--------------------------------------------------------------------------
    |
    | Config file
    |
    */

    'libraryFolder'                 => '/packages/syscover/market/storage/library',
    'tmpFolder'                     => '/packages/syscover/market/storage/tmp',
    'attachmentFolder'              => '/packages/syscover/market/storage/attachment',
    'iconsFolder'                   => '/packages/syscover/pulsar/images/icons',

    //******************************************************************************************************************
    //***   orders
    //******************************************************************************************************************
    'orderIdPrefix'                 => env('ORDER_ID_PREFIX', ''),

    //******************************************************************************************************************
    //***   Type prices of product
    //******************************************************************************************************************
    'priceTypes'                    => [
        (object)['id' => 1,      'name' => 'market::pulsar.single_price'],
        (object)['id' => 2,      'name' => 'market::pulsar.undefined_price']
    ],

    //******************************************************************************************************************
    //***   Type of prduct
    //******************************************************************************************************************
    'productTypes'                  => [
        (object)['id' => 1,      'name' => 'market::pulsar.downloadable'],
        (object)['id' => 2,      'name' => 'market::pulsar.transportable'],
        (object)['id' => 3,      'name' => 'market::pulsar.transportable_downloadable'],
        (object)['id' => 4,      'name' => 'market::pulsar.service'],
    ],

    //******************************************************************************************************************
    //***   PayPal settings
    //******************************************************************************************************************
    // PayPal mode, sandbox | live
    'payPalMode'                    => env('PAYPAL_MODE', ''),

    // SANDBOX
    'payPalSandboxWebProfile'       => env('PAYPAL_SANDBOX_WEB_PROFILE', ''),
    'payPalSandboxClientId'         => env('PAYPAL_SANDBOX_CLIENT_ID', ''),
    'payPalSandboxSecret'           => env('PAYPAL_SANDBOX_SECRET', ''),

    // LIVE
    'payPalLiveWebProfile'          => env('PAYPAL_LIVE_WEB_PROFILE', ''),
    'payPalLiveClientId'            => env('PAYPAL_LIVE_CLIENT_ID', ''),
    'payPalLiveSecret'              => env('PAYPAL_LIVE_SECRET_KEY', ''),

    //******************************************************************************************************************
    //***   RedSys settings
    //******************************************************************************************************************
    // RedSys mode, test | live
    'redSysEnviroment'              => env('REDSYS_ENVIROMENT', ''),

    // TEST
    'redSysTestMerchantName'        => env('REDSYS_TEST_MERCHANT_NAME', ''),
    'redSysTestMerchantCode'        => env('REDSYS_TEST_MERCHANT_CODE', ''),
    'redSysTestKey'                 => env('REDSYS_TEST_KEY', ''),

    // LIVE
    'redSysLiveMerchantName'        => env('REDSYS_LIVE_MERCHANT_NAME', ''),
    'redSysLiveMerchantCode'        => env('REDSYS_LIVE_MERCHANT_CODE', ''),
    'redSysLiveKey'                 => env('REDSYS_LIVE_KEY', ''),

    //******************************************************************************************************************
    //***   Discount type on shopping cart
    //******************************************************************************************************************
    'discountTypes'                => [
        (object)['id' => 1,      'name' => 'market::pulsar.without_discount'],
        (object)['id' => 2,      'name' => 'market::pulsar.discount_percentage_subtotal'],
        (object)['id' => 3,      'name' => 'market::pulsar.discount_fixed_amount_subtotal'],
        (object)['id' => 4,      'name' => 'market::pulsar.discount_percentage_total'],
        (object)['id' => 5,      'name' => 'market::pulsar.discount_fixed_amount_total'],
    ],

    //******************************************************************************************************************
    //***   Discount families
    //******************************************************************************************************************
    'ruleFamilies'                => [
        (object)['id' => 1,      'name' => 'market::pulsar.cart_price_rule'],
        (object)['id' => 2,      'name' => 'market::pulsar.catalog_price_rule'],
        (object)['id' => 3,      'name' => 'market::pulsar.customer_price_rule'],
    ],

    //******************************************************************************************************************
    //***   Tax values
    //******************************************************************************************************************
    'productPricesValues'           => [
        (object)['id' => 1,      'name' => 'market::pulsar.excluding_tax'],
        (object)['id' => 2,      'name' => 'market::pulsar.including_tax']
    ],
    'shippingPricesValues'          => [
        (object)['id' => 1,      'name' => 'market::pulsar.excluding_tax'],
        (object)['id' => 2,      'name' => 'market::pulsar.including_tax']
    ],

    // Tax default values
    'taxCountry'                    => env('TAX_COUNTRY', 'ES'),        // country from take tax
    'taxCustomerClass'              => env('TAX_CUSTOMER_CLASS', 1),    // customer group ID to taka for calculate tax

    // Type of prices
    'taxProductPrices'              => env('TAX_PRODUCT_PRICES', 1),
    'taxShippingPrices'             => env('TAX_SHIPPING_PRICES', 1),

    // Display prices
    'taxProductDisplayPrices'       => env('TAX_PRODUCT_DISPLAY_PRICES', 1),
    'taxShippingDisplayPrices'      => env('TAX_SHIPPING_DISPLAY_PRICES', 1),


];