<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class UomsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('uoms')->delete();

        $uoms = 
        [
            ['id'=>1,'name'=>'  شكارة ' , 'is_master'=>1 , 'added_by'=>1 , 'updated_by'=>null , 'com_code'=>1 , 'date'=> now() , 'active'=>1],
            ['id'=>2,'name'=>' جالون' , 'is_master'=>1 , 'added_by'=>1 , 'updated_by'=>null , 'com_code'=>1 , 'date'=> now() , 'active'=>1],
            ['id'=>3,'name'=>'  صندوق ' , 'is_master'=>1 , 'added_by'=>1 , 'updated_by'=>null , 'com_code'=>1 , 'date'=> now() , 'active'=>1],
            ['id'=>4,'name'=>'  متر ' , 'is_master'=>0 , 'added_by'=>1 , 'updated_by'=>null , 'com_code'=>1 , 'date'=> now() , 'active'=>1],
            ['id'=>5,'name'=>' علب  ' , 'is_master'=>0 , 'added_by'=>1 , 'updated_by'=>null , 'com_code'=>1 , 'date'=> now() , 'active'=>1],
        ];

     
        DB::table('uoms')->insert($uoms);
    }
}
