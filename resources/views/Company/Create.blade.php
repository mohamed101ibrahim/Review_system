<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>{{ $title ?? config('app.name', 'Laravel App') }}</title>
    @vite('resources/css/app.css')
</head>
<body >
<div class="min-h-screen bg-gray-50 py-12 px-4 sm:px-6 lg:px-8">
    <div class="max-w-5xl mx-auto">
        <div class="bg-white shadow-xl rounded-lg overflow-hidden">
            <div class="bg-gradient-to-r from-blue-600 to-blue-800 px-8 py-6">
                <div class="flex items-center justify-between">
                    <div>
                        <h1 class="text-2xl font-bold text-white">Create New Company</h1>
                        <p class="text-blue-100 mt-1">Fill in the details below to register your company</p>
                    </div>
                    <div class="bg-blue-500 text-white rounded-full p-3">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                        </svg>
                    </div>
                </div>
            </div>

            {{-- <div class="border-b border-gray-200">
                <div class="px-8 py-4">
                    <div class="flex items-center">
                        <div class="flex items-center text-blue-600 relative">
                            <div class="rounded-full transition duration-500 ease-in-out h-8 w-8 py-1 border-2 border-blue-600 bg-blue-600">
                                <div class="text-white text-center font-bold">1</div>
                            </div>
                            <div class="absolute top-0 -ml-10 text-center mt-10 w-32 text-xs font-medium text-blue-600">Company Details</div>
                        </div>
                        <div class="flex-auto border-t-2 transition duration-500 ease-in-out border-blue-600"></div>
                        <div class="flex items-center text-gray-500 relative">
                            <div class="rounded-full transition duration-500 ease-in-out h-8 w-8 py-1 border-2 border-gray-300">
                                <div class="text-gray-600 text-center font-bold">2</div>
                            </div>
                            <div class="absolute top-0 -ml-10 text-center mt-10 w-32 text-xs font-medium text-gray-500">Additional Info</div>
                        </div>
                        <div class="flex-auto border-t-2 transition duration-500 ease-in-out border-gray-300"></div>
                        <div class="flex items-center text-gray-500 relative">
                            <div class="rounded-full transition duration-500 ease-in-out h-8 w-8 py-1 border-2 border-gray-300">
                                <div class="text-gray-600 text-center font-bold">3</div>
                            </div>
                            <div class="absolute top-0 -ml-10 text-center mt-10 w-32 text-xs font-medium text-gray-500">Review</div>
                        </div>
                    </div>
                </div>
            </div> --}}

            <form method="POST" action="{{ route('company.store') }}" class="px-8 py-6">
                @csrf

                <div class="grid grid-cols-1 gap-8 md:grid-cols-2">
                    <div class="space-y-6">
                        <div>
                            <label for="name" class="block text-sm font-medium text-gray-700 mb-1">Company Name *</label>
                            <div class="relative">
                                <input type="text" name="name" id="name" value="{{ old('name') }}"
                                    class="block w-full px-4 py-3 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500"
                                    placeholder="Acme Corporation" required>
                                @error('name')
                                    <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
                                        <svg class="h-5 w-5 text-red-500" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd" />
                                        </svg>
                                    </div>
                                @enderror
                            </div>
                            @error('name')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="description" class="block text-sm font-medium text-gray-700 mb-1">Description</label>
                            <textarea name="description" id="description" rows="4"
                                class="block w-full px-4 py-3 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500"
                                placeholder="Brief description of your company">{{ old('description') }}</textarea>
                            @error('description')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="logo_url" class="block text-sm font-medium text-gray-700 mb-1">Logo URL</label>
                            <div class="flex items-center">
                                <input type="url" name="logo_url" id="logo_url" value="{{ old('logo_url') }}"
                                    class="block w-full px-4 py-3 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500"
                                    placeholder="https://example.com/logo.png">

                            </div>
                            @error('logo_url')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <div class="space-y-6">

                        <div>
                            <label for="website" class="block text-sm font-medium text-gray-700 mb-1">Website</label>
                            <div class="relative">

                                <input type="url" name="website" id="website" value="{{ old('website') }}"
                                    class="block w-full  px-4 py-3 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500"
                                    placeholder="https://yourcompany.com">
                                @error('website')
                                    <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
                                        <svg class="h-5 w-5 text-red-500" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd" />
                                        </svg>
                                    </div>
                                @enderror
                            </div>
                            @error('website')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Social Media Links</label>
                            <div id="social-links-wrapper" class="space-y-3">
                                @php
                                    $oldSocialLinks = old('social_links', [['type' => '', 'url' => '']]);
                                @endphp

                                @foreach ($oldSocialLinks as $i => $link)
                                    <div class="flex items-center space-x-3">
                                        <div class="w-1/3">
                                            <select name="social_links[{{ $i }}][type]" class="block w-full px-4 py-3 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500">
                                                <option value="" disabled selected>Select platform</option>
                                                <option value="facebook" {{ ($link['type'] ?? '')  == 'facebook' ? 'selected' : '' }}>Facebook</option>
                                                <option value="twitter" {{ ($link['type'] ?? '')  == 'twitter' ? 'selected' : '' }}>Twitter</option>
                                                <option value="linkedin" {{ ($link['type'] ?? '')  == 'linkedin' ? 'selected' : '' }}>LinkedIn</option>
                                                <option value="instagram" {{ ($link['type'] ?? '')  == 'instagram' ? 'selected' : '' }}>Instagram</option>
                                                <option value="youtube" {{ ($link['type'] ?? '')  == 'youtube' ? 'selected' : '' }}>YouTube</option>
                                                <option value="youtube" {{ ($link['type'] ?? '')  == 'tripAdvisor' ? 'selected' : '' }}>TripAdvisor</option>
                                                <option value="other" {{ ($link['type'] ?? '')  == 'other' ? 'selected' : '' }}>Other</option>
                                            </select>
                                        </div>
                                        <div class="flex-1">
                                            <input type="url" name="social_links[{{ $i }}][url]" value="{{ $link['url'] ?? '' }}"
                                                class="block w-full px-4 py-3 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500"
                                                placeholder="https://">
                                        </div>
                                        @if($i > 0)
                                            <button type="button" class="remove-social-link text-red-500 hover:text-red-700">
                                                <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                                </svg>
                                            </button>
                                        @endif
                                    </div>
                                    @error("social_links.$i.type")
                                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                    @error("social_links.$i.url")
                                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                @endforeach
                            </div>

                            <button type="button" id="add-social-link" class="mt-3 inline-flex items-center px-3 py-2 border border-gray-300 shadow-sm text-sm leading-4 font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                                <svg class="-ml-0.5 mr-2 h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                                </svg>
                                Add Social Link
                            </button>
                        </div>


                        <div>
                            <label for="industry_tags" class="block text-sm font-medium text-gray-700 mb-1">Industry Tags</label>
                            <input type="text" name="industry_tags" id="industry_tags" value="{{ old('industry_tags') }}"
                                class="block w-full px-4 py-3 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500"
                                placeholder="e.g. Technology, Finance, Healthcare">
                            <p class="mt-1 text-sm text-gray-500">Separate tags with commas</p>
                            @error('industry_tags')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="mt-10 pt-6 border-t border-gray-200 flex justify-between">
                    <button type="button"  onclick="window.location.href='{{ route('dashboard') }}'" class="inline-flex items-center px-4 py-2 border border-gray-300 shadow-sm text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                        Cancel
                    </button>
                    <button type="submit" class="inline-flex items-center px-6 py-3 border border-transparent text-base font-medium rounded-md shadow-sm text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                        Save Company
                        <svg class="ml-2 -mr-1 h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                        </svg>
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    let socialIndex = {{ count($oldSocialLinks) }};

    document.getElementById('add-social-link').addEventListener('click', function () {
        const wrapper = document.getElementById('social-links-wrapper');
        const div = document.createElement('div');
        div.classList.add('flex', 'items-center', 'space-x-3');
        div.innerHTML = `
            <div class="w-1/3">
                <select name="social_links[${socialIndex}][type]" class="block w-full px-4 py-3 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500">
                    <option value="" disabled selected>Select platform</option>
                    <option value="facebook">Facebook</option>
                    <option value="twitter">Twitter</option>
                    <option value="linkedin">LinkedIn</option>
                    <option value="instagram">Instagram</option>
                    <option value="youtube">YouTube</option>
                    <option value="other">Other</option>
                </select>
            </div>
            <div class="flex-1">
                <input type="url" name="social_links[${socialIndex}][url]"
                    class="block w-full px-4 py-3 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500"
                    placeholder="https://">
            </div>
            <button type="button" class="remove-social-link text-red-500 hover:text-red-700">
                <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                </svg>
            </button>
        `;
        wrapper.appendChild(div);
        socialIndex++;

        div.querySelector('.remove-social-link').addEventListener('click', function() {
            div.remove();
        });
    });

    document.querySelectorAll('.remove-social-link').forEach(button => {
        button.addEventListener('click', function() {
            this.closest('.flex.items-center.space-x-3').remove();
        });
    });
</script>
</body>
</html>