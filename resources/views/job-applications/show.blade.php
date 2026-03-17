@extends('layouts.app')
@section('content')
<h1 class="text-2xl font-bold mb-6">Job Application Details</h1>
<div class="bg-white rounded shadow p-6 max-w-lg">
    <div class="mb-4">
        <p class="text-gray-500">Applicant</p>
        <p class="font-semibold">{{ $jobApplication->user->name }}</p>
    </div>
    <div class="mb-4">
        <p class="text-gray-500">Position</p>
        <p class="font-semibold">{{ $jobApplication->jobVacancy->title }}</p>
    </div>
    <div class="mb-4">
        <p class="text-gray-500">Company</p>
        <p class="font-semibold">{{ $jobApplication->jobVacancy->company->name }}</p>
    </div>
    <div class="mb-4">
        <p class="text-gray-500">Score</p>
        <p class="font-semibold">{{ $jobApplication->score }}</p>
    </div>
    <div class="mb-4">
        <p class="text-gray-500">AI Feedback</p>
        <p class="font-semibold">{{ $jobApplication->ai_feedback }}</p>
    </div>
    <form method="POST" action="{{ route('job-applications.update', $jobApplication) }}" class="mt-4">
        @csrf @method('PUT')
        <div class="mb-4">
            <label class="block text-gray-700 mb-1">Status</label>
            <select name="status" class="w-full border rounded px-3 py-2">
                @foreach(['pending', 'accepted', 'rejected'] as $status)
                    <option {{ $jobApplication->status == $status ? 'selected' : '' }}>{{ $status }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="bg-blue-600 text-white px-6 py-2 rounded">Update</button>
        <a href="{{ route('job-applications.index') }}" class="ml-2 text-gray-500">Back</a>
    </form>
</div>
@endsection