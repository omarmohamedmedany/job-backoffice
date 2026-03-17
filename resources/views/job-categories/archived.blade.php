@extends('layouts.app')
@section('content')
<div class="flex justify-between items-center mb-6">
    <h1 class="text-2xl font-bold">Archived Categories</h1>
    <a href="{{ route('job-categories.index') }}" class="text-gray-500 hover:underline">Back</a>
</div>
<div class="bg-white rounded shadow overflow-hidden">
    <table class="w-full">
        <thead class="bg-gray-50 text-left">
            <tr>
                <th class="px-6 py-3">Name</th>
                <th class="px-6 py-3">Actions</th>
            </tr>
        </thead>
        <tbody class="divide-y">
            @foreach($categories as $category)
            <tr>
                <td class="px-6 py-4">{{ $category->name }}</td>
                <td class="px-6 py-4">
                    <form method="POST" action="{{ route('job-categories.restore', $category->id) }}" class="inline">
                        @csrf @method('PATCH')
                        <button type="submit" class="text-green-500 hover:underline">Restore</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection