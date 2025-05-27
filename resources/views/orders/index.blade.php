@extends('layouts.app')

@section('title', 'Orders')

@section('content')
<div class="container mx-auto mt-6 px-4">

    <!-- Orders Grid -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 sm:gap-8">
        @foreach ($orders as $order)
        <div class="bg-gradient-to-br from-white to-gray-100 rounded-xl shadow-lg overflow-hidden hover:shadow-2xl transform transition-transform duration-200 hover:scale-105">
            <!-- Product Image -->
            <div class="relative">
                <img src="{{ asset('images/' . $order->product->photopath) }}"
                     alt="{{ $order->product->name }}"
                     class="h-56 w-full object-cover">

                <div class="absolute top-3 left-3 bg-indigo-500 text-white text-xs font-bold py-1 px-3 rounded-full shadow">
                    {{ ucfirst($order->status) }}
                </div>
                <div class="absolute top-3 right-3 bg-yellow-400 text-gray-800 text-xs font-bold py-1 px-3 rounded-full shadow">
                    {{ $order->payment_method }}
                </div>
            </div>

            <!-- Details -->
            <div class="p-4 space-y-2">
                <h2 class="text-xl font-semibold text-gray-900 truncate">{{ $order->product->name }}</h2>

                <p class="text-sm text-gray-700 flex items-center"><i class="ri-user-line text-blue-500 mr-2"></i> <strong>Customer:</strong>&nbsp;{{ $order->name }}</p>

                <p class="text-sm text-gray-700 flex items-center"><i class="ri-map-pin-line text-red-500 mr-2"></i> <strong>Address:</strong>&nbsp;{{ $order->address }}</p>

                <p class="text-sm text-gray-700 flex items-center"><i class="ri-phone-line text-green-500 mr-2"></i> <strong>Phone:</strong>&nbsp;{{ $order->phone }}</p>

                <p class="text-sm text-gray-700 flex items-center"><i class="fa-solid fa-cart-shopping mr-2"></i> <strong>Quantity:</strong>&nbsp;{{ $order->quantity }}</p>

                <p class="text-sm text-gray-700 flex items-center"><i class="ri-wallet-line text-yellow-500 mr-2"></i> <strong>Total:</strong>
                    <span class="text-green-600 font-bold ml-1">Rs. {{ number_format($order->quantity * $order->price, 2) }}</span>
                </p>

                <p class="text-sm text-gray-700 flex items-center"><i class="ri-calendar-line text-teal-500 mr-2"></i> <strong>Date:</strong>&nbsp;{{ $order->created_at->format('d M Y') }}</p>
            </div>

            <!-- Action Buttons -->
            <div class="flex flex-col sm:flex-row sm:justify-between sm:items-center gap-2 p-3 bg-gray-100">
                <a href="{{ route('orders.status', [$order->id, 'Pending']) }}"
                   class="bg-blue-600 text-white text-xs sm:text-sm py-2 px-3 rounded-lg shadow hover:bg-blue-700 flex items-center justify-center w-full sm:w-auto">
                    <i class="ri-time-line mr-1.5"></i> Pending
                </a>

                <a href="{{ route('orders.status', [$order->id, 'Processing']) }}"
                   class="bg-green-600 text-white text-xs sm:text-sm py-2 px-3 rounded-lg shadow hover:bg-green-700 flex items-center justify-center w-full sm:w-auto">
                    <i class="ri-refresh-line mr-1.5"></i> Processing
                </a>

                <a href="{{ route('orders.status', [$order->id, 'Delivered']) }}"
                   class="bg-orange-600 text-white text-xs sm:text-sm py-2 px-3 rounded-lg shadow hover:bg-orange-700 flex items-center justify-center w-full sm:w-auto">
                    <i class="ri-checkbox-circle-line mr-1.5"></i> Delivered
                </a>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection
