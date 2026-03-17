@extends('layouts.app')
@section('content')
<div class="flex justify-between items-center mb-6">
    <h1 class="text-2xl font-bold">Job Vacancies</h1>
    <div class="space-x-2">
        <a href="{{ route('job-vacancies.archived') }}" class="bg-gray-800 text-white px-4 py-2 rounded">Archived Job Vacancies</a>
        <a href="{{ route('job-vacancies.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded">Add Job Vacancy</a>
    </div>
</div>
<div class="bg-white rounded shadow overflow-hidden">
    <table class="w-full">
        <thead class="bg-gray-50 text-left">
            <tr>
                <th class="px-6 py-3">Title</th>
                <th class="px-6 py-3">Company</th>
                <th class="px-6 py-3">Location</th>
                <th class="px-6 py-3">Type</th>
                <th class="px-6 py-3">Salary</th>
                <th class="px-6 py-3">Actions</th>
            </tr>
        </thead>
        <tbody class="divide-y">
            @foreach($vacancies as $vacancy)
            <tr>
                <td class="px-6 py-4"><a href="#" class="text-blue-500">{{ $vacancy->title }}</a></td>
                <td class="px-6 py-4">{{ $vacancy->company->name }}</td>
                <td class="px-6 py-4">{{ $vacancy->location }}</td>
                <td class="px-6 py-4">{{ $vacancy->type }}</td>
                <td class="px-6 py-4">${{ number_format($vacancy->salary, 2) }}</td>
                <td class="px-6 py-4 space-x-2">
                    <a href="{{ route('job-vacancies.edit', $vacancy) }}" class="text-yellow-500 hover:underline">👍 Edit</a>
                    <form method="POST" action="{{ route('job-vacancies.destroy', $vacancy) }}" class="inline">
                        @csrf @method('DELETE')
                        <button type="submit" class="text-red-500 hover:underline">🗂 Archive</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection