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
            'NOME' => $this->faker->unique()->name(),
            'QUANTIDADE_EM_ESTOQUE' => $this->faker->randomNumber(3, false),
            'PRECO_UNITARIO' => $this->faker->randomFloat(2, 0, 30),
        ];
    }
}
