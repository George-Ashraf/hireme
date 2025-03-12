<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
        'skills' => implode(', ', $this->faker->words(5)),
        'comapny' => $this->faker->company, 
        'salary' => $this->faker->randomFloat(2, 3000, 10000), 
        'job_title' => $this->faker->jobTitle, 
        'location' => $this->faker->city,
        'work_type' => $this->faker->randomElement(['remote', 'hybrid', 'onsite']),
        'description' => $this->faker->paragraph(4), 
        'status' => $this->faker->randomElement(['pending', 'published']),
        'image' => "post1.png", 
        'responsibility' => $this->faker->paragraph(3), 
        'qualification' => $this->faker->paragraph(2), 
        'benefits' => $this->faker->paragraph(3), 
        'experience_level' => $this->faker->randomElement(['junior', 'mid_level', 'senior']),
        'closed_date' => $this->faker->dateTimeBetween('+1 month', '+6 months'), 
        'category_id' => null, 
        'user_id' => null, 
        ];
    }
}