<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJacketsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('jackets', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('gender')->nullable();
			$table->string('model');
			$table->decimal('price', 9, 2)->nullable();
			$table->string('name')->unique();
			$table->smallInteger('active')->default(0);
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
		Schema::drop('jackets');
	}

}
