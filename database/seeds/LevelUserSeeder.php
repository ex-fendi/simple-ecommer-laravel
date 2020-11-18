<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LevelUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('levels')->truncate();
        $nama = ["Pembeli", "Penjual", 'Super'];
        for ($i=0; $i<=2 ; $i++)
        {
            DB::table('levels')->insert([
                'nama_level'=>$nama[$i]
            ]);
        }
    }
}
