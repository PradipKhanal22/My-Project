@extends('layouts.master')
@section('content')
<div class=" py-5 text-gray-900">
    <p class="text-center text-xl font-extrabold text-gray-600">Discover premium quality and unmatched style in our exclusive collection.!</p>
<!-- Product Section -->
<div class="grid grid-cols-4 px-20 my-10 gap-10">
    <!-- Product Image Section -->
    <div class="col-span-1 hover:shadow-2xl transform hover:scale-105 transition duration-300 cursor-pointer">
        <img src="{{ asset('images/' . $product->photopath) }}" alt="Product Image" class="h-88 w-full object-cover rounded-lg">
    </div>

    <!-- Product Details Section -->
    <div class="col-span-2 px-6 border-x-2 border-gray-200">
        <h1 class="text-4xl font-extrabold text-gray-800 font-serif">{{ $product->name }}</h1>
        <h1 class="text-3xl font-semibold text-green-600 mt-4">Rs. {{ $product->price }}</h1>
        <form action="{{ route('cart.store') }}" method="POST" class="mt-6">
            @csrf
            <div class="flex items-center space-x-4">
                <button type="button" class="py-2 bg-blue-600 text-white px-4 text-xl rounded-md hover:bg-blue-700 transition duration-200" onclick="decreaseqty()">-</button>
                <input type="text" name="quantity" class="w-16 py-2 text-center border border-gray-300 rounded-md" value="1" readonly id="quantity">
                <input type="hidden" name="product_id" value="{{ $product->id }}">
                <button type="button" class="py-2 bg-blue-600 text-white px-4 text-xl rounded-md hover:bg-blue-700 transition duration-200" onclick="increaseqty()">+</button>
            </div>
            <p class="text-gray-600 mt-2">In Stock: <span id="stock" class="text-black font-semibold">{{ $product->stock }}</span></p>
            <button type="submit" class="mt-6 bg-gradient-to-r from-red-500 to-yellow-400 text-white font-bold px-5 py-2 rounded-lg shadow-lg hover:from-yellow-400 hover:to-red-500 transition duration-300">Add to Cart</button>
        </form>

        <form action="{{ route('wishlist.store') }}" method="POST">
            @csrf
            <input type="hidden" name="product_id" value="{{ $product->id }}">
            <button type="submit">Add to Wishlist</button>
        </form>

    </div>

    <!-- Delivery Details Section -->
    <div class="col-span-1 space-y-4">
        <div class="bg-green-100 p-6 rounded-lg shadow-md hover:shadow-lg transition duration-300">
            <p class="text-lg font-semibold text-green-800">Free Delivery</p>
            <p class="text-sm text-gray-600">Delivery in 2-3 days</p>
        </div>
        <div class="bg-yellow-100 p-6 rounded-lg shadow-md hover:shadow-lg transition duration-300">
            <p class="text-lg font-semibold text-yellow-800">7 Days Return Policy</p>
            <p class="text-sm text-gray-600">Hassle-free returns within 7 days</p>
        </div>
    </div>
</div>

<!-- Product Description Section -->
<div class="px-20 my-12">
    <h1 class="text-2xl font-bold text-gray-800">Description</h1>
    <p class="mt-4 text-lg font-semibold text-gray-600">{{ $product->description }}</p>
</div>

<!-- Reviews Section -->
<div class="mt-12 px-20">
    <h2 class="text-3xl font-bold text-gray-900 mb-4">User Reviews</h2>
    @if ($reviews->count() > 0)
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        @foreach($reviews as $review)
        <div class="bg-white rounded-lg shadow-md p-6 hover:shadow-lg transition duration-300">
            <div class="flex items-center mb-4">
                <div class="mr-4">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="w-8 h-8 text-yellow-400" viewBox="0 0 24 24">
                        <path d="M12 .587l3.668 7.431 8.215 1.192-5.945 5.798 1.402 8.192L12 18.902l-7.34 3.798 1.402-8.192L.873 9.21l8.215-1.192L12 .587z" />
                    </svg>
                </div>
                <h3 class="text-xl font-bold text-gray-800">{{ $review->user->name }}</h3>
            </div>
            <p class="text-gray-700">{{ $review->review }}</p>
            <div class="mt-2 text-yellow-500">
                Rating: {{ str_repeat('★', $review->rating) }}{{ str_repeat('☆', 5 - $review->rating) }}
            </div>
        </div>
        @endforeach
    </div>
    @else
    <div class="bg-yellow-100 border-l-4 border-yellow-500 text-yellow-700 p-6 rounded-lg">
        <p>No reviews yet. Be the first to leave a review!</p>
    </div>
    @endif
</div>

<!-- Add Review Form -->
<div class="mt-12 px-20">
    <h2 class="text-4xl font-extrabold text-gray-900 mb-8 text-center">Add Your Review</h2>
    @auth
    <div class="bg-white rounded-xl shadow-lg p-8 max-w-3xl mx-auto">
        <form action="{{ route('reviews.store') }}" method="POST" class="space-y-6">
            @csrf
            <input type="hidden" name="product_id" value="{{ $product->id }}">
            <div>
                <label for="review" class="block text-lg font-bold text-gray-800 mb-2">Your Review</label>
                <textarea id="review" name="review" rows="4" class="w-full p-4 border rounded-lg focus:ring-2 focus:ring-blue-300 focus:outline-none" placeholder="Share your experience..." required></textarea>
            </div>
            <div>
                <label class="block text-lg font-bold text-gray-800 mb-2">Rating</label>
                <div class="flex items-center space-x-2">
                    @for($i = 1; $i <= 5; $i++)
                    <label>
                        <input type="radio" name="rating" value="{{ $i }}" class="hidden">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="w-8 h-8 text-gray-300 hover:text-yellow-400 transition" viewBox="0 0 24 24">
                            <path d="M12 .587l3.668 7.431 8.215 1.192-5.945 5.798 1.402 8.192L12 18.902l-7.34 3.798 1.402-8.192L.873 9.21l8.215-1.192L12 .587z" />
                        </svg>
                    </label>
                    @endfor
                </div>
            </div>
            <div class="text-center">
                <button type="submit" class="bg-gradient-to-r from-blue-500 to-blue-700 text-white py-3 rounded-lg text-lg font-semibold hover:from-blue-600 hover:to-blue-800 transition duration-200">Submit Review</button>
            </div>
        </form>
    </div>
    @else
    <div class="bg-yellow-100 border-l-4 border-yellow-500 text-yellow-700 p-6 rounded-lg max-w-3xl mx-auto text-center">
        <p>Please <a href="{{ route('login') }}" class="text-blue-600 underline hover:text-blue-800">log in</a> to leave a review.</p>
    </div>
    @endauth
</div>

<!-- Related Products Section -->
<div class="my-12 px-20">
    <h1 class="text-2xl font-bold text-gray-800 mb-6">Related Products</h1>
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
        @foreach ($relatedproducts as $relatedproduct)
        <div class="bg-white rounded-lg shadow-md hover:shadow-lg transform hover:-translate-y-2 transition duration-300">
            <a href="{{ route('viewproduct', $relatedproduct->id) }}" class="block">
                <img src="{{ asset('images/' . $relatedproduct->photopath) }}" alt="Related Product Image" class="h-60 w-full object-cover rounded-t-lg">
                <div class="p-4">
                    <h1 class="text-lg font-bold text-gray-800">{{ $relatedproduct->name }}</h1>
                    <p class="text-gray-600 mt-1">Rs. {{ $relatedproduct->price }}</p>
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
    // Select all star elements
    const stars = document.querySelectorAll('#starRating .star');

    // Add click event listener to each star
    stars.forEach((star, index) => {
        star.addEventListener('click', () => {
            // Remove yellow color from all stars
            stars.forEach(s => s.classList.remove('text-yellow-400'));
            // Add yellow color to all stars up to and including the clicked star
            for (let i = 0; i <= index; i++) {
                stars[i].classList.add('text-yellow-400');
            }
        });
    });
</script>
@endsection
