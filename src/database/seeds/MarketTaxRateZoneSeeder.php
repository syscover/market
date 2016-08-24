<?php

use Illuminate\Database\Seeder;
use Syscover\Market\Models\TaxRateZone;

class MarketTaxRateZoneSeeder extends Seeder {

    public function run()
    {
        TaxRateZone::insert([
            ['id_103' => 1,     'name_103' => 'Spain - 21%',    'country_id_103' => 'ES',   'territorial_area_1_id_103' => null,    'territorial_area_2_id_103' => null,    'territorial_area_3_id_103' => null,    'cp_103' => null,    'tax_rate_103' => 21.00],
            ['id_103' => 2,     'name_103' => 'Spain - 10%',    'country_id_103' => 'ES',   'territorial_area_1_id_103' => null,    'territorial_area_2_id_103' => null,    'territorial_area_3_id_103' => null,    'cp_103' => null,    'tax_rate_103' => 10.00],
            ['id_103' => 3,     'name_103' => 'Spain - 4%',     'country_id_103' => 'ES',   'territorial_area_1_id_103' => null,    'territorial_area_2_id_103' => null,    'territorial_area_3_id_103' => null,    'cp_103' => null,    'tax_rate_103' => 4.00],
            ['id_103' => 4,     'name_103' => 'Spain - 0%',     'country_id_103' => 'ES',   'territorial_area_1_id_103' => null,    'territorial_area_2_id_103' => null,    'territorial_area_3_id_103' => null,    'cp_103' => null,    'tax_rate_103' => 0.00],
        ]);
    }
}

/*
 * Command to run:
 * php artisan db:seed --class="MarketTaxRateZoneSeeder"
 */