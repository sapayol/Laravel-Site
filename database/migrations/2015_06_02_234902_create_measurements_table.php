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
			$table->string('type')->default('custom');
			$table->string('units')->default('cm');
			$table->decimal('price', 9, 2)->nullable();
			$table->decimal('size', 9, 2)->nullable();
			$table->decimal('shoulder', 9, 2)->nullable();
			$table->decimal('back', 9, 2)->nullable();
			$table->decimal('chest', 9, 2)->nullable();
			$table->decimal('stomach', 9, 2)->nullable();
			$table->decimal('waist', 9, 2)->nullable();
			$table->decimal('sleeve', 9, 2)->nullable();
			$table->decimal('biceps', 9, 2)->nullable();
			$table->decimal('front_length', 9, 2)->nullable();
			$table->decimal('shoulders_front', 9, 2)->nullable();
			$table->decimal('pits_across', 9, 2)->nullable();
			$table->decimal('width_at_pit', 9, 2)->nullable();
			$table->decimal('width_at_elbow', 9, 2)->nullable();
			$table->decimal('width_at_cuff', 9, 2)->nullable();
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
