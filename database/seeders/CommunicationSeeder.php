<?php

namespace Database\Seeders;

use App\Models\Communication;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CommunicationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Communication::factory()->count(10)->create();
    }
}
