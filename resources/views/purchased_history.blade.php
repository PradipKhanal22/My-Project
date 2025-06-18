@extends('layouts.master')

@section('content')
<div class="container mx-auto px-6 py-12">
    <!-- Page Title -->
    <div class="text-center mb-12">
        <h1 class="text-4xl md:text-5xl font-bold text-gray-800 tracking-wide">My Orders</h1>
        <p class="mt-2 text-gray-600">Track your Retrokit orders here</p>
    </div>
    @forelse ($orders as $order)
    <div class="bg-white shadow-md rounded-lg mb-8 overflow-hidden border border-gray-200 hover:shadow-xl transition-shadow duration-300">
        <div class="flex flex-col md:flex-row">
            <!-- Product Image -->
            <div class="md:w-1/3 relative">
                <img src="{{ asset('images/' . $order->product->photopath) }}" alt="{{ $order->product->name }}" class="w-full h-48 md:h-full object-cover">

                <!-- Status badge -->
                <span
                    class="absolute top-3 left-3 px-3 py-1 rounded-full text-xs font-semibold
                    {{ $order->status == 'Cancelled' ? 'bg-red-600 text-white' : 'bg-green-600 text-white' }}">
                    {{ ucfirst($order->status) }}
                </span>

                <!-- Payment method badge -->
                <span class="absolute top-3 right-3 bg-yellow-400 text-gray-900 text-xs font-semibold px-3 py-1 rounded-full shadow">
                    {{ $order->payment_method }}
                </span>
            </div>

            <!-- Order Details -->
            <div class="md:w-2/3 p-6 flex flex-col justify-between">
                <div>
                    <h2 class="text-2xl font-semibold text-gray-900 mb-4 flex items-center gap-2">
                        <i class="ri-shirt-line text-indigo-600 text-xl"></i> {{ $order->product->name }}
                    </h2>

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 text-gray-700">
                        <p><strong>Customer:</strong> {{ $order->name }}</p>
                        <p><strong>Phone:</strong> {{ $order->phone }}</p>
                        <p><strong>Address:</strong> {{ $order->address }}</p>
                        <p><strong>Quantity:</strong> {{ $order->quantity }}</p>
                        <p><strong>Order Date:</strong> {{ $order->created_at->format('d M Y') }}</p>
                        <p><strong>Total Price:</strong> <span class="text-green-600 font-bold">Rs. {{ number_format($order->price, 2) }}</span></p>
                    </div>
                </div>

                <div class="mt-6">
                    @if(\Carbon\Carbon::parse($order->created_at)->diffInDays(now()) <= 2 && $order->status != 'Cancelled')
                        <form action="{{ route('orders.cancel', $order->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to cancel this order?');">
                            @csrf
                            <button type="submit" class="w-full bg-red-600 hover:bg-red-700 text-white font-semibold py-3 rounded-md transition duration-300">
                                Cancel Order
                            </button>
                        </form>
                    @else
                        <button disabled class="w-full bg-gray-400 cursor-not-allowed text-white font-semibold py-3 rounded-md">
                            Cancellation Not Allowed
                        </button>
                    @endif
                </div>
            </div>
        </div>
    </div>

    @empty
    <div class="text-center py-16">
        <h3 class="text-3xl font-semibold text-gray-700 mb-3">You have no orders yet!</h3>
        <p class="text-gray-500 mb-6">Discover Retrokit’s latest collections and place your first order today.</p>
        <a href="{{ route('products') }}" class="inline-block bg-indigo-600 hover:bg-indigo-700 text-white font-semibold px-8 py-3 rounded-md shadow-md transition">
            <i class="ri-shopping-cart-line mr-2"></i> Start Shopping
        </a>
    </div>
    @endforelse
</div>
@endsection
