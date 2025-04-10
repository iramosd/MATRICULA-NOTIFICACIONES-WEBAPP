<?php

namespace Database\Factories;

use App\Models\Academy;
use Illuminate\Database\Eloquent\Factories\Factory;

class CourseFactory extends Factory
{
    public function definition(): array
    {
        return [
            'name' => $this->faker->name(),
            'description' => $this->faker->text(),
            'cost' => $this->faker->randomFloat(2, 100, 1000),
            'duration' => $this->faker->numberBetween(1, 52), 
            'academy_id' => Academy::factory(), 
        ];
    }
}
