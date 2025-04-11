<?php

namespace Database\Seeders;

use App\Models\Course;
use App\Models\User;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        User::factory()->create([
            'name' => 'Ismael Ramos',
            'email' => 'ramosdumas_ismael@hotmail.com',
            'password' => bcrypt('password12345'),
        ]);
        
        if (config('app.env') === 'local' || config('app.env') === 'testing') {
            $this->call([
                AcademySeeder::class,
                CourseSeeder::class,
                StudentSeeder::class,
                GuardianSeeder::class,
                EnrollmentSeeder::class,
                PaymentSeeder::class,
                CommunicationSeeder::class,
            ]);
        }
    }
}
