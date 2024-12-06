@extends('layouts.master')
@section('content')
        <div class=" flex justify-between items-center h-screen px-20">
            <div class="w-100 ">
                <h1 class="font-bold text-5xl font-serif">Welcome to <span class="text-red-600">RetroKits Nepal</span></h1>
                <p class="text-lg max-w-3xl mx-auto my-4">
                    Our mission is to offer sports fans and athletes the opportunity to own a piece of sports history. We meticulously source and design our collections to ensure authenticity and quality, allowing you to relive the glory days of sports with every piece you wear.
                </p>
                <button class="px-4 py-2 bg-red-500 text-white rounded-lg font-bold hover:bg-slate-200 hover:text-red-500 cursor-pointer">Learn More</button>
            </div>
            <div class="w-100">
            <img src="{{ asset('home.png') }}" class=" w-70 h-96 transform scale-x-[-1]" alt="">
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
