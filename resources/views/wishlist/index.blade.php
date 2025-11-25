@extends('layouts.master')

@section('content')

<div class="min-h-screen bg-gray-50 py-12">
    <div class="container mx-auto px-4 sm:px-6 lg:px-20">

        <!-- Header -->
        <div class="mb-10">
            <h1 class="text-4xl font-bold text-gray-900 flex items-center gap-3">
                <i class="ri-heart-3-line text-red-600"></i>
                My Wishlist
            </h1>
            <p class="text-gray-600 mt-2">{{ $wishlists->count() }} {{ $wishlists->count() === 1 ? 'item' : 'items' }} saved for later</p>
        </div>

        @if ($wishlists->isEmpty())
            <!-- Empty Wishlist State -->
            <div class="text-center py-20">
                <div class="w-48 h-48 mx-auto mb-8 bg-gradient-to-br from-red-100 to-red-200 rounded-full flex items-center justify-center">
                    <i class="ri-heart-line text-8xl text-red-400"></i>
                </div>
                <h2 class="text-3xl font-bold text-gray-900 mb-4">Your Wishlist is Empty</h2>
                <p class="text-lg text-gray-600 mb-8">Start adding products you love to keep track of them!</p>
                <a href="{{ route('products') }}"
                   class="inline-flex items-center gap-2 bg-gradient-to-r from-red-600 to-red-500 text-white font-bold px-8 py-4 rounded-xl shadow-lg hover:shadow-xl hover:scale-105 transition-all">
                    <i class="ri-shopping-bag-line text-xl"></i>
                    Browse Products
                </a>
            </div>
        @else
            <!-- Wishlist Grid -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach ($wishlists as $wishlist)
                    <div class="group relative bg-white rounded-2xl overflow-hidden shadow-lg hover:shadow-2xl transition-all duration-500 border border-gray-100 hover:border-transparent transform hover:-translate-y-2">

                        <!-- Product Image -->
                        <div class="relative overflow-hidden bg-gradient-to-br from-gray-50 to-gray-100">
                            <a href="{{ route('products.index', $wishlist->product->id) }}">
                                <div class="aspect-[4/5] relative">
                                    <img src="{{ asset('images/' . $wishlist->product->photopath) }}"
                                         alt="{{ $wishlist->product->name }}"
                                         class="w-full h-full object-cover transition-all duration-700 group-hover:scale-110">

                                    <!-- Overlay -->
                                    <div class="absolute inset-0 bg-black/40 opacity-0 group-hover:opacity-100 transition-opacity duration-400 flex items-center justify-center">
                                        <div class="px-8 py-4 bg-white/95 backdrop-blur-sm rounded-2xl shadow-2xl border border-white/50">
                                            <div class="flex items-center gap-3 text-gray-900 font-bold">
                                                <i class="ri-eye-line text-xl"></i>
                                                <span>View Product</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>

                            <!-- Heart Badge -->
                            <div class="absolute top-4 right-4">
                                <div class="w-12 h-12 bg-white rounded-full shadow-lg flex items-center justify-center">
                                    <i class="ri-heart-fill text-red-600 text-2xl"></i>
                                </div>
                            </div>
                        </div>

                        <!-- Card Content -->
                        <div class="p-6 space-y-4">
                            <!-- Product Name -->
                            <a href="{{ route('products.index', $wishlist->product->id) }}">
                                <h3 class="text-xl font-bold text-gray-900 line-clamp-2 leading-tight hover:text-red-600 transition-colors">
                                    {{ $wishlist->product->name }}
                                </h3>
                            </a>

                            <!-- Description -->
                            <p class="text-sm text-gray-600 line-clamp-2 leading-relaxed">
                                {{ $wishlist->product->description ?? 'No description available.' }}
                            </p>

                            <!-- Price -->
                            <div class="pt-2">
                                <p class="text-2xl font-black text-transparent bg-clip-text bg-gradient-to-r from-red-600 to-red-500">
                                    Rs. {{ number_format($wishlist->product->price) }}
                                </p>
                            </div>

                            <!-- Action Buttons -->
                            <div class="flex gap-3 pt-3">
                                <a href="{{ route('products.index', $wishlist->product->id) }}"
                                   class="flex-1 bg-gradient-to-r from-emerald-500 to-teal-600 hover:from-emerald-600 hover:to-teal-700 text-white font-semibold py-3 px-4 rounded-xl transition-all flex items-center justify-center gap-2 shadow-md hover:shadow-lg group">
                                    <i class="ri-eye-line text-lg group-hover:scale-110 transition-transform"></i>
                                    View
                                </a>

                                <form action="{{ route('wishlist.destroy', $wishlist->product_id) }}" method="POST" class="flex-1">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                            class="w-full bg-red-50 hover:bg-red-600 text-red-600 hover:text-white font-semibold py-3 px-4 rounded-xl transition-all flex items-center justify-center gap-2 border border-red-200 hover:border-red-600 group">
                                        <i class="ri-delete-bin-line text-lg group-hover:scale-110 transition-transform"></i>
                                        Remove
                                    </button>
                                </form>
                            </div>
                        </div>

                        <!-- Shine Effect -->
                        <div class="absolute inset-0 pointer-events-none opacity-0 group-hover:opacity-100 transition-opacity duration-700">
                            <div class="absolute inset-0 bg-gradient-to-tr from-transparent via-white/20 to-transparent -skew-x-12 translate-x-[-150%] group-hover:translate-x-[150%] transition-transform duration-1000"></div>
                        </div>
                    </div>
                @endforeach
            </div>

            <!-- Continue Shopping -->
            <div class="text-center mt-12">
                <a href="{{ route('products') }}"
                   class="inline-flex items-center gap-2 text-gray-600 hover:text-red-600 font-semibold transition-colors">
                    <i class="ri-arrow-left-line"></i>
                    Continue Shopping
                </a>
            </div>
        @endif
    </div>
</div>

@endsection
