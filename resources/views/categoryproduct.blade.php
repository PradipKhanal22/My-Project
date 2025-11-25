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

<!-- Products Section - Modern Wide Cards -->
<section class="py-20 bg-gradient-to-b from-gray-50 via-white to-gray-50">
    <div class="container mx-auto px-4 sm:px-6 lg:px-8 xl:px-16">
        <!-- Products Grid - 3 Columns with Wider Cards -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-10">
            @foreach ($products as $product)
                <div class="group relative bg-white rounded-3xl overflow-hidden shadow-lg hover:shadow-2xl transition-all duration-500 border border-gray-100 hover:border-transparent transform hover:-translate-y-4">
                    <!-- Image Container -->
                    <div class="relative overflow-hidden bg-gradient-to-br from-gray-50 to-gray-100">
                        <a href="{{ route('viewproduct', $product->id) }}" class="block">
                            <div class="aspect-[4/5] relative">
                                <img src="{{ asset('images/' . $product->photopath) }}"
                                     alt="{{ $product->name }}"
                                     class="w-full h-full object-cover transition-all duration-700 group-hover:scale-110">

                                <!-- Hover Overlay -->
                                <div class="absolute inset-0 bg-black/40 opacity-0 group-hover:opacity-100 transition-opacity duration-400 flex items-end justify-center pb-8">
                                    <div class="px-8 py-4 bg-white/95 backdrop-blur-sm rounded-2xl shadow-2xl border border-white/50">
                                        <div class="flex items-center gap-3 text-gray-900 font-bold">
                                            <i class="ri-eye-line text-xl"></i>
                                            <span>Quick View</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>

                        <!-- Badges -->
                        <div class="absolute top-4 left-4 flex flex-col gap-2">
                            <span class="px-4 py-1.5 bg-gradient-to-r from-red-600 to-pink-600 text-white text-xs font-bold rounded-full shadow-lg">
                                NEW
                            </span>
                            @if($product->discount > 0)
                                <span class="px-4 py-1.5 bg-gradient-to-r from-emerald-500 to-teal-600 text-white text-xs font-bold rounded-full shadow-lg">
                                    -{{ $product->discount }}%
                                </span>
                            @endif
                        </div>
                        @once
                        <script>
                            if (!window.toggleWishlistDefined) {
                                window.toggleWishlistDefined = true;

                                async function toggleWishlist(productId) {
                                    const btn = document.getElementById('wishlist-btn-' + productId);
                                    const icon = document.getElementById('wishlist-icon-' + productId);
                                    const url = "{{ route('wishlist.store') }}"; // create route POST /wishlist/toggle
                                    const token = '{{ csrf_token() }}';

                                    if (!btn || !icon) return;

                                    btn.disabled = true;

                                    try {
                                        const res = await fetch(url, {
                                            method: 'POST',
                                            headers: {
                                                'Content-Type': 'application/json',
                                                'X-CSRF-TOKEN': token,
                                                'Accept': 'application/json'
                                            },
                                            body: JSON.stringify({ product_id: productId })
                                        });

                                        const data = await res.json();

                                        if (!res.ok) throw new Error(data.message || 'Request failed');

                                        // Expecting JSON: { added: true } when added, { added: false } when removed
                                        if (data.added) {
                                            icon.classList.remove('ri-heart-line');
                                            icon.classList.add('ri-heart-fill', 'text-white');
                                            btn.classList.add('bg-red-500', 'text-white');
                                            btn.setAttribute('aria-pressed', 'true');
                                        } else {
                                            icon.classList.remove('ri-heart-fill', 'text-white');
                                            icon.classList.add('ri-heart-line');
                                            btn.classList.remove('bg-red-500', 'text-white');
                                            btn.setAttribute('aria-pressed', 'false');
                                        }
                                    } catch (err) {
                                        console.error(err);
                                        alert('Could not update wishlist. Please try again.');
                                    } finally {
                                        btn.disabled = false;
                                    }
                                }
                            }
                        </script>
                        @endonce
                    </div>

                    <!-- Card Content -->
                    <div class="p-8 space-y-4">
                        <!-- Category -->
                        <div class="flex items-center justify-between">
                            <span class="text-xs font-semibold text-gray-500 uppercase tracking-wider">
                                {{ $product->category->name ?? 'Uncategorized' }}
                            </span>
                            <span class="flex items-center gap-1 text-xs text-emerald-600 font-bold">
                                <i class="ri-check-double-line"></i> In Stock
                            </span>
                        </div>

                        <!-- Title -->
                        <a href="{{ route('viewproduct', $product->id) }}" class="block">
                            <h3 class="text-lg font-extrabold text-gray-900 line-clamp-2 leading-tight hover:text-red-600 transition-colors">
                                {{ $product->name }}
                            </h3>
                        </a>

                        <!-- Short Description -->
                        <p class="text-sm text-gray-600 line-clamp-2 leading-relaxed">
                            {{ Str::limit($product->description, 80) }}
                        </p>

                        <!-- Rating -->
                        <div class="flex items-center gap-2">
                            <div class="flex text-amber-400">
                                @for($i = 1; $i <= 5; $i++)
                                    <i class="ri-star-fill text-xs {{ $i <= 4.5 ? '' : 'text-gray-300' }}"></i>
                                @endfor
                            </div>
                            <span class="text-xs font-semibold text-gray-600">4.8</span>
                            <span class="text-xs text-gray-400">(127)</span>
                        </div>

                        <!-- Price & CTA -->
                        <div class="flex items-center justify-between pt-3">
                            <div>
                                @if($product->old_price)
                                    <p class="text-sm text-gray-500 line-through">Rs. {{ number_format($product->old_price) }}</p>
                                @endif
                                <p class="text-2xl font-black text-transparent bg-clip-text bg-gradient-to-r from-red-600 to-pink-600">
                                    Rs. {{ number_format($product->price) }}
                                </p>
                            </div>
                        </div>
                    </div>

                    <!-- Shine Effect -->
                    <div class="absolute inset-0 pointer-events-none opacity-0 group-hover:opacity-100 transition-opacity duration-700">
                        <div class="absolute inset-0 bg-gradient-to-tr from-transparent via-white/20 to-transparent -skew-x-12 translate-x-[-150%] group-hover:translate-x-[150%] transition-transform duration-1000"></div>
                    </div>

                    <!-- Subtle Glow Border -->
                    <div class="absolute inset-0 rounded-3xl ring-4 ring-transparent group-hover:ring-red-400/20 transition-all duration spontaneous-500 pointer-events-none"></div>
                </div>
            @endforeach
        </div>

        <!-- Empty State -->
        @if($products->isEmpty())
            <div class="text-center py-32">
                <div class="w-40 h-40 mx-auto mb-8 bg-gradient-to-br from-red-100 to-pink-100 rounded-full flex items-center justify-center shadow-2xl">
                    <i class="ri-inbox-line text-8xl text-red-300"></i>
                </div>
                <h2 class="text-4xl font-black text-gray-900 mb-4">No Products Found</h2>
                <p class="text-xl text-gray-600 mb-10 max-w-lg mx-auto">Looks like we're fresh out in this category. Check back soon for new drops!</p>
                <a href="{{ route('products') }}"
                   class="inline-flex items-center gap-3 px-10 py-5 bg-gradient-to-r from-red-600 to-pink-600 text-white font-bold text-lg rounded-full shadow-2xl hover:shadow-red-600/50 transform hover:scale-105 transition-all">
                    <i class="ri-arrow-left-line"></i>
                    Explore All Collections
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
