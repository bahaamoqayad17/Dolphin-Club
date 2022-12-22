<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Course>
 */
class CourseFactory extends Factory
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
            'content_ar' => $this->faker->paragraph(50),
            'content_en' => $this->faker->paragraph(50),
            'image' => 'course.jpg',
            'price' => $this->faker->numberBetween(0, 100),
        ];
    }
}
