<?php

it('create an academy', function () {
    $academy = \App\Models\Academy::factory()->create([
        'name' => 'Test Academy',
        'description' => 'This is a test academy.',
        'location' => 'Test Location',
    ]);

    expect($academy)->toBeInstanceOf(\App\Models\Academy::class);
    expect($academy->name)->toBe('Test Academy');
    expect($academy->description)->toBe('This is a test academy.');
    expect($academy->location)->toBe('Test Location');
});