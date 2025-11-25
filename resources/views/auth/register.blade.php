@extends('layouts.master')

@section('content')
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register | Retrokits Nepal</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
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
        <!-- Gradient Overlay -->
        <div class="absolute inset-0 bg-gradient-to-br from-black/80 via-purple-900/50 to-black/80"></div>

        <!-- Decorative Elements -->
        <div class="absolute top-20 left-10 w-72 h-72 bg-yellow-500/10 rounded-full blur-3xl"></div>
        <div class="absolute bottom-20 right-10 w-96 h-96 bg-red-500/10 rounded-full blur-3xl"></div>

        <main class="container mx-auto px-4 py-12 relative z-10">
            <div class="flex items-center justify-center min-h-screen">
                <!-- Modern Register Card -->
                <div class="w-full max-w-5xl">
                    <div class="glass-effect gradient-border rounded-2xl shadow-2xl p-8 space-y-6">

                        <!-- Logo/Brand Section -->
                        <div class="text-center space-y-2">
                            <div class="inline-block p-3 bg-gradient-to-br from-yellow-400 to-red-500 rounded-2xl shadow-lg mb-4">
                                <i class="ri-user-add-line text-4xl text-white"></i>
                            </div>
                            <h1 class="text-3xl font-black text-transparent bg-clip-text bg-gradient-to-r from-yellow-400 via-red-500 to-purple-500">
                                Create Your Account
                            </h1>
                            <p class="text-gray-300 text-sm font-medium">
                                Join <span class="text-red-400 font-bold">Retrokits Nepal</span>
                                <i class="ri-shopping-bag-2-fill text-yellow-400"></i>
                            </p>
                        </div>

                        <!-- Registration Form -->
                        <form method="POST" action="{{ route('register') }}" class="space-y-6">
                            @csrf

                            <!-- Two Column Grid -->
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <!-- Left Column -->
                                <div class="space-y-5">
                                    <!-- Name Field -->
                                    <div class="space-y-2">
                                        <label for="name" class="flex items-center text-sm font-semibold text-gray-200">
                                            <i class="ri-user-line mr-2 text-yellow-400"></i>
                                            Full Name
                                        </label>
                                        <div class="relative group">
                                            <input id="name"
                                                type="text"
                                                name="name"
                                                value="{{ old('name') }}"
                                                required
                                                autofocus
                                                autocomplete="name"
                                                placeholder="Enter your full name"
                                                class="input-focus w-full px-4 py-3.5 rounded-xl bg-white/10 border border-white/20 text-white placeholder-gray-400 focus:outline-none focus:border-yellow-400 transition-all duration-300 group-hover:bg-white/15" />
                                        </div>
                                        @error('name')
                                        <p class="flex items-center text-red-400 text-xs mt-1">
                                            <i class="ri-error-warning-line mr-1"></i>
                                            {{ $message }}
                                        </p>
                                        @enderror
                                    </div>

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
                                        </div>
                                        @error('email')
                                        <p class="flex items-center text-red-400 text-xs mt-1">
                                            <i class="ri-error-warning-line mr-1"></i>
                                            {{ $message }}
                                        </p>
                                        @enderror
                                    </div>

                                    <!-- Phone Field -->
                                    <div class="space-y-2">
                                        <label for="phone" class="flex items-center text-sm font-semibold text-gray-200">
                                            <i class="ri-phone-line mr-2 text-yellow-400"></i>
                                            Phone Number
                                        </label>
                                        <div class="relative group">
                                            <input id="phone"
                                                type="tel"
                                                name="phone"
                                                value="{{ old('phone') }}"
                                                required
                                                autocomplete="tel"
                                                placeholder="Enter your phone number"
                                                class="input-focus w-full px-4 py-3.5 rounded-xl bg-white/10 border border-white/20 text-white placeholder-gray-400 focus:outline-none focus:border-yellow-400 transition-all duration-300 group-hover:bg-white/15" />
                                        </div>
                                        @error('phone')
                                        <p class="flex items-center text-red-400 text-xs mt-1">
                                            <i class="ri-error-warning-line mr-1"></i>
                                            {{ $message }}
                                        </p>
                                        @enderror
                                    </div>
                                </div>

                                <!-- Right Column -->
                                <div class="space-y-5">
                                    <!-- Address Field -->
                                    <div class="space-y-2">
                                        <label for="address" class="flex items-center text-sm font-semibold text-gray-200">
                                            <i class="ri-map-pin-line mr-2 text-yellow-400"></i>
                                            Address
                                        </label>
                                        <div class="relative group">
                                            <input id="address"
                                                type="text"
                                                name="address"
                                                value="{{ old('address') }}"
                                                placeholder="Enter your address"
                                                class="input-focus w-full px-4 py-3.5 rounded-xl bg-white/10 border border-white/20 text-white placeholder-gray-400 focus:outline-none focus:border-yellow-400 transition-all duration-300 group-hover:bg-white/15" />
                                        </div>
                                        @error('address')
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
                                                autocomplete="new-password"
                                                placeholder="Create a password"
                                                class="input-focus w-full px-4 py-3.5 rounded-xl bg-white/10 border border-white/20 text-white placeholder-gray-400 focus:outline-none focus:border-yellow-400 transition-all duration-300 group-hover:bg-white/15" />
                                        </div>
                                        @error('password')
                                        <p class="flex items-center text-red-400 text-xs mt-1">
                                            <i class="ri-error-warning-line mr-1"></i>
                                            {{ $message }}
                                        </p>
                                        @enderror
                                    </div>

                                    <!-- Confirm Password Field -->
                                    <div class="space-y-2">
                                        <label for="password_confirmation" class="flex items-center text-sm font-semibold text-gray-200">
                                            <i class="ri-lock-unlock-line mr-2 text-yellow-400"></i>
                                            Confirm Password
                                        </label>
                                        <div class="relative group">
                                            <input id="password_confirmation"
                                                type="password"
                                                name="password_confirmation"
                                                required
                                                autocomplete="new-password"
                                                placeholder="Confirm your password"
                                                class="input-focus w-full px-4 py-3.5 rounded-xl bg-white/10 border border-white/20 text-white placeholder-gray-400 focus:outline-none focus:border-yellow-400 transition-all duration-300 group-hover:bg-white/15" />
                                        </div>
                                        @error('password_confirmation')
                                        <p class="flex items-center text-red-400 text-xs mt-1">
                                            <i class="ri-error-warning-line mr-1"></i>
                                            {{ $message }}
                                        </p>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <!-- Submit Button -->
                            <div class="flex justify-center">
                                <button type="submit"
                                    class="mx-auto w-auto inline-flex items-center justify-center px-5 py-2 text-sm bg-gradient-to-r from-yellow-400 via-yellow-500 to-red-500 hover:from-yellow-500 hover:via-red-500 hover:to-purple-500 text-white font-semibold rounded-xl shadow-lg hover:shadow-2xl hover:scale-[1.02] active:scale-[0.98] transition-all duration-300 space-x-2 group">
                                    <span>Create Account</span>
                                    <i class="ri-arrow-right-line group-hover:translate-x-1 transition-transform"></i>
                                </button>
                            </div>
                        </form>

                        <!-- Sign In Link -->
                        <div class="text-center pt-4 border-t border-gray-700">
                            <p class="text-gray-300 text-sm">
                                Already have an account?
                                <a href="{{ route('login') }}" class="text-yellow-400 hover:text-yellow-300 font-bold hover:underline transition-colors inline-flex items-center ml-1 group">
                                    Sign In
                                    <i class="ri-login-circle-line ml-1 group-hover:translate-x-1 transition-transform"></i>
                                </a>
                            </p>
                        </div>
                    </div>

                    <!-- Additional Info -->
                    <p class="text-center text-gray-400 text-xs mt-6">
                        <i class="ri-shield-check-line text-green-400"></i>
                        Your information is safe and secure with us
                    </p>
                </div>
            </div>
        </main>
    </div>

    <!-- Modern Notification System -->
    <div class="fixed top-6 right-6 z-50 space-y-3 max-w-md">
        @if(session('success'))
            <div class="glass-effect rounded-xl border border-green-500/30 p-4 shadow-2xl">
                <div class="flex items-start space-x-3">
                    <div class="flex-shrink-0">
                        <div class="w-10 h-10 rounded-full bg-green-500/20 flex items-center justify-center">
                            <i class="ri-check-line text-green-400 text-xl"></i>
                        </div>
                    </div>
                    <div class="flex-1">
                        <h3 class="text-sm font-semibold text-white">Success!</h3>
                        <p class="text-sm text-gray-300 mt-1">{{ session('success') }}</p>
                    </div>
                    <button onclick="this.parentElement.parentElement.remove()" class="text-gray-400 hover:text-white transition">
                        <i class="ri-close-line"></i>
                    </button>
                </div>
            </div>
        @endif

        @foreach($errors->all() as $error)
            <div class="glass-effect rounded-xl border border-red-500/30 p-4 shadow-2xl">
                <div class="flex items-start space-x-3">
                    <div class="flex-shrink-0">
                        <div class="w-10 h-10 rounded-full bg-red-500/20 flex items-center justify-center">
                            <i class="ri-error-warning-line text-red-400 text-xl"></i>
                        </div>
                    </div>
                    <div class="flex-1">
                        <h3 class="text-sm font-semibold text-white">Error!</h3>
                        <p class="text-sm text-gray-300 mt-1">{{ $error }}</p>
                    </div>
                    <button onclick="this.parentElement.parentElement.remove()" class="text-gray-400 hover:text-white transition">
                        <i class="ri-close-line"></i>
                    </button>
                </div>
            </div>
        @endforeach
    </div>

    <script>
        // Auto-hide notifications after 5 seconds with smooth fade out
        setTimeout(() => {
            const notifications = document.querySelectorAll('.fixed > div > div');
            notifications.forEach((notif) => {
                notif.style.transition = 'all 0.5s ease-out';
                notif.style.opacity = '0';
                notif.style.transform = 'translateX(100%)';
                setTimeout(() => notif.remove(), 500);
            });
        }, 5000);
    </script>
</body>

</html>
@endsection
