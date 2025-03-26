<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\User;

class JobSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Load job listings data
        $jobListings = include database_path('seeders/data/job_listings.php');

        // Get all user IDs
        $userIds = User::pluck('id')->toArray();

        // Initialize timestamp
        $timestamp = Carbon::now()->subDays(1); // One day ago

        foreach ($jobListings as &$listing) {
            // Assign a random user_id to each job listing
            $listing['user_id'] = $userIds[array_rand($userIds)];

            // Assign sequential timestamps
            $listing['created_at'] = $timestamp->copy();
            $listing['updated_at'] = $timestamp->copy();

            // Increment timestamp for next record
            $timestamp->addMinutes(30);
        }

        // Insert job listings
        DB::table('job_listings')->insert($jobListings);
    }
}
