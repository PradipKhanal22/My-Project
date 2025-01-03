@extends('layouts.master')

@section('content')
    <h1 class="text-gray-800 text-5xl text-center font-extrabold mt-16 tracking-wide">
        <i class="ri-shopping-bag-2-fill text-red-600"></i> Our Products
    </h1>

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
