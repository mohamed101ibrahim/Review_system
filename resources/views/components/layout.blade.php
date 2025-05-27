<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>{{ $title ?? config('app.name', 'Laravel App') }}</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-100 font-sans leading-normal tracking-wide">
    <main class="min-h-screen flex items-center justify-center p-6">
        <div class="w-full max-w-sm">
            {{ $slot }}
        </div>
    </main>
    @stack('scripts')
</body>
</html>