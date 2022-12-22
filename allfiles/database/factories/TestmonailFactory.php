<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class TestmonailFactory extends Factory
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
            'content_ar' => $this->faker->paragraph(10),
            'content_en' => $this->faker->paragraph(10),
            'image' => 'avatar.jpg',

        ];
    }
}
