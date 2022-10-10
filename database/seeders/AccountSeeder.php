<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class AccountSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('accounts')->delete();

        $accounts_types = 
        [
            ['id' => 1, 'name' => '  حساب رقم 5050', 'account_type' => 1, 'parent_account_number' => 1, 'account_number' => 1, 'start_balance' => 12.00, 'current_balance'=>0, 'other_table_FK'=>null, 'notes'=>'asdsdsd', 'is_parent'=>0, 'start_balance_status'=>0, 'added_by' => 1, 'updated_by' => null, 'com_code' => 1, 'date' => now(), 'is_archived' => 1],
            ['id' => 2, 'name' => ' حساب رقم 5060', 'account_type' => 2, 'parent_account_number' => 1, 'account_number' => 2, 'start_balance' => 12.00,'current_balance'=>0, 'other_table_FK'=>null, 'notes'=>'asdsdsd', 'is_parent'=>1,  'start_balance_status'=>0, 'added_by' => 1, 'updated_by' => null, 'com_code' => 1, 'date' => now(), 'is_archived' => 1],
            ['id' => 3, 'name' => '  حساب رقم 5070 ', 'account_type' => 2, 'parent_account_number' => 1, 'account_number' => 3, 'start_balance' => 12.00, 'current_balance'=>0,'other_table_FK'=>null, 'notes'=>'asdsdsd', 'is_parent'=>0,  'start_balance_status'=>1,'added_by' => 1, 'updated_by' => null, 'com_code' => 1, 'date' => now(), 'is_archived' => 1],
            ['id' => 4, 'name' => '  حساب رقم 5090 ', 'account_type' => 3, 'parent_account_number' => 2, 'account_number' => 4, 'start_balance' => 12.00,'current_balance'=>0,'other_table_FK'=>null, 'notes'=>'asdsdsd', 'is_parent'=>1,  'start_balance_status'=>1, 'added_by' => 1, 'updated_by' => null, 'com_code' => 1, 'date' => now(), 'is_archived' => 1],
            ['id' => 5, 'name' => ' حساب رقم 5080  ', 'account_type' => 3, 'parent_account_number' => 2, 'account_number' => 5, 'start_balance' => 12.00,'current_balance'=>0,'other_table_FK'=>null, 'notes'=>'asdsdsd',  'is_parent'=>0,  'start_balance_status'=>2,'added_by' => 1, 'updated_by' => null, 'com_code' => 1, 'date' => now(), 'is_archived' => 1],
            ['id' => 6, 'name' => '   حساب رقم 5090  ', 'account_type' => 4, 'parent_account_number' => 2, 'account_number' => 6, 'start_balance' => 12.00,'current_balance'=>0,'other_table_FK'=>null,  'notes'=>'asdsdsd', 'is_parent'=>1,  'start_balance_status'=>2,'added_by' => 1, 'updated_by' => null, 'com_code' => 1, 'date' => now(), 'is_archived' => 1],

            ['id' => 7, 'name' => ' حساب رقم 56000  ', 'account_type' => 5,  'parent_account_number' => 3, 'account_number' => 7, 'start_balance' => 12.00,'current_balance'=>0,'other_table_FK'=>null,  'notes'=>'asdsdsd', 'is_parent'=>0,  'start_balance_status'=>1, 'added_by' => 1, 'updated_by' => null, 'com_code' => 1, 'date' => now(), 'is_archived' => 1],
            ['id' => 8, 'name' => ' قسم داخلي  ', 'account_type' => 5, 'parent_account_number' => 3, 'account_number' => 8, 'start_balance' => 12.00, 'current_balance'=>0, 'other_table_FK'=>null,  'notes'=>'asdsdsd', 'is_parent'=>1,  'start_balance_status'=>2,  'added_by' => 1, 'updated_by' => null, 'com_code' => 1, 'date' => now(), 'is_archived' => 1],

            ['id' => 9, 'name' => '  الموردين الاب  ', 'account_type' => 5, 'parent_account_number' => 3, 'account_number' => 9, 'start_balance' => 12.00, 'current_balance'=>0, 'other_table_FK'=>null,  'notes'=>'asdsdsd', 'is_parent'=>1,  'start_balance_status'=>2,  'added_by' => 1, 'updated_by' => null, 'com_code' => 1, 'date' => now(), 'is_archived' => 1],

        ];

     
        DB::table('accounts')->insert($accounts_types);
    }
}
