@extends('layouts.master') <!-- Replace with your master layout -->

@section('content')
<div class="max-w-4xl mx-auto bg-white p-6 rounded-lg shadow-md mt-8">
    <h1 class="text-2xl font-bold mb-6">Edit Profile</h1>

    @if (session('success'))
    <div class="bg-green-100 text-green-800 p-4 mb-6 rounded">
        {{ session('success') }}
    </div>
    @endif

    <form action="{{ route('userprofile.update') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <!-- Name -->
        <div class="mb-4">
            <label for="name" class="block text-gray-700 font-bold mb-2">Name</label>
            <input type="text" name="name" id="name" value="{{ old('name', $user->name) }}"
                class="w-full border-gray-300 rounded-lg shadow-sm focus:ring focus:ring-blue-200 focus:ring-opacity-50">
            @error('name')
            <span class="text-red-600 text-sm">{{ $message }}</span>
            @enderror
        </div>

        <!-- Email -->
        <div class="mb-4">
            <label for="email" class="block text-gray-700 font-bold mb-2">Email</label>
            <input type="email" name="email" id="email" value="{{ old('email', $user->email) }}"
                class="w-full border-gray-300 rounded-lg shadow-sm focus:ring focus:ring-blue-200 focus:ring-opacity-50">
            @error('email')
            <span class="text-red-600 text-sm">{{ $message }}</span>
            @enderror
        </div>

        <!-- Phone -->
        <div class="mb-4">
            <label for="phone" class="block text-gray-700 font-bold mb-2">Phone</label>
            <input type="text" name="phone" id="phone" value="{{ old('phone', $user->phone) }}"
                class="w-full border-gray-300 rounded-lg shadow-sm focus:ring focus:ring-blue-200 focus:ring-opacity-50">
            @error('phone')
            <span class="text-red-600 text-sm">{{ $message }}</span>
            @enderror
        </div>

        <!-- Address -->
        <div class="mb-4">
            <label for="address" class="block text-gray-700 font-bold mb-2">Address</label>
            <textarea name="address" id="address" rows="3"
                class="w-full border-gray-300 rounded-lg shadow-sm focus:ring focus:ring-blue-200 focus:ring-opacity-50">{{ old('address', $user->address) }}</textarea>
            @error('address')
            <span class="text-red-600 text-sm">{{ $message }}</span>
            @enderror
        </div>


        <!-- Submit Button -->
        <div class="mt-6">
            <button type="submit"
                class="bg-blue-500 text-white px-4 py-2 rounded-lg shadow hover:bg-blue-600 focus:ring focus:ring-blue-200 focus:ring-opacity-50">
                Update Profile
            </button>
        </div>
    </form>
</div>
@endsection
