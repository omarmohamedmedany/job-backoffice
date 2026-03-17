<?php

namespace App\Http\Controllers;

use App\Models\JobCategory;
use Illuminate\Http\Request;

class JobCategoryController extends Controller
{
    public function index()
    {
        $categories = JobCategory::latest()->get();
        return view('job-categories.index', compact('categories'));
    }

    public function create()
    {
        return view('job-categories.create');
    }

    public function store(Request $request)
    {
        $request->validate(['name' => 'required|string|max:255']);
        JobCategory::create($request->all());
        return redirect()->route('job-categories.index')->with('success', 'Category created successfully.');
    }

    public function edit(JobCategory $jobCategory)
    {
        return view('job-categories.edit', compact('jobCategory'));
    }

    public function update(Request $request, JobCategory $jobCategory)
    {
        $request->validate(['name' => 'required|string|max:255']);
        $jobCategory->update($request->all());
        return redirect()->route('job-categories.index')->with('success', 'Category updated successfully.');
    }

    public function destroy(JobCategory $jobCategory)
    {
        $jobCategory->delete();
        return redirect()->route('job-categories.index')->with('success', 'Category archived successfully.');
    }

    public function archived()
    {
        $categories = JobCategory::onlyTrashed()->latest()->get();
        return view('job-categories.archived', compact('categories'));
    }

    public function restore($id)
    {
        JobCategory::onlyTrashed()->findOrFail($id)->restore();
        return redirect()->route('job-categories.archived')->with('success', 'Category restored successfully.');
    }
}