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
        User::create([
            'first_name' => 'Marc',
            'last_name' => 'Herd',
            'email' => 'marc.hauschildt@kirkwood.edu',
            'email_verified_at' => Carbon::now(),
            'password' => Hash::make('password'),
        ]);
    }
}
