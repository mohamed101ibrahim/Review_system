<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>{{ $title ?? config('app.name', 'Laravel App') }}</title>
    @vite('resources/css/app.css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body class="bg-gray-50 text-gray-800 font-sans">

    <div class="max-w-6xl mx-auto py-8 px-4">
        <div class="flex items-center justify-between mb-6">
            <h1 class="text-2xl font-bold text-gray-800">Campaigns for {{ $company->name }}</h1>

            <a href="{{ route('company.campaign.create', $company->id) }}"
               class="inline-flex items-center px-4 py-2 bg-blue-600 text-white text-sm font-medium rounded-md hover:bg-blue-700">
                ➕ New Campaign
            </a>
        </div>

        @if(session('success'))
            <div class="mb-4 p-4 bg-green-100 text-green-700 rounded">
                {{ session('success') }}
            </div>
        @endif

        @if ($campaigns->count())
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach ($campaigns as $campaign)
                    <div class="bg-white shadow rounded-lg p-5 border border-gray-100 hover:shadow-lg transition">
                        <h2 class="text-xl font-semibold text-gray-800">{{ $campaign->title }}</h2>
                        <p class="text-gray-600 text-sm mt-2 line-clamp-3">
                            {{ $campaign->description ?? 'No description provided.' }}
                        </p>

                        <div class="mt-4 flex justify-between items-center text-sm">
                            <span class="text-gray-500">{{ $campaign->start_date }} → {{ $campaign->end_date }}</span>

                            <div class="flex gap-2">
                                <a href="{{ route('company.campaign.edit', [$company->id, $campaign->id]) }}"
                                   class="text-indigo-600 hover:text-indigo-800 font-medium">Edit</a>

                                <form action="{{ route('company.campaign.destroy', [$company->id, $campaign->id]) }}"
                                      method="POST" onsubmit="return confirm('Are you sure?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-500 hover:text-red-700 font-medium">Delete</button>
                                </form>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <p class="text-gray-500 text-center mt-10">No campaigns found for this company.</p>
        @endif
    </div>

</body>
</html>