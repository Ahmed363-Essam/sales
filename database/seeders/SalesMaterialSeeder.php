<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class SalesMaterialSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('sales_material_types')->delete();

        
        $sales = 
        [
            ['name'=>' لحوم' , 'added_by'=>1 , 'updated_by'=>null , 'com_code'=>1 , 'date'=> now() , 'active'=>1],
            ['name'=>'دواجن' ,  'added_by'=>1 , 'updated_by'=>null , 'com_code'=>1 , 'date'=> now() , 'active'=>1],
            ['name'=>' عصائر فريش' ,  'added_by'=>1 , 'updated_by'=>null , 'com_code'=>1 , 'date'=> now() , 'active'=>1],

        ];

     
        DB::table('sales_material_types')->insert($sales);
    }
}
