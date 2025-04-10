<?php

namespace Database\Factories;

use App\Enum\PaymentMethodEnum;
use App\Models\Enrollment;
use Illuminate\Database\Eloquent\Factories\Factory;

class PaymentFactory extends Factory
{
    public function definition()
    {
        return [
            'method' => fake()->randomElement([PaymentMethodEnum::EFECTIVO->value, PaymentMethodEnum::TRANSFERENCIA->value]),
            'amount' => $this->faker->randomFloat(2, 50, 1000),
            'payment_date' => $this->faker->date(),
            'enrollment_id' => Enrollment::factory(), 
        ];
    }
}