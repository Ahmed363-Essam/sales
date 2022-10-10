<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        DB::table('customers')->delete();

        $customers = 
        [
            ['id' => 1 , 'customer_code'=>1 ,'name'=>'المورد احمد' , 'account_number'=>1 , 'start_balance_status'=>1,'start_balance'=>4500.00,'current_balance'=>0.00,'city_id'=>null, 'address'=>'5 ش السلام' ,'notes'=>'sdsdsd' , 'added_by'=>1 , 'com_code'=>1,'date'=>now(),'active'=>1],
            ['id' => 2 , 'customer_code'=>2 ,'name'=>'المورد محمد' , 'account_number'=>1 , 'start_balance_status'=>1,'start_balance'=>4500.00,'current_balance'=>0.00,'city_id'=>null, 'address'=>'5 ش السلام' ,'notes'=>'sdsdsd' , 'added_by'=>1 , 'com_code'=>1,'date'=>now(),'active'=>1],
            ['id' => 3 , 'customer_code'=>3 ,'name'=>'المورد عمر' , 'account_number'=>1 , 'start_balance_status'=>1,'start_balance'=>4500.00,'current_balance'=>0.00,'city_id'=>null, 'address'=>'5 ش السلام' ,'notes'=>'sdsdsd' , 'added_by'=>1 , 'com_code'=>1,'date'=>now(),'active'=>1],
            ['id' => 4 , 'customer_code'=>4 ,'name'=>'المورد احمد' , 'account_number'=>1 , 'start_balance_status'=>1,'start_balance'=>4500.00,'current_balance'=>0.00,'city_id'=>null, 'address'=>'5 ش السلام' ,'notes'=>'sdsdsd' , 'added_by'=>1 , 'com_code'=>1,'date'=>now(),'active'=>1],

        ];

     
        DB::table('customers')->insert($customers);
    }
}
