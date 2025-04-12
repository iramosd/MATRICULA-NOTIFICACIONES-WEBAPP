<?php

use App\Enum\EnrollmentStatusEnum;
use App\Models\Enrollment;
use App\Models\Course;
use App\Models\Group;
use App\Models\Student;
use App\Services\EnrollmentService;
use Illuminate\Pagination\LengthAwarePaginator;

it('List Enrollments', function () {
    Enrollment::factory()->count(40)->create();
    $list = (new EnrollmentService)->list();

    $this->assertTrue($list instanceof LengthAwarePaginator);
});

it('Retrieve Enrollment information', function () {
    $model = (new EnrollmentService)->show(Enrollment::factory()->create());

    $this->assertTrue($model instanceof Enrollment);
});

it('create a new Enrollment', function () {
    $data = [
        'student_id' => Student::factory(),
        'course_id' => Course::factory(),
        'notes' => $this->faker->sentence(),
    ];
   
    $model = (new EnrollmentService)->create($data);

    $this->assertTrue($model instanceof Enrollment);
});

it('Update Enrollment information', function () {
    $isUpdated = (new EnrollmentService())->update(
        Enrollment::factory()->create(),
        [
            'status' => EnrollmentStatusEnum::ACTIVE,
        ]
    );

    $this->assertTrue($isUpdated);
});

it('Delete Enrollment information', function () {
    $isDeleted = (new EnrollmentService())->delete(Enrollment::factory()->create());

    $this->assertTrue($isDeleted);
});
