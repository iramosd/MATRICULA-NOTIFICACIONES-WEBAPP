<?php

namespace Database\Seeders;

use App\Models\Course;
use App\Models\Guardian;
use App\Models\User;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Usuario para consumo de API
        User::factory()->create([
            'name' => 'Ismael Ramos',
            'email' => 'ramosdumas_ismael@hotmail.com',
            'password' => bcrypt('password12345'),
        ]);

        // Usuario para acceso a web app
        Guardian::factory()->create([
            'name' => 'Sr. Francisco Reyes',
            'email' => 'freyes@mail.com',
            'phone' => '+569 1234 5678',
            'address' => 'Av. Libertador 1234',
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
