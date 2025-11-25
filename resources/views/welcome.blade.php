@extends('layouts.master')
@section('content')
    <!-- FINAL Balanced Hero – Auto-Scaling Image + Perfect Proportions -->
    <section class="relative bg-gradient-to-br from-gray-900 via-black to-red-950 overflow-hidden">
        <!-- Subtle animated background -->
        <div class="absolute inset-0 opacity-20">
            <div class="absolute inset-0"
                style="background-image: repeating-conic-gradient(from 90deg at 50% 50%, #000 0%, #000 90%, #dc2626 90%, #dc2626 100%);
                    background-size: 60px 60px;
                    animation: mesh 30s linear infinite;">
            </div>
        </div>

        <div
            class="relative z-10 container mx-auto px-6 md:px-12 lg:px-20
                flex flex-col lg:flex-row items-center justify-between
                min-h-screen lg:min-h-[680px] xl:min-h-[720px] py-16 gap-10 lg:gap-8">

            <!-- Left: Smart Auto-Scaling Hero Image -->
            <div class="w-full lg:w-1/2 flex justify-center lg:justify-end order-2 lg:order-1">
                <div class="relative group">
                    <!-- Soft pulsing glow -->
                    <div
                        class="absolute -inset-4 md:-inset-6 bg-gradient-to-r from-red-600/30 via-yellow-500/10 to-transparent
                            rounded-3xl blur-3xl animate-pulse">
                    </div>

                    <img src="{{ asset('home.png') }}" alt="RetroKits Nepal – Vintage Football Jerseys"
                        class="relative z-10 w-full
                            max-w-[280px] sm:max-w-[360px] md:max-w-[420px] lg:max-w-[480px] xl:max-w-[560px]
                            drop-shadow-2xl object-contain
                            transform scale-x-[-1]
                            group-hover:scale-[1.04] transition-all duration-700">

                    <!-- Floating "NEW DROP" badge -->
                    <div
                        class="absolute -top-3 -right-3 md:-top-4 md:-right-4
                              bg-gradient-to-br from-red-600 to-yellow-500
                              text-white font-black px-5 py-2.5 md:px-6 md:py-3
                              rounded-full shadow-2xl animate-bounce text-sm">
                        NEW DROP
                    </div>
                </div>
            </div>

            <!-- Right: Text Content -->
            <div class="w-full lg:w-1/2 text-center lg:text-left space-y-7 order-1 lg:order-2">
                <!-- Badge -->
                <div class="inline-flex items-center gap-3 px-5 py-2 bg-red-600/20 border border-red-500/50 rounded-full">
                    <i class="ri-fire-fill text-red-400 text-lg"></i>
                    <span class="text-red-300 font-bold tracking-widest text-sm">NEPAL'S #1 VINTAGE KIT STORE</span>
                </div>

                <!-- Headline -->
                <h1 class="text-5xl sm:text-6xl lg:text-7xl font-black leading-tight text-white">
                    Wear The <span
                        class="text-transparent bg-clip-text bg-gradient-to-r
                                      from-red-500 via-yellow-400 to-red-600
                                      animate-gradient-x">Legend</span>
                </h1>

                <h2 class="text-3xl sm:text-4xl font-bold text-gray-200 -mt-2">
                    RetroKits Nepal
                </h2>

                <!-- Emotional copy -->
                <p class="text-lg md:text-xl text-gray-300 leading-relaxed max-w-2xl">
                    We hunt down the jerseys that made history — from ‘99 finals to Anfield miracles.
                    Every piece is 100% original, sourced globally, and delivered to your doorstep in Nepal.
                </p>

                <p class="text-base text-gray-400 font-medium">
                    Rare classics • Limited remakes • Worldwide shipping • Full authenticity guarantee
                </p>

                <!-- CTAs -->
                <div class="flex flex-col sm:flex-row gap-4 mt-8">
                    <a href="{{ route('products') }}"
                        class="group relative inline-flex items-center justify-center px-10 py-5
                          bg-gradient-to-r from-red-600 to-yellow-500 text-white font-black text-lg
                          rounded-full shadow-2xl hover:shadow-red-600/60 transform hover:scale-105
                          transition-all duration-300 overflow-hidden">
                        <span class="relative z-10 flex items-center gap-3">
                            <i class="ri-shopping-bag-3-fill"></i> Shop Now
                        </span>
                        <div
                            class="absolute inset-0 bg-gradient-to-l from-yellow-500 to-red-700
                                 translate-x-[-100%] group-hover:translate-x-0 transition-transform duration-500">
                        </div>
                    </a>

                    <a href=""
                        class="inline-flex items-center justify-center gap-3 px-10 py-5
                          bg-white/10 backdrop-blur-md border-2 border-white/30
                          text-white font-bold rounded-full hover:bg-white/20
                          transition-all duration-300">
                        <i class="ri-trophy-line"></i> View Collections
                    </a>
                </div>

                <!-- Compact stats -->
                <div class="flex justify-center lg:justify-start gap-8 mt-10 text-white">
                    <div class="text-center">
                        <div class="text-3xl md:text-4xl font-black text-red-400">650+</div>
                        <div class="text-xs md:text-sm text-gray-400">Rare Kits</div>
                    </div>
                    <div class="text-center">
                        <div class="text-3xl md:text-4xl font-black text-yellow-400">10K+</div>
                        <div class="text-xs md:text-sm text-gray-400">Happy Fans</div>
                    </div>
                    <div class="text-center">
                        <div class="text-3xl md:text-4xl font-black text-emerald-400">100%</div>
                        <div class="text-xs md:text-sm text-gray-400">Authentic</div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Scroll indicator -->
        <div class="absolute bottom-8 left-1/2 -translate-x-1/2 animate-bounce">
            <i class="ri-arrow-down-line text-white/60 text-4xl"></i>
        </div>
    </section>

    <!-- Animations -->
    <style>
        @keyframes mesh {
            from {
                transform: rotate(0deg);
            }

            to {
                transform: rotate(360deg);
            }
        }

        @keyframes gradient-x {

            0%,
            100% {
                background-position: 0% 50%;
            }

            50% {
                background-position: 100% 50%;
            }
        }

        .animate-gradient-x {
            background-size: 200% auto;
            animation: gradient-x 6s ease infinite;
        }
    </style>

    <!-- Features Section -->
    <section class="py-16 bg-white">
        <div class="container mx-auto px-6">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div
                    class="text-center p-8 rounded-xl hover:shadow-xl transition-all duration-300 border border-gray-100 hover:border-red-200 group">
                    <div
                        class="inline-flex items-center justify-center w-16 h-16 bg-red-100 rounded-full mb-4 group-hover:bg-red-600 transition-colors duration-300">
                        <i class="ri-shield-check-line text-3xl text-red-600 group-hover:text-white"></i>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-2">Authentic Quality</h3>
                    <p class="text-gray-600">100% authentic vintage sportswear, carefully curated and verified</p>
                </div>
                <div
                    class="text-center p-8 rounded-xl hover:shadow-xl transition-all duration-300 border border-gray-100 hover:border-red-200 group">
                    <div
                        class="inline-flex items-center justify-center w-16 h-16 bg-yellow-100 rounded-full mb-4 group-hover:bg-yellow-500 transition-colors duration-300">
                        <i class="ri-truck-line text-3xl text-yellow-600 group-hover:text-white"></i>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-2">Fast Delivery</h3>
                    <p class="text-gray-600">Quick and secure shipping across Nepal with tracking</p>
                </div>
                <div
                    class="text-center p-8 rounded-xl hover:shadow-xl transition-all duration-300 border border-gray-100 hover:border-red-200 group">
                    <div
                        class="inline-flex items-center justify-center w-16 h-16 bg-green-100 rounded-full mb-4 group-hover:bg-green-600 transition-colors duration-300">
                        <i class="ri-customer-service-2-line text-3xl text-green-600 group-hover:text-white"></i>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-2">24/7 Support</h3>
                    <p class="text-gray-600">Dedicated customer service team ready to help anytime</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Featured Collections Section -->
    <section class="py-20 bg-gradient-to-br from-gray-50 via-red-50 to-yellow-50 relative overflow-hidden">
        <!-- Background Pattern -->
        <div class="absolute inset-0 opacity-5"
            style="background-image: url('data:image/svg+xml,%3Csvg width=\'60\' height=\'60\' viewBox=\'0 0 60 60\' xmlns=\'http://www.w3.org/2000/svg\'%3E%3Cg fill=\'none\' fill-rule=\'evenodd\'%3E%3Cg fill=\'%23000000\' fill-opacity=\'1\'%3E%3Cpath d=\'M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z\'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E');">
        </div>

        <div class="container mx-auto text-center px-4 relative z-10">
            <!-- Section Header -->
            <div class="max-w-3xl mx-auto mb-16">
                <span class="inline-block px-4 py-2 bg-red-600 text-white text-sm font-semibold rounded-full mb-4">
                    FEATURED COLLECTIONS
                </span>
                <h2 class="text-4xl md:text-5xl font-extrabold text-gray-900 mb-6">
                    Redefining Sports Style with <span
                        class="text-transparent bg-clip-text bg-gradient-to-r from-red-600 to-yellow-500">RetroKits
                        Nepal</span>
                </h2>
                <p class="text-lg md:text-xl text-gray-700 leading-relaxed">
                    Your ultimate destination for vintage sports jerseys and memorabilia. Relive the glory days of sports
                    with every piece you own.
                </p>
            </div>

            <h3 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4 mt-16">
                Explore Our Classic Collections
            </h3>
            <p class="text-base md:text-lg mb-12 text-gray-700 max-w-2xl mx-auto">
                Dive into our curated collections and find iconic jerseys, gear, and memorabilia that let you wear a piece
                of history.
            </p>

            <!-- Enhanced Carousel -->
            <div class="relative max-w-7xl mx-auto">
                <!-- Carousel Container -->
                <div class="relative overflow-hidden rounded-2xl shadow-2xl bg-white p-8">
                    <div class="carousel-wrapper relative">
                        <div class="carousel flex gap-8 transition-transform duration-700 ease-in-out">
                            @foreach ($products as $product)
                                <a href="{{ route('viewproduct', $product->id) }}"
                                    class="carousel-item min-w-[280px] md:min-w-[320px] flex-shrink-0 group">
                                    <div
                                        class="relative overflow-hidden rounded-xl shadow-lg bg-white border border-gray-200 hover:border-red-500 transition-all duration-300">
                                        <!-- Product Image -->
                                        <div class="relative overflow-hidden h-80 bg-gray-100">
                                            <img src="{{ asset('images/' . $product->photopath) }}"
                                                alt="{{ $product->name }}"
                                                class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                                            <!-- Overlay -->
                                            <div
                                                class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                                                <div class="absolute bottom-4 left-4 right-4">
                                                    <span
                                                        class="inline-block px-3 py-1 bg-red-600 text-white text-xs font-semibold rounded-full">
                                                        VIEW DETAILS
                                                    </span>
                                                </div>
                                            </div>
                                            <!-- Badge -->
                                            <div class="absolute top-4 right-4">
                                                <span
                                                    class="inline-block px-3 py-1 bg-yellow-400 text-gray-900 text-xs font-bold rounded-full shadow-lg">
                                                    FEATURED
                                                </span>
                                            </div>
                                        </div>
                                        <!-- Product Info -->
                                        <div class="p-5">
                                            <h3
                                                class="text-lg md:text-xl font-bold text-gray-900 group-hover:text-red-600 transition-colors duration-300 line-clamp-1">
                                                {{ $product->name }}
                                            </h3>
                                            <div class="flex items-center justify-between mt-3">
                                                <p class="text-2xl font-extrabold text-green-600">
                                                    Rs. {{ number_format($product->price) }}
                                                </p>
                                                <div class="flex items-center gap-1 text-yellow-400">
                                                    <i class="ri-star-fill text-sm"></i>
                                                    <i class="ri-star-fill text-sm"></i>
                                                    <i class="ri-star-fill text-sm"></i>
                                                    <i class="ri-star-fill text-sm"></i>
                                                    <i class="ri-star-half-fill text-sm"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            @endforeach
                        </div>
                    </div>

                    <!-- Navigation Arrows -->
                    <button id="prevBtn"
                        class="absolute left-2 top-1/2 -translate-y-1/2 w-12 h-12 bg-white hover:bg-red-600 text-gray-800 hover:text-white rounded-full shadow-lg flex items-center justify-center transition-all duration-300 z-10 group">
                        <i class="ri-arrow-left-s-line text-2xl"></i>
                    </button>
                    <button id="nextBtn"
                        class="absolute right-2 top-1/2 -translate-y-1/2 w-12 h-12 bg-white hover:bg-red-600 text-gray-800 hover:text-white rounded-full shadow-lg flex items-center justify-center transition-all duration-300 z-10 group">
                        <i class="ri-arrow-right-s-line text-2xl"></i>
                    </button>
                </div>

                <!-- Carousel Indicators -->
                <div class="flex justify-center gap-2 mt-8" id="carouselIndicators">
                    <!-- Will be populated by JS -->
                </div>
            </div>

            <a href="{{ route('products') }}"
                class="mt-12 inline-flex items-center gap-2 bg-gradient-to-r from-red-600 to-yellow-500 text-white font-bold px-10 py-4 rounded-full shadow-xl hover:shadow-2xl hover:scale-105 transform transition-all duration-300">
                <i class="ri-shopping-bag-3-line text-xl"></i>
                Start Shopping
            </a>
        </div>
    </section>

    <!-- Product Grid Section -->
    <section class="py-20 bg-white">
        <div class="container mx-auto px-4 sm:px-10 md:px-20">
            <!-- Section Header -->
            <div class="text-center mb-16">
                <h2
                    class="text-4xl md:text-5xl font-extrabold text-gray-900 mb-4 inline-flex items-center gap-4 justify-center flex-wrap">
                    <i class="ri-shopping-bag-2-fill text-red-600"></i>
                    <span>Our Products</span>
                </h2>
                <p class="text-lg text-gray-600 max-w-2xl mx-auto mt-4">
                    Discover our handpicked selection of authentic vintage sportswear
                </p>
                <div class="w-24 h-1 bg-gradient-to-r from-red-600 to-yellow-500 mx-auto mt-6 rounded-full"></div>
            </div>

            <!-- Products Grid -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8">
                @foreach ($products->take(4) as $product)
                    <a href="{{ route('viewproduct', $product->id) }}"
                        class="group relative bg-white rounded-2xl shadow-lg hover:shadow-2xl transition-all duration-500 overflow-hidden border border-gray-100 hover:border-red-200 transform hover:-translate-y-2">
                        <!-- Product Image Container -->
                        <div class="relative overflow-hidden h-64 bg-gray-100">
                            <img src="{{ asset('images/' . $product->photopath) }}" alt="{{ $product->name }}"
                                class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">

                            <!-- Gradient Overlay on Hover -->
                            <div
                                class="absolute inset-0 bg-gradient-to-t from-black/70 via-black/20 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                                <div class="absolute bottom-4 left-1/2 -translate-x-1/2">
                                    <span
                                        class="inline-flex items-center gap-2 px-6 py-2 bg-white text-gray-900 font-bold rounded-full text-sm shadow-lg">
                                        <i class="ri-eye-line"></i>
                                        Quick View
                                    </span>
                                </div>
                            </div>

                            <!-- Discount Badge (if applicable) -->
                            <div class="absolute top-4 left-4">
                                <span
                                    class="inline-block px-3 py-1 bg-red-600 text-white text-xs font-bold rounded-full shadow-lg">
                                    NEW
                                </span>
                            </div>

                            <!-- Wishlist Button -->
                            <button
                                class="absolute top-4 right-4 w-10 h-10 bg-white/90 hover:bg-red-600 rounded-full flex items-center justify-center shadow-lg transition-all duration-300 group/heart">
                                <i class="ri-heart-line text-gray-700 group-hover/heart:text-white transition-colors"></i>
                            </button>
                        </div>

                        <!-- Product Details -->
                        <div class="p-6">
                            <!-- Product Name -->
                            <h3
                                class="text-lg font-bold text-gray-900 group-hover:text-red-600 transition-colors duration-300 line-clamp-2 mb-2 h-14">
                                {{ $product->name }}
                            </h3>

                            <!-- Product Description -->
                            <p class="text-gray-600 text-sm line-clamp-2 mb-4 h-10">
                                {{ $product->description }}
                            </p>

                            <!-- Rating -->
                            <div class="flex items-center gap-1 mb-4">
                                <div class="flex text-yellow-400">
                                    <i class="ri-star-fill text-sm"></i>
                                    <i class="ri-star-fill text-sm"></i>
                                    <i class="ri-star-fill text-sm"></i>
                                    <i class="ri-star-fill text-sm"></i>
                                    <i class="ri-star-half-fill text-sm"></i>
                                </div>
                                <span class="text-xs text-gray-500 ml-2">(4.5)</span>
                            </div>

                            <!-- Price and Button -->
                            <div class="flex items-center justify-between">
                                <div>
                                    <span class="text-2xl font-extrabold text-gray-900">Rs.
                                        {{ number_format($product->price) }}</span>
                                </div>
                            </div>

                            <!-- View Button -->
                            <button
                                class="mt-4 w-full flex items-center justify-center gap-2 bg-gradient-to-r from-green-500 to-green-600 text-white px-4 py-3 rounded-xl font-semibold shadow-md hover:shadow-lg hover:from-green-600 hover:to-green-700 transform hover:scale-105 transition-all duration-300">
                                <i class="ri-shopping-cart-line text-lg"></i>
                                View Product
                            </button>
                        </div>

                        <!-- Shine Effect -->
                        <div
                            class="absolute inset-0 -translate-x-full group-hover:translate-x-full transition-transform duration-1000 bg-gradient-to-r from-transparent via-white/20 to-transparent skew-x-12">
                        </div>
                    </a>
                @endforeach
            </div>

            <!-- View All Button -->
            <div class="text-center mt-16">
                <a href="{{ route('products') }}"
                    class="inline-flex items-center gap-3 bg-gradient-to-r from-red-600 via-red-500 to-yellow-500 text-white font-bold px-12 py-4 rounded-full shadow-xl hover:shadow-2xl transform hover:scale-105 transition-all duration-300 group">
                    <i class="ri-shopping-bag-3-fill text-xl"></i>
                    <span>View All Products</span>
                    <i class="ri-arrow-right-line text-xl group-hover:translate-x-1 transition-transform"></i>
                </a>
            </div>
        </div>
    </section>

    <!-- Newsletter Section -->
    <section class="py-20 bg-gradient-to-r from-red-600 via-red-500 to-yellow-500 relative overflow-hidden">
        <!-- Background Pattern -->
        <div class="absolute inset-0 opacity-10">
            <div class="absolute inset-0"
                style="background-image: repeating-linear-gradient(45deg, transparent, transparent 35px, rgba(255,255,255,.2) 35px, rgba(255,255,255,.2) 70px);">
            </div>
        </div>

        <div class="container mx-auto px-4 relative z-10">
            <div class="max-w-3xl mx-auto text-center text-white">
                <i class="ri-mail-line text-6xl mb-6 inline-block"></i>
                <h2 class="text-4xl md:text-5xl font-extrabold mb-4">
                    Stay Updated
                </h2>
                <p class="text-lg md:text-xl mb-8 opacity-90">
                    Subscribe to our newsletter and get exclusive offers, new arrivals, and vintage sports news
                </p>
                <div class="flex flex-col sm:flex-row gap-4 justify-center max-w-xl mx-auto">
                    <input type="email" placeholder="Enter your email address"
                        class="flex-1 px-6 py-4 rounded-full text-gray-900 focus:outline-none focus:ring-4 focus:ring-white/50 shadow-lg">
                    <button
                        class="px-8 py-4 bg-gray-900 hover:bg-black text-white font-bold rounded-full shadow-lg hover:shadow-xl transform hover:scale-105 transition-all duration-300">
                        Subscribe Now
                    </button>
                </div>
                <p class="text-sm mt-4 opacity-75">
                    <i class="ri-lock-line"></i> We respect your privacy. Unsubscribe anytime.
                </p>
            </div>
        </div>
    </section>

    <!-- Enhanced JavaScript -->
    <script>
        // Enhanced Carousel with Navigation
        const carousel = document.querySelector('.carousel');
        const slides = document.querySelectorAll('.carousel-item');
        const prevBtn = document.getElementById('prevBtn');
        const nextBtn = document.getElementById('nextBtn');
        const indicatorsContainer = document.getElementById('carouselIndicators');

        let currentIndex = 0;
        let autoPlayInterval;
        const autoPlayDelay = 4000;

        // Calculate how many slides to show at once
        function getSlidesPerView() {
            if (window.innerWidth >= 1024) return 3;
            if (window.innerWidth >= 768) return 2;
            return 1;
        }

        // Create indicators
        function createIndicators() {
            const slidesPerView = getSlidesPerView();
            const totalPages = Math.ceil(slides.length / slidesPerView);
            indicatorsContainer.innerHTML = '';

            for (let i = 0; i < totalPages; i++) {
                const indicator = document.createElement('button');
                indicator.className =
                    `w-3 h-3 rounded-full transition-all duration-300 ${i === 0 ? 'bg-red-600 w-8' : 'bg-gray-300 hover:bg-gray-400'}`;
                indicator.addEventListener('click', () => goToSlide(i * slidesPerView));
                indicatorsContainer.appendChild(indicator);
            }
        }

        // Update indicators
        function updateIndicators() {
            const indicators = indicatorsContainer.querySelectorAll('button');
            const slidesPerView = getSlidesPerView();
            const currentPage = Math.floor(currentIndex / slidesPerView);

            indicators.forEach((indicator, index) => {
                if (index === currentPage) {
                    indicator.className = 'w-8 h-3 rounded-full bg-red-600 transition-all duration-300';
                } else {
                    indicator.className =
                        'w-3 h-3 rounded-full bg-gray-300 hover:bg-gray-400 transition-all duration-300';
                }
            });
        }

        // Update carousel position
        function updateCarousel(animate = true) {
            if (!carousel || slides.length === 0) return;

            const slideWidth = slides[0].offsetWidth;
            const gap = 32; // 2rem gap
            const offset = -currentIndex * (slideWidth + gap);

            carousel.style.transition = animate ? 'transform 0.7s cubic-bezier(0.4, 0, 0.2, 1)' : 'none';
            carousel.style.transform = `translateX(${offset}px)`;

            updateIndicators();
        }

        // Go to specific slide
        function goToSlide(index) {
            const maxIndex = Math.max(0, slides.length - getSlidesPerView());
            currentIndex = Math.max(0, Math.min(index, maxIndex));
            updateCarousel();
            resetAutoPlay();
        }

        // Next slide
        function nextSlide() {
            const maxIndex = Math.max(0, slides.length - getSlidesPerView());
            if (currentIndex >= maxIndex) {
                currentIndex = 0;
            } else {
                currentIndex++;
            }
            updateCarousel();
        }

        // Previous slide
        function prevSlide() {
            const maxIndex = Math.max(0, slides.length - getSlidesPerView());
            if (currentIndex <= 0) {
                currentIndex = maxIndex;
            } else {
                currentIndex--;
            }
            updateCarousel();
        }

        // Auto play
        function startAutoPlay() {
            autoPlayInterval = setInterval(nextSlide, autoPlayDelay);
        }

        function stopAutoPlay() {
            if (autoPlayInterval) {
                clearInterval(autoPlayInterval);
            }
        }

        function resetAutoPlay() {
            stopAutoPlay();
            startAutoPlay();
        }

        // Event listeners
        if (nextBtn) {
            nextBtn.addEventListener('click', () => {
                nextSlide();
                resetAutoPlay();
            });
        }

        if (prevBtn) {
            prevBtn.addEventListener('click', () => {
                prevSlide();
                resetAutoPlay();
            });
        }

        // Pause on hover
        if (carousel) {
            carousel.addEventListener('mouseenter', stopAutoPlay);
            carousel.addEventListener('mouseleave', startAutoPlay);
        }

        // Handle window resize
        let resizeTimeout;
        window.addEventListener('resize', () => {
            clearTimeout(resizeTimeout);
            resizeTimeout = setTimeout(() => {
                createIndicators();
                updateCarousel(false);
            }, 250);
        });

        // Keyboard navigation
        document.addEventListener('keydown', (e) => {
            if (e.key === 'ArrowLeft') {
                prevSlide();
                resetAutoPlay();
            } else if (e.key === 'ArrowRight') {
                nextSlide();
                resetAutoPlay();
            }
        });

        // Touch/Swipe support
        let touchStartX = 0;
        let touchEndX = 0;

        if (carousel) {
            carousel.addEventListener('touchstart', (e) => {
                touchStartX = e.changedTouches[0].screenX;
            }, {
                passive: true
            });

            carousel.addEventListener('touchend', (e) => {
                touchEndX = e.changedTouches[0].screenX;
                handleSwipe();
            }, {
                passive: true
            });
        }

        function handleSwipe() {
            const swipeThreshold = 50;
            const diff = touchStartX - touchEndX;

            if (Math.abs(diff) > swipeThreshold) {
                if (diff > 0) {
                    nextSlide();
                } else {
                    prevSlide();
                }
                resetAutoPlay();
            }
        }

        // Initialize
        if (slides.length > 0) {
            createIndicators();
            updateCarousel(false);
            startAutoPlay();
        }

        // Smooth scroll to sections
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function(e) {
                e.preventDefault();
                const target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    target.scrollIntoView({
                        behavior: 'smooth',
                        block: 'start'
                    });
                }
            });
        });

        // Add animation classes when elements come into view
        const observerOptions = {
            threshold: 0.1,
            rootMargin: '0px 0px -50px 0px'
        };

        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('animate-fade-in-up');
                }
            });
        }, observerOptions);

        // Observe all product cards
        document.querySelectorAll('.grid > a').forEach((card) => {
            observer.observe(card);
        });
    </script>

    <!-- Custom CSS for Animations -->
    <style>
        @keyframes fadeInLeft {
            from {
                opacity: 0;
                transform: translateX(-50px);
            }

            to {
                opacity: 1;
                transform: translateX(0);
            }
        }

        @keyframes fadeInRight {
            from {
                opacity: 0;
                transform: translateX(50px);
            }

            to {
                opacity: 1;
                transform: translateX(0);
            }
        }

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

        @keyframes gradient {

            0%,
            100% {
                background-position: 0% 50%;
            }

            50% {
                background-position: 100% 50%;
            }
        }

        .animate-fade-in-left {
            animation: fadeInLeft 1s ease-out;
        }

        .animate-fade-in-right {
            animation: fadeInRight 1s ease-out;
        }

        .animate-fade-in-up {
            animation: fadeInUp 0.6s ease-out;
        }

        .animate-gradient {
            background-size: 200% 200%;
            animation: gradient 3s ease infinite;
        }

        /* Smooth scrolling */
        html {
            scroll-behavior: smooth;
        }

        /* Hide scrollbar for carousel but keep functionality */
        .carousel-wrapper {
            overflow: hidden;
        }

        /* Custom scrollbar for the page */
        ::-webkit-scrollbar {
            width: 10px;
        }

        ::-webkit-scrollbar-track {
            background: #f1f1f1;
        }

        ::-webkit-scrollbar-thumb {
            background: linear-gradient(to bottom, #dc2626, #eab308);
            border-radius: 5px;
        }

        ::-webkit-scrollbar-thumb:hover {
            background: linear-gradient(to bottom, #b91c1c, #ca8a04);
        }

        /* Line clamp fallback */
        .line-clamp-1 {
            overflow: hidden;
            display: -webkit-box;
            -webkit-line-clamp: 1;
            -webkit-box-orient: vertical;
        }

        .line-clamp-2 {
            overflow: hidden;
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
        }

        .line-clamp-3 {
            overflow: hidden;
            display: -webkit-box;
            -webkit-line-clamp: 3;
            -webkit-box-orient: vertical;
        }
    </style>
@endsection
