<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'description' => $this->faker->unique()->name(),
            'amount' => $this->faker->randomNumber(3, false),
            'unity_price' => $this->faker->randomFloat(2, 0, 30),
            'action_code' => 1
        ];
    }
}
