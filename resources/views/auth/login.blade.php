<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login - Shaghalni</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 flex items-center justify-center h-screen">
    <div class="bg-white p-8 rounded shadow w-96">
        <h1 class="text-2xl font-bold mb-6 text-center">Shaghalni Backoffice</h1>
        <form method="POST" action="{{ route('login.post') }}">
            @csrf
            <div class="mb-4">
                <label class="block text-gray-700 mb-1">Email</label>
                <input type="email" name="email" class="w-full border rounded px-3 py-2" value="{{ old('email') }}">
                @error('email')<p class="text-red-500 text-sm mt-1">{{ $message }}</p>@enderror
            </div>
            <div class="mb-6">
                <label class="block text-gray-700 mb-1">Password</label>
                <input type="password" name="password" class="w-full border rounded px-3 py-2">
            </div>
            <button type="submit" class="w-full bg-gray-800 text-white py-2 rounded hover:bg-gray-900">Login</button>
        </form>
    </div>
</body>
</html>