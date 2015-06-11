<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class PivotAttributeOrderTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('attribute_order', function(Blueprint $table) {
			$table->increments('id');
			$table->integer('attribute_id')->unsigned()->index('attribute_id_fkey');
			$table->integer('order_id')->unsigned()->index('order_id_fkey');
			$table->foreign('attribute_id')->references('id')->on('attributes')->onDelete('cascade');
			$table->foreign('order_id')->references('id')->on('orders')->onDelete('cascade');
			$table->timestamp('created');
		});
	}



	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('attribute_order');
	}

}
