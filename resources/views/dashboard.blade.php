@extends('layouts.app')
@section('content')
<h1 class="text-2xl font-bold mb-6">Dashboard</h1>
<div class="grid grid-cols-4 gap-4">
    <div class="bg-white p-6 rounded shadow text-center">
        <p class="text-3xl font-bold">{{ $stats['users'] }}</p>
        <p class="text-gray-500">Users</p>
    </div>
    <div class="bg-white p-6 rounded shadow text-center">
        <p class="text-3xl font-bold">{{ $stats['companies'] }}</p>
        <p class="text-gray-500">Companies</p>
    </div>
    <div class="bg-white p-6 rounded shadow text-center">
        <p class="text-3xl font-bold">{{ $stats['vacancies'] }}</p>
        <p class="text-gray-500">Job Vacancies</p>
    </div>
    <div class="bg-white p-6 rounded shadow text-center">
        <p class="text-3xl font-bold">{{ $stats['applications'] }}</p>
        <p class="text-gray-500">Applications</p>
    </div>
</div>
@endsection