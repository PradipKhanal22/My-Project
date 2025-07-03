@extends('layouts.master')

@section('content')
<!-- Header Section -->
<header class="relative h-screen bg-cover bg-center mt-2">
<img src="{{ asset('image.png') }}" alt="Header Image" class="absolute inset-0 w-full h-full object-cover z-0">
    <div class="absolute inset-0 bg-black opacity-30"></div>
    <div class="relative container mx-auto h-full flex flex-col justify-center items-center text-center text-white">
        <h1 class="text-5xl md:text-6xl font-extrabold text-yellow-500 drop-shadow-lg">About Us</h1>
        <p class="text-lg md:text-xl mt-4 font-semibold">Explore our vision  RetroKits Nepal</p>
        <a href="#mission" class="mt-6 px-8 py-3 bg-yellow-500 text-black font-bold rounded-full hover:bg-yellow-600 transition-all duration-300 shadow-lg transform hover:scale-105">LEARN MORE</a>
    </div>
</header>

<!-- Main Content -->
<div class="container mx-auto py-16 px-6">

    <section id="about-retroKits" class="text-center mb-16">
        <h2 class="text-4xl font-bold mb-6 text-indigo-700">About RetroKits Nepal</h2>
        <p class="text-lg text-gray-700 max-w-3xl mx-auto">
            At RetroKits Nepal, we are passionate about sports and the timeless apparel that has been an integral part of sports history. Our mission is to bring you the best in retro sportswear, celebrating the heritage and style of iconic sports moments.
        </p>
    </section>

    <!-- Our Mission -->
    <section id="mission" class="bg-white text-gray-900 py-12 px-6 rounded-lg mb-16 shadow-md">
        <h2 class="text-3xl font-bold mb-6 text-yellow-500 text-center">Our Mission</h2>
        <p class="text-lg max-w-3xl mx-auto text-center">
            Our mission is to offer sports fans and athletes the opportunity to own a piece of sports history. We meticulously source and design our collections to ensure quality, allowing you to relive the glory days of sports with every piece you wear.
        </p>
    </section>

    <!-- Why Choose Us -->
    <section id="why-choose-us" class="py-12 px-6 bg-gray-50 text-gray-800 rounded-lg mb-16 shadow-lg">
        <h2 class="text-4xl font-bold mb-6 text-indigo-700 text-center">Why Choose Us?</h2>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-10">
            <div class="bg-white text-gray-800 p-6 rounded-lg shadow-lg text-center">
                <h3 class="text-2xl font-semibold mb-4 text-yellow-500">Expert Preference</h3>
                <p class="text-gray-600">We provide a wide range of retro sports jerseys, training kits, and accessories that reflect the style and spirit of past decades.</.</p>
            </div>
            <div class="bg-white text-gray-800 p-6 rounded-lg shadow-lg text-center">
                <h3 class="text-2xl font-semibold mb-4 text-yellow-500">Enthusiast Perspective</h3>
                <p class="text-gray-600">As a collector of retro merchandise, RetroKits Nepal is a treasure trove! Their collection truly embodies the nostalgia of classic designs. From old-school sports kits to iconic vintage accessories, their offerings celebrate retro culture in a way that's unmatched in Nepal.</p>
            </div>
            <div class="bg-white text-gray-800 p-6 rounded-lg shadow-lg text-center">
                <h3 class="text-2xl font-semibold mb-4 text-yellow-500"> Industry Observer Perspective
                </h3>
                <p class="text-gray-600">RetroKits Nepal has carved a unique market in Nepal by focusing on retro-themed sportswear and merchandise. Their approach to blending nostalgic designs with modern quality appeals to both older generations and younger audiences interested in vintage aesthetics</p>
            </div>
        </div>
    </section>

    <!-- Customer Testimonials -->
    <section id="testimonials" class="py-12 px-6 bg-gray-50 text-gray-900 rounded-lg mb-16">
        <h2 class="text-3xl font-bold mb-6 text-yellow-500 text-center">What Our Customers Say</h2>
        <div class="flex flex-wrap justify-center gap-10">
            <div class="bg-white text-gray-800 p-6 rounded-lg shadow-lg max-w-md text-center">
                <p class="text-gray-600 italic mb-4">"As a collector of retro merchandise, RetroKits Nepal is a treasure trove! Their collection truly embodies the nostalgia of classic designs. From old-school sports kits to iconic vintage accessories, their offerings celebrate retro culture in a way that's unmatched in Nepal."</p>
                <p class="font-semibold text-indigo-700">Sarah & James</p>
                <p class="text-gray-500">New York, USA</p>
            </div>
            <div class="bg-white text-gray-800 p-6 rounded-lg shadow-lg max-w-md text-center">
                <p class="text-gray-600 italic mb-4">"RetroKits Nepal offers a wide range of vintage and retro-themed apparel and accessories. I love how they cater to niche audiences who appreciate retro styles. The quality of their products is impressive, and their attention to detail makes every purchase feel unique."</p>
                <p class="font-semibold text-indigo-700">Anil & Priya</p>
                <p class="text-gray-500">Kathmandu, Nepal</p>
            </div>
        </div>
    </section>
</div>
@endsection
