<x-layout>
    <div class="bg-white p-8 rounded-xl shadow-xl max-w-md mx-auto">
        <h1 class="text-3xl font-bold text-center mb-6 text-blue-600">Create Account</h1>

        <form method="POST" action="{{ route('register.store') }}" class="space-y-5">
            @csrf

            <div>
                <label class="block text-gray-700 mb-1" for="name">Full Name</label>
                <input type="text" name="name" id="name" placeholder="John Doe"
                       value="{{ old('name') }}"
                       class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                @error('name')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label class="block text-gray-700 mb-1" for="email">Email Address</label>
                <input type="email" name="email" id="email" placeholder="you@example.com"
                       value="{{ old('email') }}"
                       class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                @error('email')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label class="block text-gray-700 mb-1" for="password">Password</label>
                <input type="password" name="password" id="password" placeholder="••••••••"
                       class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                @error('password')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label class="block text-gray-700 mb-1" for="password_confirmation">Confirm Password</label>
                <input type="password" name="password_confirmation" id="password_confirmation" placeholder="••••••••"
                       class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                @error('password_confirmation')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <button type="submit"
                    class="mt-3 w-full bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded-lg transition duration-200">
                Register
            </button>

            <p class="text-center text-sm text-gray-600 mt-4">
                Already have an account?
                <a href="{{ route('login') }}" class="text-blue-500 hover:underline">Login here</a>
            </p>
        </form>
    </div>
</x-layout>
