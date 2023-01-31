<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;
use Faker\Generator as Faker;
use Illuminate\Foundation\Testing\DatabaseTransactions;


class ProductFactory extends Factory
{
    use DatabaseTransactions;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
            return [
                'name' => $this->faker->sentence(5),
                'price' => $this->faker->numberBetween($min = 500, $max = 8000),
                'image'  => 'https://via.placeholder.com/350x150',
            ];
    }
}
