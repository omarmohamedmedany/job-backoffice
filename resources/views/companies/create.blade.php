@extends('layouts.app')
@section('content')
<h1 class="text-2xl font-bold mb-6">Add Company</h1>
<div class="bg-white rounded shadow p-6 max-w-lg">
    <form method="POST" action="{{ route('companies.store') }}">
        @csrf
        <div class="mb-4">
            <label class="block text-gray-700 mb-1">Name</label>
            <input type="text" name="name" class="w-full border rounded px-3 py-2" value="{{ old('name') }}">
            @error('name')<p class="text-red-500 text-sm">{{ $message }}</p>@enderror
        </div>
        <div class="mb-4">
            <label class="block text-gray-700 mb-1">Address</label>
            <input type="text" name="address" class="w-full border rounded px-3 py-2" value="{{ old('address') }}">
        </div>
        <div class="mb-4">
            <label class="block text-gray-700 mb-1">Industry</label>
            <input type="text" name="industry" class="w-full border rounded px-3 py-2" value="{{ old('industry') }}">
        </div>
        <div class="mb-4">
            <label class="block text-gray-700 mb-1">Website</label>
            <input type="url" name="website" class="w-full border rounded px-3 py-2" value="{{ old('website') }}">
        </div>
        <div class="mb-4">
            <label class="block text-gray-700 mb-1">Owner</label>
            <select name="user_id" class="w-full border rounded px-3 py-2">
                @foreach($owners as $owner)
                    <option value="{{ $owner->id }}">{{ $owner->name }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="bg-blue-600 text-white px-6 py-2 rounded">Save</button>
        <a href="{{ route('companies.index') }}" class="ml-2 text-gray-500">Cancel</a>
    </form>
</div>
@endsection