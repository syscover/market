<?php

use Illuminate\Database\Seeder;
use Syscover\Pulsar\Models\Resource;

class MarketResourceTableSeeder extends Seeder {

    public function run()
    {
        Resource::insert([
            ['id_007' => 'market',                      'name_007' => 'Market Package',                     'package_007' => '12'],
            ['id_007' => 'market-tax',                  'name_007' => 'Taxes',                              'package_007' => '12'],
            ['id_007' => 'market-tax-customer',         'name_007' => 'Taxes -- Customer class tax',        'package_007' => '12'],
            ['id_007' => 'market-tax-customer-group',   'name_007' => 'Taxes -- Group Customer class tax',  'package_007' => '12'],
            ['id_007' => 'market-tax-product',          'name_007' => 'Taxes -- Product class tax',         'package_007' => '12'],
            ['id_007' => 'market-tax-rate-zone',        'name_007' => 'Taxes -- Tax rate zone',             'package_007' => '12'],
            ['id_007' => 'market-tax-rule',             'name_007' => 'Taxes -- Tax rule',                  'package_007' => '12'],
            ['id_007' => 'market-tax-setting',          'name_007' => 'Taxes -- Tax setting',               'package_007' => '12'],
            ['id_007' => 'market-category',             'name_007' => 'Categories',                         'package_007' => '12'],
            ['id_007' => 'market-product',              'name_007' => 'Products',                           'package_007' => '12'],
            ['id_007' => 'market-order-status',         'name_007' => 'Order status',                       'package_007' => '12'],
            ['id_007' => 'market-payment-method',       'name_007' => 'Payment methods',                    'package_007' => '12'],
            ['id_007' => 'market-order',                'name_007' => 'Orders',                             'package_007' => '12'],
            ['id_007' => 'market-cart-price-rule',      'name_007' => 'Marketing -- Cart price rule',       'package_007' => '12'],
        ]);
    }
}

/*
 * Command to run:
 * php artisan db:seed --class="MarketResourceTableSeeder"
 */