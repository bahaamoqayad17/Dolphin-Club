<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Slider>
 */
class SliderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'title_ar' => $this->faker->title(),
            'title_en' => $this->faker->title(),
            'content_ar' => $this->faker->paragraph(10),
            'content_en' => $this->faker->paragraph(10),
            'image' => 'slider.jpg',
        ];
    }
}
