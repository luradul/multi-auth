<?php

use App\User;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $subscriptions = [0=>'monthly', 1=>'yearly', 2=>'premium', 3=>'without'];
        $faker = Faker::create('App\User');

        for($i=1; $i<=20; $i++) {
            DB::table('users')->insert([
                'name' => $faker->name,
                'email' => $faker->email,
                'subscriptions' => array_rand(array_flip($subscriptions)),
                'password' => bcrypt('password'),
                'created_at' => $faker->dateTimeThisDecade,
                'updated_at' => $faker->dateTimeThisDecade,
            ]);
        }
    }
}
