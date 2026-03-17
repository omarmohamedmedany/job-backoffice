<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\JobApplicationController;
use App\Http\Controllers\JobCategoryController;
use App\Http\Controllers\JobVacancyController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', fn() => redirect()->route('login'));

Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.post');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::resource('companies', CompanyController::class);
    Route::get('companies-archived', [CompanyController::class, 'archived'])->name('companies.archived');
    Route::patch('companies/{id}/restore', [CompanyController::class, 'restore'])->name('companies.restore');

    Route::resource('job-categories', JobCategoryController::class);
    Route::get('job-categories-archived', [JobCategoryController::class, 'archived'])->name('job-categories.archived');
    Route::patch('job-categories/{id}/restore', [JobCategoryController::class, 'restore'])->name('job-categories.restore');

    Route::resource('job-vacancies', JobVacancyController::class);
    Route::get('job-vacancies-archived', [JobVacancyController::class, 'archived'])->name('job-vacancies.archived');
    Route::patch('job-vacancies/{id}/restore', [JobVacancyController::class, 'restore'])->name('job-vacancies.restore');

    Route::resource('job-applications', JobApplicationController::class)->only(['index', 'show', 'update', 'destroy']);
    Route::get('job-applications-archived', [JobApplicationController::class, 'archived'])->name('job-applications.archived');
    Route::patch('job-applications/{id}/restore', [JobApplicationController::class, 'restore'])->name('job-applications.restore');

    Route::resource('users', UserController::class)->only(['index', 'show', 'edit', 'update', 'destroy']);
    Route::get('users-archived', [UserController::class, 'archived'])->name('users.archived');
    Route::patch('users/{id}/restore', [UserController::class, 'restore'])->name('users.restore');
});