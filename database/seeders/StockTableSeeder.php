<?php

namespace Database\Seeders;

use App\Stock;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

use Illuminate\Database\Seeder;

class StockTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $now = Carbon::now()->toDateTimeString();

        DB::table('stock')->insert([
            'machine_id' => 1, 
            'product_id' => 1, 
            'line' => 1,
            'discount' => 0,
            'quantity' => 10,
            'created_at' => $now, 'updated_at' => $now,
        ]);

        DB::table('stock')->insert([
            'machine_id' => 1, 
            'product_id' => 2, 
            'line' => 2,
            'discount' => 0,
            'quantity' => 10,
            'created_at' => $now, 'updated_at' => $now,
        ]);

        DB::table('stock')->insert([
            'machine_id' => 1, 
            'product_id' => 3, 
            'line' => 3,
            'discount' => 0,
            'quantity' => 10,
            'created_at' => $now, 'updated_at' => $now,
        ]);
    }
}

