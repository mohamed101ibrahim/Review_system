<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>{{ $title ?? 'Create Campaign' }}</title>
    @vite('resources/css/app.css')
</head>
<body>


<div class="min-h-screen bg-gray-50 py-12 px-4 sm:px-6 lg:px-8">
    <div class="max-w-4xl mx-auto">
        <div class="bg-white shadow-xl rounded-lg overflow-hidden">
            <div class="bg-gradient-to-r from-blue-600 to-blue-800 px-8 py-6">
                <div class="flex items-center justify-between">
                    <div>
                        <h1 class="text-2xl font-bold text-white">Create New Campaign</h1>
                        <p class="text-blue-100 mt-1">Fill in the details below to create a campaign for {{ $company->name }}</p>
                    </div>
                    <div class="bg-blue-500 text-white rounded-full p-3">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-3-3v6m5-13a2 2 0 012 2v16a2 2 0 01-2 2H7a2 2 0 01-2-2V5a2 2 0 012-2h10z" />
                        </svg>
                    </div>
                </div>
            </div>
            <div class="border-b border-gray-200">
                <div class="px-8 py-4">
                    <div class="flex items-center">
                        <div class="flex items-center text-blue-600 relative">
                            <div class="rounded-full transition duration-500 ease-in-out h-8 w-8 py-1 border-2 border-blue-600 bg-blue-600">
                                <div class="text-white text-center font-bold">1</div>
                            </div>
                            <div class="absolute top-0 -ml-10 text-center mt-10 w-32 text-xs font-medium text-blue-600">Campaign Details</div>
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
            </div>
            <form method="POST" action="{{ route('company.campaign.store', $company->id) }}" class="px-8 py-6" id="campaignForm">
                @csrf

                <div id="step-1" class="space-y-6">
                    <div>
                        <label for="title" class="block text-sm font-medium text-gray-700 mb-1">Campaign Title *</label>
                        <input type="text" name="title" id="title" value="{{ old('title') }}"
                            class="block w-full px-4 py-3 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500"
                            placeholder="Summer Promotion" required>
                        @error('title')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="description" class="block text-sm font-medium text-gray-700 mb-1">Description</label>
                        <textarea name="description" id="description" rows="4"
                            class="block w-full px-4 py-3 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500"
                            placeholder="Describe your campaign here...">{{ old('description') }}</textarea>
                        @error('description')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                        <div>
                            <label for="type" class="block text-sm font-medium text-gray-700 mb-1">Type *</label>
                            <select name="type" id="type"
                                class="block w-full px-4 py-3 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500" required>
                                @foreach (['review', 'survey', 'rating', 'testimonial', 'lead'] as $type)
                                    <option value="{{ $type }}" {{ old('type') === $type ? 'selected' : '' }}>{{ ucfirst($type) }}</option>
                                @endforeach
                            </select>
                            @error('type')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="status" class="block text-sm font-medium text-gray-700 mb-1">Status *</label>
                            <select name="status" id="status"
                                class="block w-full px-4 py-3 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500" required>
                                <option value="active" {{ old('status') === 'active' ? 'selected' : '' }}>Active</option>
                                <option value="inactive" {{ old('status') === 'inactive' ? 'selected' : '' }}>Inactive</option>
                            </select>
                            @error('status')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                </div>

                <div id="step-2" class="space-y-6 hidden">
                    <p class="text-gray-700 text-sm">This is the Additional Info section. Add your actual fields here.</p>
                    <div>
                        <label for="extra" class="block text-sm font-medium text-gray-700 mb-1">Extra Info</label>
                        <input type="text" name="extra" id="extra"
                            class="block w-full px-4 py-3 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500"
                            placeholder="Optional detail...">
                    </div>
                </div>

                <div id="step-3" class="space-y-6 hidden">
                    <p class="text-gray-700 text-sm">This is the Review step. Add a summary or preview here.</p>
                </div>
                <div class="mt-10 pt-6 border-t border-gray-200 flex justify-between" id="formNavigation">
                    <button type="button" id="leftBtn"
                        class="inline-flex items-center px-4 py-2 border border-gray-300 shadow-sm text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50">
                        Cancel
                    </button>

                    <button type="button" id="rightBtn"
                        class="inline-flex items-center px-6 py-3 border border-transparent text-base font-medium rounded-md shadow-sm text-white bg-blue-600 hover:bg-blue-700">
                        Next
                    </button>
                </div>


            </form>
        </div>
    </div>
</div>
<script>
    const steps = ['step-1', 'step-2', 'step-3'];
    let currentStep = 0;

    const leftBtn = document.getElementById('leftBtn');
    const rightBtn = document.getElementById('rightBtn');

    function showStep(index) {
        steps.forEach((stepId, i) => {
            document.getElementById(stepId).classList.toggle('hidden', i !== index);
        });

        if (index === 0) {
            leftBtn.textContent = 'Cancel';
            leftBtn.onclick = () => window.location.href = "{{ route('company.index') }}";
        } else {
            leftBtn.textContent = 'Back';
            leftBtn.onclick = () => {
                currentStep--;
                showStep(currentStep);
            };
        }

        if (index < steps.length - 1) {
            rightBtn.textContent = 'Next';
            rightBtn.onclick = () => {
                currentStep++;
                showStep(currentStep);
            };
        } else {
            rightBtn.textContent = 'Create';
            rightBtn.onclick = () => document.getElementById('campaignForm').submit();
        }
    }

    showStep(currentStep);

    function updateStepper(x) {
        const steps = document.querySelectorAll('.step-item');
        const lines = document.querySelectorAll('.step-line');

        steps.forEach((step, i) => {
            const circle = step.querySelector('.step-circle');
            const label = step.querySelector('.step-label');
            const num = circle.querySelector('div');

            if (i < x) {
                // Completed
                step.classList.replace('text-gray-500', 'text-blue-600');
                circle.className = "step-circle rounded-full h-8 w-8 py-1 border-2 border-blue-600 bg-blue-600";
                label.className = "step-label absolute top-0 -ml-10 text-center mt-10 w-32 text-xs font-medium text-blue-600";
                num.className = "text-white text-center font-bold";
            } else if (i === x) {
                // Current
                step.classList.replace('text-gray-500', 'text-blue-600');
                circle.className = "step-circle rounded-full h-8 w-8 py-1 border-2 border-blue-600 bg-blue-600";
                label.className = "step-label absolute top-0 -ml-10 text-center mt-10 w-32 text-xs font-medium text-blue-600";
                num.className = "text-white text-center font-bold";
            } else {
                // Upcoming
                step.classList.replace('text-blue-600', 'text-gray-500');
                circle.className = "step-circle rounded-full h-8 w-8 py-1 border-2 border-gray-300 bg-white";
                label.className = "step-label absolute top-0 -ml-10 text-center mt-10 w-32 text-xs font-medium text-gray-500";
                num.className = "text-gray-600 text-center font-bold";
            }
        });

        lines.forEach((line, i) => {
            line.className = `step-line flex-auto border-t-2 ${i < x ? 'border-blue-600' : 'border-gray-300'}`;
        });
    }

    // Also update your `showStep()` function to call this:
    function showStep(x) {
        // existing form step toggle logic...
        updateStepper(x);
    }

    // initial call
    updateStepper(0);

</script>


</body>
</html>
