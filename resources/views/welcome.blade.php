@extends('layouts.master')
@section('content')
<div class="flex justify-between items-center h-screen px-20 ">
    <!-- Welcome Section -->
    <div class="w-100">
        <h1 class="font-extrabold text-6xl font-serif leading-tight text-gray-800">
            Welcome to <span class="text-red-600 ">RetroKits Nepal</span>
        </h1>
        <p class="text-xl font-light max-w-3xl my-6 text-justify text-gray-700">
            Our mission is to offer sports fans and athletes the opportunity to own a piece of sports history. We meticulously source and design our collections to ensure authenticity and quality, allowing you to relive the glory days of sports with every piece you wear.
        </p>
        <a href="{{ route('about') }}"
           class="mt-6 inline-block px-8 py-3 bg-gradient-to-r from-red-600 to-yellow-400 text-white font-semibold rounded-lg shadow-lg transform hover:scale-105 hover:shadow-2xl transition-all duration-300">
            Learn More
        </a>
    </div>
    <!-- Image Section -->
    <div class="max-w-md">
        <img src="{{ asset('home.png') }}"
             class="w-70 h-96 transform scale-x-[-1] hover:scale-105 transition-transform duration-300 cursor-pointer"
             alt="RetroKits Nepal">
    </div>
</div>
<section class="py-8 bg-gradient-to-r from-gray-100 via-white to-gray-200">
<div class="container mx-auto text-center">
    <!-- Heading Section -->
    <h2 class="text-4xl font-extrabold text-transparent bg-clip-text bg-gray-900 mb-4">
    Redefining Sports Style with <span class="text-red-500">RetroKits Nepal</span>
    </h2>
    <p class="text-lg text-gray-900 mb-8 font-roboto-slab tracking-wide">
        Your ultimate destination for vintage sports jerseys and memorabilia. Relive the glory days of sports with every piece you own.
    </p>

    <h2 class="text-4xl font-extrabold text-transparent bg-clip-text bg-gray-900 mb-4">
        Explore Our Classic Collections</span>
    </h2>
    <p class="text-lg mb-8 text-gray-900 font-roboto-slab tracking-wide">
        Dive into our curated collections and find iconic jerseys, gear, and memorabilia that let you wear a piece of history.
    </p>


    <!-- Carousel / Slider -->
    <div class="relative w-full lg:w-10/12 mx-auto overflow-hidden rounded-lg shadow-xl">
        <!-- Carousel Wrapper -->
        <div class="carousel relative flex space-x-6 transition-transform duration-700 ease-in-out">
            @foreach($products as $product)
            <a href="{{ route('viewproduct', $product->id) }}" class="relative block w-80 flex-shrink-0 group">
                <!-- Image -->
                <div class="overflow-hidden rounded-lg shadow-lg">
                    <img src="{{ asset('images/' . $product->photopath) }}"
                        alt="{{ $product->name }}"
                        class="w-full h-60 object-cover group-hover:scale-110 transition-transform duration-500">
                </div>
                <!-- Product Details -->
                <div class="mt-3 text-center">
                    <h3 class="text-xl font-semibold text-gray-900 group-hover:text-red-500 transition duration-300">{{ $product->name }}</h3>
                    <p class="text-lg font-bold text-green-500 group-hover:text-green-600">Rs. {{ $product->price }}</p>
                </div>
            </a>
            @endforeach
        </div>
    </div>
    <!-- Call to Action -->
    <a href="{{ route('products') }}"
       class="mt-6 inline-block bg-gradient-to-r from-red-500 to-yellow-500 text-white font-bold px-8 py-4 rounded-full shadow-lg hover:scale-105 transform hover:shadow-2xl transition-all duration-300">
        Shop Now
    </a>
</div>
</section>
<h1 class="text-gray-800 text-5xl text-center font-extrabold mt-16 tracking-wide">
    <i class="ri-shopping-bag-2-fill text-red-600"></i> Our Products
</h1>
<div class="grid lg:grid-cols-4 sm:grid-cols-2 grid-cols-1 gap-10 px-5 py-12 md:px-20 sm:px-10 bg-gradient-to-r from-gray-100 via-white to-gray-200">
    @foreach ($products->take(4) as $product)
    <a href="{{ route('viewproduct', $product->id) }}" class="flex flex-col rounded-lg shadow-lg p-6 hover:shadow-2xl transform hover:scale-105 transition duration-300 border border-gray-200">
        <img src="{{ asset('images/' . $product->photopath) }}"
            alt="{{ $product->name }}"
            class="h-56 w-full object-cover rounded-lg transition-all duration-300 transform hover:scale-105">
        <div class="mt-4">
            <h2 class="text-gray-800 font-bold text-xl tracking-tight hover:text-red-600 transition-colors duration-200">
                {{ $product->name }}
            </h2>
            <p class="text-gray-600 mt-2 text-sm line-clamp-3">
                {{ $product->description }}
            </p>
            <span class="text-2xl font-semibold text-gray-900">Rs. {{ $product->price }}</span>
            <div class="mt-4">
                <button class="flex items-center bg-green-500 text-white px-5 py-3 rounded-lg font-semibold shadow-md hover:bg-green-700 transform hover:scale-105 hover:translate-y-1 transition-all duration-300">
                    View Product
                </button>
            </div>
        </div>
    </a>
    @endforeach
</div>
<div class="flex justify-center ">
    <a href="{{ route('products') }}"
        class="inline-block bg-gradient-to-r from-red-500 to-yellow-500 text-white font-bold px-8 py-4 rounded-full shadow-lg hover:scale-105 transform hover:shadow-2xl transition-all duration-300">
        View all Products
    </a>
</div>

<script>
    const carousel = document.querySelector('.carousel');
    const slides = document.querySelectorAll('.carousel > a');
    let currentIndex = 0;

    // Function to update the carousel position
    const updateCarousel = () => {
        const slideWidth = slides[0].clientWidth; // Get the width of one slide
        const offset = -currentIndex * slideWidth; // Calculate offset
        carousel.style.transform = `translateX(${offset}px)`; // Apply transform
        carousel.style.transition = 'transform 0.5s ease-in-out'; // Smooth transition
    };

    // Auto-slide functionality
    setInterval(() => {
        if (currentIndex === 9) {
            currentIndex = 0; // Reset to the first slide after the 12th
            carousel.style.transition = 'none'; // Remove transition for an instant reset
            updateCarousel();
            setTimeout(() => {
                carousel.style.transition = 'transform 0.5s ease-in-out'; // Reapply transition
            }, 50); // Add a small delay to ensure smooth transition after reset
        } else {
            currentIndex++;
            updateCarousel();
        }
    }, 2000); // Auto-slide every 3 seconds

    // Resize handler to adjust carousel on window resize
    window.addEventListener('resize', updateCarousel);
</script>
@endsection
