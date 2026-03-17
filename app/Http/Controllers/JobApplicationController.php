<?php

namespace App\Http\Controllers;

use App\Models\JobApplication;
use Illuminate\Http\Request;

class JobApplicationController extends Controller
{
    public function index()
    {
        $applications = JobApplication::with(['user', 'jobVacancy.company'])->latest()->get();
        return view('job-applications.index', compact('applications'));
    }

    public function show(JobApplication $jobApplication)
    {
        $jobApplication->load(['user', 'jobVacancy.company']);
        return view('job-applications.show', compact('jobApplication'));
    }

    public function update(Request $request, JobApplication $jobApplication)
    {
        $request->validate(['status' => 'required|in:pending,accepted,rejected']);
        $jobApplication->update($request->only('status'));
        return redirect()->route('job-applications.index')->with('success', 'Application updated successfully.');
    }

    public function destroy(JobApplication $jobApplication)
    {
        $jobApplication->delete();
        return redirect()->route('job-applications.index')->with('success', 'Application archived successfully.');
    }

    public function archived()
    {
        $applications = JobApplication::onlyTrashed()->with(['user', 'jobVacancy.company'])->latest()->get();
        return view('job-applications.archived', compact('applications'));
    }

    public function restore($id)
    {
        JobApplication::onlyTrashed()->findOrFail($id)->restore();
        return redirect()->route('job-applications.archived')->with('success', 'Application restored successfully.');
    }
}