@extends('layouts.master')

@section('content')
    <h1 class="text-gray-800 text-5xl text-center font-extrabold mt-16 tracking-wide">
        <i class="ri-shopping-bag-2-fill text-red-600"></i> Our Products
    </h1>

    <!-- Sort by Dropdown -->
    <div class=" ml-8 mb-6 font-extrabold text-gray-900">
        <form method="GET" action="{{ route('products') }}" id="sortForm">
            <select name="sort_by" class=" cursor-pointer px-4 py-3 w-48 border border-gray-300 rounded-md font-medium bg-blue-700 text-white hover:bg-gray-500 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 shadow-md transition-all duration-300 ease-in-out transform hover:scale-105" onchange="document.getElementById('sortForm').submit();">
                <option class="cursor-pointer" value="price_asc" {{ request('sort_by') == 'price_asc' ? 'selected' : '' }}>Price: Low to High</option>
                <option class="cursor-pointer"  value="price_desc" {{ request('sort_by') == 'price_desc' ? 'selected' : '' }}>Price: High to Low</option>
                <option class="cursor-pointer"  value="latest" {{ request('sort_by') == 'latest' ? 'selected' : '' }}>Latest</option>
            </select>
        </form>
    </div>

    <div class="grid lg:grid-cols-4 sm:grid-cols-2 grid-cols-1 gap-10 px-5 py-12 md:px-20 sm:px-10 bg-gradient-to-r from-gray-50 via-white to-gray-100">
        @foreach ($products as $product)
            <a href="{{ route('viewproduct', $product->id) }}" class="flex flex-col rounded-lg shadow-lg bg-white p-6 hover:shadow-2xl transform hover:scale-105 transition duration-300 border border-gray-200">
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
@endsection
