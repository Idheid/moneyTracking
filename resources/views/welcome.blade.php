<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dashboard | {{ config('app.name', 'Laravel') }}</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@3.2.4/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 text-gray-800 min-h-screen flex flex-col">

    <!-- Navbar -->
    <nav class="bg-white shadow-md">
        <div class="max-w-7xl mx-auto px-6 py-4 flex justify-between items-center">
            <h1 class="text-xl font-bold text-red-500">Dashboard</h1>
            <div class="space-x-4">
                <a href="{{ url('/home') }}" class="text-gray-700 hover:text-red-500">Home</a>
                <a href="{{ route('profile.edit') }}" class="text-gray-700 hover:text-red-500">Profile</a>
                <form action="{{ route('logout') }}" method="POST" class="inline">
                    @csrf
                    <button type="submit" class="text-gray-700 hover:text-red-500">Logout</button>
                </form>
            </div>
        </div>
    </nav>

    <!-- Content -->
    <main class="flex-grow max-w-7xl mx-auto p-6">
        <div class="grid md:grid-cols-3 gap-6">
            <div class="bg-white p-6 rounded-lg shadow hover:shadow-lg transition">
                <h2 class="text-lg font-semibold mb-2">Users</h2>
                <p class="text-gray-600 mb-4">Manage application users and permissions.</p>
                <a href="{{ url('/users') }}" class="text-red-500 hover:underline">Go to Users →</a>
            </div>

            <div class="bg-white p-6 rounded-lg shadow hover:shadow-lg transition">
                <h2 class="text-lg font-semibold mb-2">Reports</h2>
                <p class="text-gray-600 mb-4">View system activity and data reports.</p>
                <a href="{{ url('/reports') }}" class="text-red-500 hover:underline">Go to Reports →</a>
            </div>

            <div class="bg-white p-6 rounded-lg shadow hover:shadow-lg transition">
                <h2 class="text-lg font-semibold mb-2">Settings</h2>
                <p class="text-gray-600 mb-4">Update application configuration and preferences.</p>
                <a href="{{ url('/settings') }}" class="text-red-500 hover:underline">Go to Settings →</a>
            </div>
        </div>
    </main>

    <!-- Footer -->
    <footer class="bg-white shadow-inner text-center py-4 text-sm text-gray-500">
        © {{ date('Y') }} {{ config('app.name', 'Laravel') }}. All rights reserved.
    </footer>

</body>
</html>