<?php

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
        $this->call(UserData::class);
        $this->call(OrderData::class);
        $this->call(ListOrder::class);
        $this->call(PenjualData::class);
        $this->call(kategoryData::class);
        $this->call(ProdukSeeder::class);
        $this->call(UserDataPembeli::class);
        $this->call(LevelUserSeeder::class);
        $this->call(StatusOrderSeeder::class);
    }
}
