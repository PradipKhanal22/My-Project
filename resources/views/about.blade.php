@extends('layouts.master')

@section('content')

<!-- Hero Section with Parallax Effect -->
<header class="relative h-screen bg-gradient-to-br from-gray-900 via-red-900 to-gray-900 overflow-hidden">
    <!-- Background Image with Parallax -->
    <div class="absolute inset-0 overflow-hidden">
        <img src="{{ asset('image.png') }}" alt="RetroKits Nepal" class="absolute inset-0 w-full h-full object-cover opacity-40 transform scale-110 hover:scale-100 transition-transform duration-[2000ms] ease-out">
        <div class="absolute inset-0 bg-gradient-to-b from-black/60 via-black/40 to-black/70"></div>
    </div>

    <!-- Animated Pattern Overlay -->
    <div class="absolute inset-0 opacity-10">
        <div class="absolute inset-0" style="background-image: repeating-linear-gradient(45deg, transparent, transparent 35px, rgba(255,255,255,.1) 35px, rgba(255,255,255,.1) 70px);"></div>
    </div>

    <!-- Content -->
    <div class="relative container mx-auto h-full flex flex-col justify-center items-center text-center text-white px-4 z-10">
        <div class="animate-fade-in-down">
            <span class="inline-block px-6 py-2 bg-red-600/80 backdrop-blur-sm text-white text-sm font-bold rounded-full mb-6 border border-white/20">
                EST. 2024
            </span>
            <h1 class="text-5xl md:text-7xl lg:text-8xl font-black mb-6 drop-shadow-2xl">
                <span class="text-transparent bg-clip-text bg-gradient-to-r from-white via-yellow-200 to-white">About Us</span>
            </h1>
            <p class="text-xl md:text-3xl font-light text-gray-200 max-w-3xl mx-auto mb-8 leading-relaxed">
                Bringing the Glory of Sports History to Nepal
            </p>
            <div class="flex flex-wrap gap-4 justify-center">
                <a href="#mission" class="group inline-flex items-center gap-3 px-8 py-4 bg-gradient-to-r from-red-600 to-yellow-500 text-white font-bold rounded-full transition-all duration-300 shadow-2xl hover:shadow-red-500/50 transform hover:scale-105">
                    <span>Discover Our Story</span>
                    <i class="ri-arrow-down-line text-xl group-hover:translate-y-1 transition-transform"></i>
                </a>
                <a href="{{ route('products') }}" class="inline-flex items-center gap-3 px-8 py-4 bg-white/10 backdrop-blur-sm text-white font-semibold rounded-full border-2 border-white/30 hover:bg-white hover:text-gray-900 transition-all duration-300">
                    <i class="ri-shopping-bag-line text-xl"></i>
                    <span>Shop Collection</span>
                </a>
            </div>
        </div>
    </div>

    <!-- Scroll Indicator -->
    <div class="absolute bottom-8 left-1/2 transform -translate-x-1/2 animate-bounce">
        <i class="ri-mouse-line text-white text-4xl opacity-60"></i>
    </div>

    <!-- Wave Divider -->
    <div class="absolute bottom-0 left-0 right-0">
        <svg viewBox="0 0 1200 120" preserveAspectRatio="none" class="w-full h-16 fill-white">
            <path d="M321.39,56.44c58-10.79,114.16-30.13,172-41.86,82.39-16.72,168.19-17.73,250.45-.39C823.78,31,906.67,72,985.66,92.83c70.05,18.48,146.53,26.09,214.34,3V0H0V27.35A600.21,600.21,0,0,0,321.39,56.44Z"></path>
        </svg>
    </div>
</header>

<!-- Main Content -->
<div class="bg-gradient-to-b from-white via-gray-50 to-white">

    <!-- About RetroKits Section -->
    <section id="about-retroKits" class="py-20 px-4 sm:px-6">
        <div class="container mx-auto max-w-6xl">
            <div class="text-center mb-16 animate-fade-in">
                <span class="inline-block px-4 py-2 bg-red-100 text-red-600 text-sm font-bold rounded-full mb-4">
                    WHO WE ARE
                </span>
                <h2 class="text-4xl md:text-5xl lg:text-6xl font-black mb-6 text-gray-900">
                    About <span class="text-transparent bg-clip-text bg-gradient-to-r from-red-600 to-yellow-500">RetroKits Nepal</span>
                </h2>
                <div class="w-24 h-1 bg-gradient-to-r from-red-600 to-yellow-500 mx-auto mb-8"></div>
            </div>

            <div class="grid md:grid-cols-2 gap-12 items-center">
                <div class="relative group">
                    <div class="absolute -inset-4 bg-gradient-to-r from-red-600 to-yellow-500 rounded-3xl opacity-20 blur-2xl group-hover:opacity-30 transition-opacity duration-500"></div>
                    <img src="{{ asset('home.png') }}" alt="About Us" class="relative rounded-3xl shadow-2xl transform group-hover:scale-105 transition-transform duration-500">
                </div>
                <div class="space-y-6">
                    <p class="text-lg md:text-xl text-gray-700 leading-relaxed">
                        At <strong class="text-red-600">RetroKits Nepal</strong>, we are passionate about sports and the timeless apparel that has been an integral part of sports history.
                    </p>
                    <p class="text-lg text-gray-600 leading-relaxed">
                        Our mission is to bring you the best in retro sportswear, celebrating the heritage and style of iconic sports moments. Each piece in our collection tells a story of legendary athletes and unforgettable victories.
                    </p>
                    <div class="grid grid-cols-2 gap-4 pt-6">
                        <div class="bg-gradient-to-br from-red-50 to-yellow-50 p-6 rounded-2xl border border-red-100">
                            <div class="text-4xl font-black text-red-600 mb-2">500+</div>
                            <div class="text-sm font-semibold text-gray-700">Products</div>
                        </div>
                        <div class="bg-gradient-to-br from-red-50 to-yellow-50 p-6 rounded-2xl border border-red-100">
                            <div class="text-4xl font-black text-red-600 mb-2">100%</div>
                            <div class="text-sm font-semibold text-gray-700">Authentic</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Our Mission -->
    <section id="mission" class="py-20 px-4 sm:px-6 bg-gradient-to-r from-red-600 via-red-500 to-yellow-500 relative overflow-hidden">
        <!-- Background Pattern -->
        <div class="absolute inset-0 opacity-10">
            <div class="absolute inset-0" style="background-image: repeating-linear-gradient(45deg, transparent, transparent 35px, rgba(255,255,255,.2) 35px, rgba(255,255,255,.2) 70px);"></div>
        </div>

        <div class="container mx-auto max-w-5xl relative z-10">
            <div class="text-center text-white">
                <i class="ri-flag-line text-6xl mb-6 inline-block"></i>
                <h2 class="text-4xl md:text-5xl font-black mb-8">
                    Our Mission
                </h2>
                <p class="text-xl md:text-2xl leading-relaxed font-light max-w-3xl mx-auto">
                    Our mission is to offer sports fans and athletes the opportunity to own a piece of sports history. We meticulously source and design our collections to ensure quality, allowing you to relive the glory days of sports with every piece you wear.
                </p>
            </div>
        </div>
    </section>

    <!-- Why Choose Us -->
    <section id="why-choose-us" class="py-20 px-4 sm:px-6">
        <div class="container mx-auto max-w-7xl">
            <div class="text-center mb-16">
                <span class="inline-block px-4 py-2 bg-yellow-100 text-yellow-700 text-sm font-bold rounded-full mb-4">
                    WHY US
                </span>
                <h2 class="text-4xl md:text-5xl font-black mb-6 text-gray-900">
                    Why Choose <span class="text-transparent bg-clip-text bg-gradient-to-r from-red-600 to-yellow-500">RetroKits Nepal</span>?
                </h2>
                <p class="text-lg text-gray-600 max-w-2xl mx-auto">
                    We stand out from the crowd with our commitment to authenticity, quality, and customer satisfaction.
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                <!-- Card 1 -->
                <div class="group bg-white p-8 rounded-3xl shadow-lg hover:shadow-2xl transition-all duration-500 transform hover:-translate-y-3 border-2 border-gray-100 hover:border-red-200 relative overflow-hidden">
                    <div class="absolute top-0 right-0 w-32 h-32 bg-gradient-to-br from-red-100 to-yellow-100 rounded-full -mr-16 -mt-16 opacity-50 group-hover:scale-150 transition-transform duration-500"></div>
                    <div class="relative z-10">
                        <div class="w-16 h-16 bg-gradient-to-br from-red-600 to-red-500 rounded-2xl flex items-center justify-center mb-6 group-hover:scale-110 transition-transform shadow-lg">
                            <i class="fas fa-star text-white text-3xl"></i>
                        </div>
                        <h3 class="text-2xl font-bold mb-4 text-gray-900 group-hover:text-red-600 transition-colors">Expert Curation</h3>
                        <p class="text-gray-600 leading-relaxed">
                            We provide a wide range of retro sports jerseys, training kits, and accessories that reflect the authentic style and spirit of past decades.
                        </p>
                    </div>
                </div>

                <!-- Card 2 -->
                <div class="group bg-white p-8 rounded-3xl shadow-lg hover:shadow-2xl transition-all duration-500 transform hover:-translate-y-3 border-2 border-gray-100 hover:border-red-200 relative overflow-hidden">
                    <div class="absolute top-0 right-0 w-32 h-32 bg-gradient-to-br from-yellow-100 to-red-100 rounded-full -mr-16 -mt-16 opacity-50 group-hover:scale-150 transition-transform duration-500"></div>
                    <div class="relative z-10">
                        <div class="w-16 h-16 bg-gradient-to-br from-yellow-500 to-yellow-400 rounded-2xl flex items-center justify-center mb-6 group-hover:scale-110 transition-transform shadow-lg">
                            <i class="fas fa-heart text-white text-3xl"></i>
                        </div>
                        <h3 class="text-2xl font-bold mb-4 text-gray-900 group-hover:text-red-600 transition-colors">Nostalgic Collection</h3>
                        <p class="text-gray-600 leading-relaxed">
                            As a collector of retro merchandise, RetroKits Nepal is a treasure trove! Our collection truly embodies the nostalgia of classic designs and vintage aesthetics.
                        </p>
                    </div>
                </div>

                <!-- Card 3 -->
                <div class="group bg-white p-8 rounded-3xl shadow-lg hover:shadow-2xl transition-all duration-500 transform hover:-translate-y-3 border-2 border-gray-100 hover:border-red-200 relative overflow-hidden">
                    <div class="absolute top-0 right-0 w-32 h-32 bg-gradient-to-br from-red-100 to-yellow-100 rounded-full -mr-16 -mt-16 opacity-50 group-hover:scale-150 transition-transform duration-500"></div>
                    <div class="relative z-10">
                        <div class="w-16 h-16 bg-gradient-to-br from-red-600 to-yellow-500 rounded-2xl flex items-center justify-center mb-6 group-hover:scale-110 transition-transform shadow-lg">
                            <i class="fas fa-shield-alt text-white text-3xl"></i>
                        </div>
                        <h3 class="text-2xl font-bold mb-4 text-gray-900 group-hover:text-red-600 transition-colors">Quality Assurance</h3>
                        <p class="text-gray-600 leading-relaxed">
                            We blend nostalgic designs with modern quality, appealing to both older generations and younger audiences interested in vintage culture.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Customer Testimonials -->
    <section id="testimonials" class="py-20 px-4 sm:px-6 bg-gradient-to-b from-gray-50 to-white">
        <div class="container mx-auto max-w-6xl">
            <div class="text-center mb-16">
                <span class="inline-block px-4 py-2 bg-green-100 text-green-700 text-sm font-bold rounded-full mb-4">
                    TESTIMONIALS
                </span>
                <h2 class="text-4xl md:text-5xl font-black mb-6 text-gray-900">
                    What Our <span class="text-transparent bg-clip-text bg-gradient-to-r from-red-600 to-yellow-500">Customers Say</span>
                </h2>
                <p class="text-lg text-gray-600 max-w-2xl mx-auto">
                    Don't just take our word for it - hear from our satisfied customers
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                <!-- Testimonial 1 -->
                <div class="group bg-white p-8 rounded-3xl shadow-lg hover:shadow-2xl transition-all duration-500 relative overflow-hidden border-2 border-gray-100 hover:border-yellow-200">
                    <div class="absolute top-0 left-0 w-full h-2 bg-gradient-to-r from-red-600 to-yellow-500 rounded-t-3xl"></div>
                    <div class="absolute top-8 right-8 opacity-10 group-hover:opacity-20 transition-opacity">
                        <i class="ri-double-quotes-r text-8xl text-red-600"></i>
                    </div>
                    <div class="relative z-10">
                        <div class="flex text-yellow-400 mb-4">
                            <i class="ri-star-fill"></i>
                            <i class="ri-star-fill"></i>
                            <i class="ri-star-fill"></i>
                            <i class="ri-star-fill"></i>
                            <i class="ri-star-fill"></i>
                        </div>
                        <p class="text-gray-700 italic mb-6 text-lg leading-relaxed">
                            "As a collector of retro merchandise, RetroKits Nepal is a treasure trove! Their collection truly embodies the nostalgia of classic designs. From old-school sports kits to iconic vintage accessories, their offerings celebrate retro culture in a way that's unmatched in Nepal."
                        </p>
                        <div class="flex items-center gap-4">
                            <div class="w-14 h-14 bg-gradient-to-br from-red-600 to-yellow-500 rounded-full flex items-center justify-center text-white font-bold text-xl shadow-lg">
                                SJ
                            </div>
                            <div>
                                <p class="font-bold text-gray-900">Sarah & James</p>
                                <p class="text-sm text-gray-500 flex items-center gap-1">
                                    <i class="ri-map-pin-line"></i>
                                    New York, USA
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Testimonial 2 -->
                <div class="group bg-white p-8 rounded-3xl shadow-lg hover:shadow-2xl transition-all duration-500 relative overflow-hidden border-2 border-gray-100 hover:border-yellow-200">
                    <div class="absolute top-0 left-0 w-full h-2 bg-gradient-to-r from-red-600 to-yellow-500 rounded-t-3xl"></div>
                    <div class="absolute top-8 right-8 opacity-10 group-hover:opacity-20 transition-opacity">
                        <i class="ri-double-quotes-r text-8xl text-red-600"></i>
                    </div>
                    <div class="relative z-10">
                        <div class="flex text-yellow-400 mb-4">
                            <i class="ri-star-fill"></i>
                            <i class="ri-star-fill"></i>
                            <i class="ri-star-fill"></i>
                            <i class="ri-star-fill"></i>
                            <i class="ri-star-fill"></i>
                        </div>
                        <p class="text-gray-700 italic mb-6 text-lg leading-relaxed">
                            "RetroKits Nepal offers a wide range of vintage and retro-themed apparel and accessories. I love how they cater to niche audiences who appreciate retro styles. The quality of their products is impressive, and their attention to detail makes every purchase feel unique."
                        </p>
                        <div class="flex items-center gap-4">
                            <div class="w-14 h-14 bg-gradient-to-br from-yellow-500 to-red-600 rounded-full flex items-center justify-center text-white font-bold text-xl shadow-lg">
                                AP
                            </div>
                            <div>
                                <p class="font-bold text-gray-900">Anil & Priya</p>
                                <p class="text-sm text-gray-500 flex items-center gap-1">
                                    <i class="ri-map-pin-line"></i>
                                    Kathmandu, Nepal
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Call to Action -->
    <section class="py-20 px-4 sm:px-6">
        <div class="container mx-auto max-w-5xl">
            <div class="bg-gradient-to-r from-red-600 via-red-500 to-yellow-500 rounded-3xl p-12 md:p-16 text-center text-white relative overflow-hidden shadow-2xl">
                <div class="absolute inset-0 opacity-10">
                    <div class="absolute inset-0" style="background-image: repeating-linear-gradient(45deg, transparent, transparent 35px, rgba(255,255,255,.2) 35px, rgba(255,255,255,.2) 70px);"></div>
                </div>
                <div class="relative z-10">
                    <h2 class="text-3xl md:text-5xl font-black mb-6">
                        Ready to Own a Piece of History?
                    </h2>
                    <p class="text-xl mb-8 opacity-90 max-w-2xl mx-auto">
                        Explore our exclusive collection of authentic retro sportswear and relive the glory days.
                    </p>
                    <a href="{{ route('products') }}" class="inline-flex items-center gap-3 px-10 py-4 bg-white text-red-600 font-bold rounded-full hover:bg-gray-100 transition-all duration-300 shadow-xl hover:shadow-2xl transform hover:scale-105">
                        <i class="ri-shopping-bag-3-line text-2xl"></i>
                        <span>Shop Now</span>
                        <i class="ri-arrow-right-line text-xl"></i>
                    </a>
                </div>
            </div>
        </div>
    </section>

</div>

<!-- Enhanced Animations & Styles -->
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

    @keyframes fadeIn {
        from {
            opacity: 0;
        }
        to {
            opacity: 1;
        }
    }

    .animate-fade-in-down {
        animation: fadeInDown 1s ease-out;
    }

    .animate-fade-in-up {
        animation: fadeInUp 1s ease-out;
    }

    .animate-fade-in {
        animation: fadeIn 1.2s ease-out;
    }

    /* Smooth scroll */
    html {
        scroll-behavior: smooth;
    }

    /* Custom gradient animation */
    @keyframes gradient-shift {
        0%, 100% {
            background-position: 0% 50%;
        }
        50% {
            background-position: 100% 50%;
        }
    }

    .animate-gradient {
        background-size: 200% 200%;
        animation: gradient-shift 3s ease infinite;
    }
</style>

@endsection
