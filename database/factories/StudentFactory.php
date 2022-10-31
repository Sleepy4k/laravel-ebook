<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Student>
 */
class StudentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => fake()->name,
            'age' => rand(14,18),
            'gender' => fake()->randomElements(['putra', 'putri'])[0],
            'email' => fake()->safeEmail,
            'phone' => fake()->phoneNumber,
            'address' => fake()->address,
            'grade' => fake()->randomElements(['X', 'XI', 'XII'])[0] . ' ' .fake()->randomElements(['TJA', 'TKJ', 'RPL'])[0] . ' ' . rand(1,9)
        ];
    }
}
