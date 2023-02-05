<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class MileFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'customer_name' => $this->faker->name(),
            'customer_code' => Str::random(10),
            'transaction_amount' => $this->faker->randomNumber(6),
            'transaction_discount' => $this->faker->randomNumber(1),
        ];
    }
}
