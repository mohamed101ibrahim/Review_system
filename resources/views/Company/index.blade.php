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

    <div class="min-h-screen px-4 sm:px-6 py-8 max-w-7xl mx-auto">
        <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center mb-8 gap-4">
            <div>
                <h1 class="text-3xl font-bold text-gray-900">Company Directory</h1>
                <p class="text-gray-600 mt-1">Browse our network of partner companies</p>
            </div>
            <a href="{{ route('company.create') }}"
               class="inline-flex items-center gap-2 bg-blue-600 hover:bg-blue-700 text-white px-5 py-3 rounded-lg shadow-md hover:shadow-lg transition-all duration-200">
                <i class="fas fa-plus"></i>
                Add Company
            </a>
        </div>

        {{-- Stats Bar --}}



        <div class="grid p-6 grid-cols-1 md:grid-cols-2 gap-6">

            <div class="bg-white p-6 rounded-lg shadow border border-gray-200">
              <h2 class="text-lg font-semibold text-gray-700 mb-2">Total Companies</h2>
              <p class="text-3xl font-bold">{{ count($companies) }}</p>
            </div>

            <div class="bg-white p-6 rounded-lg shadow border border-gray-200">
              <h2 class="text-lg font-semibold text-gray-700 mb-2">New This Month</h2>
              <p class="text-3xl font-bold">12</p>
            </div>

            <div class="bg-white p-6 rounded-lg shadow border border-gray-200">
              <h2 class="text-lg font-semibold text-gray-700 mb-2">Active Partners</h2>
              <p class="text-3xl font-bold">87%</p>
            </div>

            <div class="bg-white p-6 rounded-lg shadow border border-gray-200">
              <h2 class="text-lg font-semibold text-gray-700 mb-2">Categories</h2>
              <p class="text-3xl font-bold">8</p>
            </div>
          </div>



        {{-- Search and Filter --}}
        {{-- <div class="mb-8 bg-white p-4 rounded-xl shadow-sm border border-gray-100">
            <div class="flex flex-col md:flex-row gap-4">
                <div class="flex-1 relative">
                    <i class="fas fa-search absolute left-3 top-3 text-gray-400"></i>
                    <input type="text" placeholder="Search companies..."
                           class="w-full pl-10 pr-4 py-2 border border-gray-200 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                </div>
                <select class="border border-gray-200 rounded-lg px-4 py-2 focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                    <option>All Industries</option>
                    <option>Technology</option>
                    <option>Finance</option>
                    <option>Healthcare</option>
                    <option>Retail</option>
                </select>
                <select class="border border-gray-200 rounded-lg px-4 py-2 focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                    <option>Sort by: Newest</option>
                    <option>Sort by: Name</option>
                    <option>Sort by: Most Popular</option>
                </select>
            </div>
        </div> --}}

        {{-- Company Grid --}}
        @if(count($companies) > 0)
        <div class="max-w-7xl mx-auto px-4 sm:px-6 py-8">
            <!-- Company Grid -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
                @foreach ($companies as $company)
                    <div class="bg-white rounded-lg shadow-sm hover:shadow-md transition-all duration-200 border border-gray-200">
                        <!-- Company Logo -->
                        <div class="bg-gray-50 p-4 flex justify-center">
                            @if ($company->logo_url)
                                <img src="{{ $company->logo_url }}" alt="{{ $company->name }} logo"
                                     class="w-24 h-24 object-contain">
                            @else
                                <div class="w-24 h-24 bg-gray-100 rounded-full flex items-center justify-center text-gray-400">
                                    <i class="fas fa-building text-3xl"></i>
                                </div>
                            @endif
                        </div>

                        <!-- Company Info -->
                        <div class="p-4">
                            <div class="flex justify-between items-start mb-2">
                                <h2 class="text-md font-semibold text-gray-800">{{ $company->name }}</h2>
                                <span class="bg-blue-50 text-blue-700 text-xs px-2 py-1 rounded">Partner</span>
                            </div>

                            <p class="text-sm text-gray-600 mb-3 line-clamp-2">
                                {{ $company->description ?? 'No description available.' }}
                            </p>

                            <div class="flex justify-between items-center border-t border-gray-100 pt-3">
                                <a href="{{ route('company.show', $company) }}"
                                   class="text-blue-600 hover:text-blue-800 text-sm">
                                    View Details
                                </a>
                                @if($company->website)
                                <a href="{{ $company->website }}" target="_blank"
                                   class="text-gray-400 hover:text-blue-600 text-sm">
                                    <i class="fas fa-external-link-alt"></i>
                                </a>
                                @endif
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <!-- Pagination -->
            <div class="mt-8 flex justify-center">
                <nav class="inline-flex rounded-md shadow-sm -space-x-px">
                    <a href="#" class="px-3 py-2 rounded-l-md border border-gray-200 bg-white text-gray-500 hover:bg-gray-50">
                        <i class="fas fa-chevron-left"></i>
                    </a>
                    <a href="#" class="px-3 py-2 border border-gray-200 bg-white text-blue-600 font-medium">1</a>
                    <a href="#" class="px-3 py-2 border border-gray-200 bg-white text-gray-500 hover:bg-gray-50">2</a>
                    <a href="#" class="px-3 py-2 border border-gray-200 bg-white text-gray-500 hover:bg-gray-50">3</a>
                    <a href="#" class="px-3 py-2 rounded-r-md border border-gray-200 bg-white text-gray-500 hover:bg-gray-50">
                        <i class="fas fa-chevron-right"></i>
                    </a>
                </nav>
            </div>
        </div>
        @else
            {{-- Empty State --}}
            <div class="bg-white rounded-xl shadow-sm p-8 text-center">
                <div class="mx-auto w-24 h-24 bg-gray-100 rounded-full flex items-center justify-center mb-4">
                    <i class="fas fa-building text-3xl text-gray-400"></i>
                </div>
                <h3 class="text-lg font-medium text-gray-900 mb-2">No companies found</h3>
                <p class="text-gray-500 mb-6">There are currently no companies in the directory.</p>
                <a href="{{ route('company.create') }}"
                   class="inline-flex items-center gap-2 bg-blue-600 hover:bg-blue-700 text-white px-5 py-2 rounded-lg shadow-md hover:shadow-lg transition">
                    <i class="fas fa-plus"></i>
                    Add Your First Company
                </a>
            </div>
        @endif
    </div>

</body>
</html>