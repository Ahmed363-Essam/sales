<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class StoreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('stores')->delete();


        $stores =
            [
                ['name' => ' لحوم', 'phone' => '01062293101', 'address' => '5 شارع السلام', 'added_by' => 1, 'updated_by' => null, 'com_code' => 1, 'date' => now(), 'active' => 1],
                ['name' => 'دواجن', 'phone' => '01062293101', 'address' => '5 شارع السلام', 'added_by' => 1, 'updated_by' => null, 'com_code' => 1, 'date' => now(), 'active' => 1],
                ['name' => ' عصائر فريش', 'phone' => '01062293101', 'address' => '5 شارع السلام', 'added_by' => 1, 'updated_by' => null, 'com_code' => 1, 'date' => now(), 'active' => 1],

            ];


        DB::table('stores')->insert($stores);
    }
}
