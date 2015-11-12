<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class MarketplaceTableSeeder extends Seeder
{
    public function run()
    {
        Model::unguard();

        $this->call(MarketplacePackageTableSeeder::class);
        $this->call(MarketplaceResourceTableSeeder::class);
    }
}

/*
 * Command to run:
 * php artisan db:seed --class="MarketplaceTableSeeder.php"
 */