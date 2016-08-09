<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class MarketTableSeeder extends Seeder
{
    public function run()
    {
        Model::unguard();
        
        $this->call(MarketPackageTableSeeder::class);
        $this->call(MarketResourceTableSeeder::class);
        $this->call(MarketAttachmentMimeSeeder::class);
        $this->call(MarketOrderStatusSeeder::class);
        $this->call(MarketProductClassTaxSeeder::class);
        $this->call(MarketCustomerClassTaxSeeder::class);
        $this->call(MarketPaymentMethodSeeder::class);
        
        Model::reguard();
    }
}

/*
 * Command to run:
 * php artisan db:seed --class="MarketOrderStatusSeeder"
 */