<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class MarketTableSeeder extends Seeder
{
    public function run()
    {
        Model::unguard();
        
        $this->call(MarketPackageSeeder::class);
        $this->call(MarketResourceSeeder::class);
        $this->call(MarketAttachmentMimeSeeder::class);
        $this->call(MarketOrderStatusSeeder::class);
        $this->call(MarketPaymentMethodSeeder::class);
        $this->call(MarketCustomerClassTaxSeeder::class);
        $this->call(MarketGroupCustomerClassTaxSeeder::class);
        $this->call(MarketProductClassTaxSeeder::class);
        $this->call(MarketTaxRateZoneSeeder::class);

        Model::reguard();
    }
}

/*
 * Command to run:
 * php artisan db:seed --class="MarketTableSeeder"
 */