<?php

namespace Database\Seeders;

use App\Models\Guardian;
use Illuminate\Database\Seeder;

class GuardianSeeder extends Seeder
{
    public function run(): void
    {
        Guardian::factory()->count(10)->create();
    }
}
