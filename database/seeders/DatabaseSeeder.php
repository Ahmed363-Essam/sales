<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // User::factory(10)->create();
        $this->call([
            Adminseeder::class,
            settingSeeder::class,
            TreasuresSeeder::class,
            SalesMaterialSeeder::class,
            StoreSeeder::class,
            TreasuireDeliverySeeder::class,
            UomsSeeder::class,
            InvItemCardCatSeeder::class,
            AccountTypesSeeder::class

        ]);

    }
}
