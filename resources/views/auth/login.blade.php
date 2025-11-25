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
    <style>
        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes slideInLeft {
            from {
                opacity: 0;
                transform: translateX(-50px);
            }
            to {
                opacity: 1;
                transform: translateX(0);
            }
        }

        @keyframes pulse {
            0%, 100% {
                opacity: 1;
            }
            50% {
                opacity: 0.8;
            }
        }

        .animate-fadeInUp {
            animation: fadeInUp 0.8s ease-out forwards;
        }

        .animate-slideInLeft {
            animation: slideInLeft 0.8s ease-out forwards;
        }

        .animate-pulse-slow {
            animation: pulse 3s ease-in-out infinite;
        }

        .gradient-border {
            position: relative;
            background: linear-gradient(145deg, rgba(255, 255, 255, 0.1), rgba(255, 255, 255, 0.05));
            border: 2px solid rgba(251, 191, 36, 0.3);
        }

        .input-focus:focus {
            box-shadow: 0 0 0 3px rgba(251, 191, 36, 0.3);
        }

        .glass-effect {
            background: rgba(255, 255, 255, 0.08);
            backdrop-filter: blur(20px);
            -webkit-backdrop-filter: blur(20px);
            border: 1px solid rgba(255, 255, 255, 0.18);
        }

        .bg-parallax {
            background-attachment: fixed;
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
        }
    </style>
</head>

<body class="bg-gradient-to-br from-gray-900 via-black to-gray-900">
    <div class="min-h-screen w-full bg-parallax relative" style="background-image: url('{{ asset('jersey.jpg') }}');">
        <!-- Animated Gradient Overlay -->
        <div class="absolute inset-0 bg-gradient-to-br from-black/80 via-purple-900/50 to-black/80 animate-pulse-slow"></div>

        <!-- Decorative Elements -->
        <div class="absolute top-20 left-10 w-72 h-72 bg-yellow-500/10 rounded-full blur-3xl animate-pulse"></div>
        <div class="absolute bottom-20 right-10 w-96 h-96 bg-red-500/10 rounded-full blur-3xl animate-pulse"></div>

        <main class="container mx-auto px-4 py-12 relative z-10">
            <div class="flex items-center justify-center min-h-screen">
                <!-- Modern Login Card -->
                <div class="w-full max-w-md animate-fadeInUp">
                    <div class="glass-effect gradient-border rounded-2xl shadow-2xl p-8 space-y-6">

                        <!-- Logo/Brand Section -->
                        <div class="text-center space-y-2 animate-slideInLeft">
                            <div class="inline-block p-3 bg-gradient-to-br from-yellow-400 to-red-500 rounded-2xl shadow-lg mb-4">
                                <i class="ri-shield-keyhole-line text-4xl text-white"></i>
                            </div>
                            <h1 class="text-3xl font-black text-transparent bg-clip-text bg-gradient-to-r from-yellow-400 via-red-500 to-purple-500">
                                Welcome Back
                            </h1>
                            <p class="text-gray-300 text-sm font-medium">
                                Login to <span class="text-red-400 font-bold">Retrokits Nepal</span>
                                <i class="ri-shopping-bag-2-fill text-yellow-400"></i>
                            </p>
                        </div>

                        <!-- Login Form -->
                        <form method="POST" action="{{ route('login') }}" class="space-y-5">
                            @csrf

                            <!-- Email Field -->
                            <div class="space-y-2">
                                <label for="email" class="flex items-center text-sm font-semibold text-gray-200">
                                    <i class="ri-mail-line mr-2 text-yellow-400"></i>
                                    Email Address
                                </label>
                                <div class="relative group">
                                    <input id="email"
                                        type="email"
                                        name="email"
                                        value="{{ old('email') }}"
                                        required
                                        autocomplete="username"
                                        placeholder="Enter your email"
                                        class="input-focus w-full px-4 py-3.5 rounded-xl bg-white/10 border border-white/20 text-white placeholder-gray-400 focus:outline-none focus:border-yellow-400 transition-all duration-300 group-hover:bg-white/15" />
                                    <div class="absolute inset-y-0 right-4 flex items-center pointer-events-none">
                                        <i class="ri-check-line text-green-400 opacity-0 group-focus-within:opacity-100 transition-opacity"></i>
                                    </div>
                                </div>
                                @error('email')
                                <p class="flex items-center text-red-400 text-xs mt-1">
                                    <i class="ri-error-warning-line mr-1"></i>
                                    {{ $message }}
                                </p>
                                @enderror
                            </div>

                            <!-- Password Field -->
                            <div class="space-y-2">
                                <label for="password" class="flex items-center text-sm font-semibold text-gray-200">
                                    <i class="ri-lock-password-line mr-2 text-yellow-400"></i>
                                    Password
                                </label>
                                <div class="relative group">
                                    <input id="password"
                                        type="password"
                                        name="password"
                                        required
                                        autocomplete="current-password"
                                        placeholder="Enter your password"
                                        class="input-focus w-full px-4 py-3.5 rounded-xl bg-white/10 border border-white/20 text-white placeholder-gray-400 focus:outline-none focus:border-yellow-400 transition-all duration-300 group-hover:bg-white/15" />
                                </div>
                                @error('password')
                                <p class="flex items-center text-red-400 text-xs mt-1">
                                    <i class="ri-error-warning-line mr-1"></i>
                                    {{ $message }}
                                </p>
                                @enderror
                            </div>

                            <!-- Remember Me & Forgot Password -->
                            <div class="flex items-center justify-between text-sm">
                                <label class="flex items-center text-gray-300 cursor-pointer group">
                                    <input type="checkbox" name="remember" class="mr-2 rounded border-gray-600 text-yellow-500 focus:ring-yellow-500 focus:ring-offset-0 bg-white/10">
                                    <span class="group-hover:text-yellow-400 transition">Remember me</span>
                                </label>
                                <a href="{{ route('password.request') }}" class="text-gray-300 hover:text-yellow-400 transition-colors duration-200 font-medium">
                                    Forgot password?
                                </a>
                            </div>

                            <!-- Submit Button -->
                            <button type="submit"
                                class="w-full bg-gradient-to-r from-yellow-400 via-yellow-500 to-red-500 hover:from-yellow-500 hover:via-red-500 hover:to-purple-500 text-white font-bold py-4 rounded-xl shadow-lg hover:shadow-2xl hover:scale-[1.02] active:scale-[0.98] transition-all duration-300 flex items-center justify-center space-x-2 group">
                                <span>Sign In</span>
                                <i class="ri-arrow-right-line group-hover:translate-x-1 transition-transform"></i>
                            </button>
                        </form>

                        <!-- Sign Up Link -->
                        <div class="text-center pt-4 border-t border-gray-700">
                            <p class="text-gray-300 text-sm">
                                Don't have an account?
                                <a href="{{ route('register') }}" class="text-yellow-400 hover:text-yellow-300 font-bold hover:underline transition-colors inline-flex items-center ml-1 group">
                                    Create Account
                                    <i class="ri-user-add-line ml-1 group-hover:translate-x-1 transition-transform"></i>
                                </a>
                            </p>
                        </div>
                    </div>

                    <!-- Additional Info -->
                    <p class="text-center text-gray-400 text-xs mt-6">
                        <i class="ri-shield-check-line text-green-400"></i>
                        Secure login powered by Retrokits Nepal
                    </p>
                </div>
            </div>
        </main>
    </div>
</body>

</html>
@endsection
