@extends('layouts.master')
@section('content')
    <img src="{{ asset('image.jpg') }}" alt="" class="w-full h-88">
    <h1 class="text-blue-800 text-4xl text-center font-bold mt-10">Search Products for {{ $qry }}</h1>

    <div class="grid grid-cols-4 gap-10 px-20 py-12">
        @forelse ($products as $product)
            <div
                class="rounded-lg shadow-md p-4 cursor-pointer hover:shadow-lg transform hover:scale-105 transition duration-300">
                <img src="{{ asset('images/' . $product->photopath) }}" alt="" class="h-44 w-full object-cover">
                <h1 class="text-gray-600">{{ $product->name }}</h1>
                <p class="text-gray-500 line-clamp-3">{{ $product->description }}</p>
                <div class="flex justify-between items-center mt-4">
                    <h1 class="text-xl font-bold">RS.{{ $product->price }}</h1>
                    <a href="{{ route('viewproduct', $product->id) }}"
                        class="bg-gradient-to-r from-red-700 via-yellow-400 to-blue-600 text-white px-3 py-1.5 rounded-lg">View
                        Product</a>
                </div>
            </div>
            @empty
                <!-- No Results Section -->
                <div class="col-span-full text-center">
                    <img src="{{ asset('no-results.png') }}" alt="No Results Found" class="mx-auto w-1/3 h-auto mb-6">
                    <h2 class="text-4xl font-bold text-gray-500">No Products Found</h2>
                    <p class="text-lg text-gray-600 mt-4">Try adjusting your search or explore our <a
                            href="{{ route('products') }}" class="text-indigo-600 font-bold hover:underline">available
                            Products</a>.</p>
                </div>
            @endforelse
        </div>
    @endsection
