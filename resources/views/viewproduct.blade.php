@extends('layouts.master')
@section('content')

<!-- Breadcrumb -->
<div class="bg-gray-50 border-b border-gray-200">
    <div class="container mx-auto px-6 lg:px-20 py-4">
        <nav class="flex items-center gap-2 text-sm text-gray-600">
            <a href="{{ route('home') }}" class="hover:text-red-600 transition">Home</a>
            <i class="ri-arrow-right-s-line"></i>
            <a href="{{ route('products') }}" class="hover:text-red-600 transition">Products</a>
            <i class="ri-arrow-right-s-line"></i>
            <span class="text-gray-900 font-semibold">{{ $product->name }}</span>
        </nav>
    </div>
</div>

<!-- Product Section -->
<div class="container mx-auto px-6 lg:px-20 py-12">
    <div class="grid grid-cols-1 lg:grid-cols-12 gap-10">

        <!-- Product Image Section -->
        <div class="lg:col-span-5">
            <div class="sticky top-24">
                <div class="relative group bg-gradient-to-br from-gray-50 to-gray-100 rounded-3xl overflow-hidden shadow-xl">
                    <img src="{{ asset('images/' . $product->photopath) }}"
                         alt="{{ $product->name }}"
                         class="w-full h-auto object-cover aspect-[4/5] group-hover:scale-105 transition-transform duration-700">

                    <!-- Zoom Hint -->
                    <div class="absolute inset-0 bg-black/0 group-hover:bg-black/10 transition-colors duration-300 flex items-center justify-center">
                        <div class="opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                            <div class="bg-white/90 backdrop-blur-sm px-6 py-3 rounded-full shadow-lg">
                                <i class="ri-zoom-in-line text-gray-900 text-xl"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Product Details Section -->
        <div class="lg:col-span-7 space-y-8">
            <!-- Header -->
            <div class="space-y-4">
                <div class="flex items-center gap-3">
                    <span class="px-4 py-1.5 bg-gradient-to-r from-red-600 to-pink-600 text-white text-xs font-bold rounded-full shadow-lg">
                        NEW ARRIVAL
                    </span>
                    <span class="px-4 py-1.5 bg-emerald-100 text-emerald-700 text-xs font-bold rounded-full">
                        <i class="ri-check-line"></i> IN STOCK
                    </span>
                </div>

                <h1 class="text-4xl lg:text-5xl font-black text-gray-900 leading-tight">
                    {{ $product->name }}
                </h1>

                <!-- Price -->
                <div class="flex items-baseline gap-4">
                    <span class="text-5xl font-black text-transparent bg-clip-text bg-gradient-to-r from-red-600 to-pink-600">
                        Rs. {{ number_format($product->price) }}
                    </span>
                    @if($product->old_price)
                    <span class="text-2xl text-gray-400 line-through">Rs. {{ number_format($product->old_price) }}</span>
                    <span class="px-3 py-1 bg-red-100 text-red-700 text-sm font-bold rounded-lg">
                        Save {{ round((($product->old_price - $product->price) / $product->old_price) * 100) }}%
                    </span>
                    @endif
                </div>

                <!-- Rating -->
                <div class="flex items-center gap-4">
                    <div class="flex text-amber-400 text-lg">
                        @for($i = 1; $i <= 5; $i++)
                            <i class="ri-star-fill"></i>
                        @endfor
                    </div>
                    <span class="text-gray-600 font-medium">4.8 ({{ $reviews->count() }} reviews)</span>
                </div>
            </div>

            <!-- Add to Cart Form -->
            <form action="{{ route('cart.store') }}" method="POST" class="space-y-6">
                @csrf
                <input type="hidden" name="product_id" value="{{ $product->id }}">

                <!-- Quantity Selector -->
                <div class="space-y-3">
                    <label class="text-sm font-bold text-gray-700 uppercase tracking-wide">Quantity</label>
                    <div class="flex items-center gap-4">
                        <div class="flex items-center bg-gray-100 rounded-xl overflow-hidden border-2 border-gray-200">
                            <button type="button"
                                    onclick="decreaseqty()"
                                    class="px-6 py-4 bg-white hover:bg-gray-50 text-gray-700 font-bold text-xl transition">
                                <i class="ri-subtract-line"></i>
                            </button>
                            <input type="text"
                                   name="quantity"
                                   id="quantity"
                                   value="1"
                                   readonly
                                   class="w-20 py-4 text-center text-xl font-bold bg-gray-100 border-0 focus:outline-none">
                            <button type="button"
                                    onclick="increaseqty()"
                                    class="px-6 py-4 bg-white hover:bg-gray-50 text-gray-700 font-bold text-xl transition">
                                <i class="ri-add-line"></i>
                            </button>
                        </div>
                        <span class="text-gray-600 font-medium">
                            <span id="stock" class="font-bold text-emerald-600">{{ $product->stock }}</span> available
                        </span>
                    </div>
                </div>

                <!-- Action Buttons -->
                <div class="flex flex-col sm:flex-row gap-4">
                    <button type="submit"
                            class="flex-1 bg-gradient-to-r from-red-600 via-red-500 to-pink-600 hover:from-red-700 hover:via-red-600 hover:to-pink-700 text-white font-bold py-5 px-8 rounded-xl shadow-lg hover:shadow-2xl hover:scale-[1.02] transition-all duration-300 flex items-center justify-center gap-3 group">
                        <i class="ri-shopping-cart-line text-2xl group-hover:scale-110 transition-transform"></i>
                        <span class="text-lg">Add to Cart</span>
                    </button>
                </div>
            </form>

            <!-- Wishlist Button -->
            <form action="{{ route('wishlist.store') }}" method="POST">
                @csrf
                <input type="hidden" name="product_id" value="{{ $product->id }}">
                <button type="submit"
                        class="w-full border-2 border-red-600 text-red-600 hover:bg-red-600 hover:text-white font-bold py-5 px-8 rounded-xl shadow-md hover:shadow-xl transition-all duration-300 flex items-center justify-center gap-3 group">
                    <i class="ri-heart-line text-2xl group-hover:scale-110 transition-transform"></i>
                    <span class="text-lg">Add to Wishlist</span>
                </button>
            </form>

            <!-- Features -->
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                <div class="bg-gradient-to-br from-emerald-50 to-teal-50 p-6 rounded-2xl border border-emerald-200">
                    <div class="flex items-center gap-4">
                        <div class="w-12 h-12 bg-emerald-500 rounded-full flex items-center justify-center">
                            <i class="ri-truck-line text-white text-xl"></i>
                        </div>
                        <div>
                            <p class="text-lg font-bold text-emerald-900">Free Delivery</p>
                            <p class="text-sm text-emerald-700">Delivery in 1-2 days</p>
                        </div>
                    </div>
                </div>

                <div class="bg-gradient-to-br from-amber-50 to-yellow-50 p-6 rounded-2xl border border-amber-200">
                    <div class="flex items-center gap-4">
                        <div class="w-12 h-12 bg-amber-500 rounded-full flex items-center justify-center">
                            <i class="ri-arrow-left-right-line text-white text-xl"></i>
                        </div>
                        <div>
                            <p class="text-lg font-bold text-amber-900">7 Days Return</p>
                            <p class="text-sm text-amber-700">Hassle-free returns</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Description -->
            <div class="bg-gray-50 rounded-2xl p-8 border border-gray-200">
                <h2 class="text-2xl font-black text-gray-900 mb-4 flex items-center gap-3">
                    <i class="ri-file-text-line text-red-600"></i>
                    Product Description
                </h2>
                <p class="text-gray-700 leading-relaxed text-lg">
                    {{ $product->description }}
                </p>
            </div>
        </div>
    </div>
</div>

<!-- Reviews Section -->
<div class="container mx-auto px-6 lg:px-20 py-16 bg-gray-50">
    <div class="text-center mb-12">
        <h2 class="text-4xl font-black text-gray-900 mb-4 flex items-center justify-center gap-3">
            <i class="ri-chat-3-line text-red-600"></i>
            Customer Reviews
        </h2>
        <p class="text-gray-600 text-lg">See what our customers are saying</p>
    </div>

    @if ($reviews->count() > 0)
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        @foreach($reviews as $review)
        <div class="bg-white rounded-2xl shadow-lg hover:shadow-xl transition-all duration-300 p-8 border border-gray-100 hover:border-red-200">
            <!-- User Info -->
            <div class="flex items-center gap-4 mb-6">
                <div class="w-14 h-14 bg-gradient-to-br from-red-500 to-pink-500 rounded-full flex items-center justify-center text-white text-xl font-bold shadow-lg">
                    {{ substr($review->user->name, 0, 1) }}
                </div>
                <div>
                    <h3 class="text-lg font-bold text-gray-900">{{ $review->user->name }}</h3>
                    <div class="flex text-amber-400 text-sm">
                        @for($i = 1; $i <= 5; $i++)
                            <i class="ri-star-{{ $i <= $review->rating ? 'fill' : 'line' }}"></i>
                        @endfor
                    </div>
                </div>
            </div>

            <!-- Review Text -->
            <p class="text-gray-700 leading-relaxed">{{ $review->review }}</p>

            <!-- Date -->
            <div class="mt-4 pt-4 border-t border-gray-100">
                <span class="text-sm text-gray-500">
                    <i class="ri-time-line"></i> {{ $review->created_at->diffForHumans() }}
                </span>
            </div>
        </div>
        @endforeach
    </div>
    @else
    <div class="max-w-2xl mx-auto">
        <div class="bg-white rounded-2xl p-12 text-center shadow-lg border border-gray-100">
            <div class="w-24 h-24 bg-gray-100 rounded-full flex items-center justify-center mx-auto mb-6">
                <i class="ri-chat-off-line text-5xl text-gray-400"></i>
            </div>
            <h3 class="text-2xl font-bold text-gray-900 mb-3">No Reviews Yet</h3>
            <p class="text-gray-600 text-lg">Be the first to share your thoughts about this product!</p>
        </div>
    </div>
    @endif
</div>

<!-- Add Review Form -->
@auth
<div class="container mx-auto px-6 lg:px-20 py-16">
    @php
        $user_id = auth()->user()->id;
        $count = \App\Models\Order::where('user_id', $user_id)->where('product_id', $product->id)->count();
    @endphp
    @if($count > 0)
    <div class="max-w-4xl mx-auto">
        <div class="text-center mb-10">
            <h2 class="text-4xl font-black text-gray-900 mb-4 flex items-center justify-center gap-3">
                <i class="ri-edit-box-line text-red-600"></i>
                Share Your Experience
            </h2>
            <p class="text-gray-600 text-lg">Your feedback helps others make informed decisions</p>
        </div>

        <div class="bg-white rounded-3xl shadow-2xl p-10 border border-gray-100">
            <form action="{{ route('reviews.store') }}" method="POST" class="space-y-8">
                @csrf
                <input type="hidden" name="product_id" value="{{ $product->id }}">

                <!-- Review Text -->
                <div class="space-y-3">
                    <label for="review" class="text-lg font-bold text-gray-900 flex items-center gap-2">
                        <i class="ri-message-3-line text-red-600"></i>
                        Your Review
                    </label>
                    <textarea id="review"
                              name="review"
                              rows="5"
                              class="w-full p-5 border-2 border-gray-200 rounded-xl focus:ring-4 focus:ring-red-100 focus:border-red-500 focus:outline-none transition-all text-gray-700 placeholder-gray-400"
                              placeholder="Tell us about your experience with this product..."
                              required></textarea>
                </div>

                <!-- Rating -->
                <div class="space-y-3">
                    <label class="text-lg font-bold text-gray-900 flex items-center gap-2">
                        <i class="ri-star-line text-red-600"></i>
                        Your Rating
                    </label>
                    <div id="starRating" class="flex items-center gap-2">
                        @for($i = 1; $i <= 5; $i++)
                        <label class="cursor-pointer">
                            <input type="radio" name="rating" value="{{ $i }}" class="hidden peer" required>
                            <i class="ri-star-fill text-4xl text-gray-300 hover:text-amber-400 peer-checked:text-amber-400 transition-all duration-200 star"></i>
                        </label>
                        @endfor
                    </div>
                    <p class="text-sm text-gray-500">Click on a star to rate</p>
                </div>

                <!-- Submit Button -->
                <div class="flex justify-center pt-4">
                    <button type="submit"
                            class="bg-gradient-to-r from-red-600 via-red-500 to-pink-600 hover:from-red-700 hover:via-red-600 hover:to-pink-700 text-white font-bold py-5 px-12 rounded-xl shadow-lg hover:shadow-2xl hover:scale-105 transition-all duration-300 flex items-center gap-3 text-lg group">
                        <i class="ri-send-plane-fill text-xl group-hover:translate-x-1 transition-transform"></i>
                        Submit Review
                    </button>
                </div>
            </form>
        </div>
    </div>
    @else
    <div class="max-w-2xl mx-auto">
        <div class="bg-gradient-to-br from-amber-50 to-yellow-50 rounded-2xl p-10 text-center border-2 border-amber-200">
            <div class="w-20 h-20 bg-amber-500 rounded-full flex items-center justify-center mx-auto mb-6">
                <i class="ri-shopping-bag-line text-white text-4xl"></i>
            </div>
            <h3 class="text-2xl font-bold text-gray-900 mb-3">Purchase Required</h3>
            <p class="text-gray-700 text-lg mb-6">
                Please purchase this product to leave a review and share your experience with others.
            </p>
            <a href="{{ route('products') }}"
               class="inline-flex items-center gap-2 bg-gradient-to-r from-red-600 to-pink-600 text-white font-bold py-4 px-8 rounded-xl hover:from-red-700 hover:to-pink-700 transition-all shadow-lg hover:shadow-xl">
                <i class="ri-arrow-left-line"></i>
                Continue Shopping
            </a>
        </div>
    </div>
    @endif
</div>
@endauth

<!-- Related Products Section -->
<div class="container mx-auto px-6 lg:px-20 py-16 bg-gray-50">
    <div class="text-center mb-12">
        <h2 class="text-4xl font-black text-gray-900 mb-4 flex items-center justify-center gap-3">
            <i class="ri-archive-line text-red-600"></i>
            You May Also Like
        </h2>
        <p class="text-gray-600 text-lg">Discover similar products from our collection</p>
    </div>

    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8">
        @foreach ($relatedproducts as $relatedproduct)
        <div class="group relative bg-white rounded-3xl overflow-hidden shadow-lg hover:shadow-2xl transition-all duration-500 border border-gray-100 hover:border-transparent transform hover:-translate-y-2">
            <a href="{{ route('viewproduct', $relatedproduct->id) }}" class="block">
                <!-- Image -->
                <div class="relative overflow-hidden bg-gradient-to-br from-gray-50 to-gray-100">
                    <div class="aspect-[4/5] relative">
                        <img src="{{ asset('images/' . $relatedproduct->photopath) }}"
                             alt="{{ $relatedproduct->name }}"
                             class="w-full h-full object-cover transition-all duration-700 group-hover:scale-110">

                        <!-- Overlay -->
                        <div class="absolute inset-0 bg-gradient-to-t from-black/60 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-400"></div>
                    </div>
                </div>

                <!-- Content -->
                <div class="p-6 space-y-3">
                    <h3 class="text-lg font-bold text-gray-900 line-clamp-2 leading-tight group-hover:text-red-600 transition-colors">
                        {{ $relatedproduct->name }}
                    </h3>

                    <div class="flex items-center justify-between">
                        <span class="text-2xl font-black text-transparent bg-clip-text bg-gradient-to-r from-red-600 to-pink-600">
                            Rs. {{ number_format($relatedproduct->price) }}
                        </span>
                        <div class="flex items-center gap-1 text-amber-400 text-sm">
                            <i class="ri-star-fill"></i>
                            <span class="font-semibold text-gray-600">4.8</span>
                        </div>
                    </div>

                    <div class="opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                        <span class="inline-flex items-center gap-2 text-red-600 font-semibold text-sm">
                            View Details
                            <i class="ri-arrow-right-line group-hover:translate-x-1 transition-transform"></i>
                        </span>
                    </div>
                </div>
            </a>
        </div>
        @endforeach
    </div>
</div>

<!-- Quantity Adjust Script -->
<script>
    function increaseqty() {
        let quantity = parseInt(document.getElementById('quantity').value);
        const stock = parseInt(document.getElementById('stock').innerText);
        if (quantity < stock) {
            quantity++;
            document.getElementById('quantity').value = quantity;
        }
    }

    function decreaseqty() {
        let quantity = parseInt(document.getElementById('quantity').value);
        if (quantity > 1) {
            quantity--;
            document.getElementById('quantity').value = quantity;
        }
    }

    // Star rating interactive
    document.addEventListener('DOMContentLoaded', function() {
        const starInputs = document.querySelectorAll('input[name="rating"]');
        const stars = document.querySelectorAll('#starRating .star');

        starInputs.forEach((input, index) => {
            input.addEventListener('change', function() {
                stars.forEach((star, i) => {
                    if (i <= index) {
                        star.classList.remove('text-gray-300');
                        star.classList.add('text-amber-400');
                    } else {
                        star.classList.remove('text-amber-400');
                        star.classList.add('text-gray-300');
                    }
                });
            });
        });
    });
</script>
@endsection
