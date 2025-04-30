<?php

namespace Database\Seeders;

use App\Models\User;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class TestUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $adminUser = User::create([
            'first_name' => 'Admin',
            'last_name' => 'Admin',
            'email' => 'admin@example.com',
            'email_verified_at' => Carbon::now(),
            'password' => Hash::make('password'),
        ]);
        $adminUser->assignRole('admin');

        $editorUser = User::create([
            'first_name' => 'Editor',
            'last_name' => 'Editor',
            'email' => 'editor@example.com',
            'email_verified_at' => Carbon::now(),
            'password' => Hash::make('password'),
        ]);
        $editorUser->assignRole('editor');

        User::create([
            'first_name' => 'User',
            'last_name' => 'User',
            'email' => 'user@example.com',
            'email_verified_at' => Carbon::now(),
            'password' => Hash::make('password'),
        ]);

    }
}
