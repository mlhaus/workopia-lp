<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Job;
use Illuminate\View\View;

class HomeController extends Controller
{
    public function welcome(): View
    {
        return view('pages.welcome');
    }
}
