<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Model::unguard();

		// $this->call('AddressesTableSeeder');
		// $this->call('AttributesTableSeeder');
		// $this->call('JacketsTableSeeder');
		// $this->call('MeasurementsTableSeeder');
		// $this->call('OrdersTableSeeder');
		// $this->call('AttributeJacketTableSeeder');
		// $this->call('AttributeOrderTableSeeder');
		$this->call('MembersTableSeeder');
		$this->call('TransactionsTableSeeder');
		$this->call('MembersToCallTableSeeder');
	}

}
