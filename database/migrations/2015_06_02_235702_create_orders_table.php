<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('orders', function(Blueprint $table)
		{
			$table->increments('id');
			$table->decimal('total', 9, 2)->nullable();
			$table->text('note')->nullable();
			$table->string('status')->nullable();
			$table->string('shipping_type')->nullable();
			$table->string('payment_type')->nullable();
			$table->string('payment_id')->nullable();
			$table->integer('user_id')->unsigned()->nullable();
			$table->integer('address_id')->unsigned()->nullable();
			$table->integer('jacket_id')->unsigned()->nullable();
			$table->timestamp('started_at')->nullable();
			$table->timestamp('paid_at')->nullable();
			$table->timestamp('production_at')->nullable();
			$table->timestamp('shipped_at')->nullable();
			$table->timestamp('completed_at')->nullable();
			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('orders');
	}

}
