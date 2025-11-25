@extends('layouts.master')
@section('content')

<!-- Hero Section -->
<div class="relative bg-gradient-to-br from-gray-900 via-red-900 to-gray-900 overflow-hidden">
    <!-- Animated Background Pattern -->
    <div class="absolute inset-0 opacity-10">
        <div class="absolute inset-0" style="background-image: repeating-linear-gradient(45deg, transparent, transparent 35px, rgba(255,255,255,.1) 35px, rgba(255,255,255,.1) 70px);"></div>
    </div>

    <div class="container mx-auto px-4 py-20 relative z-10">
        <div class="text-center max-w-4xl mx-auto animate-fade-in-down">
            <span class="inline-block px-6 py-2 bg-red-600/80 backdrop-blur-sm text-white text-sm font-bold rounded-full mb-6 border border-white/20">
                GET IN TOUCH
            </span>
            <h1 class="text-5xl md:text-7xl lg:text-8xl font-black mb-6 text-white drop-shadow-2xl">
                Contact <span class="text-transparent bg-clip-text bg-gradient-to-r from-yellow-400 to-red-500">Us</span>
            </h1>
            <p class="text-xl md:text-2xl text-gray-300 mb-8 leading-relaxed">
                Whether you have questions about RetroKits or would like to support us, we would love to hear from you.
            </p>
            <div class="flex flex-wrap justify-center gap-4">
                <a href="#contact-form" class="inline-flex items-center gap-2 px-8 py-4 bg-gradient-to-r from-red-600 to-yellow-500 text-white font-bold rounded-full shadow-xl hover:shadow-2xl hover:scale-105 transition-all duration-300">
                    <i class="ri-message-3-line text-xl"></i>
                    <span>Send Message</span>
                </a>
            </div>
        </div>
    </div>
</div>

<!-- Contact Section -->
<section class="py-20 bg-gradient-to-b from-white to-gray-50">
    <div class="container mx-auto px-4">
        <div class="grid lg:grid-cols-2 gap-12 max-w-7xl mx-auto">

            <!-- Contact Information -->
            <div class="space-y-8 animate-fade-in-left">
                <div>
                    <h2 class="text-3xl md:text-4xl font-black text-gray-900 mb-4">
                        Let's Connect
                    </h2>
                    <p class="text-lg text-gray-600 leading-relaxed">
                        Have any questions? We'd love to hear from you. Drop us a message and we'll respond as soon as possible.
                    </p>
                </div>

                <!-- Contact Cards -->
                <div class="space-y-4">
                    <!-- Phone -->
                    <a href="tel:9765660867" class="group flex items-start gap-4 p-6 bg-white rounded-2xl shadow-md hover:shadow-xl transition-all duration-300 border-2 border-gray-100 hover:border-red-200">
                        <div class="flex-shrink-0 w-14 h-14 bg-gradient-to-br from-red-600 to-red-500 rounded-xl flex items-center justify-center shadow-lg group-hover:scale-110 transition-transform">
                            <i class="ri-phone-line text-white text-2xl"></i>
                        </div>
                        <div class="flex-1">
                            <h3 class="text-lg font-bold text-gray-900 mb-1">Phone</h3>
                            <p class="text-gray-600 group-hover:text-red-600 transition-colors">9765660867</p>
                        </div>
                        <i class="ri-arrow-right-line text-gray-400 group-hover:text-red-600 group-hover:translate-x-1 transition-all text-xl"></i>
                    </a>

                    <!-- Email -->
                    <a href="mailto:retronepal74@gmail.com" class="group flex items-start gap-4 p-6 bg-white rounded-2xl shadow-md hover:shadow-xl transition-all duration-300 border-2 border-gray-100 hover:border-red-200">
                        <div class="flex-shrink-0 w-14 h-14 bg-gradient-to-br from-yellow-500 to-yellow-400 rounded-xl flex items-center justify-center shadow-lg group-hover:scale-110 transition-transform">
                            <i class="ri-mail-line text-white text-2xl"></i>
                        </div>
                        <div class="flex-1">
                            <h3 class="text-lg font-bold text-gray-900 mb-1">Email</h3>
                            <p class="text-gray-600 group-hover:text-red-600 transition-colors break-all">retronepal74@gmail.com</p>
                        </div>
                        <i class="ri-arrow-right-line text-gray-400 group-hover:text-red-600 group-hover:translate-x-1 transition-all text-xl"></i>
                    </a>

                    <!-- Location -->
                    <div class="group flex items-start gap-4 p-6 bg-white rounded-2xl shadow-md hover:shadow-xl transition-all duration-300 border-2 border-gray-100 hover:border-red-200">
                        <div class="flex-shrink-0 w-14 h-14 bg-gradient-to-br from-green-600 to-green-500 rounded-xl flex items-center justify-center shadow-lg group-hover:scale-110 transition-transform">
                            <i class="ri-map-pin-line text-white text-2xl"></i>
                        </div>
                        <div class="flex-1">
                            <h3 class="text-lg font-bold text-gray-900 mb-1">Location</h3>
                            <p class="text-gray-600">Kawasoti-9, Nawalpur<br>Nepal</p>
                        </div>
                    </div>
                </div>

                <!-- Social Media -->
                <div class="bg-gradient-to-br from-red-50 to-yellow-50 p-8 rounded-2xl border-2 border-red-100">
                    <h3 class="text-xl font-bold text-gray-900 mb-4">Follow Us</h3>
                    <p class="text-gray-600 mb-6">Stay connected with us on social media</p>
                    <div class="flex gap-3">
                        <a href="https://www.facebook.com/search/top?q=retro%20kits%20nepal" target="_blank" class="w-12 h-12 bg-white hover:bg-blue-600 text-blue-600 hover:text-white rounded-xl flex items-center justify-center shadow-md hover:shadow-lg transition-all duration-300 hover:scale-110">
                            <i class="ri-facebook-fill text-xl"></i>
                        </a>
                        <a href="https://www.instagram.com/retrokitsnp/" target="_blank" class="w-12 h-12 bg-white hover:bg-pink-600 text-pink-600 hover:text-white rounded-xl flex items-center justify-center shadow-md hover:shadow-lg transition-all duration-300 hover:scale-110">
                            <i class="ri-instagram-fill text-xl"></i>
                        </a>
                        <a href="https://www.twitter.com/RetroKitsNepal" target="_blank" class="w-12 h-12 bg-white hover:bg-blue-400 text-blue-400 hover:text-white rounded-xl flex items-center justify-center shadow-md hover:shadow-lg transition-all duration-300 hover:scale-110">
                            <i class="ri-twitter-fill text-xl"></i>
                        </a>
                    </div>
                </div>
            </div>

            <!-- Contact Form -->
            <div id="contact-form" class="animate-fade-in-right">
                <div class="bg-white rounded-3xl shadow-2xl p-8 md:p-10 border-2 border-gray-100">
                    <div class="mb-8">
                        <h3 class="text-2xl md:text-3xl font-black text-gray-900 mb-2">Send us a Message</h3>
                        <p class="text-gray-600">Fill out the form below and we'll get back to you shortly</p>
                    </div>

                    <form action="#" method="POST" class="space-y-6">
                        @csrf

                        <!-- Name -->
                        <div>
                            <label for="name" class="block text-sm font-bold text-gray-900 mb-2">
                                Full Name <span class="text-red-600">*</span>
                            </label>
                            <input type="text"
                                   id="name"
                                   name="name"
                                   required
                                   class="w-full px-5 py-3 border-2 border-gray-200 rounded-xl focus:outline-none focus:border-red-600 transition-colors bg-gray-50 focus:bg-white"
                                   placeholder="John Doe">
                        </div>

                        <!-- Email -->
                        <div>
                            <label for="email" class="block text-sm font-bold text-gray-900 mb-2">
                                Email Address <span class="text-red-600">*</span>
                            </label>
                            <input type="email"
                                   id="email"
                                   name="email"
                                   required
                                   class="w-full px-5 py-3 border-2 border-gray-200 rounded-xl focus:outline-none focus:border-red-600 transition-colors bg-gray-50 focus:bg-white"
                                   placeholder="john@example.com">
                        </div>

                        <!-- Phone -->
                        <div>
                            <label for="phone" class="block text-sm font-bold text-gray-900 mb-2">
                                Phone Number
                            </label>
                            <input type="tel"
                                   id="phone"
                                   name="phone"
                                   class="w-full px-5 py-3 border-2 border-gray-200 rounded-xl focus:outline-none focus:border-red-600 transition-colors bg-gray-50 focus:bg-white"
                                   placeholder="+977 9800000000">
                        </div>

                        <!-- Subject -->
                        <div>
                            <label for="subject" class="block text-sm font-bold text-gray-900 mb-2">
                                Subject <span class="text-red-600">*</span>
                            </label>
                            <select id="subject"
                                    name="subject"
                                    required
                                    class="w-full px-5 py-3 border-2 border-gray-200 rounded-xl focus:outline-none focus:border-red-600 transition-colors bg-gray-50 focus:bg-white cursor-pointer">
                                <option value="">Select a subject</option>
                                <option value="general">General Inquiry</option>
                                <option value="product">Product Question</option>
                                <option value="order">Order Support</option>
                                <option value="feedback">Feedback</option>
                                <option value="other">Other</option>
                            </select>
                        </div>

                        <!-- Message -->
                        <div>
                            <label for="message" class="block text-sm font-bold text-gray-900 mb-2">
                                Message <span class="text-red-600">*</span>
                            </label>
                            <textarea id="message"
                                      name="message"
                                      required
                                      rows="5"
                                      class="w-full px-5 py-3 border-2 border-gray-200 rounded-xl focus:outline-none focus:border-red-600 transition-colors bg-gray-50 focus:bg-white resize-none"
                                      placeholder="Tell us what's on your mind..."></textarea>
                        </div>

                        <!-- Submit Button -->
                        <button type="submit" class="w-full bg-gradient-to-r from-red-600 to-yellow-500 text-white font-bold py-4 px-6 rounded-xl shadow-lg hover:shadow-xl transform hover:scale-105 transition-all duration-300 flex items-center justify-center gap-2 group">
                            <span>Send Message</span>
                            <i class="ri-send-plane-fill text-xl group-hover:translate-x-1 transition-transform"></i>
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Mission Statement Section -->
<section class="py-20 bg-gradient-to-r from-red-600 via-red-500 to-yellow-500 relative overflow-hidden">
    <!-- Background Pattern -->
    <div class="absolute inset-0 opacity-10">
        <div class="absolute inset-0" style="background-image: repeating-linear-gradient(45deg, transparent, transparent 35px, rgba(255,255,255,.2) 35px, rgba(255,255,255,.2) 70px);"></div>
    </div>

    <div class="container mx-auto px-4 relative z-10">
        <div class="max-w-5xl mx-auto text-center text-white">
            <div class="mb-8 animate-bounce">
                <img src="{{ asset('logo.png') }}" alt="RetroKits Nepal" class="mx-auto h-24 w-auto drop-shadow-2xl">
            </div>
            <div class="text-3xl md:text-5xl lg:text-6xl font-black leading-tight">
                <span class="block mb-2">WE <span class="text-yellow-300">BELIEVE</span> THAT</span>
                <span class="block mb-2">SPORTS CAN BE THE MOST</span>
                <span class="block"><span class="text-yellow-300">POSITIVE FORCE</span> ON EARTH</span>
            </div>
        </div>
    </div>
</section>

<!-- Map Section (Optional) -->
<section class="py-20 bg-gray-50">
    <div class="container mx-auto px-4">
        <div class="max-w-6xl mx-auto">
            <div class="text-center mb-12">
                <h2 class="text-3xl md:text-4xl font-black text-gray-900 mb-4">Find Us</h2>
                <p class="text-lg text-gray-600">Visit our store in Kawasoti, Nawalpur</p>
            </div>
            <div class="bg-white rounded-3xl shadow-2xl overflow-hidden border-2 border-gray-100">
                <div class="aspect-video bg-gradient-to-br from-red-100 to-yellow-100 flex items-center justify-center">
                    <div class="text-center p-8">
                        <i class="ri-map-pin-line text-6xl text-red-600 mb-4"></i>
                        <h3 class="text-2xl font-bold text-gray-900 mb-2">Kawasoti-9, Nawalpur</h3>
                        <p class="text-gray-600 mb-6">Visit us at our physical location</p>
                        <a href="https://maps.google.com" target="_blank" class="inline-flex items-center gap-2 px-6 py-3 bg-gradient-to-r from-red-600 to-yellow-500 text-white font-bold rounded-full hover:shadow-xl transform hover:scale-105 transition-all">
                            <i class="ri-navigation-line"></i>
                            <span>Get Directions</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Animations -->
<style>
    @keyframes fadeInDown {
        from {
            opacity: 0;
            transform: translateY(-30px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    @keyframes fadeInLeft {
        from {
            opacity: 0;
            transform: translateX(-30px);
        }
        to {
            opacity: 1;
            transform: translateX(0);
        }
    }

    @keyframes fadeInRight {
        from {
            opacity: 0;
            transform: translateX(30px);
        }
        to {
            opacity: 1;
            transform: translateX(0);
        }
    }

    .animate-fade-in-down {
        animation: fadeInDown 0.8s ease-out;
    }

    .animate-fade-in-left {
        animation: fadeInLeft 0.8s ease-out;
    }

    .animate-fade-in-right {
        animation: fadeInRight 0.8s ease-out;
    }

    /* Smooth scroll */
    html {
        scroll-behavior: smooth;
    }
</style>

@endsection
