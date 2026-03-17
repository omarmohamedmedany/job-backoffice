<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\User;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    public function index()
    {
        $companies = Company::with('user')->latest()->get();
        return view('companies.index', compact('companies'));
    }

    public function create()
    {
        $owners = User::where('role', 'company-owner')->get();
        return view('companies.create', compact('owners'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'industry' => 'required|string|max:255',
            'website' => 'nullable|url',
            'user_id' => 'required|exists:users,id',
        ]);
        Company::create($request->all());
        return redirect()->route('companies.index')->with('success', 'Company created successfully.');
    }

    public function edit(Company $company)
    {
        $owners = User::where('role', 'company-owner')->get();
        return view('companies.edit', compact('company', 'owners'));
    }

    public function update(Request $request, Company $company)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'industry' => 'required|string|max:255',
            'website' => 'nullable|url',
            'user_id' => 'required|exists:users,id',
        ]);
        $company->update($request->all());
        return redirect()->route('companies.index')->with('success', 'Company updated successfully.');
    }

    public function destroy(Company $company)
    {
        $company->delete();
        return redirect()->route('companies.index')->with('success', 'Company archived successfully.');
    }

    public function archived()
    {
        $companies = Company::onlyTrashed()->with('user')->latest()->get();
        return view('companies.archived', compact('companies'));
    }

    public function restore($id)
    {
        Company::onlyTrashed()->findOrFail($id)->restore();
        return redirect()->route('companies.archived')->with('success', 'Company restored successfully.');
    }
}