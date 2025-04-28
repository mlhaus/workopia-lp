<?php

namespace App\Http\Controllers;

use App\Models\Job;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class JobController extends Controller
{
    use AuthorizesRequests;

    // @desc   Show all jobs
    // @route  GET /jobs
    public function index(): View
    {
        $title = 'Available Jobs';
        $jobs = Job::paginate(3);
        return view('jobs/index', compact('title', 'jobs'));
    }

    // @desc   Show create job form
    // @route  GET /jobs/create
    public function create(): View | RedirectResponse
    {
//        if(!Auth::check()){
//            abort(404);
//            return redirect()->route('login')->with('error', 'You must be logged in to create jobs.');
//        }
        $title = 'Create New Job';
        return view('jobs.create', compact('title'));
    }

    // @desc   Store a new job
    // @route  POST /jobs
    public function store(Request $request): RedirectResponse
    {
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'salary' => 'required|integer',
            'requirements' => 'nullable|string',
            'benefits' => 'nullable|string',
            'tags' => 'nullable|string|max:255',
            'job_type' => 'required|string',
            'remote' => 'required|boolean',

            'address' => 'nullable|string|max:255',
            'city' => 'required|string|max:255',
            'state' => 'required|string|max:255',
            'zipcode' => 'nullable|string|max:255',
            'company_name' => 'required|string|max:255',
            'company_description' => 'nullable|string',
            'company_website' => 'nullable|url|max:255',
            'contact_phone' => 'nullable|string|max:255',
            'contact_email' => 'required|email|max:255',
            'company_logo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
        if ($request->hasFile('company_logo')) {
            // Store the file and get the path
            $path = $request->file('company_logo')->store('logos', 'public');

            // Add the path to the validated data array
            $validatedData['company_logo'] = $path;
        }
        $validatedData['user_id'] = auth()->user()->id;
        Job::create($validatedData);
        return redirect()->route('jobs.index')->with('success', 'Job listing created successfully!');
    }

    // @desc   Show a single job
    // @route  GET /jobs/{id}
    public function show(Job $job): View
    {
        $title = 'View Single Job';
        // Get the user who is signed in
        $user = Auth::user();
        return view('jobs.show', compact('job', 'title', 'user'));
    }

    // @desc   Show the form for editing a job
    // @route  GET /jobs/{id}/edit
    public function edit(Job $job): View
    {
        // Check if the user is authorized
        $this->authorize('update', $job);

        $title = 'Edit Single Job';
        return view('jobs.edit', compact('job', 'title'));
    }

    // @desc   Update a job
    // @route  PUT /jobs/{id}
    public function update(Request $request, Job $job): RedirectResponse
    {
        // Check if the user is authorized
        $this->authorize('update', $job);

        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'salary' => 'required|integer',
            'requirements' => 'nullable|string',
            'benefits' => 'nullable|string',
            'tags' => 'nullable|string|max:255',
            'job_type' => 'required|string',
            'remote' => 'required|boolean',

            'address' => 'nullable|string|max:255',
            'city' => 'required|string|max:255',
            'state' => 'required|string|max:255',
            'zipcode' => 'nullable|string|max:255',
            'company_name' => 'required|string|max:255',
            'company_description' => 'nullable|string',
            'company_website' => 'nullable|url|max:255',
            'contact_phone' => 'nullable|string|max:255',
            'contact_email' => 'required|email|max:255',
            'company_logo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
        // Check if a file was uploaded
        if ($request->hasFile('company_logo')) {
            // Delete the old company logo from storage
            if ($job->company_logo && Storage::disk('public')->exists($job->company_logo)) {
                Storage::disk('public')->delete($job->company_logo);
            }
            // Store the file and get the path
            $path = $request->file('company_logo')->store('logos', 'public');

            // Add the path to the validated data array
            $validatedData['company_logo'] = $path;
        }
        $job->update($validatedData);
        return redirect()->route('jobs.show', $job->id)->with('success', 'Job listing updated successfully!');
    }

    // @desc  Delete a job
    // @route DELETE /jobs/{id}
    public function destroy(Job $job): RedirectResponse
    {
        // Check if the user is authorized
        $this->authorize('delete', $job);

        if ($job->company_logo && Storage::disk('public')->exists($job->company_logo)) {
            Storage::disk('public')->delete($job->company_logo);
        }
        $job->delete();
        if(request()->query('from') === 'dashboard') {
            return redirect()->route('dashboard')->with('success', 'Job listing deleted successfully!');
        }
        return redirect()->route('jobs.index')->with('success', 'Job listing deleted successfully!');
    }
}
