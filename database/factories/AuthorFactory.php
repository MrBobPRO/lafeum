<?php

namespace Database\Factories;

use App\Models\Author;
use Illuminate\Database\Eloquent\Factories\Factory;

class AuthorFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Author::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            "name" => $this->faker->firstName() . ' ' . $this->faker->lastName(),
            "transliteration" => 'abc',
            "biography" => $this->faker->realTextBetween(50, 400),
            "photo" => '1.jpg',
            "popular" => rand(0,1)
        ];
    }

}
