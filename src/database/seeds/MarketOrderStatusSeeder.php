<?php

use Illuminate\Database\Seeder;
use Syscover\Market\Models\OrderStatus;

class MarketOrderStatusSeeder extends Seeder
{
    public function run()
    {
        OrderStatus::insert([
            ['id_114' => 1, 'lang_114' => 'es', 'name_114' => 'Pendiente de pago', 'active_114' => 0, 'data_lang_114' => '{"langs":["es"]}'],
            ['id_114' => 2, 'lang_114' => 'es', 'name_114' => 'Pago confirmado', 'active_114' => 0, 'data_lang_114' => '{"langs":["es"]}'],
            ['id_114' => 3, 'lang_114' => 'es', 'name_114' => 'A la espera de existencias', 'active_114' => 0, 'data_lang_114' => '{"langs":["es"]}'],
            ['id_114' => 4, 'lang_114' => 'es', 'name_114' => 'Preparando', 'active_114' => 0, 'data_lang_114' => '{"langs":["es"]}'],
            ['id_114' => 5, 'lang_114' => 'es', 'name_114' => 'Enviado', 'active_114' => 0, 'data_lang_114' => '{"langs":["es"]}'],
            ['id_114' => 6, 'lang_114' => 'es', 'name_114' => 'Completado', 'active_114' => 0, 'data_lang_114' => '{"langs":["es"]}'],
            ['id_114' => 7, 'lang_114' => 'es', 'name_114' => 'Cancelado', 'active_114' => 0, 'data_lang_114' => '{"langs":["es"]}']
        ]);
    }
}

/*
 * Command to run:
 * php artisan db:seed --class="MarketOrderStatusSeeder"
 */