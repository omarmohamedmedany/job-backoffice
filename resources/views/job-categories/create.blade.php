@extends('layouts.app')
@section('content')
<h1 class="text-2xl font-bold mb-6">Add Job Category</h1>
<div class="bg-white rounded shadow p-6 max-w-lg">
    <form method="POST" action="{{ route('job-categories.store') }}">
        @csrf
        <div class="mb-4">
            <label class="block text-gray-700 mb-1">Category Name</label>
            <input type="text" name="name" class="w-full border rounded px-3 py-2" value="{{ old('name') }}">
            @error('name')<p class="text-red-500 text-sm">{{ $message }}</p>@enderror
        </div>
        <button type="submit" class="bg-blue-600 text-white px-6 py-2 rounded">Save</button>
        <a href="{{ route('job-categories.index') }}" class="ml-2 text-gray-500">Cancel</a>
    </form>
</div>
@endsection