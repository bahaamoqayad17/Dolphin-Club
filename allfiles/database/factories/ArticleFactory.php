<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Articles>
 */
class ArticleFactory extends Factory
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
            'content_ar' => $this->faker->paragraph(400),
            'content_en' => $this->faker->paragraph(400),
            'field_ar' => $this->faker->title(),
            'field_en' => $this->faker->title(),
            'summary_ar' => $this->faker->paragraph(20),
            'summary_en' => $this->faker->paragraph(20),
            'image' => 'article.jpg',
        ];
    }
}
