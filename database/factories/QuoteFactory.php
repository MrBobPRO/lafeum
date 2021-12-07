<?php

namespace Database\Factories;

use App\Models\Quote;
use Illuminate\Database\Eloquent\Factories\Factory;

class QuoteFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Quote::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            "body" => $this->faker->realTextBetween(50, 500,),
            "author_id" => $this->faker->numberBetween(1,10),
            "popular" => rand(0,1)
        ];
    }
}
