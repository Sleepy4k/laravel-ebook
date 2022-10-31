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
    public function definition()
    {
        return [
            'title' => fake()->sentence(4),
            'description' => fake()->text(300),
            'author_id' => rand(1,25),
            'publisher_id' => rand(1,25),
            'category_id' => rand(1,25),
            'date_of_issue' => fake()->dateTimeBetween('2000-01-01', now()->format('Y-m-d'))
        ];
    }
}
