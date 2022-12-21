<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class CourseFactory extends Factory
{
    public function definition()
    {
        return [
            'title' => fake()->name(),
            'description' => fake()->text(),
        ];
    }
}
