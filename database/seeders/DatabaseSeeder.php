<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::query()->firstOrCreate(
            ['login' => 'copp'],
            [
                'name' => 'Администратор',
                'middlename' => null,
                'lastname' => null,
                'tel' => null,
                'role' => User::ADMIN_ROLE,
                'email' => 'copp@example.com',
                'password' => Hash::make('password'),
            ]
        );
    }
}
