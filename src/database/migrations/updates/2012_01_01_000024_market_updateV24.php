<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class MarketUpdateV24 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(Schema::hasColumn('012_111_product', 'subtotal_111'))
        {
            Schema::table('012_111_product', function (Blueprint $table) {
                $table->dropColumn('subtotal_111');
            });
        }
        if(Schema::hasColumn('012_111_product', 'tax_amount_111'))
        {
            Schema::table('012_111_product', function (Blueprint $table) {
                $table->dropColumn('tax_amount_111');
            });
        }
        if(Schema::hasColumn('012_111_product', 'total_111'))
        {
            Schema::table('012_111_product', function (Blueprint $table) {
                $table->dropColumn('total_111');
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