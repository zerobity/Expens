<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MachineProductTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('machine_product')->insert([
            'machine_id' => 1, 
            'product_id' => 1, 
        ]);

        DB::table('machine_product')->insert([
            'machine_id' => 1, 
            'product_id' => 2, 
        ]);

        DB::table('machine_product')->insert([
            'machine_id' => 1, 
            'product_id' => 3, 
        ]);
    }
}
