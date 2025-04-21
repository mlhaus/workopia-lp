<?php

namespace App\Http\Controllers;

use App\Models\Job;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class BookmarkController
{
    public function index(): View
    {
        $user = Auth::user();
        $bookmarks = $user->bookmarkedJobs()->paginate(10);
        $title = "My Bookmarks";
        return view('jobs.bookmarks', compact('bookmarks', 'title'));
    }

    public function store(Job $job): RedirectResponse
    {
        $user = Auth::user();
        if ($user->bookmarkedJobs()->where('job_id', $job->id)->exists()) {
            // The job is already bookmarked
            return back()->with('warning', 'You have already bookmarked this job');
        } else {
            $user->bookmarkedJobs()->attach($job->id);
            return back()->with('success', 'Job bookmarked successfully');
        }
    }
    
    public function destroy(Job $job): RedirectResponse
    {
        $user = Auth::user();
        if (!$user->bookmarkedJobs()->where('job_id', $job->id)->exists()) {
            // The job is not bookmarked
            return back()->with('warning', 'You have not bookmarked this job');
        } else {
            $user->bookmarkedJobs()->detach($job->id);
            return back()->with('success', 'Job removed from bookmarks successfully');
        }
    }
}
