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
        $this->call('AttributesTableSeeder');
        $this->call('JacketsTableSeeder');
        $this->call('MeasurementsTableSeeder');
        $this->call('AttributeJacketTableSeeder');
        $this->call('UsersTableSeeder');
        // $this->call('OrdersTableSeeder');

        Model::reguard();
    }
}
