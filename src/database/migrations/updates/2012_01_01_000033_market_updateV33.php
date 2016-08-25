<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Syscover\Pulsar\Libraries\DBLibrary;

class MarketUpdateV33 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // ***********************
        // 012_116_order
        // ***********************
        if(! Schema::hasColumn('012_116_order', 'cart_items_total_without_discounts_116'))
        {
            Schema::table('012_116_order', function (Blueprint $table) {
                $table->decimal('cart_items_total_without_discounts_116', 12, 4)->after('tax_amount_116');
            });
        }

        // ***********************
        // 012_117_order_row
        // ***********************
        if(! Schema::hasColumn('012_117_order_row', 'total_without_discounts_117'))
        {
            Schema::table('012_117_order_row', function (Blueprint $table) {
                $table->decimal('total_without_discounts_117', 12, 4)->after('subtotal_117');
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(){}
}