<?php

namespace Database\Seeders;

use App\Models\Food;
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
        $this->call([
            UserSeeder::class,
            CategorySeeder::class,
            // FoodSeeder::class,
        ]);
        Food::factory(30)->create();
        // \App\Models\Food::factory(10)->create();


    }
}
