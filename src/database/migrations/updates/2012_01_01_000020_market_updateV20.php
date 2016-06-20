<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class MarketUpdateV20 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(! Schema::hasColumn('012_111_product', 'product_class_tax_id_111'))
        {
            Schema::table('012_111_product', function (Blueprint $table) {
                $table->integer('product_class_tax_id_111')->unsigned()->nullable()->after('price_111');

                $table->foreign('product_class_tax_id_111', 'fk02_012_111_product')
                    ->references('id_101')
                    ->on('012_101_product_class_tax')
                    ->onDelete('restrict')
                    ->onUpdate('cascade');
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