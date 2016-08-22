<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Syscover\Pulsar\Libraries\DBLibrary;

class MarketUpdateV26 extends Migration
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
        if(Schema::hasColumn('012_116_order', 'shipping_116'))
        {
            // shipping_116
            DBLibrary::renameColumn('012_116_order', 'shipping_116', 'shipping_116', 'DECIMAL', '12,4', false, false);
        }

        if(Schema::hasColumn('012_116_order', 'subtotal_116'))
        {
            // subtotal_116
            DBLibrary::renameColumn('012_116_order', 'subtotal_116', 'subtotal_116', 'DECIMAL', '12,4', false, false);
        }

        if(Schema::hasColumn('012_116_order', 'total_116'))
        {
            // total_116
            DBLibrary::renameColumn('012_116_order', 'total_116', 'total_116', 'DECIMAL', '12,4', false, false);
        }

        // ***********************
        // 012_117_order_row
        // ***********************
        if(Schema::hasColumn('012_117_order_row', 'price_117'))
        {
            // price_117
            DBLibrary::renameColumn('012_117_order_row', 'price_117', 'price_117', 'DECIMAL', '12,4', false, false);
        }

        if(Schema::hasColumn('012_117_order_row', 'quantity_117'))
        {
            // quantity_117
            DBLibrary::renameColumn('012_117_order_row', 'quantity_117', 'quantity_117', 'DECIMAL', '12,4', false, false);
        }

        if(Schema::hasColumn('012_117_order_row', 'subtotal_117'))
        {
            // subtotal_117
            DBLibrary::renameColumn('012_117_order_row', 'subtotal_117', 'subtotal_117', 'DECIMAL', '12,4', false, false);
        }

        if(Schema::hasColumn('012_117_order_row', 'discount_percentage_117'))
        {
            // discount_percentage_117
            DBLibrary::renameColumn('012_117_order_row', 'discount_percentage_117', 'discount_subtotal_percentage_117', 'DECIMAL', '12,4', false, false);
        }

        if(Schema::hasColumn('012_117_order_row', 'discount_amount_117'))
        {
            // discount_amount_117
            DBLibrary::renameColumn('012_117_order_row', 'discount_amount_117', 'discount_amount_117', 'DECIMAL', '12,4', false, false);
        }

        if(Schema::hasColumn('012_117_order_row', 'tax_percentage_117'))
        {
            // tax_percentage_117
            DBLibrary::renameColumn('012_117_order_row', 'tax_percentage_117', 'tax_rules_117', 'TEXT', null, false, false);
        }

        if(Schema::hasColumn('012_117_order_row', 'tax_amount_117'))
        {
            // tax_amount_117
            DBLibrary::renameColumn('012_117_order_row', 'tax_amount_117', 'tax_amount_117', 'DECIMAL', '12,4', false, false);
        }

        // ***********************
        // 012_103_tax_rate_zone
        // ***********************
        if(Schema::hasColumn('012_103_tax_rate_zone', 'tax_rate_103'))
        {
            // tax_rate_103
            DBLibrary::renameColumn('012_103_tax_rate_zone', 'tax_rate_103', 'tax_rate_103', 'DECIMAL', '12,4', false, false, 0);
        }

        // ***********************
        // 012_111_product
        // ***********************
        if(Schema::hasColumn('012_111_product', 'weight_111'))
        {
            // tax_rate_103
            DBLibrary::renameColumn('012_111_product', 'weight_111', 'weight_111', 'DECIMAL', '11,3', false, false, 0);
        }

        // ***********************
        // 012_115_payment_method
        // ***********************
        if(Schema::hasColumn('012_115_payment_method', 'minimum_price_115'))
        {
            // minimum_price_115
            DBLibrary::renameColumn('012_115_payment_method', 'minimum_price_115', 'minimum_price_115', 'DECIMAL', '12,4', false, true);
        }

        if(Schema::hasColumn('012_115_payment_method', 'maximum_price_115'))
        {
            // maximum_price_115
            DBLibrary::renameColumn('012_115_payment_method', 'maximum_price_115', 'maximum_price_115', 'DECIMAL', '12,4', false, true);
        }

        // ***********************
        // 012_120_cart_price_rule
        // ***********************
        if(Schema::hasColumn('012_120_cart_price_rule', 'discount_fixed_amount_120'))
        {
            // discount_fixed_amount_120
            DBLibrary::renameColumn('012_120_cart_price_rule', 'discount_fixed_amount_120', 'discount_fixed_amount_120', 'DECIMAL', '12,4', false, true);
        }

        if(Schema::hasColumn('012_120_cart_price_rule', 'discount_percentage_120'))
        {
            // discount_percentage_120
            DBLibrary::renameColumn('012_120_cart_price_rule', 'discount_percentage_120', 'discount_percentage_120', 'DECIMAL', '12,4', false, true);
        }

        if(Schema::hasColumn('012_120_cart_price_rule', 'maximum_discount_amount_120'))
        {
            // maximum_discount_amount_120
            DBLibrary::renameColumn('012_120_cart_price_rule', 'maximum_discount_amount_120', 'maximum_discount_amount_120', 'DECIMAL', '12,4', false, true);
        }

        // **********************************
        // 012_126_customer_discount_history
        // **********************************
        if(Schema::hasColumn('012_126_customer_discount_history', 'discount_fixed_amount_126'))
        {
            // discount_fixed_amount_126
            DBLibrary::renameColumn('012_126_customer_discount_history', 'discount_fixed_amount_126', 'discount_fixed_amount_126', 'DECIMAL', '12,4', false, true);
        }

        if(Schema::hasColumn('012_126_customer_discount_history', 'discount_percentage_126'))
        {
            // discount_percentage_126
            DBLibrary::renameColumn('012_126_customer_discount_history', 'discount_percentage_126', 'discount_percentage_126', 'DECIMAL', '12,4', false, true);
        }

        if(Schema::hasColumn('012_126_customer_discount_history', 'maximum_discount_amount_126'))
        {
            // maximum_discount_amount_126
            DBLibrary::renameColumn('012_126_customer_discount_history', 'maximum_discount_amount_126', 'maximum_discount_amount_126', 'DECIMAL', '12,4', false, true);
        }

        if(Schema::hasColumn('012_126_customer_discount_history', 'discount_percentage_amount_126'))
        {
            // discount_percentage_amount_126
            DBLibrary::renameColumn('012_126_customer_discount_history', 'discount_percentage_amount_126', 'discount_percentage_amount_126', 'DECIMAL', '12,4', false, true);
        }


        // ***********************
        // create new columns
        // ***********************
        if(! Schema::hasColumn('012_116_order', 'shipping_comments_116'))
        {
            Schema::table('012_116_order', function (Blueprint $table) {
                $table->text('shipping_comments_116')->nullable()->after('shipping_address_116');
            });
        }

        if(! Schema::hasColumn('012_117_order_row', 'discount_total_percentage_117'))
        {
            Schema::table('012_117_order_row', function (Blueprint $table) {
                $table->decimal('discount_total_percentage_117', 12, 4)->after('discount_subtotal_percentage_117');
            });
        }

        if(! Schema::hasColumn('012_117_order_row', 'discount_subtotal_percentage_amount_117'))
        {
            Schema::table('012_117_order_row', function (Blueprint $table) {
                $table->decimal('discount_subtotal_percentage_amount_117', 12, 4)->after('discount_total_percentage_117');
            });
        }

        if(! Schema::hasColumn('012_117_order_row', 'discount_total_percentage_amount_117'))
        {
            Schema::table('012_117_order_row', function (Blueprint $table) {
                $table->decimal('discount_total_percentage_amount_117', 12, 4)->after('discount_subtotal_percentage_amount_117');
            });
        }

        if(! Schema::hasColumn('012_117_order_row', 'discount_subtotal_fixed_amount_117'))
        {
            Schema::table('012_117_order_row', function (Blueprint $table) {
                $table->decimal('discount_subtotal_fixed_amount_117', 12, 4)->after('discount_total_percentage_amount_117');
            });
        }

        if(! Schema::hasColumn('012_117_order_row', 'discount_total_fixed_amount_117'))
        {
            Schema::table('012_117_order_row', function (Blueprint $table) {
                $table->decimal('discount_total_fixed_amount_117', 12, 4)->after('discount_subtotal_fixed_amount_117');
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