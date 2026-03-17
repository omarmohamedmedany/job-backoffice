@extends('layouts.app')
@section('content')
<div class="flex justify-between items-center mb-6">
    <h1 class="text-2xl font-bold">Archived Users</h1>
    <a href="{{ route('users.index') }}" class="text-gray-500 hover:underline">Back</a>
</div>
<div class="bg-white rounded shadow overflow-hidden">
    <table class="w-full">
        <thead class="bg-gray-50 text-left">
            <tr>
                <th class="px-6 py-3">Name</th>
                <th class="px-6 py-3">Email</th>
                <th class="px-6 py-3">Actions</th>
            </tr>
        </thead>
        <tbody class="divide-y">
            @foreach($users as $user)
            <tr>
                <td class="px-6 py-4">{{ $user->name }}</td>
                <td class="px-6 py-4">{{ $user->email }}</td>
                <td class="px-6 py-4">
                    <form method="POST" action="{{ route('users.restore', $user->id) }}" class="inline">
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