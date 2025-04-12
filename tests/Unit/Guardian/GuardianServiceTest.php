<?php

use App\Enum\EnrollmentStatusEnum;
use App\Models\Guardian;
use App\Models\Course;
use App\Models\Group;
use App\Models\Student;
use App\Services\GuardianService;
use Illuminate\Pagination\LengthAwarePaginator;

it('List Guardians', function () {
    Guardian::factory()->count(40)->create();
    $list = (new GuardianService)->list();

    $this->assertTrue($list instanceof LengthAwarePaginator);
});

it('Retrieve Guardian information', function () {
    $model = (new GuardianService)->show(Guardian::factory()->create());

    $this->assertTrue($model instanceof Guardian);
});

it('create a new Guardian', function () {
    $data = [
        'name' => $this->faker->name(),
        'email' => $this->faker->unique()->safeEmail(),
        'phone' => $this->faker->phoneNumber(),
        'address' => $this->faker->address(),
        'password' => $this->faker->password(),
    ];
   
    $model = (new GuardianService)->create($data);

    $this->assertTrue($model instanceof Guardian);
});

it('Update Guardian information', function () {
    $isUpdated = (new GuardianService())->update(
        Guardian::factory()->create(),
        [
            'phone' => $this->faker->phoneNumber(),
            'address' => $this->faker->address(),
        ]
    );

    $this->assertTrue($isUpdated);
});

it('Delete Guardian information', function () {
    $isDeleted = (new GuardianService())->delete(Guardian::factory()->create());

    $this->assertTrue($isDeleted);
});
