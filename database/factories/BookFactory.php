<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Type;
use App\Models\Publisher;

class BookFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title'=> $this->faker->words(3, true),
            'year'=> $this->faker->dateTimeBetween('-10 years'),
            'status'=> 'available',
            'stock'=> $this->faker->numberBetween(1, 10),
            'author'=> $this->faker->name(),
            'isbn_issn'=> $this->faker->numerify('##########'),
            'type_id'=>  Type::all()->random()->id,
            'publisher_id'=> Publisher::all()->random()->id,
            'description'=> $this->faker->sentences(3, true),
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    public function unverified()
    {
        return $this->state(function (array $attributes) {
            return [
                'email_verified_at' => null,
            ];
        });
    }
}
