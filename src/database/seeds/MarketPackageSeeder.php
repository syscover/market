<?php

use Illuminate\Database\Seeder;
use Syscover\Pulsar\Models\Package;

class MarketPackageSeeder extends Seeder
{
    public function run()
    {
        Package::insert([
            ['id_012' => '12', 'name_012' => 'Market Package', 'folder_012' => 'market', 'sorting_012' => 12, 'active_012' => false]
        ]);
    }
}

/*
 * Command to run:
 * php artisan db:seed --class="MarketPackageSeeder"
 */