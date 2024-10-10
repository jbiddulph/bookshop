<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Book>
 */
class BookFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $randomCount = rand(1, 10);
        return [
            'title' => $this->faker->text,
            'author' => $this->faker->name,
            'rating' => $randomCount,
        ];
    }
}
