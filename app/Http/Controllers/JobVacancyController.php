<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\JobCategory;
use App\Models\JobVacancy;
use Illuminate\Http\Request;

class JobVacancyController extends Controller
{
    public function index()
    {
        $vacancies = JobVacancy::with(['company', 'jobCategory'])->latest()->get();
        return view('job-vacancies.index', compact('vacancies'));
    }

    public function create()
    {
        $companies = Company::all();
        $categories = JobCategory::all();
        return view('job-vacancies.create', compact('companies', 'categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'location' => 'required|string|max:255',
            'type' => 'required|in:Full-Time,Part-Time,Remote,Hybrid,Contract',
            'salary' => 'nullable|numeric',
            'company_id' => 'required|exists:companies,id',
            'job_category_id' => 'required|exists:job_categories,id',
        ]);
        JobVacancy::create($request->all());
        return redirect()->route('job-vacancies.index')->with('success', 'Job vacancy created successfully.');
    }

    public function edit(JobVacancy $jobVacancy)
    {
        $companies = Company::all();
        $categories = JobCategory::all();
        return view('job-vacancies.edit', compact('jobVacancy', 'companies', 'categories'));
    }

    public function update(Request $request, JobVacancy $jobVacancy)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'location' => 'required|string|max:255',
            'type' => 'required|in:Full-Time,Part-Time,Remote,Hybrid,Contract',
            'salary' => 'nullable|numeric',
            'company_id' => 'required|exists:companies,id',
            'job_category_id' => 'required|exists:job_categories,id',
        ]);
        $jobVacancy->update($request->all());
        return redirect()->route('job-vacancies.index')->with('success', 'Job vacancy updated successfully.');
    }

    public function destroy(JobVacancy $jobVacancy)
    {
        $jobVacancy->delete();
        return redirect()->route('job-vacancies.index')->with('success', 'Job vacancy archived successfully.');
    }

    public function archived()
    {
        $vacancies = JobVacancy::onlyTrashed()->with(['company', 'jobCategory'])->latest()->get();
        return view('job-vacancies.archived', compact('vacancies'));
    }

    public function restore($id)
    {
        JobVacancy::onlyTrashed()->findOrFail($id)->restore();
        return redirect()->route('job-vacancies.archived')->with('success', 'Job vacancy restored successfully.');
    }
}