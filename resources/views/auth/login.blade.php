@extends('layouts.master')

@section('content')
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login | Retrokits Nepal</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-black">
    <header class="h-screen w-full bg-cover relative bg-center" style="background-image: url('{{ asset('jersey.jpg') }}');">
        <main class="container mx-auto py-12">
            <!-- Overlay for darker background -->
            <div class="absolute inset-0 bg-black bg-opacity-70"></div>

            <!-- Centered Transparent Form -->
            <div class="relative flex items-center justify-center w-full h-full">
                <div class="bg-white bg-opacity-30 backdrop-blur-lg rounded-lg shadow-md p-6 w-full max-w-md text-gray-900">
                    <!-- Title -->
                    <h2 class="text-2xl font-extrabold text-center text-white mb-4">
                        <i class="ri-login-circle-line"></i> Login to <span class="text-red-600">Retrokits Nepal
                            <i class="ri-shopping-bag-2-fill text-black-600"></i></span>
                    </h2>

                    <!-- Login Form -->
                    <form method="POST" action="{{ route('login') }}" class="space-y-4">
                        @csrf
                        <!-- Email -->
                        <div>
                            <x-input-label for="email" :value="__('Email')" class="block text-sm font-semibold text-white" />
                            <x-text-input id="email" class="block w-full mt-1 p-3 rounded-lg border-none bg-white bg-opacity-20 text-white placeholder-gray-300 focus:ring-2 focus:ring-yellow-500" type="email" name="email" :value="old('email')" required autocomplete="username" />
                            @error('email')
                            <p class="text-red-700 text-sm">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Password -->
                        <div>
                            <x-input-label for="password" :value="__('Password')" class="block text-sm font-semibold text-white" />
                            <x-text-input id="password" class="block w-full mt-1 p-3 rounded-lg border-none bg-white bg-opacity-20 text-white placeholder-gray-300 focus:ring-2 focus:ring-yellow-500" type="password" name="password" required autocomplete="current-password" />
                            @error('password')
                            <p class="text-red-700 text-sm">{{ $message }}</p>
                            @enderror
                        </div>


                        <!-- Submit Button -->
                        <div class="flex justify-center">
                            <button type="submit"
                                class="block w-full bg-yellow-500 text-black text-lg font-semibold py-3 rounded-lg shadow-md hover:bg-yellow-300 transition">
                                <i class="ri-arrow-right-line"></i> Login
                            </button>
                        </div>
                    </form>

                    <!-- Links -->
                    <div class="mt-6 text-center text-sm">
                    <p class="text-white font-semibold">
                        New to RetroKits-Nepal?
                        <a href="{{ route('register') }}" class="text-gray-900 font-extrabold hover:underline">
                            Register Here <i class="ri-user-add-line"></i>
                        </a>
                    </p>
                    <p class="mt-2 text-white font-semibold">
                        <a href="{{ route('password.request') }}" class="text-gray-900 font-extrabold hover:underline">
                            Forgot Password? <i class="ri-question-line"></i>
                        </a>
                    </p>
                </div>
                </div>
            </div>
        </main>
    </header>
</body>

</html>
@endsection
