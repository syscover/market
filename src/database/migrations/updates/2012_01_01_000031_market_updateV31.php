<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class MarketUpdateV31 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(! Schema::hasColumn('012_117_order_row', 'subtotal_with_discounts_117'))
        {
            Schema::table('012_117_order_row', function (Blueprint $table) {
                $table->decimal('subtotal_with_discounts_117', 12, 4)->after('discount_amount_117');
            });
        }

        if(! Schema::hasColumn('012_117_order_row', 'total_117'))
        {
            Schema::table('012_117_order_row', function (Blueprint $table) {
                $table->decimal('total_117', 12, 4)->after('tax_amount_117');
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