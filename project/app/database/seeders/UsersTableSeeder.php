<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::unguard();
         // Let's clear the users table first
         User::truncate();

         $faker = \Faker\Factory::create();
 
         // Let's make sure everyone has the same password and 
         // let's hash it before the loop, or else our seeder 
         // will be too slow.
         $password = Hash::make('12345678');
 
         User::create([
             'name' => 'Administrator',
             'email' => 'admin@test.com',
             'password' => $password,
         ]);
 
         // And now let's generate a few dozen users for our app:
         for ($i = 0; $i < 3; $i++) {
             User::create([
                 'name' => $faker->name,
                 'email' => $faker->email,
                 'password' => $password,
             ]);
         }
         User::reguard();
    }
}
