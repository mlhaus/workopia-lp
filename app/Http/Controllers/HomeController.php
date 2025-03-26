<?php

namespace App\Http\Controllers;
use App\Models\Job;
use Illuminate\View\View;

class HomeController extends Controller
{
    public function welcome(): View
    {
        $jobs = Job::latest()->limit(3)->get();
        return view('pages.welcome')->with('jobs', $jobs);
    }
}
