<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class InvItemCardCatSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('inv_itemcard_categories')->delete();

        $inv_itemcard_categories =
            [
                ['id' => 1, 'name' => '  منتجات الكترونية ', 'added_by' => 1, 'updated_by' => null, 'com_code' => 1, 'date' => now(), 'active' => 1],
                ['id' => 2, 'name' => ' اجهزة كهربية', 'added_by' => 1, 'updated_by' => null, 'com_code' => 1, 'date' => now(), 'active' => 1],
                ['id' => 3, 'name' => '  اغذية ', 'added_by' => 1, 'updated_by' => null, 'com_code' => 1, 'date' => now(), 'active' => 1],
                ['id' => 4, 'name' => '  ملابس ', 'added_by' => 1, 'updated_by' => null, 'com_code' => 1, 'date' => now(), 'active' => 0],
                ['id' => 5, 'name' => ' احذية  ', 'added_by' => 1, 'updated_by' => null, 'com_code' => 1, 'date' => now(), 'active' => 0],
            ];


        DB::table('inv_itemcard_categories')->insert($inv_itemcard_categories);
    }
}
