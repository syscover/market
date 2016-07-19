<?php

use Illuminate\Database\Seeder;
use Syscover\Market\Models\ProductClassTax;

class MarketProductClassTaxSeeder extends Seeder
{
    public function run()
    {
        ProductClassTax::insert([
            ['id_101' => 1, 'name_101' => 'Producto IVA General'],
            ['id_101' => 2, 'name_101' => 'Producto IVA Reducido'],
            ['id_101' => 3, 'name_101' => 'Producto IVA Superreducido']
        ]);
    }
}

/*
 * Command to run:
 * php artisan db:seed --class="MarketProductClassTaxSeeder"
 */