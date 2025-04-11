<?php

namespace Database\Factories;

use App\Models\Communications;
use App\Models\Course;
use App\Models\Group;
use App\Models\ParentGroup;
use Illuminate\Database\Eloquent\Factories\Factory;

class CommunicationFactory extends Factory
{
    public function definition()
    {
        $communicable = $this->faker->randomElement([
            Course::factory()->create(),
            Group::factory()->create(),
        ]);

        return [
            'title' => $this->faker->sentence(),
            'message' => $this->faker->paragraph(),
            'sent_date' => $this->faker->dateTime(),
            'communicable_id' => $communicable->id,
            'communicable_type' => $communicable::class,
        ];
    }
}