<?php

namespace Database\Factories;

use App\Models\Communications;
use App\Models\Course;
use App\Models\ParentGroup;
use Illuminate\Database\Eloquent\Factories\Factory;

class CommunicationFactory extends Factory
{
    public function definition()
    {
        $course = Course::factory()->create();
        //$parentGroup = ParentGroup::factory()->create();

        return [
            'title' => $this->faker->sentence(),
            'message' => $this->faker->paragraph(),
            'sent_date' => $this->faker->dateTime(),
            'communicable_id' => $course->id,
            'communicable_type' => course::class,
        ];
    }
}