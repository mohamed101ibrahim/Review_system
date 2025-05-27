<x-layout>
    <div class="bg-white p-8 rounded-xl shadow-xl max-w-md mx-auto">
        <h2 class="text-3xl font-bold text-center mb-6 text-blue-600">Welcome Back</h2>

  

        <form method="POST" action="{{ route('login.attempt') }}" class="space-y-5">
            @csrf

            <div>
                <label for="email" class="block text-gray-700 mb-1">Email</label>
                <input type="email" name="email" id="email" placeholder="you@example.com"
                       value="{{ old('email') }}"
                       class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                @error('email')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="password" class="block text-gray-700 mb-1">Password</label>
                <input type="password" name="password" id="password" placeholder="••••••••"
                       class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                @error('password')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <button type="submit"
                    class="mt-2 w-full bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded-lg transition duration-200">
                Login
            </button>

            <p class="text-center text-sm text-gray-600 mt-4">
                Don’t have an account?
                <a href="{{ route('register') }}" class="text-blue-500 hover:underline">Register here</a>
            </p>
        </form>
    </div>
</x-layout>
