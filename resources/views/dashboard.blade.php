<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>{{ $title ?? config('app.name', 'Laravel App') }}</title>
    @vite('resources/css/app.css')
</head>
<body >
    <div class="flex min-h-screen bg-gray-100">
        {{-- Sidebar --}}
        <aside class="w-64 bg-gray-200 p-6 space-y-6 shadow-md">
            <div class="text-xl font-bold text-gray-800">Sidebar</div>
            <nav class="space-y-2">
                <a href="{{ route('dashboard') }}" class="block text-gray-700 hover:text-blue-600 font-medium">Dashboard</a>
                <a href="{{ route('company.index') }}" class="block text-gray-700 hover:text-blue-600 font-medium">Company List</a>
                {{-- <a href="{{ route('campaign.index') }}" class="block text-gray-700 hover:text-blue-600 font-medium">Campaign List</a> --}}
                {{-- <a href="{{ route('settings') }}" class="block text-gray-700 hover:text-blue-600 font-medium">Setting</a> --}}
                <form method="POST" action="{{ route('logout') }}" class="pt-4">
                    @csrf
                    <button type="submit" class="text-red-600 hover:text-red-800 font-medium">Logout</button>
                </form>
            </nav>
        </aside>

        {{-- Main Content --}}
        <main class="flex-1 p-10">
            <h1 class="text-3xl font-bold text-gray-800 mb-6">
                Welcome {{ Auth::user()->name }} to our dashboard
            </h1>

            <a href="{{ route('company.create') }}"
               class="inline-block bg-blue-600 text-white py-2 px-4 rounded-lg shadow hover:bg-blue-700 transition">
                + Create New Company
            </a>

            {{-- Additional content can go here --}}
        </main>
    </div>
</body>
</html>
