<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Faker\Factory as Faker;
use Illuminate\Support\Str;
use \DB;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $users = [];
        $faker = Faker::create();
        for($i=0;$i<15;$i++){
        $data = [
                'name' => $faker->name,
                'email' => $faker->unique()->safeEmail,
                'username' => $faker->unique()->userName,
                'email_verified_at' => now(),
                'password' => Hash::make('user123'),
                'role' => 'user',
                'remember_token' => Str::random(10),
            ];
        }
        DB::table('users')->insert($data);
    }
}
