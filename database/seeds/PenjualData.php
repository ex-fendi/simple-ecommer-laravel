<?php

use Illuminate\Database\Seeder;
use App\DetailUserModel as Penjual;
use Faker\Factory as Faker;

class PenjualData extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Penjual::truncate();
        $faker = Faker::create();
        foreach (range(1,100) as $index) {
        	Penjual::create([
        		'nama_user'=>$faker->name,
        		'alamat_user'=>$faker->address,
        		'nohp_user'=>$faker->phoneNumber,
        		'tentang_user'=>$faker->text,
        		'email_user'=>$faker->email,
        		]);
        }
    }
}
