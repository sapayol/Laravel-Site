<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMeasurementsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('measurements', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('type')->default('user');
			$table->integer('order_id')->unsigned()->nullable();
			$table->string('units')->default('cm');
			$table->decimal('size', 9, 2)->nullable();
			$table->decimal('height', 9, 2)->nullable();
			$table->decimal('half_shoulder', 9, 2)->nullable();
			$table->decimal('back_width', 9, 2)->nullable();
			$table->decimal('back_length', 9, 2)->nullable();
			$table->decimal('chest', 9, 2)->nullable();
			$table->decimal('stomach', 9, 2)->nullable();
			$table->decimal('waist', 9, 2)->nullable();
			$table->decimal('arm', 9, 2)->nullable();
			$table->decimal('biceps', 9, 2)->nullable();
			$table->text('note')->nullable();
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
		Schema::drop('measurements');
	}

}
