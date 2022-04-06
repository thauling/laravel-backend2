<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
        // \App\Models\User::factory(10)->create();
        $this->call(UsersTableSeeder::class);
        $this->call(RecipesTableSeeder::class);
    }
}

// does not work, need to call seeders separately
// php artisan db:seed --class=RecipesTableSeeder
// php artisan db:seed --class=UsersTableSeeder