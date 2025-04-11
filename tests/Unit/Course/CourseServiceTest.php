<?php

use App\Models\Academy;
use App\Models\Course;
use App\Services\CourseService;
use Illuminate\Pagination\LengthAwarePaginator;

/*
it('List courses', function () {
    $list = (new CourseService)->list();

    $this->assertTrue($list instanceof LengthAwarePaginator);
});

it('Retrieve course information', function () {
    $model = (new CourseService)->show(Course::factory()->create());

    $this->assertTrue($model instanceof Course);
});

it('create a new course', function () {
    $data = Course::factory()->make()->toArray();
    $data['name'] = $this->faker->unique()->name();

    $model = (new CourseService)->create($data);

    $this->assertTrue($model instanceof Course);
});

it('Update course information', function () {
    $isUpdated = (new CourseService())->update(
        Course::factory()->create(),
        [
            'name' => $this->faker->unique()->name(),
            'cost' => $this->faker->randomFloat(2, 100, 1000),
            'academy_id' => Academy::factory(),
        ]
    );

    $this->assertTrue($isUpdated);
});

it('Delete course information', function () {
    $isDeleted = (new CourseService())->delete(Course::factory()->create());

    $this->assertTrue($isDeleted);
});
*/