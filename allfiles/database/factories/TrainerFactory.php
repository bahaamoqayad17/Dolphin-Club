<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Trainer>
 */
class TrainerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name_ar' => $this->faker->name(),
            'name_en' => $this->faker->name(),
            'field_ar' => $this->faker->title(),
            'field_en' => $this->faker->title(),
            'description_ar' => $this->faker->paragraph(50),
            'description_en' => $this->faker->paragraph(50),
            'image' => 'logo.jpg',
            'facebook' => 'https://facebook.com',
            'gmail' => 'https://gmail.com',
            'twitter' => 'https://twitter.com',
            'linkedin' => 'https://linkedin.com',
        ];
    }
}
