<?php

namespace Database\Seeders;

use App\Models\Job;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BookmarkSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $myUser = User::where('email', 'marc.hauschildt@kirkwood.edu')->firstOrFail();
        $jobIds = Job::pluck('id')->toArray();
        $randomJobIds = array_rand($jobIds, 3);
        foreach($randomJobIds as $jobId) {
            $myUser->bookmarkedJobs()->attach($jobIds[$jobId]);
        }
    }
}
