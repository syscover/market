<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class MarketUpdateV23 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(! Schema::hasColumn('012_111_product', 'subtotal_111'))
        {
            Schema::table('012_111_product', function (Blueprint $table) {
                $table->decimal('subtotal_111')->nullable()->after('price_111');
            });
        }
        if(! Schema::hasColumn('012_111_product', 'tax_amount_111'))
        {
            Schema::table('012_111_product', function (Blueprint $table) {
                $table->decimal('tax_amount_111')->nullable()->after('subtotal_111');
            });
        }
        if(! Schema::hasColumn('012_111_product', 'total_111'))
        {
            Schema::table('012_111_product', function (Blueprint $table) {
                $table->decimal('total_111')->nullable()->after('tax_amount_111');
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