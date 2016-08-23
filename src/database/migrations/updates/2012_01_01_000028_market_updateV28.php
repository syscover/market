<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Syscover\Pulsar\Libraries\DBLibrary;

class MarketUpdateV28 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // delete column row_discount_amount_116
        if(Schema::hasColumn('012_116_order', 'row_discount_amount_116'))
        {
            Schema::table('012_116_order', function (Blueprint $table) {
                $table->dropColumn('row_discount_amount_116');
            });
        }

        // delete column total_discount_percentage_116
        if(Schema::hasColumn('012_116_order', 'total_discount_percentage_116'))
        {
            Schema::table('012_116_order', function (Blueprint $table) {
                $table->dropColumn('total_discount_percentage_116');
            });
        }

        // delete column total_discount_percentage_116
        if(Schema::hasColumn('012_126_customer_discount_history', 'discount_percentage_amount_126'))
        {
            // discount_percentage_amount_126
            DBLibrary::renameColumn('012_126_customer_discount_history', 'discount_percentage_amount_126', 'discount_amount_126', 'DECIMAL', '12,4', false, true);
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(){}
}