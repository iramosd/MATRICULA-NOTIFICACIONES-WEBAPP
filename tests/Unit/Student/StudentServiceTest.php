<?php

use App\Models\Guardian;
use App\Models\Student;
use App\Services\StudentService;
use Illuminate\Pagination\LengthAwarePaginator;

it('List Student', function () {
    Student::factory()->count(40)->create();
    $list = (new StudentService)->list();

    $this->assertTrue($list instanceof LengthAwarePaginator);
});

it('Retrieve Student information', function () {
    $model = (new StudentService)->show(Student::factory()->create());

    $this->assertTrue($model instanceof Student);
});

it('create a new Student', function () {
    $data = [
        'first_name' => $this->faker->firstName(),
        'last_name' => $this->faker->lastName(),
        'birth_date' => $this->faker->date(),
        'guardian_id' => Guardian::factory(),
    ];
   
    $model = (new StudentService)->create($data);

    $this->assertTrue($model instanceof Student);
});

it('Update Student information', function () {
    $isUpdated = (new StudentService())->update(
        Student::factory()->create(),
        [
            'birth_date' => $this->faker->date(),
            'guardian_id' => Guardian::factory(),
        ]
    );

    $this->assertTrue($isUpdated);
});

it('Delete Student information', function () {
    $isDeleted = (new StudentService())->delete(Student::factory()->create());

    $this->assertTrue($isDeleted);
});
