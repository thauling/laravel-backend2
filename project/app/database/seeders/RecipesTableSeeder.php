<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Recipe;

class RecipesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Recipe::unguard();
        // Let's truncate our existing records to start from scratch.
        Recipe::truncate();

        $faker = \Faker\Factory::create();

        // And now, let's create a few articles in our database:
        for ($i = 0; $i < 5; $i++) {
            Recipe::create([
                'name' => $faker->sentence,
                'body' => $faker->sentence,
                'cuisine' => $faker->sentence,
                'user_id' => 1
            ]);
        }
        Recipe::reguard();
    }
}
