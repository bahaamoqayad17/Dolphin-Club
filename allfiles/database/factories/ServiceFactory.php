<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Service>
 */
class ServiceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'title_ar' => $this->faker->title(7),
            'title_en' => $this->faker->title(7),
            'content_ar' => $this->faker->paragraph(15),
            'content_en' => $this->faker->paragraph(15),
        ];
    }
}
