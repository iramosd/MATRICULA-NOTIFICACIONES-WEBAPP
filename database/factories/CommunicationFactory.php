<?php

namespace Database\Factories;

use App\Models\Communications;
use Illuminate\Database\Eloquent\Factories\Factory;

class CommunicationFactory extends Factory
{
    public function definition()
    {
        return [
            'title' => $this->faker->sentence(),
            'message' => $this->faker->paragraph(),
            'sent_date' => $this->faker->dateTime(),
        ];
    }
}