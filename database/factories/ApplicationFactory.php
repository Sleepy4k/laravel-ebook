<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Application>
 */
class ApplicationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'app_name' => config('app.name'),
            'meta_author' => config('meta.author'),
            'meta_keywords' => config('meta.keyword'),
            'meta_description' => config('meta.description')
        ];
    }
}