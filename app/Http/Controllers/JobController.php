<?php

namespace App\Http\Controllers;

use App\Models\Job;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class JobController extends Controller
{
    // @desc   Show all jobs
    // @route  GET /jobs
    public function index(): View
    {
        $title = 'Available Jobs';
        $jobs = Job::all();
        return view('jobs/index', compact('title', 'jobs'));
    }

    // @desc   Show create job form
    // @route  GET /jobs/create
    public function create(): View
    {
        return view('jobs.create');
    }

    // @desc   Store a new job
    // @route  POST /jobs
    public function store(Request $request): RedirectResponse
    {
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
        ]);

        Job::create([
            'title' => $validatedData["title"],
            'description' => $validatedData["description"]
        ]);

        return redirect()->route('jobs.index');
    }

    // @desc   Show a single job
    // @route  GET /jobs/{id}
    public function show(Job $job): View
    {
        return view('jobs.show', compact('job'));
    }

    // @desc   Show the form for editing a job
    // @route  GET /jobs/{id}/edit
    public function edit(string $id): string
    {
        return "Edit job $id";
    }

    // @desc   Update a job
    // @route  PUT /jobs/{id}
    public function update(Request $request, string $id): string
    {
        return "Update job $id";
    }

    // @desc  Delete a job
    // @route DELETE /jobs/{id}
    public function destroy(string $id): string
    {
        return "Delete job $id";
    }
}
