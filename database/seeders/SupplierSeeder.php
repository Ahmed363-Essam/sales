<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class SupplierSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('suppliers')->delete();

        $suppliers = 
        [
            ['id' => 1 , 'supplier_code'=>1 ,'supplier_categories_id'=>3,'name'=>'المورد احمد' , 'account_number'=>1 , 'start_balance_status'=>1,'start_balance'=>4500.00,'current_balance'=>0.00,'city_id'=>null, 'address'=>'5 ش السلام' ,'notes'=>'sdsdsd' , 'added_by'=>1 , 'com_code'=>1,'date'=>now(),'active'=>1],
            ['id' => 2 , 'supplier_code'=>2 ,'supplier_categories_id'=>3,'name'=>'المورد محمد' , 'account_number'=>1 , 'start_balance_status'=>1,'start_balance'=>4500.00,'current_balance'=>0.00,'city_id'=>null, 'address'=>'5 ش السلام' ,'notes'=>'sdsdsd' , 'added_by'=>1 , 'com_code'=>1,'date'=>now(),'active'=>1],
            ['id' => 3 , 'supplier_code'=>3 ,'supplier_categories_id'=>3,'name'=>'المورد عمر' , 'account_number'=>1 , 'start_balance_status'=>1,'start_balance'=>4500.00,'current_balance'=>0.00,'city_id'=>null, 'address'=>'5 ش السلام' ,'notes'=>'sdsdsd' , 'added_by'=>1 , 'com_code'=>1,'date'=>now(),'active'=>1],
            ['id' => 4 , 'supplier_code'=>4 ,'supplier_categories_id'=>3,'name'=>'المورد احمد' , 'account_number'=>1 , 'start_balance_status'=>1,'start_balance'=>4500.00,'current_balance'=>0.00,'city_id'=>null, 'address'=>'5 ش السلام' ,'notes'=>'sdsdsd' , 'added_by'=>1 , 'com_code'=>1,'date'=>now(),'active'=>1],

        ];

     
        DB::table('suppliers')->insert($suppliers);
    }
}
