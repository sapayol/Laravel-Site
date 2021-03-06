<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        // $this->call('AddressesTableSeeder');
        // $this->call('AttributeOrderTableSeeder');
        // $this->call('OrdersTableSeeder');
        // $this->call('MeasurementsTableSeeder');

        $this->call('AttributesTableSeeder');
        $this->call('JacketsTableSeeder');
        $this->call('AttributeJacketTableSeeder');
        $this->call('UsersTableSeeder');

        Model::reguard();
    }
}
