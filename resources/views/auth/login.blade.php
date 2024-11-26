<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    <script src="https://cdn.tailwindcss.com"></script> <!-- Include Tailwind CSS -->
</head>
<body class="bg-gray-100 text-gray-800" style="background: url('{{ asset('storage/images/lg.jpg') }}') no-repeat center center/cover;">

    <!-- Main Container -->
    <div class="flex items-center justify-center min-h-screen py-12 px-6 lg:px-8">
        <div class="bg-black bg-opacity-50 p-10 rounded-xl shadow-2xl w-full max-w-lg text-white">

            <!-- Logo -->
            <div class="flex justify-center mb-6">
                <img src="{{ asset('storage/images/logo.png') }}" alt="Logo" class="h-16 w-auto object-contain">
            </div>

            <!-- Title -->
            <h2 class="text-2xl font-extrabold text-center mb-6">Welcome Back!</h2>
            <p class="text-center text-gray-300 mb-8">Log in to continue.</p>

            <!-- Form -->
            <form method="POST" action="{{ route('login') }}">
                @csrf

                <!-- Email Address -->
                <div class="mb-5">
                    <label for="email" class="block text-sm font-semibold mb-2">Email</label>
                    <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus
                        class="w-full p-3 bg-gray-800 bg-opacity-80 text-white border border-gray-600 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-opacity-50 placeholder-gray-400"
                        placeholder="Enter your email address">
                    <x-input-error :messages="$errors->get('email')" class="mt-2 text-red-400" />
                </div>

                <!-- Password -->
                <div class="mb-5">
                    <label for="password" class="block text-sm font-semibold mb-2">Password</label>
                    <input id="password" type="password" name="password" required
                        class="w-full p-3 bg-gray-800 bg-opacity-80 text-white border border-gray-600 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-opacity-50 placeholder-gray-400"
                        placeholder="Enter your password">
                    <x-input-error :messages="$errors->get('password')" class="mt-2 text-red-400" />
                </div>

                <!-- Remember Me -->
                <div class="block mt-4">
                    <label for="remember_me" class="inline-flex items-center">
                        <input id="remember_me" type="checkbox" class="rounded border-gray-600 text-indigo-600 focus:ring-indigo-500" name="remember">
                        <span class="ms-2 text-sm text-gray-300">Remember me</span>
                    </label>
                </div>

                <!-- Submit and Forgot Password -->
                <div class="flex items-center justify-between mt-6">
                    @if (Route::has('password.request'))
                        <a class="text-sm text-gray-300 hover:text-indigo-400 transition" href="{{ route('password.request') }}">
                            Forgot your password?
                        </a>
                    @endif

                    <button type="submit"
                        class="bg-indigo-600 hover:bg-indigo-700 transition px-6 py-3 rounded-lg text-white font-semibold shadow-lg focus:outline-none focus:ring-2 focus:ring-indigo-400 focus:ring-opacity-50">
                        Log in
                    </button>
                </div>
            </form>

        </div>
    </div>

</body>
</html>
