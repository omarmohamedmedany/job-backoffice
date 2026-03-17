@extends('layouts.app')
@section('content')
<div class="flex justify-between items-center mb-6">
    <h1 class="text-2xl font-bold">Companies</h1>
    <div class="space-x-2">
        <a href="{{ route('companies.archived') }}" class="bg-gray-800 text-white px-4 py-2 rounded">Archived Companies</a>
        <a href="{{ route('companies.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded">Add Company</a>
    </div>
</div>
<div class="bg-white rounded shadow overflow-hidden">
    <table class="w-full">
        <thead class="bg-gray-50 text-left">
            <tr>
                <th class="px-6 py-3 text-gray-600">Name</th>
                <th class="px-6 py-3 text-gray-600">Address</th>
                <th class="px-6 py-3 text-gray-600">Industry</th>
                <th class="px-6 py-3 text-gray-600">Website</th>
                <th class="px-6 py-3 text-gray-600">Actions</th>
            </tr>
        </thead>
        <tbody class="divide-y">
            @foreach($companies as $company)
            <tr>
                <td class="px-6 py-4">{{ $company->name }}</td>
                <td class="px-6 py-4">{{ $company->address }}</td>
                <td class="px-6 py-4">{{ $company->industry }}</td>
                <td class="px-6 py-4"><a href="{{ $company->website }}" class="text-blue-500" target="_blank">{{ $company->website }}</a></td>
                <td class="px-6 py-4 space-x-2">
                    <a href="{{ route('companies.edit', $company) }}" class="text-yellow-500 hover:underline">👍 Edit</a>
                    <form method="POST" action="{{ route('companies.destroy', $company) }}" class="inline">
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