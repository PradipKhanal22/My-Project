@extends('layouts.master')

@section('content')

<div class="min-h-screen bg-gradient-to-b from-gray-50 via-white to-gray-50 py-12">
    <div class="container mx-auto px-4 sm:px-6 lg:px-20">

        <!-- Header Section -->
        <div class="text-center mb-10">
            <h1 class="text-5xl font-black text-gray-900 flex items-center justify-center gap-4 mb-4">
                <i class="ri-shopping-bag-2-fill text-transparent bg-clip-text bg-gradient-to-r from-red-600 via-orange-500 to-red-600"></i>
                <span class="text-transparent bg-clip-text bg-gradient-to-r from-red-600 via-orange-500 to-red-600">Our Products</span>
            </h1>
            <p class="text-gray-600 text-lg">Discover our exclusive collection of premium sportswear</p>
        </div>

        <!-- Sort by Dropdown -->
        <div class="flex justify-between items-center mb-8">
            <p class="text-gray-700 font-semibold">
                <i class="ri-filter-3-line text-red-600"></i>
                Showing {{ $products->count() }} products
            </p>
            <form method="GET" action="{{ route('products') }}" id="sortForm">
                <div class="relative">
                    <select name="sort_by"
                            class="cursor-pointer px-6 py-3 pr-10 border-2 border-orange-300 rounded-xl font-semibold bg-gradient-to-r from-red-600 to-orange-500 text-white hover:from-red-700 hover:to-orange-600 focus:outline-none focus:ring-4 focus:ring-orange-300 shadow-lg transition-all duration-300 appearance-none"
                            onchange="document.getElementById('sortForm').submit();">
                        <option class="bg-white text-gray-900" value="price_asc" {{ request('sort_by') == 'price_asc' ? 'selected' : '' }}>💰 Price: Low to High</option>
                        <option class="bg-white text-gray-900" value="price_desc" {{ request('sort_by') == 'price_desc' ? 'selected' : '' }}>💎 Price: High to Low</option>
                        <option class="bg-white text-gray-900" value="latest" {{ request('sort_by') == 'latest' ? 'selected' : '' }}>🆕 Latest Products</option>
                    </select>
                    <i class="ri-arrow-down-s-line absolute right-3 top-1/2 -translate-y-1/2 text-white pointer-events-none"></i>
                </div>
            </form>
        </div>

        <!-- Products Grid - 4 Columns -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-8">
            @foreach ($products as $product)
                <div class="group relative bg-white rounded-2xl overflow-hidden shadow-lg hover:shadow-2xl transition-all duration-500 border border-gray-100 hover:border-transparent transform hover:-translate-y-2">

                    <!-- Product Image -->
                    <div class="relative overflow-hidden bg-gradient-to-br from-gray-50 to-gray-100">
                        <a href="{{ route('viewproduct', $product->id) }}">
                            <div class="aspect-[4/5] relative">
                                <img src="{{ asset('images/' . $product->photopath) }}"
                                     alt="{{ $product->name }}"
                                     class="w-full h-full object-cover transition-all duration-700 group-hover:scale-110">

                                <!-- Hover Overlay -->
                                <div class="absolute inset-0 flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                                    <span class="w-12 h-12 flex items-center justify-center bg-white/90 text-red-600 rounded-full shadow-lg">
                                        <i class="ri-eye-line text-2xl"></i>
                                    </span>
                                </div>
                            </div>
                        </a>

                        <!-- Badges -->
                        <div class="absolute top-4 left-4 flex flex-col gap-2">
                            <span class="px-4 py-1.5 bg-gradient-to-r from-red-600 to-orange-500 text-white text-xs font-bold rounded-full shadow-lg">
                                NEW
                            </span>
                        </div>
                    </div>

                    <!-- Card Content -->
                    <div class="p-6 space-y-3">
                        <!-- Product Name -->
                        <a href="{{ route('viewproduct', $product->id) }}">
                            <h2 class="text-lg font-bold text-gray-900 line-clamp-2 leading-tight hover:text-transparent hover:bg-clip-text hover:bg-gradient-to-r hover:from-red-600 hover:to-orange-500 transition-all duration-300">
                                {{ $product->name }}
                            </h2>
                        </a>

                        <!-- Description -->
                        <p class="text-sm text-gray-600 line-clamp-2 leading-relaxed">
                            {{ $product->description }}
                        </p>

                        <!-- Rating -->
                        <div class="flex items-center gap-2">
                            <div class="flex text-orange-400">
                                @for($i = 1; $i <= 5; $i++)
                                    <i class="ri-star-fill text-xs"></i>
                                @endfor
                            </div>
                            <span class="text-xs font-semibold text-gray-600">4.8</span>
                        </div>

                        <!-- Price -->
                        <div class="pt-2">
                            <p class="text-2xl font-black text-transparent bg-clip-text bg-gradient-to-r from-red-600 to-orange-500">
                                Rs. {{ number_format($product->price) }}
                            </p>
                        </div>

                    </div>

                    <!-- Shine Effect -->
                    <div class="absolute inset-0 pointer-events-none opacity-0 group-hover:opacity-100 transition-opacity duration-700">
                        <div class="absolute inset-0 bg-gradient-to-tr from-transparent via-white/20 to-transparent -skew-x-12 translate-x-[-150%] group-hover:translate-x-[150%] transition-transform duration-1000"></div>
                    </div>

                    <!-- Glow Border -->
                    <div class="absolute inset-0 rounded-2xl ring-4 ring-transparent group-hover:ring-orange-400/20 transition-all duration-500 pointer-events-none"></div>
                </div>
            @endforeach
        </div>
    </div>
</div>

@endsection
