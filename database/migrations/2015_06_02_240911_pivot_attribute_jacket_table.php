<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class PivotAttributeJacketTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('attribute_jacket', function(Blueprint $table) {
			$table->increments('id');
			$table->integer('attribute_id')->unsigned()->index('attribute_id_fkey');
			$table->integer('jacket_id')->unsigned()->index('jacket_id_fkey');
			$table->foreign('attribute_id')->references('id')->on('attributes')->onDelete('cascade');
			$table->foreign('jacket_id')->references('id')->on('jackets')->onDelete('cascade');
			$table->timestamp('created_at');
		});
	}



	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('attribute_jacket');
	}

}
