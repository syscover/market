<?php

use Illuminate\Database\Seeder;
use Syscover\Pulsar\Models\Resource;

class MarketResourceSeeder extends Seeder {

    public function run()
    {
        Resource::insert([
            ['id_007' => 'market',                      'name_007' => 'Market Package',                     'package_id_007' => '12'],
            ['id_007' => 'market-cart-price-rule',      'name_007' => 'Marketing -- Cart price rule',       'package_id_007' => '12'],
            ['id_007' => 'market-category',             'name_007' => 'Categories',                         'package_id_007' => '12'],
            ['id_007' => 'market-order',                'name_007' => 'Orders',                             'package_id_007' => '12'],
            ['id_007' => 'market-order-status',         'name_007' => 'Order status',                       'package_id_007' => '12'],
            ['id_007' => 'market-payment-method',       'name_007' => 'Payment methods',                    'package_id_007' => '12'],
            ['id_007' => 'market-product',              'name_007' => 'Products',                           'package_id_007' => '12'],
            ['id_007' => 'market-tax',                  'name_007' => 'Taxes',                              'package_id_007' => '12'],
            ['id_007' => 'market-tax-customer',         'name_007' => 'Taxes -- Customer class tax',        'package_id_007' => '12'],
            ['id_007' => 'market-tax-customer-group',   'name_007' => 'Taxes -- Group Customer class tax',  'package_id_007' => '12'],
            ['id_007' => 'market-tax-product',          'name_007' => 'Taxes -- Product class tax',         'package_id_007' => '12'],
            ['id_007' => 'market-tax-rate-zone',        'name_007' => 'Taxes -- Tax rate zone',             'package_id_007' => '12'],
            ['id_007' => 'market-tax-rule',             'name_007' => 'Taxes -- Tax rule',                  'package_id_007' => '12'],
            ['id_007' => 'market-tpv',                  'name_007' => 'TPVs',                               'package_id_007' => '12'],
            ['id_007' => 'market-tpv-paypal',           'name_007' => 'TPVs -- PayPal',                     'package_id_007' => '12'],
            ['id_007' => 'market-tpv-paypal-setting',   'name_007' => 'TPVs -- PayPal -- Setting',          'package_id_007' => '12'],

        ]);
    }
}

/*
 * Command to run:
 * php artisan db:seed --class="MarketResourceSeeder"
 */