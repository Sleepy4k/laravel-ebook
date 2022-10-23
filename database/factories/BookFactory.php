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
            'judul' => fake()->sentence(4),
            'deskripsi' => fake()->text(300),
            'author_id' => rand(1,25),
            'publisher_id' => rand(1,25),
            'category_id' => rand(1,25),
            'tanggal_terbit' => fake()->dateTimeBetween('2000-01-01', now()->format('Y-m-d'))
        ];
    }
}
