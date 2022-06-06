<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
            [
                'title' => 'سنتی',
                'slug' => 'traditional'
            ],
            [
                'title' => 'فست فود',
                'slug' => 'fastfood'
            ],
            [
                'title' => 'بین الملل',
                'slug' => 'international'
            ],
            [
                'title' => 'دریایی',
                'slug' => 'seafood'
            ],
        ]);
    }
}
