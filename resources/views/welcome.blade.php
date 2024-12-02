@extends('layouts.master')
@section('content')
    <div class="mt-1">
        <div class="relative w-full">
            <img src="{{ asset('photo.jpg') }}" class=" w-full rounded-lg" alt="">
            <div class="absolute inset-0 flex items-center max-w-md h-64">
                <h2 class="text-black bg-white text-2xl font-bold p-4 rounded-xl">
                    <div class=" mt-0">
                        <h1 class="font-bold text-4xl font-serif">VISIT US IN KAWASOTI</h1>
                    </div>
                </h2>
            </div>
        </div>
    </div>
    <h1 class="text-blue-800 text-4xl text-center font-bold mt-10">Our Products</h1>
    <div class="grid lg:grid-cols-4 sm:grid-cols-2 grid-cols-1 gap-10 md:px-20 sm:px-10 px-5 py-12 cursor-pointer">
        @foreach ($products as $product)
            <div class="rounded-lg shadow-md p-4 hover:shadow-lg transform hover:scale-105 transition duration-300">
                <img src="{{ asset('images/' . $product->photopath) }}" alt="" class="h-44 w-full object-cover ">
                <h1 class="text-gray-600">{{ $product->name }}</h1>
                <p class="text-gray-500 line-clamp-3">{{ $product->description }}</p>
                <div class="flex justify-between items-center mt-4">
                    <h1 class="text-xl font-bold">RS. {{ $product->price }}</h1>
                    <a href="{{ route('viewproduct', $product->id) }}"
                        class="bg-gradient-to-r from-red-700 to-yellow-400 text-white px-3 py-1.5 rounded-lg">View
                        Product</a>
                </div>
            </div>
        @endforeach
    </div>
@endsection
