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
            'title'=> 'kompre daily',
            'year'=>2022,
            'status'=>'available',
            'stock'=>2,
            'author'=>'kompre',
            'isbn_issn'=>'21412412',
            'type_id'=>  Type::all()->random()->id,
            'publisher_id'=> Publisher::all()->random()->id,
            'description'=>'sfafsafas',
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
