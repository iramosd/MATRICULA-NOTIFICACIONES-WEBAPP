<?php

use App\Models\Academy;
use App\Services\AcademyService;
use Illuminate\Pagination\LengthAwarePaginator;

it('List academies', function () {
    Academy::factory()->count(40)->create();
    $list = (new AcademyService)->list();

    $this->assertTrue($list instanceof LengthAwarePaginator);
});

it('Retrieve academy information', function () {
    $model = (new AcademyService)->show(Academy::factory()->create());

    $this->assertTrue($model instanceof Academy);
});

it('create a new academy', function () {
    $data = Academy::factory()->make()->toArray();
    $data['name'] = $this->faker->unique()->name();
    $data['email'] = $this->faker->unique()->safeEmail();

    $model = (new AcademyService)->create($data);

    $this->assertTrue($model instanceof Academy);
});

it('Update academy information', function () {
    $isUpdated = (new AcademyService())->update(
        Academy::factory()->create(),
        [
            'name' => $this->faker->unique()->name(),
            'email' => $this->faker->unique()->safeEmail(),
        ]
    );

    $this->assertTrue($isUpdated);
});

it('Delete academy information', function () {
    $isDeleted = (new AcademyService())->delete(Academy::factory()->create());

    $this->assertTrue($isDeleted);
});
