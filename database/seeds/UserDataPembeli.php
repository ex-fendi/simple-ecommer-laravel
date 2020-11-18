<?php

use Illuminate\Database\Seeder;
use App\User as User;

use Faker\Factory as Faker;

class UserDataPembeli extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	// untuk pembeli
        $faker = Faker::create();
        // $i =2;
        // foreach (range(0,10) as $value) {
        // 	User::create([
        // 		'id_user'=>$i++,
        // 		'username'=> $faker->email,
        // 		'password'=> bcrypt('admin'),
        // 		'level'=> 2
        // 	]);
        // }
    }
}
