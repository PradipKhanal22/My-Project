@extends('layouts.master')
@section('content')

<!-- Category Hero Section -->
<div class="relative h-80 overflow-hidden bg-gradient-to-br from-gray-900 via-red-900 to-gray-900">

    <!-- Animated Background Pattern -->
    <div class="absolute inset-0 opacity-10">
        <div class="absolute inset-0" style="background-image: repeating-linear-gradient(45deg, transparent, transparent 35px, rgba(255,255,255,.1) 35px, rgba(255,255,255,.1) 70px);"></div>
    </div>

    <!-- Content -->
    <div class="relative z-10 container mx-auto px-4 h-full flex flex-col justify-center items-center text-center">
        <div class="animate-fade-in-up">
            <!-- Breadcrumb -->
            <nav class="mb-4">
                <ol class="flex items-center justify-center gap-2 text-sm text-gray-300">
                    <li><a href="{{ route('home') }}" class="hover:text-white transition-colors">Home</a></li>
                    <li><i class="ri-arrow-right-s-line"></i></li>
                    <li><a href="{{ route('products') }}" class="hover:text-white transition-colors">Products</a></li>
                    <li><i class="ri-arrow-right-s-line"></i></li>
                    <li class="text-red-500 font-semibold">{{ $category->name }}</li>
                </ol>
            </nav>

            <!-- Category Title -->
            <h1 class="text-4xl md:text-6xl font-extrabold text-white mb-4 drop-shadow-lg">
                {{ $category->name }} <span class="text-transparent bg-clip-text bg-gradient-to-r from-red-500 to-yellow-400">Collection</span>
            </h1>

            <!-- Description -->
            <p class="text-lg md:text-xl text-gray-300 max-w-2xl mx-auto mb-6">
                Explore our curated selection of authentic {{ strtolower($category->name) }} products
            </p>

            <!-- Product Count -->
            <div class="inline-flex items-center gap-2 bg-white/10 backdrop-blur-sm px-6 py-3 rounded-full border border-white/20">
                <i class="ri-shopping-bag-3-line text-red-500 text-xl"></i>
                <span class="text-white font-semibold">{{ $products->count() }} Products Available</span>
            </div>
        </div>
    </div>

    <!-- Decorative Elements -->
    <div class="absolute bottom-0 left-0 right-0">
        <svg viewBox="0 0 1200 120" preserveAspectRatio="none" class="w-full h-16 fill-white">
            <path d="M321.39,56.44c58-10.79,114.16-30.13,172-41.86,82.39-16.72,168.19-17.73,250.45-.39C823.78,31,906.67,72,985.66,92.83c70.05,18.48,146.53,26.09,214.34,3V0H0V27.35A600.21,600.21,0,0,0,321.39,56.44Z"></path>
        </svg>
    </div>
</div>

<!-- Products Section -->
<section class="py-16 bg-gradient-to-b from-white to-gray-50">
    <div class="container mx-auto px-4 sm:px-6 lg:px-20">
        <!-- Filter & Sort Bar -->
        <div class="flex flex-col sm:flex-row justify-between items-center mb-12 gap-4 bg-white p-6 rounded-2xl shadow-md border border-gray-100">
            <div class="flex items-center gap-3 text-gray-700">
                <div class="w-10 h-10 bg-red-100 rounded-full flex items-center justify-center">
                    <i class="ri-filter-3-line text-xl text-red-600"></i>
                </div>
                <div>
                    <p class="text-sm text-gray-500">Results</p>
                    <p class="font-bold text-lg">{{ $products->count() }} Products</p>
                </div>
            </div>

            <div class="flex items-center gap-3">
                <label for="sort" class="text-gray-700 font-semibold flex items-center gap-2">
                    <i class="ri-sort-desc text-xl"></i>
                    Sort By:
                </label>
                <select id="sort" class="px-5 py-2.5 border-2 border-gray-200 rounded-xl focus:outline-none focus:border-red-600 bg-white cursor-pointer hover:border-gray-300 transition-all font-medium text-gray-700">
                    <option>Latest</option>
                    <option>Price: Low to High</option>
                    <option>Price: High to Low</option>
                    <option>Name: A to Z</option>
                </select>
            </div>
        </div>

        <!-- Products Grid -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
            @foreach ($products as $product)
            <div class="group relative bg-white rounded-3xl shadow-md hover:shadow-2xl transition-all duration-500 overflow-hidden border-2 border-gray-100 hover:border-red-300 transform hover:-translate-y-3">

                <!-- Product Image Container -->
                <a href="{{ route('viewproduct', $product->id) }}" class="block relative overflow-hidden bg-gradient-to-br from-gray-50 to-gray-100">
                    <div class="aspect-[4/5] overflow-hidden">
                        <img src="{{ asset('images/' . $product->photopath) }}"
                             alt="{{ $product->name }}"
                             class="w-full h-full object-cover group-hover:scale-110 group-hover:rotate-2 transition-all duration-700">
                    </div>

                    <!-- Gradient Overlay on Hover -->
                    <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/40 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-400">
                        <div class="absolute bottom-6 left-1/2 -translate-x-1/2 w-full px-4">
                            <div class="inline-flex items-center gap-2 px-6 py-3 bg-white text-gray-900 font-bold rounded-full text-sm shadow-xl w-full justify-center">
                                <i class="ri-eye-line text-lg"></i>
                                <span>Quick View</span>
                            </div>
                        </div>
                    </div>

                    <!-- Badges -->
                    <div class="absolute top-3 left-3 flex flex-col gap-2">
                        <span class="inline-block px-3 py-1.5 bg-gradient-to-r from-red-600 to-red-500 text-white text-xs font-bold rounded-full shadow-lg backdrop-blur-sm">
                            NEW ARRIVAL
                        </span>
                    </div>

                    <!-- Wishlist Button -->
                    <button onclick="event.preventDefault();" class="absolute top-3 right-3 w-11 h-11 bg-white/95 hover:bg-red-600 rounded-full flex items-center justify-center shadow-lg transition-all duration-300 group/heart backdrop-blur-sm hover:scale-110">
                        <i class="ri-heart-line text-gray-700 group-hover/heart:text-white transition-colors text-lg"></i>
                    </button>
                </a>

                <!-- Product Details -->
                <div class="p-5">
                    <!-- Category & Stock Status -->
                    <div class="flex items-center justify-between mb-3">
                        <span class="inline-block px-3 py-1 bg-gradient-to-r from-gray-100 to-gray-50 text-gray-700 text-xs font-bold rounded-full border border-gray-200">
                            {{ $category->name }}
                        </span>
                        <span class="inline-flex items-center gap-1 text-xs text-green-600 font-semibold">
                            <i class="ri-check-line"></i>
                            In Stock
                        </span>
                    </div>

                    <!-- Product Name -->
                    <a href="{{ route('viewproduct', $product->id) }}">
                        <h2 class="text-base font-extrabold text-gray-900 group-hover:text-red-600 transition-colors duration-300 line-clamp-2 mb-3 leading-snug min-h-[2.5rem]">
                            {{ $product->name }}
                        </h2>
                    </a>

                    <!-- Product Description -->
                    <p class="text-gray-600 text-xs leading-relaxed line-clamp-2 mb-4 min-h-[2.5rem]">
                        {{ $product->description }}
                    </p>

                    <!-- Rating & Reviews -->
                    <div class="flex items-center justify-between mb-4 pb-4 border-b border-gray-100">
                        <div class="flex items-center gap-1">
                            <div class="flex text-yellow-400">
                                <i class="ri-star-fill text-sm"></i>
                                <i class="ri-star-fill text-sm"></i>
                                <i class="ri-star-fill text-sm"></i>
                                <i class="ri-star-fill text-sm"></i>
                                <i class="ri-star-half-fill text-sm"></i>
                            </div>
                            <span class="text-xs text-gray-600 ml-1 font-semibold">4.5</span>
                        </div>
                        <span class="text-xs text-gray-500">(127 reviews)</span>
                    </div>

                    <!-- Price and CTA -->
                    <div class="flex items-end justify-between gap-3">
                        <div class="flex-1">
                            <p class="text-xs text-gray-500 mb-1 font-medium">Price</p>
                            <div class="flex items-baseline gap-2">
                                <span class="text-2xl font-black text-transparent bg-clip-text bg-gradient-to-r from-red-600 to-red-500">
                                    Rs. {{ number_format($product->price) }}
                                </span>
                            </div>
                        </div>
                        <a href="{{ route('viewproduct', $product->id) }}" class="group/btn flex-shrink-0 bg-gradient-to-r from-red-600 via-red-500 to-red-600 text-white px-5 py-3 rounded-xl hover:from-red-700 hover:via-red-600 hover:to-red-700 transition-all shadow-lg hover:shadow-xl transform hover:scale-105 flex items-center gap-2 font-bold text-sm">
                            <i class="ri-shopping-cart-line text-lg group-hover/btn:animate-bounce"></i>
                            <span class="hidden sm:inline">Add</span>
                        </a>
                    </div>
                </div>

                <!-- Enhanced Shine Effect -->
                <div class="absolute inset-0 -translate-x-full group-hover:translate-x-full transition-transform duration-1000 bg-gradient-to-r from-transparent via-white/30 to-transparent skew-x-12 pointer-events-none"></div>

                <!-- Border Glow Effect -->
                <div class="absolute inset-0 rounded-3xl opacity-0 group-hover:opacity-100 transition-opacity duration-500 pointer-events-none" style="box-shadow: inset 0 0 20px rgba(220, 38, 38, 0.2);"></div>
            </div>
            @endforeach
        </div>

        <!-- Empty State -->
        @if($products->isEmpty())
        <div class="text-center py-20">
            <div class="inline-flex items-center justify-center w-32 h-32 bg-gradient-to-br from-red-50 to-yellow-50 rounded-full mb-6 shadow-inner">
                <i class="ri-shopping-bag-line text-6xl text-red-400"></i>
            </div>
            <h3 class="text-3xl font-extrabold text-gray-900 mb-3">No Products Found</h3>
            <p class="text-gray-600 mb-8 text-lg max-w-md mx-auto">We couldn't find any products in this category. Try exploring other collections!</p>
            <a href="{{ route('products') }}" class="inline-flex items-center gap-3 bg-gradient-to-r from-red-600 to-yellow-500 text-white font-bold px-10 py-4 rounded-full hover:shadow-2xl transform hover:scale-105 transition-all shadow-lg">
                <i class="ri-arrow-left-line text-xl"></i>
                <span>Browse All Products</span>
            </a>
        </div>
        @endif
    </div>
</section>

<!-- Custom CSS for Animations -->
<style>
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

    .animate-fade-in-up {
        animation: fadeInUp 0.8s ease-out;
    }

    /* Line clamp utilities */
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
