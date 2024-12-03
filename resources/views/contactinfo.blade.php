@extends('layouts.master')
@section('content')
    <div class="min-h-screen flex items-center justify-center bg-gradient-to-r from-blue-500 to-purple-600 p-6">
        <div class="bg-white rounded-lg shadow-xl w-full max-w-lg p-8">
            <h2 class="text-3xl font-extrabold text-gray-900 text-center mb-6">
                <span class="block text-transparent bg-clip-text bg-gradient-to-r from-blue-500 to-purple-600">
                    Get In Touch With RetroKits
                </span>
            </h2>
            <p class="text-gray-600 text-center mb-8">
                We’d love to hear from you! Please fill out the form below, and we’ll get back to you shortly.
            </p>
            <form action="/contact" method="POST" class="">
                <!-- Name -->
                <div class="mb-5">
                    <label for="name" class="block text-sm font-medium text-black mb-1">Full Name</label>
                    <input type="text" id="name" name="name"
                        class="w-full px-4 py-3 rounded-lg shadow-sm border border-gray-300 focus:ring-2 focus:ring-purple-500 focus:outline-none transition"
                        placeholder="Your Name" required />
                </div>

                <!-- Email -->
                <div class="mb-5">
                    <label for="email" class="block text-sm font-medium text-black mb-1">Email Address</label>
                    <input type="email" id="email" name="email"
                        class="w-full px-4 py-3 rounded-lg shadow-sm border border-gray-300 focus:ring-2 focus:ring-purple-500 focus:outline-none transition"
                        placeholder="Your Email" required />
                </div>

                <!-- Subject -->
                <div class="mb-5">
                    <label for="subject" class="block text-sm font-medium text-black mb-1">Subject</label>
                    <input type="text" id="subject" name="subject"
                        class="w-full px-4 py-3 rounded-lg shadow-sm border border-gray-300 focus:ring-2 focus:ring-purple-500 focus:outline-none transition"
                        placeholder="Subject" />
                </div>

                <!-- Message -->
                <div class="mb-5">
                    <label for="message" class="block text-sm font-medium black mb-1">Message</label>
                    <textarea id="message" name="message" rows="4"
                        class="w-full px-4 py-3 rounded-lg shadow-sm border border-gray-300 focus:ring-2 focus:ring-purple-500 focus:outline-none transition"
                        placeholder="Write your message here..." required></textarea>
                </div>

                <!-- Submit Button -->
                <div class="text-center">
                    <button type="submit"
                        class="bg-gradient-to-r from-blue-500 to-purple-600 text-white font-bold py-3 px-6 rounded-lg shadow-lg hover:opacity-90 focus:ring-4 focus:ring-purple-300 transition">
                        Send Message
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
