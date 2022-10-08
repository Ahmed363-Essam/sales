<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class TreasuireDeliverySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('treasuries_deliveries')->delete();

        $treasuries_deliveries =
            [
                ['treasuries_id' => 1, 'treasuries_can_delivery' => 2, 'added_by' => 1, 'updated_by' => null, 'com_code' => 1],
                ['treasuries_id' => 1, 'treasuries_can_delivery' => 2, 'added_by' => 1, 'updated_by' => null, 'com_code' => 1],
                ['treasuries_id' => 2, 'treasuries_can_delivery' => 3, 'added_by' => 1, 'updated_by' => null, 'com_code' => 1],
                ['treasuries_id' => 2, 'treasuries_can_delivery' => 3, 'added_by' => 1, 'updated_by' => null, 'com_code' => 1],
                ['treasuries_id' => 3, 'treasuries_can_delivery' => 1, 'added_by' => 1, 'updated_by' => null, 'com_code' => 1],
            ];


        DB::table('treasuries_deliveries')->insert($treasuries_deliveries);
    }
}
