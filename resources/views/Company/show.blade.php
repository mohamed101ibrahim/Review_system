<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>{{ $title ?? config('app.name', 'Laravel App') }}</title>
    @vite('resources/css/app.css')
</head>
<body >
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>{{ $title ?? config('app.name', 'Laravel App') }}</title>
        @vite('resources/css/app.css')
    </head>
    <body>
    <div class="max-w-4xl mx-auto py-10 px-4">
        <div class="bg-white shadow rounded-lg p-6">


            <div class="flex justify-center mb-6">
                @if ($company->logo_url)
                    <img src="{{ $company->logo_url }}" alt="{{ $company->name }} Logo" class="w-32 h-32 object-contain">
                @else
                    <div class="w-32 h-32 bg-gray-100 flex items-center justify-center rounded-full">
                        <i class="fas fa-building text-gray-400 text-3xl"></i>
                    </div>
                @endif
            </div>


            <h2 class="text-2xl font-bold text-gray-800 mb-2">{{ $company->name }}</h2>
            <p class="text-gray-600 mb-4">{{ $company->description ?? 'No description provided.' }}</p>

            <div class="mb-4">
                <strong class="text-gray-700">Website: </strong>
                @if ($company->website)
                    <a href="{{ $company->website }}" target="_blank" class="text-blue-600 hover:underline">
                        {{ $company->website }}
                    </a>
                @else
                    <span class="text-gray-500">Not available</span>
                @endif
            </div>


            @if(is_array($company->social_links) && count($company->social_links))
                <div class="mt-6">
                    <h3 class="text-lg font-semibold mb-2">Social Media</h3>
                    <ul class="space-y-2">
                        @foreach ($company->social_links as $link)
                            <li>
                                <span class="font-medium capitalize">{{ $link['type'] ?? 'Other' }}:</span>
                                <a href="{{ $link['url'] }}" class="text-blue-600 hover:underline" target="_blank">
                                    {{ $link['url'] }}
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div class="mt-8 flex flex-wrap gap-4">

                <a href="{{ route('company.index') }}"
                   class="inline-flex items-center px-4 py-2 border border-gray-300 shadow-sm text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50">
                    ← Back to Companies
                </a>

                <a href="{{ route('company.edit', $company->id) }}"
                   class="inline-flex items-center px-4 py-2 bg-yellow-400 text-white text-sm font-medium rounded-md hover:bg-yellow-500">
                    ✏️ Edit
                </a>

                <form action="{{ route('company.destroy', $company->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this company?');" class="inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit"
                    class="inline-flex items-center px-4 py-2 bg-red-500 text-white text-sm font-medium rounded-md hover:bg-red-600">
                🗑️ Delete
            </button>
                </form>


                {{-- Campaign --}}
                {{-- <a href="{{ route('company.campaign', $company->id) }}"
                   class="inline-flex items-center px-4 py-2 bg-indigo-600 text-white text-sm font-medium rounded-md hover:bg-indigo-700">
                    📢 Campaign
                </a> --}}
            </div>

        </div>
    </div>
    </body>
    </html>


</body>
</html>
