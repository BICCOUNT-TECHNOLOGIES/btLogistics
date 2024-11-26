<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Registration</title>
    <script src="https://cdn.tailwindcss.com"></script> <!-- Include Tailwind CSS -->
</head>
<body class="bg-gray-100 text-gray-800" style="background: url('{{ asset('storage/images/lg.jpg') }}') no-repeat center center/cover;">


    <!-- Main Container -->
    <div class="flex items-center justify-center min-h-screen py-12 px-6 lg:px-8"   >
        <div class="bg-black bg-opacity-50 p-10 rounded-xl shadow-2xl w-full max-w-lg text-white">

            <!-- Logo -->
            <div class="flex justify-center mb-6">
                <img src="{{ asset('storage/images/logo.png') }}" alt="Logo" class="h-16 w-auto object-contain">
            </div>

            <!-- Title -->
            <h2 class="text-2xl font-extrabold text-center mb-6">Create Your Account</h2>
            <p class="text-center text-gray-300 mb-8">Join us today! Fill out the form below to get started.</p>

            <!-- Form -->
            <form method="POST" action="{{ route('register', $userType) }}">
                @csrf

                <!-- Name -->
                <div class="mb-5">
                    <label for="name" class="block text-sm font-semibold mb-2">Name</label>
                    <input id="name" type="text" name="name" value="{{ old('name') }}" required autofocus
                        class="w-full p-3 bg-gray-800 bg-opacity-80 text-white border border-gray-600 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-opacity-50 placeholder-gray-400"
                        placeholder="Enter your full name">
                    @error('name')
                        <p class="text-red-400 text-sm mt-2">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Email -->
                <div class="mb-5">
                    <label for="email" class="block text-sm font-semibold mb-2">Email</label>
                    <input id="email" type="email" name="email" value="{{ old('email') }}" required
                        class="w-full p-3 bg-gray-800 bg-opacity-80 text-white border border-gray-600 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-opacity-50 placeholder-gray-400"
                        placeholder="Enter your email address">
                    @error('email')
                        <p class="text-red-400 text-sm mt-2">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Password -->
                <div class="mb-5">
                    <label for="password" class="block text-sm font-semibold mb-2">Password</label>
                    <input id="password" type="password" name="password" required
                        class="w-full p-3 bg-gray-800 bg-opacity-80 text-white border border-gray-600 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-opacity-50 placeholder-gray-400"
                        placeholder="Create a strong password">
                    @error('password')
                        <p class="text-red-400 text-sm mt-2">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Confirm Password -->
                <div class="mb-5">
                    <label for="password_confirmation" class="block text-sm font-semibold mb-2">Confirm Password</label>
                    <input id="password_confirmation" type="password" name="password_confirmation" required
                        class="w-full p-3 bg-gray-800 bg-opacity-80 text-white border border-gray-600 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-opacity-50 placeholder-gray-400"
                        placeholder="Re-enter your password">
                    @error('password_confirmation')
                        <p class="text-red-400 text-sm mt-2">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Submit Button -->
                <div class="flex items-center justify-between mt-6">
                    <a href="{{ route('login') }}" class="text-sm text-gray-300 hover:text-indigo-400 transition">Already registered?</a>
                    <button type="submit"
                        class="bg-indigo-600 hover:bg-indigo-700 transition px-6 py-3 rounded-lg text-white font-semibold shadow-lg focus:outline-none focus:ring-2 focus:ring-indigo-400 focus:ring-opacity-50">
                        Register
                    </button>
                </div>
            </form>

        </div>
    </div>

</body>
</html>
