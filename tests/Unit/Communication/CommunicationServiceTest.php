<?php

use App\Models\Communication;
use App\Models\Course;
use App\Models\Group;
use App\Services\CommunicationService;
use Illuminate\Pagination\LengthAwarePaginator;

it('List academies', function () {
    Communication::factory()->count(40)->create();
    $list = (new CommunicationService)->list();

    $this->assertTrue($list instanceof LengthAwarePaginator);
});

it('Retrieve Communication information', function () {
    $model = (new CommunicationService)->show(Communication::factory()->create());

    $this->assertTrue($model instanceof Communication);
});

it('create a new Communication', function () {

    $communicable = $this->faker->randomElement([
        Course::factory()->create(),
        Group::factory()->create(),
    ]);

    $data = [
        'title' => $this->faker->sentence(),
        'message' => $this->faker->paragraph(),
        'sent_date' => $this->faker->dateTime(),
        'communicable_id' => $communicable->id,
        'communicable_type' => $communicable::class,
    ];
   

    $model = (new CommunicationService)->create($data);

    $this->assertTrue($model instanceof Communication);
});

it('Update Communication information', function () {
    $isUpdated = (new CommunicationService())->update(
        Communication::factory()->create(),
        [
            'message' => $this->faker->paragraph(),
        ]
    );

    $this->assertTrue($isUpdated);
});

it('Delete Communication information', function () {
    $isDeleted = (new CommunicationService())->delete(Communication::factory()->create());

    $this->assertTrue($isDeleted);
});
