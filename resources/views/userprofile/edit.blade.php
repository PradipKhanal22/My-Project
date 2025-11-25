@extends('layouts.master')

@section('content')
<div class="min-h-screen bg-gray-50 py-12">
    <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8">

        <!-- Header -->
        <div class="mb-8">
            <h1 class="text-3xl font-bold text-gray-900 flex items-center gap-3">
                <i class="ri-user-settings-line text-red-600"></i>
                Edit Profile
            </h1>
            <p class="text-gray-600 mt-2">Update your personal information</p>
        </div>

        <!-- Success Message -->
        @if (session('success'))
        <div class="bg-green-50 border-l-4 border-green-500 text-green-800 p-4 mb-6 rounded-lg flex items-start gap-3">
            <i class="ri-checkbox-circle-line text-2xl text-green-500 flex-shrink-0"></i>
            <div>
                <p class="font-semibold">Success!</p>
                <p class="text-sm">{{ session('success') }}</p>
            </div>
        </div>
        @endif

        <!-- Profile Form -->
        <div class="bg-white rounded-2xl shadow-lg border border-gray-100 overflow-hidden">
            <form action="{{ route('userprofile.update') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="p-8 space-y-6">
                    <!-- Name Field -->
                    <div>
                        <label for="name" class="text-sm font-semibold text-gray-700 mb-2 flex items-center gap-2">
                            <i class="ri-user-line text-red-600"></i>
                            Full Name
                        </label>
                        <input type="text"
                               name="name"
                               id="name"
                               value="{{ old('name', $user->name) }}"
                               class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-red-500 focus:border-red-500 transition-all">
                        @error('name')
                        <p class="mt-1 text-sm text-red-600 flex items-center gap-1">
                            <i class="ri-error-warning-line"></i>
                            {{ $message }}
                        </p>
                        @enderror
                    </div>

                    <!-- Email Field -->
                    <div>
                        <label for="email" class="text-sm font-semibold text-gray-700 mb-2 flex items-center gap-2">
                            <i class="ri-mail-line text-red-600"></i>
                            Email Address
                        </label>
                        <input type="email"
                               name="email"
                               id="email"
                               value="{{ old('email', $user->email) }}"
                               class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-red-500 focus:border-red-500 transition-all">
                        @error('email')
                        <p class="mt-1 text-sm text-red-600 flex items-center gap-1">
                            <i class="ri-error-warning-line"></i>
                            {{ $message }}
                        </p>
                        @enderror
                    </div>

                    <!-- Phone Field -->
                    <div>
                        <label for="phone" class="text-sm font-semibold text-gray-700 mb-2 flex items-center gap-2">
                            <i class="ri-phone-line text-red-600"></i>
                            Phone Number
                        </label>
                        <input type="text"
                               name="phone"
                               id="phone"
                               value="{{ old('phone', $user->phone) }}"
                               class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-red-500 focus:border-red-500 transition-all">
                        @error('phone')
                        <p class="mt-1 text-sm text-red-600 flex items-center gap-1">
                            <i class="ri-error-warning-line"></i>
                            {{ $message }}
                        </p>
                        @enderror
                    </div>

                    <!-- Address Field -->
                    <div>
                        <label for="address" class="text-sm font-semibold text-gray-700 mb-2 flex items-center gap-2">
                            <i class="ri-map-pin-line text-red-600"></i>
                            Address
                        </label>
                        <textarea name="address"
                                  id="address"
                                  rows="3"
                                  class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-red-500 focus:border-red-500 transition-all resize-none">{{ old('address', $user->address) }}</textarea>
                        @error('address')
                        <p class="mt-1 text-sm text-red-600 flex items-center gap-1">
                            <i class="ri-error-warning-line"></i>
                            {{ $message }}
                        </p>
                        @enderror
                    </div>
                </div>

                <!-- Form Footer -->
                <div class="bg-gray-50 px-8 py-6 border-t border-gray-100 flex items-center justify-between">
                    <a href="{{ route('home') }}"
                       class="text-gray-600 hover:text-gray-900 font-medium flex items-center gap-2 transition-colors">
                        <i class="ri-arrow-left-line"></i>
                        Back to Home
                    </a>
                    <button type="submit"
                            class="bg-gradient-to-r from-red-600 to-red-500 hover:from-red-700 hover:to-red-600 text-white font-semibold px-8 py-3 rounded-xl shadow-lg hover:shadow-xl transition-all flex items-center gap-2 group">
                        <i class="ri-save-line group-hover:scale-110 transition-transform"></i>
                        Update Profile
                    </button>
                </div>
            </form>
        </div>

        <!-- Account Info -->
        <div class="mt-6 text-center text-sm text-gray-500">
            <i class="ri-information-line"></i>
            Your information is securely stored and will never be shared
        </div>
    </div>
</div>
@endsection
