<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\JobApplication;
use App\Models\JobVacancy;
use App\Models\User;

class DashboardController extends Controller
{
    public function index()
    {
        $stats = [
            'users' => User::count(),
            'companies' => Company::count(),
            'vacancies' => JobVacancy::count(),
            'applications' => JobApplication::count(),
        ];
        return view('dashboard', compact('stats'));
    }
}