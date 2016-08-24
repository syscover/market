<?php

use Illuminate\Database\Seeder;
use Syscover\Market\Models\CustomerClassTax;

class MarketCustomerClassTaxSeeder extends Seeder
{
    public function run()
    {
        CustomerClassTax::insert([
            ['id_100' => 1, 'name_100' => 'Particular customer'],
            ['id_100' => 2, 'name_100' => 'European society'],
            ['id_100' => 3, 'name_100' => 'No European society']
        ]);
    }
}

/*
 * Command to run:
 * php artisan db:seed --class="MarketCustomerClassTaxSeeder"
 */