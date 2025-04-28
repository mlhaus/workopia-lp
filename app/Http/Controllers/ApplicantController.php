<?php

namespace App\Http\Controllers;

use App\Models\Applicant;
use App\Models\Job;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class ApplicantController extends Controller
{
    public function store(Request $request, Job $job): RedirectResponse {
        // Check if the user has already applied for the job
        $existingApplication = Applicant::where('job_id', $job->id)
                                ->where('user_id', auth()->id())->exists();

        if($existingApplication) {
            return redirect()->back()->with('error', 'You have already applied for this job');
        }

        $validatedData = $request->validate([
            'full_name' => 'required|string|max:255',
            'contact_phone' => 'nullable|string|max:255',
            'contact_email' => 'required|string|email|max:255',
            'message' => 'nullable|string',
            'location' => 'nullable|string|max:255',
            'resume' => 'required|file|mimes:pdf|max:2048',
//            'job_id' => 'required|exists:job_listings,id'
        ]);
        if($request->hasFile('resume')) {
            $path = $request->file('resume')->store('resumes', 'public');
            $validatedData['resume_path'] = $path;
        }
        $application = new Applicant($validatedData);
        $application->job_id = $job->id;
        $application->user_id = auth()->id();
        $application->save();
        return redirect()->back()->with('success', 'Your application has been submitted.');
    }

    public function destroy($id): RedirectResponse
    {
        $applicant = Applicant::findOrFail($id);
        $applicant->delete();
        return redirect()->back()->with('success', 'This application has been removed.');
    }
}
