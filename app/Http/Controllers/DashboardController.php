<?php

namespace App\Http\Controllers;

use App\Models\Job;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class DashboardController extends Controller
{
    public function index(Request $request): View | RedirectResponse
    {
//        if (!Auth::check()) {
//            return redirect()->route('login')->with('warning', 'You must be logged in to edit your profile!');
//        }
        // Get the user who is signed in
        $user = Auth::user();
        // Get that user's created jobs
        $jobs = Job::where('user_id', $user->id)->with('applicants')->get();
        $title = "User Dashboard";
        return view('dashboard.index', compact('user','jobs', 'title'));
    }
}
