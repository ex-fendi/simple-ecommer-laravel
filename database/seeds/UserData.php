<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\User as User;

use Faker\Factory as Faker;

class UserData extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // untuk super
        User::truncate();
        $faker = Faker::create();
        foreach (range(0,1) as $index) {
        	User::create([
        		'id_user'=>0,
        		'username'=>$faker->email,
        		'password'=>bcrypt('admin123'),
        		'level'=>3,
        	]);
        }
    }
}
