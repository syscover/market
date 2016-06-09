<?php

use Illuminate\Database\Seeder;
use Syscover\Market\Models\OrderStatus;

class MarketProductClassTaxSeeder extends Seeder
{
    public function run()
    {
        OrderStatus::insert([
            ['id_101' => 1, 'name_101' => 'Producto IVA General'],
            ['id_114' => 2, 'name_101' => 'Producto IVA Reducido'],
            ['id_114' => 3, 'name_101' => 'Producto IVA Superreducido']
        ]);
    }
}

/*
 * Command to run:
 * php artisan db:seed --class="MarketProductClassTaxSeeder"
 */