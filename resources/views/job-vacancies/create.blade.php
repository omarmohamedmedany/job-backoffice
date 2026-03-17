@extends('layouts.app')
@section('content')
<h1 class="text-2xl font-bold mb-6">Add Job Vacancy</h1>
<div class="bg-white rounded shadow p-6 max-w-lg">
    <form method="POST" action="{{ route('job-vacancies.store') }}">
        @csrf
        <div class="mb-4">
            <label class="block text-gray-700 mb-1">Title</label>
            <input type="text" name="title" class="w-full border rounded px-3 py-2" value="{{ old('title') }}">
        </div>
        <div class="mb-4">
            <label class="block text-gray-700 mb-1">Description</label>
            <textarea name="description" class="w-full border rounded px-3 py-2" rows="4">{{ old('description') }}</textarea>
        </div>
        <div class="mb-4">
            <label class="block text-gray-700 mb-1">Location</label>
            <input type="text" name="location" class="w-full border rounded px-3 py-2" value="{{ old('location') }}">
        </div>
        <div class="mb-4">
            <label class="block text-gray-700 mb-1">Type</label>
            <select name="type" class="w-full border rounded px-3 py-2">
                <option>Full-Time</option>
                <option>Part-Time</option>
                <option>Remote</option>
                <option>Hybrid</option>
                <option>Contract</option>
            </select>
        </div>
        <div class="mb-4">
            <label class="block text-gray-700 mb-1">Salary</label>
            <input type="number" name="salary" class="w-full border rounded px-3 py-2" value="{{ old('salary') }}">
        </div>
        <div class="mb-4">
            <label class="block text-gray-700 mb-1">Company</label>
            <select name="company_id" class="w-full border rounded px-3 py-2">
                @foreach($companies as $company)
                    <option value="{{ $company->id }}">{{ $company->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-4">
            <label class="block text-gray-700 mb-1">Category</label>
            <select name="job_category_id" class="w-full border rounded px-3 py-2">
                @foreach($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="bg-blue-600 text-white px-6 py-2 rounded">Save</button>
        <a href="{{ route('job-vacancies.index') }}" class="ml-2 text-gray-500">Cancel</a>
    </form>
</div>
@endsection