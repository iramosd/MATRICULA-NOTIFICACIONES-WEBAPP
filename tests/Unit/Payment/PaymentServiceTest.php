<?php

use App\Enum\PaymentMethodEnum;
use App\Models\Enrollment;
use App\Models\Payment;
use App\Services\PaymentService;
use Illuminate\Pagination\LengthAwarePaginator;

it('List Payments', function () {
    Payment::factory()->count(40)->create();
    $list = (new PaymentService)->list();

    $this->assertTrue($list instanceof LengthAwarePaginator);
});

it('Retrieve Payment information', function () {
    $model = (new PaymentService)->show(Payment::factory()->create());

    $this->assertTrue($model instanceof Payment);
});

it('create a new Payment', function () {
    $data = [
            'method' => fake()->randomElement([PaymentMethodEnum::EFECTIVO->value, PaymentMethodEnum::TRANSFERENCIA->value]),
            'amount' => $this->faker->randomFloat(2, 50, 1000),
            'payment_date' => $this->faker->date(),
            'enrollment_id' => Enrollment::factory(), 
    ];
   
    $model = (new PaymentService)->create($data);

    $this->assertTrue($model instanceof Payment);
});

it('Update Payment information', function () {
    $isUpdated = (new PaymentService())->update(
        Payment::factory()->create(),
        [
            'method' => fake()->randomElement([PaymentMethodEnum::EFECTIVO->value, PaymentMethodEnum::TRANSFERENCIA->value]),
            'amount' => $this->faker->randomFloat(2, 50, 1000),
        ]
    );

    $this->assertTrue($isUpdated);
});

it('Delete Payment information', function () {
    $isDeleted = (new PaymentService())->delete(Payment::factory()->create());

    $this->assertTrue($isDeleted);
});
