<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Admin\AdminSettings;

class settingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('admin_settings')->delete();

        AdminSettings::create([
            'system_name' => 'ahmed',
            'photo' => 'ahmed.jpg',
            'active' => 1,

            'address' => '5 شارع المجد     امام عباس العقاد',
            'general_alert' =>'اهلا و سهلا',

            'phone' => '01062293101',
            'supplier_parent_account_number'=>4,
            'customer_parent_account_number'=>9,



            'added_by' => 1,
            'updated_by' => 1,
            'com_code' => 1
        ]);
    }
}
