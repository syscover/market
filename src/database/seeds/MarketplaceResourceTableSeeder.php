<?php

use Illuminate\Database\Seeder;
use Syscover\Pulsar\Models\Resource;

class MarketplaceResourceTableSeeder extends Seeder {

    public function run()
    {
        Resource::insert([
            ['id_007' => 'market',              'name_007' => 'Marketplace Package',    'package_007' => '9'],
            ['id_007' => 'market-product-tax',  'name_007' => 'Product tax',            'package_007' => '9'],
            ['id_007' => 'market-customer-tax', 'name_007' => 'Customer tax',           'package_007' => '9'],
            ['id_007' => 'market-rules-tax',    'name_007' => 'Rules tax',              'package_007' => '9']
        ]);
    }
}

/*
 * Command to run:
 * php artisan db:seed --class="MarketplaceResourceTableSeeder"
 */