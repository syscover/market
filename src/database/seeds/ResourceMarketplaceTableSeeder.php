<?php

use Illuminate\Database\Seeder;
use Syscover\Pulsar\Models\Resource;

class ResourceMarketplaceTableSeeder extends Seeder {

    public function run()
    {
        Resource::insert([
            ['id_007' => 'market','name_007' => 'Marketplace Package','package_007' => '9']
        ]);
    }
}

/*
 * Command to run:
 * php artisan db:seed --class="ResourceMarketplaceTableSeeder"
 */