<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shaghalni - Backoffice</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">
    <div class="flex h-screen">
        <!-- Sidebar -->
        <div class="w-48 bg-white shadow-md flex flex-col">
            <div class="p-4 border-b">
                <h1 class="text-xl font-bold text-gray-800">Shaghalni</h1>
            </div>
            <nav class="flex-1 p-4 space-y-1">
                <a href="{{ route('dashboard') }}" class="block px-3 py-2 rounded text-gray-700 hover:bg-gray-100 {{ request()->routeIs('dashboard') ? 'bg-gray-100 font-semibold' : '' }}">Dashboard</a>
                <a href="{{ route('companies.index') }}" class="block px-3 py-2 rounded text-gray-700 hover:bg-gray-100 {{ request()->routeIs('companies*') ? 'bg-gray-100 font-semibold' : '' }}">Companies</a>
                <a href="{{ route('job-applications.index') }}" class="block px-3 py-2 rounded text-gray-700 hover:bg-gray-100 {{ request()->routeIs('job-applications*') ? 'bg-gray-100 font-semibold' : '' }}">Job Applications</a>
                <a href="{{ route('job-categories.index') }}" class="block px-3 py-2 rounded text-gray-700 hover:bg-gray-100 {{ request()->routeIs('job-categories*') ? 'bg-gray-100 font-semibold' : '' }}">Job Categories</a>
                <a href="{{ route('job-vacancies.index') }}" class="block px-3 py-2 rounded text-gray-700 hover:bg-gray-100 {{ request()->routeIs('job-vacancies*') ? 'bg-gray-100 font-semibold' : '' }}">Job Vacancies</a>
                <a href="{{ route('users.index') }}" class="block px-3 py-2 rounded text-gray-700 hover:bg-gray-100 {{ request()->routeIs('users*') ? 'bg-gray-100 font-semibold' : '' }}">Users</a>
            </nav>
            <div class="p-4 border-t">
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="text-red-500 hover:text-red-700">Logout</button>
                </form>
            </div>
        </div>

        <!-- Main Content -->
        <div class="flex-1 overflow-auto p-8">
            @if(session('success'))
                <div class="mb-4 p-4 bg-green-100 text-green-800 rounded">{{ session('success') }}</div>
            @endif
            @yield('content')
        </div>
    </div>
</body>
</html>