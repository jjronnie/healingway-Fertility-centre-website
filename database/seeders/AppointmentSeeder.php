<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Appointment;
use Carbon\Carbon;
use Illuminate\Support\Str;

class AppointmentSeeder extends Seeder
{
    public function run(): void
    {
        $users = [2, 3, 4]; // User IDs
        $services = range(2, 10); // Service IDs

        foreach ($users as $userId) {
            for ($i = 0; $i < 1; $i++) { // 1 appointment per user; increase loop if needed
                Appointment::create([
                    'user_id' => $userId,
                    'service_id' => $services[array_rand($services)],
                    'custom_service' => null, // using existing service
                    'appointment_date' => Carbon::now()->addDays(rand(1, 30))->setTime(rand(8, 17), 0),
                    'status' => 'pending',
                    'staff_id' => null, // not using existing staff
                    'custom_person_to_see' => 'Dr. ' . Str::random(5), // random staff name
                    'notes' => 'Auto-generated test appointment.',
                ]);
            }
        }
    }
}
