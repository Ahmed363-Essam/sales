<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\Admin;
use Illuminate\Support\Facades\DB;
class Adminseeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('admins')->delete();

        Admin::create([
            'id'=>1,
            'name'=>'ahmed',
            'email'=>'ahmed@gmail.com',
            'username'=>'ahmed',
            'password'=>bcrypt(123456),
            'added_by'=>1,
            'updated_by'=>1,
            'com_code'=>1
        ]);
    }
}
