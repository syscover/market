<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Syscover\Pulsar\Libraries\DBLibrary;

class MarketUpdateV32 extends Migration
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
        if(Schema::hasColumn('012_116_order', 'tax_amount_116'))
        {
            // tax_amount_116
            DBLibrary::renameColumn('012_116_order', 'tax_amount_116', 'tax_amount_116', 'DECIMAL', '12,4', false, false);
        }

        if(Schema::hasColumn('012_116_order', 'total_discount_amount_116'))
        {
            // total_discount_amount_116
            DBLibrary::renameColumn('012_116_order', 'total_discount_amount_116', 'discount_amount_116', 'DECIMAL', '12,4', false, false);
        }

        if(Schema::hasColumn('012_116_order', 'shipping_116'))
        {
            // shipping_116
            DBLibrary::renameColumn('012_116_order', 'shipping_116', 'shipping_amount_116', 'DECIMAL', '12,4', false, false);
        }

        if(! Schema::hasColumn('012_116_order', 'subtotal_with_discounts_116'))
        {
            Schema::table('012_116_order', function (Blueprint $table) {
                $table->decimal('subtotal_with_discounts_116', 12, 4)->after('discount_amount_116');
            });
        }

        // ***********************
        // 012_117_order_row
        // ***********************
        if(Schema::hasColumn('012_117_order_row', 'gift_117'))
        {
            // gift_117
            DBLibrary::renameColumn('012_117_order_row', 'gift_117', 'has_gift_117', 'TINYINT', 1, false, false);
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(){}
}