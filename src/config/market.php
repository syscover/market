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

    //
    'libraryFolder'                 => '/packages/syscover/market/storage/library',
    'tmpFolder'                     => '/packages/syscover/market/storage/tmp',
    'attachmentFolder'              => '/packages/syscover/market/storage/attachment',
    'iconsFolder'                   => '/packages/syscover/pulsar/images/icons',

    //******************************************************************************************************************
    //***   orders
    //******************************************************************************************************************
    'orderPrefixId'                 => env('ORDER_PREFIX_ID', ''),

    //******************************************************************************************************************
    //***   Type prices of prduct
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
        (object)['id' => 3,      'name' => 'market::pulsar.transportable_downloadable']
    ],

    //******************************************************************************************************************
    //***   Product prices tax
    //******************************************************************************************************************
    'productPrices'                 => [
        (object)['id' => 1,      'name' => 'market::pulsar.excluding_tax'],
        (object)['id' => 2,      'name' => 'market::pulsar.including_tax']
    ],

    //******************************************************************************************************************
    //***   Shipping prices tax
    //******************************************************************************************************************
    'shippingPrices'                => [
        (object)['id' => 1,      'name' => 'market::pulsar.excluding_tax'],
        (object)['id' => 2,      'name' => 'market::pulsar.including_tax']
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
];