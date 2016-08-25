<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class MarketCreateTableOrder extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		if (! Schema::hasTable('012_116_order'))
		{
			Schema::create('012_116_order', function (Blueprint $table) {
				$table->engine = 'InnoDB';

				$table->increments('id_116')->unsigned();

				$table->integer('date_116')->unsigned();
				$table->string('date_text_116');
				$table->integer('status_id_116')->unsigned();
				$table->string('ip_116');
				$table->text('data_116')->nullable();

				$table->integer('payment_method_id_116')->unsigned();
				
				// code generate by payment platform (PayPal or Bank), field to record any payment ID transaction
				$table->string('payment_id_116');
				$table->text('comments_116')->nullable();

				// amounts
				$table->decimal('subtotal_116', 12, 4);										// amount without tax and without shipping
                $table->decimal('discount_amount_116', 12, 4);                              // total amount to discount, fixed plus percentage discounts
				$table->decimal('subtotal_with_discounts_116', 12, 4);                      // subtotal with discounts applied
                $table->decimal('tax_amount_116', 12, 4);                                   // total tax amount
                $table->decimal('cart_items_total_without_discounts_116', 12, 4);			// total of cart items. Amount with tax, without discount and without shipping
				$table->decimal('shipping_amount_116', 12, 4);							    // shipping amount
                $table->decimal('total_116', 12, 4);										// subtotal and shipping amount with tax

                // gift
                $table->boolean('has_gift_116');
                $table->string('gift_from_116')->nullable();
                $table->string('gift_to_116')->nullable();
                $table->text('gift_message_116')->nullable();

				// customer and invoice data, if is required
				$table->integer('customer_id_116')->unsigned()->nullable();
				$table->string('customer_company_116')->nullable();
				$table->string('customer_tin_116')->nullable();
				$table->string('customer_name_116')->nullable();
				$table->string('customer_surname_116')->nullable();
				$table->string('customer_email_116');
				$table->string('customer_phone_116')->nullable();
				$table->string('customer_mobile_116')->nullable();

				// invoice data
				$table->boolean('has_invoice_116');											// check if this order has invoice
				$table->boolean('invoiced_116')->default(false);							// check if has been created invoice on billing program
				$table->string('invoice_country_id_116', 2)->nullable();
				$table->string('invoice_territorial_area_1_id_116', 6)->nullable();
				$table->string('invoice_territorial_area_2_id_116', 10)->nullable();
				$table->string('invoice_territorial_area_3_id_116', 10)->nullable();
				$table->string('invoice_cp_116')->nullable();
				$table->string('invoice_locality_116')->nullable();
				$table->string('invoice_address_116')->nullable();
				$table->string('invoice_latitude_116')->nullable();
				$table->string('invoice_longitude_116')->nullable();

				// shipping data
				$table->boolean('has_shipping_116');
				$table->string('shipping_company_116')->nullable();
				$table->string('shipping_name_116')->nullable();
				$table->string('shipping_surname_116')->nullable();
				$table->string('shipping_email_116')->nullable();
				$table->string('shipping_phone_116')->nullable();
				$table->string('shipping_mobile_116')->nullable();
				$table->string('shipping_country_id_116', 2)->nullable();
				$table->string('shipping_territorial_area_1_id_116', 6)->nullable();
				$table->string('shipping_territorial_area_2_id_116', 10)->nullable();
				$table->string('shipping_territorial_area_3_id_116', 10)->nullable();
				$table->string('shipping_cp_116')->nullable();
				$table->string('shipping_locality_116')->nullable();
				$table->string('shipping_address_116')->nullable();
                $table->text('shipping_comments_116')->nullable();
				$table->string('shipping_latitude_116')->nullable();
				$table->string('shipping_longitude_116')->nullable();
				
				// order relations
				$table->foreign('customer_id_116', 'fk01_012_116_order')
					->references('id_301')
					->on('009_301_customer')
					->onDelete('restrict')
					->onUpdate('cascade');
				$table->foreign('status_id_116', 'fk02_012_116_order')
					->references('id_114')
					->on('012_114_order_status')
					->onDelete('restrict')
					->onUpdate('cascade');
				$table->foreign('payment_method_id_116', 'fk03_012_116_order')
					->references('id_115')
					->on('012_115_payment_method')
					->onDelete('restrict')
					->onUpdate('cascade');

				// invoice relations
				$table->foreign('invoice_country_id_116', 'fk04_012_116_order')
					->references('id_002')
					->on('001_002_country')
					->onDelete('restrict')
					->onUpdate('cascade');
				$table->foreign('invoice_territorial_area_1_id_116', 'fk05_012_116_order')
					->references('id_003')
					->on('001_003_territorial_area_1')
					->onDelete('restrict')
					->onUpdate('cascade');
				$table->foreign('invoice_territorial_area_2_id_116', 'fk06_012_116_order')
					->references('id_004')
					->on('001_004_territorial_area_2')
					->onDelete('restrict')
					->onUpdate('cascade');
				$table->foreign('invoice_territorial_area_3_id_116', 'fk07_012_116_order')
					->references('id_005')
					->on('001_005_territorial_area_3')
					->onDelete('restrict')
					->onUpdate('cascade');

				// shipping relations
				$table->foreign('shipping_country_id_116', 'fk08_012_116_order')
					->references('id_002')
					->on('001_002_country')
					->onDelete('restrict')
					->onUpdate('cascade');
				$table->foreign('shipping_territorial_area_1_id_116', 'fk09_012_116_order')
					->references('id_003')
					->on('001_003_territorial_area_1')
					->onDelete('restrict')
					->onUpdate('cascade');
				$table->foreign('shipping_territorial_area_2_id_116', 'fk10_012_116_order')
					->references('id_004')
					->on('001_004_territorial_area_2')
					->onDelete('restrict')
					->onUpdate('cascade');
				$table->foreign('shipping_territorial_area_3_id_116', 'fk11_012_116_order')
					->references('id_005')
					->on('001_005_territorial_area_3')
					->onDelete('restrict')
					->onUpdate('cascade');

				$table->index('payment_id_116', 'ix01_012_116_order');
			});
		}
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		if (Schema::hasTable('012_116_order'))
		{
			Schema::drop('012_116_order');
		}
	}
}