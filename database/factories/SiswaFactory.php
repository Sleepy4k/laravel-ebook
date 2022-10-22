<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Siswa>
 */
class SiswaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'nama' => fake()->name,
            'umur' => rand(14,18),
            'kelamin' => fake()->randomElements(['putra', 'putri'])[0],
            'email' => fake()->safeEmail,
            'nomor_hp' => fake()->phoneNumber,
            'alamat' => fake()->address,
            'kelas' => fake()->randomElements(['X', 'XI', 'XII'])[0] . ' ' .fake()->randomElements(['TJA', 'TKJ', 'RPL'])[0] . ' ' . rand(1,9)
        ];
    }
}
