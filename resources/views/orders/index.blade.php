@extends('layouts.app')

@section('title', 'Orders')

@section('content')
<div class="container mx-auto mt-10">

    <!-- Orders Grid -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-10 cursor-pointer">
        @foreach ($orders as $order)
        <div class="bg-gradient-to-br from-white to-gray-100 rounded-xl shadow-lg overflow-hidden hover:shadow-2xl transition-transform transform hover:scale-105">
            <div class="relative">
                <img src="{{ asset('images/' . $order->product->photopath) }}" alt="{{ $order->product->name }}" class="h-56 w-full object-cover">
                <div class="absolute top-4 left-4 bg-indigo-500 text-white text-xs font-extrabold py-1.5 px-3 rounded-full shadow-lg">
                    {{ ucfirst($order->status) }}
                </div>
                <div class="absolute top-4 right-4 bg-yellow-500 text-gray-900 text-xs font-extrabold py-1.5 px-3 rounded-full shadow-lg">
                    {{ $order->payment_method }}
                </div>
            </div>

            <!-- Details Section -->
            <div class="p-4 space-y-2">
                <h2 class="text-2xl font-bold text-gray-900 truncate">{{ $order->product->name }}</h2>
                <p class="text-base font-bold text-gray-800 flex items-center"><i class="ri-user-line text-blue-500 mr-2"></i> <strong>Customer:</strong> {{ $order->name }}</p>
                <p class="text-base text-gray-600 flex items-center"><i class="ri-map-pin-line text-red-500 mr-2"></i> <strong>Address:</strong> {{ $order->address }}</p>
                <p class="text-base text-gray-600 flex items-center"><i class="ri-phone-line text-green-500 mr-2"></i> <strong>Phone:</strong> {{ $order->phone }}</p>
                <p class="text-base text-gray-600 flex items-center"><i class="ri-wallet-line text-yellow-500 mr-2"></i> <strong>Total Price:</strong>
                    <span class="text-green-600 font-bold">Rs. {{ number_format($order->quantity * $order->price, 2) }}</span>
                </p>
                <p class="text-base text-gray-600 flex items-center"><i class="ri-calendar-line text-teal-500 mr-2"></i> <strong>Order Date:</strong> {{ $order->created_at->format('d M Y') }}</p>
            </div>

            <!-- Action Buttons -->
            <div class="flex justify-between items-center p-2 bg-gray-100">
                <a href="{{ route('orders.status', [$order->id, 'Pending']) }}" class="bg-blue-600 text-white text-sm py-2 px-2 rounded-lg shadow hover:bg-blue-700 flex items-center w-full sm:w-auto">
                    <i class="ri-time-line mr-2"></i> Pending
                </a>
                <a href="{{ route('orders.status', [$order->id, 'Processing']) }}" class="bg-green-600 text-white text-sm py-2 px-2 rounded-lg shadow hover:bg-green-700 flex items-center w-full sm:w-auto">
                    <i class="ri-refresh-line mr-2"></i> Processing
                </a>
                <a href="{{ route('orders.status', [$order->id, 'Delivered']) }}" class="bg-orange-600 text-white text-sm py-2 px-2 rounded-lg shadow hover:bg-orange-700 flex items-center w-full sm:w-auto">
                    <i class="ri-checkbox-circle-line mr-2"></i> Delivered
                </a>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection
