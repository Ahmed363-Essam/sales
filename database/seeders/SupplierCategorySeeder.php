<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class SupplierCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

        DB::table('supplier_categories')->delete();

        $supplier_categories = 
        [
            ['id' => 1, 'name' => '   فراخ ',  'added_by' => 1, 'updated_by' => null, 'com_code' => 1, 'date' => now(), 'active' => 1],
            ['id' => 2, 'name' => '    لحوم',  'added_by' => 1, 'updated_by' => null, 'com_code' => 1, 'date' => now(), 'active' => 1],
            ['id' => 3, 'name' => '   البان ',  'added_by' => 1, 'updated_by' => null, 'com_code' => 1, 'date' => now(), 'active' => 1],
            ['id' => 4, 'name' => '    زبدة',  'added_by' => 1, 'updated_by' => null, 'com_code' => 1, 'date' => now(), 'active' => 1],

        ];

     
        DB::table('supplier_categories')->insert($supplier_categories);
    }
}
