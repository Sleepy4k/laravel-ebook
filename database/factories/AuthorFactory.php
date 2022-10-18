<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Author>
 */
class AuthorFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            "nama" => fake()->name(),
            "tanggal_lahir" => fake()->dateTimeBetween('1990-01-01', '2008-12-31'),
            "tempat_lahir" => fake()->address(),
            "kelamin" => fake()->randomElements(['putra', 'putri'])[0],
            "email" => fake()->email(),
            "nomor_hp" => fake()->phoneNumber(),
        ];
    }
}
