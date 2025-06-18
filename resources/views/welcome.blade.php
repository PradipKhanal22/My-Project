@extends('layouts.master')
@section('content')
<div class="flex flex-col-reverse lg:flex-row justify-between items-center min-h-screen px-6 md:px-20 py-10 gap-10">
    <!-- Welcome Section -->
    <div class="w-full lg:w-1/2 top-0">
        <h1 class="font-extrabold text-4xl md:text-5xl lg:text-6xl font-serif leading-tight text-gray-800">
            Welcome to <span class="text-red-600">RetroKits Nepal</span>
        </h1>
        <p class="text-base md:text-lg lg:text-xl font-light my-6 text-justify text-gray-700">
            Our mission is to offer sports fans and athletes the opportunity to own a piece of sports history. We meticulously source and design our collections to ensure authenticity and quality, allowing you to relive the glory days of sports with every piece you wear.
        </p>
        <a href="{{ route('about') }}"
           class="mt-4 inline-block px-6 py-3 bg-gradient-to-r from-red-600 to-yellow-400 text-white font-semibold rounded-lg shadow-lg hover:scale-105 hover:shadow-2xl transition-all duration-300">
            Learn More
        </a>
    </div>
    <!-- Image Section -->
    <div class="w-full lg:w-1/2 flex justify-center">
        <img src="{{ asset('home.png') }}"
             class="max-w-xs sm:max-w-sm md:max-w-md lg:max-w-md transform scale-x-[-1] hover:scale-105 transition-transform duration-300 cursor-pointer"
             alt="RetroKits Nepal">
    </div>
</div>

<section class="py-8 bg-gradient-to-r from-gray-100 via-white to-gray-200">
    <div class="container mx-auto text-center px-4">
        <!-- Headings -->
        <h2 class="text-3xl md:text-4xl font-extrabold text-gray-900 mb-4">
            Redefining Sports Style with <span class="text-red-500">RetroKits Nepal</span>
        </h2>
        <p class="text-base md:text-lg text-gray-900 mb-8 font-roboto-slab tracking-wide">
            Your ultimate destination for vintage sports jerseys and memorabilia. Relive the glory days of sports with every piece you own.
        </p>

        <h2 class="text-3xl md:text-4xl font-extrabold text-gray-900 mb-4">
            Explore Our Classic Collections
        </h2>
        <p class="text-base md:text-lg mb-8 text-gray-900 font-roboto-slab tracking-wide">
            Dive into our curated collections and find iconic jerseys, gear, and memorabilia that let you wear a piece of history.
        </p>

        <!-- Carousel -->
        <div class="relative w-full overflow-x-auto pb-4">
            <div class="carousel flex space-x-6 transition-transform duration-700 ease-in-out px-4 md:px-0">
                @foreach($products as $product)
                <a href="{{ route('viewproduct', $product->id) }}" class="block min-w-[16rem] md:w-80 flex-shrink-0 group">
                    <div class="overflow-hidden rounded-lg shadow-lg">
                        <img src="{{ asset('images/' . $product->photopath) }}"
                             alt="{{ $product->name }}"
                             class="w-full h-60 object-cover group-hover:scale-110 transition-transform duration-500">
                    </div>
                    <div class="mt-3 text-center">
                        <h3 class="text-lg md:text-xl font-semibold text-gray-900 group-hover:text-red-500 transition duration-300">
                            {{ $product->name }}
                        </h3>
                        <p class="text-base font-bold text-green-500 group-hover:text-green-600">
                            Rs. {{ $product->price }}
                        </p>
                    </div>
                </a>
                @endforeach
            </div>
        </div>

        <a href="{{ route('products') }}"
           class="mt-8 inline-block bg-gradient-to-r from-red-500 to-yellow-500 text-white font-bold px-6 py-3 rounded-full shadow-lg hover:scale-105 transform hover:shadow-2xl transition-all duration-300">
            Shop Now
        </a>
    </div>
</section>

<!-- Product Grid Section -->
<h1 class="text-gray-800 text-3xl md:text-5xl text-center font-extrabold mt-16 tracking-wide">
    <i class="ri-shopping-bag-2-fill text-red-600"></i> Our Products
</h1>

<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-10 px-4 sm:px-10 md:px-20 py-12 bg-gradient-to-r from-gray-100 via-white to-gray-200">
    @foreach ($products->take(4) as $product)
    <a href="{{ route('viewproduct', $product->id) }}"
       class="flex flex-col rounded-lg shadow-lg p-6 hover:shadow-2xl transform hover:scale-105 transition duration-300 border border-gray-200">
        <img src="{{ asset('images/' . $product->photopath) }}"
             alt="{{ $product->name }}"
             class="h-48 sm:h-56 w-full object-cover rounded-lg transition-transform duration-300 hover:scale-105">
        <div class="mt-4">
            <h2 class="text-gray-800 font-bold text-lg sm:text-xl tracking-tight hover:text-red-600 transition-colors duration-200">
                {{ $product->name }}
            </h2>
            <p class="text-gray-600 mt-2 text-sm line-clamp-3">
                {{ $product->description }}
            </p>
            <span class="text-xl sm:text-2xl font-semibold text-gray-900">Rs. {{ $product->price }}</span>
            <div class="mt-4">
                <button class="flex items-center bg-green-500 text-white px-4 py-2 sm:px-5 sm:py-3 rounded-lg font-semibold shadow-md hover:bg-green-700 transform hover:scale-105 hover:translate-y-1 transition-all duration-300">
                    View Product
                </button>
            </div>
        </div>
    </a>
    @endforeach
</div>

<div class="flex justify-center mb-10">
    <a href="{{ route('products') }}"
       class="inline-block bg-gradient-to-r from-red-500 to-yellow-500 text-white font-bold px-6 py-3 rounded-full shadow-lg hover:scale-105 transform hover:shadow-2xl transition-all duration-300">
        View all Products
    </a>
</div>

<!-- JS remains the same -->
<script>
    const carousel = document.querySelector('.carousel');
    const slides = document.querySelectorAll('.carousel > a');
    let currentIndex = 0;

    const updateCarousel = () => {
        const slideWidth = slides[0].clientWidth;
        const offset = -currentIndex * slideWidth;
        carousel.style.transform = `translateX(${offset}px)`;
        carousel.style.transition = 'transform 0.5s ease-in-out';
    };

    setInterval(() => {
        if (currentIndex >= slides.length - 1) {
            currentIndex = 0;
            carousel.style.transition = 'none';
            updateCarousel();
            setTimeout(() => {
                carousel.style.transition = 'transform 0.5s ease-in-out';
            }, 50);
        } else {
            currentIndex++;
            updateCarousel();
        }
    }, 3000);

    window.addEventListener('resize', updateCarousel);
</script>
@endsection
