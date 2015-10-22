<?php

namespace App\Console\Commands;

use DB;
use Illuminate\Console\Command;
use Illuminate\Foundation\Inspiring;

class ClearOrders extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'clear_orders';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'clear all order-related tables in the database';

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS = 0'); // disable foreign key constraints
        DB::table('orders')->truncate();
        DB::table('attribute_order')->truncate();
        $this->comment('Attribute order table cleared');
        DB::table('orders')->truncate();
        $this->comment('Orders table cleared');
        DB::table('measurements')->truncate();
        $this->comment('Measurements table cleared');
        DB::table('addresses')->truncate();
        $this->comment('Addresses table cleared');
        DB::statement('SET FOREIGN_KEY_CHECKS = 1'); // enable foreign key constraints
        $this->comment('All done.');
    }
}
