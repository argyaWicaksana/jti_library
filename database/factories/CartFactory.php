<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class CartFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'amount' => $this->faker->randomDigitNotNull(),
            'date_borrow' => $this->faker->date('m_d_y'),
            'date_returndata' => $this->faker->date('m_d_y'),
            'status_id' => 2,
        ];
    }
}
