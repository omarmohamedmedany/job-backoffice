@extends('layouts.app')
@section('content')
<h1 class="text-2xl font-bold mb-6">Edit User</h1>
<div class="bg-white rounded shadow p-6 max-w-lg">
    <form method="POST" action="{{ route('users.update', $user) }}">
        @csrf @method('PUT')
        <div class="mb-4">
            <label class="block text-gray-700 mb-1">Name</label>
            <input type="text" name="name" class="w-full border rounded px-3 py-2" value="{{ $user->name }}">
        </div>
        <div class="mb-4">
            <label class="block text-gray-700 mb-1">Email</label>
            <input type="email" name="email" class="w-full border rounded px-3 py-2" value="{{ $user->email }}">
        </div>
        <div class="mb-4">
            <label class="block text-gray-700 mb-1">Role</label>
            <select name="role" class="w-full border rounded px-3 py-2">
                @foreach(['admin', 'company-owner', 'job-seeker'] as $role)
                    <option {{ $user->role == $role ? 'selected' : '' }}>{{ $role }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="bg-blue-600 text-white px-6 py-2 rounded">Update</button>
        <a href="{{ route('users.index') }}" class="ml-2 text-gray-500">Cancel</a>
    </form>
</div>
@endsection