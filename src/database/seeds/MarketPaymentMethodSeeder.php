<?php

use Illuminate\Database\Seeder;
use Syscover\Market\Models\PaymentMethod;

class MarketPaymentMethodSeeder extends Seeder
{
    public function run()
    {
        PaymentMethod::insert([
            ['id_115' => 1, 'lang_id_115' => 'es', 'name_115' => 'Tarjeta de crédito',      'order_status_successful_id_115' => 2, 'active_115' => false, 'data_lang_115' => '{"langs":["es","en"]}'],
            ['id_115' => 1, 'lang_id_115' => 'en', 'name_115' => 'Credit card',             'order_status_successful_id_115' => 2, 'active_115' => false, 'data_lang_115' => '{"langs":["es","en"]}'],
            ['id_115' => 2, 'lang_id_115' => 'es', 'name_115' => 'PayPal',                  'order_status_successful_id_115' => 2, 'active_115' => false, 'data_lang_115' => '{"langs":["es","en"]}'],
            ['id_115' => 2, 'lang_id_115' => 'en', 'name_115' => 'PayPal',                  'order_status_successful_id_115' => 2, 'active_115' => false, 'data_lang_115' => '{"langs":["es","en"]}'],
            ['id_115' => 3, 'lang_id_115' => 'es', 'name_115' => 'Transferencia bancaria',  'order_status_successful_id_115' => 1, 'active_115' => false, 'data_lang_115' => '{"langs":["es","en"]}'],
            ['id_115' => 3, 'lang_id_115' => 'en', 'name_115' => 'Wire transfer',           'order_status_successful_id_115' => 1, 'active_115' => false, 'data_lang_115' => '{"langs":["es","en"]}'],
        ]);
    }
}

/*
 * Command to run:
 * php artisan db:seed --class="MarketProductClassTaxSeeder"
 */