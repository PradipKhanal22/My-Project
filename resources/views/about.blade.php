@extends('layouts.master')

@section('content')
<!-- Header Section -->
<header class="relative h-screen bg-cover bg-center overflow-hidden">
    <img src="{{ asset('image.png') }}" alt="Header Image" class="absolute inset-0 w-full h-full object-cover z-0 transform scale-110 hover:scale-100 transition-transform duration-1000 ease-in-out">
    <div class="absolute inset-0 bg-gradient-to-r from-black/50 to-black/30"></div>
    <div class="relative container mx-auto h-full flex flex-col justify-center items-center text-center text-white px-4">
        <h1 class="text-5xl md:text-7xl font-extrabold text-yellow-400 drop-shadow-2xl mb-6 animate-fade-in-down">
            About Us
        </h1>
        <p class="text-xl md:text-2xl mt-4 font-semibold text-gray-100 max-w-2xl animate-fade-in-up">
            Explore our vision at RetroKits Nepal
        </p>
        <a href="#mission" class="mt-8 px-10 py-4 bg-yellow-500 hover:bg-yellow-400 text-black font-bold rounded-full transition-all duration-300 shadow-lg hover:shadow-xl transform hover:scale-105 animate-bounce">
            LEARN MORE
        </a>
    </div>
</header>

<!-- Main Content -->
<div class="container mx-auto py-16 px-4 sm:px-6">

    <!-- About RetroKits Section -->
    <section id="about-retroKits" class="text-center mb-20 animate-fade-in">
        <div class="max-w-4xl mx-auto">
            <h2 class="text-4xl md:text-5xl font-bold mb-8 text-indigo-700 relative inline-block">
                About RetroKits Nepal
                <span class="absolute bottom-0 left-0 w-full h-1 bg-yellow-400 transform scale-x-0 origin-left group-hover:scale-x-100 transition-transform duration-500"></span>
            </h2>
            <p class="text-lg md:text-xl text-gray-700 leading-relaxed">
                At RetroKits Nepal, we are passionate about sports and the timeless apparel that has been an integral part of sports history. Our mission is to bring you the best in retro sportswear, celebrating the heritage and style of iconic sports moments.
            </p>
        </div>
    </section>

    <!-- Our Mission -->
    <section id="mission" class="bg-white text-gray-900 py-16 px-6 rounded-xl mb-20 shadow-lg transform hover:scale-[1.01] transition-transform duration-300">
        <div class="max-w-4xl mx-auto">
            <h2 class="text-3xl md:text-4xl font-bold mb-8 text-yellow-500 text-center relative">
                Our Mission
                <span class="absolute bottom-0 left-1/2 transform -translate-x-1/2 w-20 h-1 bg-indigo-600"></span>
            </h2>
            <p class="text-lg md:text-xl max-w-3xl mx-auto text-center text-gray-700 leading-relaxed">
                Our mission is to offer sports fans and athletes the opportunity to own a piece of sports history. We meticulously source and design our collections to ensure quality, allowing you to relive the glory days of sports with every piece you wear.
            </p>
        </div>
    </section>

    <!-- Why Choose Us -->
    <section id="why-choose-us" class="py-16 px-4 bg-gray-50 text-gray-800 rounded-xl mb-20">
        <div class="max-w-6xl mx-auto">
            <h2 class="text-4xl md:text-5xl font-bold mb-12 text-indigo-700 text-center">
                Why Choose Us?
            </h2>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                <!-- Card 1 -->
                <div class="bg-white p-8 rounded-xl shadow-md hover:shadow-xl transition-shadow duration-300 transform hover:-translate-y-2 h-full flex flex-col">
                    <div class="mb-6 text-yellow-500 text-4xl">
                        <i class="fas fa-star"></i>
                    </div>
                    <h3 class="text-2xl font-semibold mb-4 text-indigo-700">Expert Preference</h3>
                    <p class="text-gray-600 flex-grow">
                        We provide a wide range of retro sports jerseys, training kits, and accessories that reflect the style and spirit of past decades.
                    </p>
                </div>

                <!-- Card 2 -->
                <div class="bg-white p-8 rounded-xl shadow-md hover:shadow-xl transition-shadow duration-300 transform hover:-translate-y-2 h-full flex flex-col">
                    <div class="mb-6 text-yellow-500 text-4xl">
                        <i class="fas fa-heart"></i>
                    </div>
                    <h3 class="text-2xl font-semibold mb-4 text-indigo-700">Enthusiast Perspective</h3>
                    <p class="text-gray-600 flex-grow">
                        As a collector of retro merchandise, RetroKits Nepal is a treasure trove! Their collection truly embodies the nostalgia of classic designs. From old-school sports kits to iconic vintage accessories, their offerings celebrate retro culture in a way that's unmatched in Nepal.
                    </p>
                </div>

                <!-- Card 3 -->
                <div class="bg-white p-8 rounded-xl shadow-md hover:shadow-xl transition-shadow duration-300 transform hover:-translate-y-2 h-full flex flex-col">
                    <div class="mb-6 text-yellow-500 text-4xl">
                        <i class="fas fa-eye"></i>
                    </div>
                    <h3 class="text-2xl font-semibold mb-4 text-indigo-700">Industry Observer Perspective</h3>
                    <p class="text-gray-600 flex-grow">
                        RetroKits Nepal has carved a unique market in Nepal by focusing on retro-themed sportswear and merchandise. Their approach to blending nostalgic designs with modern quality appeals to both older generations and younger audiences interested in vintage aesthetics.
                    </p>
                </div>
                
            </div>
        </div>
    </section>

    <!-- Customer Testimonials -->
    <section id="testimonials" class="py-16 px-4 bg-gradient-to-r from-indigo-50 to-gray-50 rounded-xl mb-16">
        <div class="max-w-6xl mx-auto">
            <h2 class="text-3xl md:text-4xl font-bold mb-12 text-yellow-500 text-center">
                What Our Customers Say
            </h2>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                <!-- Testimonial 1 -->
                <div class="bg-white p-8 rounded-xl shadow-lg relative group">
                    <div class="absolute top-0 left-0 w-full h-1 bg-gradient-to-r from-yellow-400 to-indigo-600 rounded-t-xl"></div>
                    <div class="text-gray-600 italic mb-6 text-lg leading-relaxed">
                        "As a collector of retro merchandise, RetroKits Nepal is a treasure trove! Their collection truly embodies the nostalgia of classic designs. From old-school sports kits to iconic vintage accessories, their offerings celebrate retro culture in a way that's unmatched in Nepal."
                    </div>
                    <div class="flex items-center">
                        <div class="bg-indigo-100 text-indigo-700 w-12 h-12 rounded-full flex items-center justify-center font-bold text-xl mr-4">
                            SJ
                        </div>
                        <div>
                            <p class="font-semibold text-indigo-700">Sarah & James</p>
                            <p class="text-gray-500 text-sm">New York, USA</p>
                        </div>
                    </div>
                </div>

                <!-- Testimonial 2 -->
                <div class="bg-white p-8 rounded-xl shadow-lg relative group">
                    <div class="absolute top-0 left-0 w-full h-1 bg-gradient-to-r from-yellow-400 to-indigo-600 rounded-t-xl"></div>
                    <div class="text-gray-600 italic mb-6 text-lg leading-relaxed">
                        "RetroKits Nepal offers a wide range of vintage and retro-themed apparel and accessories. I love how they cater to niche audiences who appreciate retro styles. The quality of their products is impressive, and their attention to detail makes every purchase feel unique."
                    </div>
                    <div class="flex items-center">
                        <div class="bg-yellow-100 text-yellow-700 w-12 h-12 rounded-full flex items-center justify-center font-bold text-xl mr-4">
                            AP
                        </div>
                        <div>
                            <p class="font-semibold text-indigo-700">Anil & Priya</p>
                            <p class="text-gray-500 text-sm">Kathmandu, Nepal</p>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
</div>

<!-- Add some custom animations -->
<style>
    .animate-fade-in-down {
        animation: fadeInDown 1s ease-out;
    }
    .animate-fade-in-up {
        animation: fadeInUp 1s ease-out;
    }
    .animate-fade-in {
        animation: fadeIn 1.5s ease-out;
    }
    .animate-bounce {
        animation: bounce 2s infinite;
    }
    @keyframes fadeInDown {
        from {
            opacity: 0;
            transform: translateY(-20px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }
    @keyframes fadeInUp {
        from {
            opacity: 0;
            transform: translateY(20px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }
    @keyframes fadeIn {
        from {
            opacity: 0;
        }
        to {
            opacity: 1;
        }
    }
    @keyframes bounce {
        0%, 20%, 50%, 80%, 100% {
            transform: translateY(0);
        }
        40% {
            transform: translateY(-20px);
        }
        60% {
            transform: translateY(-10px);
        }
    }
</style>
@endsection
