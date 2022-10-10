<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class AccountTypesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         DB::table('accounts_types')->delete();

        $account_type = 
        [
            ['id'=>1,'name'=>'    راس مال  ' , 'relatediternalaccounts'=>0 , 'added_by'=>1 , 'updated_by'=>null , 'com_code'=>1 , 'date'=> now() , 'active'=>1],
            ['id'=>2,'name'=>'  مورد' , 'relatediternalaccounts'=>0 , 'added_by'=>1 , 'updated_by'=>null , 'com_code'=>1 , 'date'=> now() , 'active'=>1],
            ['id'=>3,'name'=>'    عميل  ' , 'relatediternalaccounts'=>0 , 'added_by'=>1 , 'updated_by'=>null , 'com_code'=>1 , 'date'=> now() , 'active'=>1],
            ['id'=>4,'name'=>'    مندوب  ' , 'relatediternalaccounts'=>0 , 'added_by'=>1 , 'updated_by'=>null , 'com_code'=>1 , 'date'=> now() , 'active'=>1],
            ['id'=>5,'name'=>'  بنكي    ' , 'relatediternalaccounts'=>0 , 'added_by'=>1 , 'updated_by'=>null , 'com_code'=>1 , 'date'=> now() , 'active'=>1],


            ['id'=>6,'name'=>'   موظف   ' , 'relatediternalaccounts'=>0 , 'added_by'=>1 , 'updated_by'=>null , 'com_code'=>1 , 'date'=> now() , 'active'=>1],
            ['id'=>7,'name'=>'   مصصروفات   ' , 'relatediternalaccounts'=>0 , 'added_by'=>1 , 'updated_by'=>null , 'com_code'=>1 , 'date'=> now() , 'active'=>1],
            ['id'=>8,'name'=>'  قسم داخلي    ' , 'relatediternalaccounts'=>0 , 'added_by'=>1 , 'updated_by'=>null , 'com_code'=>1 , 'date'=> now() , 'active'=>1],
            ['id'=>9,'name'=>'  عام    ' , 'relatediternalaccounts'=>0 , 'added_by'=>1 , 'updated_by'=>null , 'com_code'=>1 , 'date'=> now() , 'active'=>1],
        ];

     
        DB::table('accounts_types')->insert($account_type);
    }
}
