<?php

namespace Database\Seeders;

use App\Product;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class ProductTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $now = Carbon::now()->toDateTimeString();

        DB::table('products')->insert([
            'name' => 'Coca Cola Zero', 
            'slug' => 'coca_cola_zero', 
            'details' => 'Coca cola 1,5Lts cero azucar.',
            'price' => 5000,
            'image' => 'cocacolazero15.jpg',
            'created_at' => $now, 'updated_at' => $now,
        ]);

        DB::table('products')->insert([
            'name' => 'Agua Mineral', 
            'slug' => 'agua_mineral', 
            'details' => 'Agua mineral 1,5Lts sin gas.',
            'price' => 4000,
            'image' => 'aguamineral15.jpg',
            'created_at' => $now, 'updated_at' => $now,
        ]);

        DB::table('products')->insert([
            'name' => 'Agua Saborizada Naranja 1,5Lts', 
            'slug' => 'agua_saborizada_naranja', 
            'details' => 'Agua saborizada sabor naranja cero azucar sin gas.',
            'price' => 5000,
            'image' => 'aguasaborizadanaranja15.jpg',
            'created_at' => $now, 'updated_at' => $now,
        ]);
    }

}
