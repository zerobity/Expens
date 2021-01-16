<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class MachineTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $now = Carbon::now()->toDateTimeString();

        DB::table('machines')->insert([
            'name' => 'NICOTEST', 
            'slug' => 'nico_test', 
            'type' => 'FR',
            'coordinate' => '27°28 30.3 S 58°50 28.0 W',
            'password' => Hash::make('password'),
            'created_at' => $now, 'updated_at' => $now,
        ]);
    }
}
