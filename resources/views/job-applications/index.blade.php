@extends('layouts.app')
@section('content')
<div class="flex justify-between items-center mb-6">
    <h1 class="text-2xl font-bold">Job Applications</h1>
    <a href="{{ route('job-applications.archived') }}" class="bg-gray-800 text-white px-4 py-2 rounded">Archived Job Applications</a>
</div>
<div class="bg-white rounded shadow overflow-hidden">
    <table class="w-full">
        <thead class="bg-gray-50 text-left">
            <tr>
                <th class="px-6 py-3">Applicant Name</th>
                <th class="px-6 py-3">Position (Job Vacancy)</th>
                <th class="px-6 py-3">Company</th>
                <th class="px-6 py-3">Status</th>
                <th class="px-6 py-3">Actions</th>
            </tr>
        </thead>
        <tbody class="divide-y">
            @foreach($applications as $app)
            <tr>
                <td class="px-6 py-4"><a href="{{ route('job-applications.show', $app) }}" class="text-blue-500">{{ $app->user->name }}</a></td>
                <td class="px-6 py-4">{{ $app->jobVacancy->title }}</td>
                <td class="px-6 py-4">{{ $app->jobVacancy->company->name }}</td>
                <td class="px-6 py-4">
                    <span class="{{ $app->status == 'accepted' ? 'text-green-600' : ($app->status == 'rejected' ? 'text-red-600' : 'text-yellow-600') }}">
                        {{ $app->status }}
                    </span>
                </td>
                <td class="px-6 py-4 space-x-2">
                    <a href="{{ route('job-applications.show', $app) }}" class="text-yellow-500 hover:underline">👍 Edit</a>
                    <form method="POST" action="{{ route('job-applications.destroy', $app) }}" class="inline">
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