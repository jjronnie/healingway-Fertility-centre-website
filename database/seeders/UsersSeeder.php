<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Admin user
        $admin = User::firstOrCreate(
            ['email' => 'ronaldjjuuko7@gmail.com'],
            [
                'name' => 'Ronald Jjuuko',
                'password' => Hash::make('88928892'), // hashed, secure
                'status' => 'active',
                'email_verified_at' => now(),
            ]
        );

        $admin->assignRole('admin');

        // Regular users
        $users = [];
        for ($i = 1; $i <= 4; $i++) {
            $user = User::firstOrCreate(
                ['email' => "user{$i}@test.com"],
                [
                    'name' => "Test User {$i}",
                    'password' => Hash::make('password'),
                    'status' => 'active',
                    'email_verified_at' => now(),
                ]
            );
            $user->assignRole('user');
            $users[] = $user;
        }
    }
}
