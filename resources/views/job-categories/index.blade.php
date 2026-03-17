@extends('layouts.app')
@section('content')
<div class="flex justify-between items-center mb-6">
    <h1 class="text-2xl font-bold">Job Categories</h1>
    <div class="space-x-2">
        <a href="{{ route('job-categories.archived') }}" class="bg-gray-800 text-white px-4 py-2 rounded">Archived Categories</a>
        <a href="{{ route('job-categories.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded">Add Job Category</a>
    </div>
</div>
<div class="bg-white rounded shadow overflow-hidden">
    <table class="w-full">
        <thead class="bg-gray-50 text-left">
            <tr>
                <th class="px-6 py-3">Category Name</th>
                <th class="px-6 py-3">Actions</th>
            </tr>
        </thead>
        <tbody class="divide-y">
            @foreach($categories as $category)
            <tr>
                <td class="px-6 py-4">{{ $category->name }}</td>
                <td class="px-6 py-4 space-x-2">
                    <a href="{{ route('job-categories.edit', $category) }}" class="text-yellow-500 hover:underline">👍 Edit</a>
                    <form method="POST" action="{{ route('job-categories.destroy', $category) }}" class="inline">
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