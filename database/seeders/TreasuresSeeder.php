<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TreasuresSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('treasuries')->delete();

        $Treasures = 
        [
            ['id'=>1,'name'=>'الخزينة الاساسية رقم 1' , 'is_master'=>1 , 'last_isal_exchange'=> 1200 , 'last_isal_collect'=>500 , 'added_by'=>1 , 'updated_by'=>null , 'com_code'=>1 , 'date'=> now() , 'active'=>1],
            ['id'=>2,'name'=>'الخزينة الاساسية رقم 2' , 'is_master'=>1 , 'last_isal_exchange'=> 1300 , 'last_isal_collect'=>400 , 'added_by'=>1 , 'updated_by'=>null , 'com_code'=>1 , 'date'=> now() , 'active'=>1],
            ['id'=>3,'name'=>'الخزينة الاساسية رقم 3' , 'is_master'=>1 , 'last_isal_exchange'=> 1400 , 'last_isal_collect'=>300 , 'added_by'=>1 , 'updated_by'=>null , 'com_code'=>1 , 'date'=> now() , 'active'=>1],
            ['id'=>4,'name'=>'الخزينة الفرعية رقم 4' , 'is_master'=>0 , 'last_isal_exchange'=> 1500 , 'last_isal_collect'=>200 , 'added_by'=>1 , 'updated_by'=>null , 'com_code'=>1 , 'date'=> now() , 'active'=>0],
            ['id'=>5,'name'=>'الخزينة الفرعية رقم 5' , 'is_master'=>0 , 'last_isal_exchange'=> 1600 , 'last_isal_collect'=>100 , 'added_by'=>1 , 'updated_by'=>null , 'com_code'=>1 , 'date'=> now() , 'active'=>0],
        ];

     
        DB::table('treasuries')->insert($Treasures);

    }
}
