<?php

namespace Database\Factories;

use App\Models\category;
use Illuminate\Database\Eloquent\Factories\Factory;

class FoodFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $regularPrice = 1000 * (rand(50, 500));
        if (rand(0, 1)) {
            $salePrice = $regularPrice - (1000 * rand(1, 49));
        }
        return [
            'name' => $this->faker->words(3, true),
            'category_id' => Category::pluck('id')->random(),
            'description' => $this->faker->sentence(7),
            'image' => '',
            'regular_price' =>$regularPrice,
            'sale_price' => $salePrice?? null,
            'stock' => rand(1, 10)
        ];
    }
}
