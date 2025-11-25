@extends('layouts.master')
@section('content')

<div class="min-h-screen bg-gray-50 py-12">
    <div class="container mx-auto px-4 sm:px-6 lg:px-20">

        <!-- Header Section -->
        <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4 mb-10">
            <div>
                <h1 class="text-4xl font-black text-gray-900 flex items-center gap-3">
                    <i class="ri-shopping-cart-2-line text-red-600"></i>
                    My Shopping Cart
                </h1>
                <p class="text-gray-600 mt-2">{{ $carts->count() }} {{ $carts->count() === 1 ? 'item' : 'items' }} in your cart</p>
            </div>
            <a href="{{ route('user.orderHistory') }}"
               class="inline-flex items-center gap-2 bg-gradient-to-r from-yellow-500 to-yellow-600 hover:from-yellow-600 hover:to-yellow-700 text-gray-900 font-bold px-6 py-3 rounded-xl shadow-lg hover:shadow-xl transition-all group">
                <i class="ri-history-line text-xl group-hover:rotate-12 transition-transform"></i>
                View Order History
            </a>
        </div>

        @if ($carts->isEmpty())
            <!-- Empty Cart State -->
            <div class="text-center py-20">
                <div class="w-48 h-48 mx-auto mb-8 bg-gradient-to-br from-gray-100 to-gray-200 rounded-full flex items-center justify-center">
                    <i class="ri-shopping-cart-line text-8xl text-gray-400"></i>
                </div>
                <h2 class="text-3xl font-bold text-gray-900 mb-4">Your Cart is Empty</h2>
                <p class="text-lg text-gray-600 mb-8">Add some products to your cart to see them here</p>
                <a href="{{ route('products') }}"
                   class="inline-flex items-center gap-2 bg-gradient-to-r from-red-600 to-pink-600 text-white font-bold px-8 py-4 rounded-xl shadow-lg hover:shadow-xl hover:scale-105 transition-all">
                    <i class="ri-shopping-bag-line text-xl"></i>
                    Continue Shopping
                </a>
            </div>
        @else
            <!-- Cart Items Grid -->
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">

                <!-- Cart Items -->
                <div class="lg:col-span-2 space-y-5">
                    @foreach ($carts as $cart)
                        <div class="bg-white rounded-2xl shadow-lg border border-gray-100 overflow-hidden hover:shadow-xl transition-all duration-300">
                            <div class="p-6 flex flex-col sm:flex-row gap-6">
                                <!-- Product Image -->
                                <div class="flex-shrink-0">
                                    <img src="{{ asset('images/' . $cart->product->photopath) }}"
                                         alt="{{ $cart->product->name }}"
                                         class="w-full sm:w-32 h-32 object-cover rounded-xl">
                                </div>

                                <!-- Product Details -->
                                <div class="flex-1 space-y-3">
                                    <h2 class="text-xl font-bold text-gray-900 hover:text-red-600 transition-colors">
                                        {{ $cart->product->name }}
                                    </h2>

                                    <div class="space-y-1 text-sm">
                                        <p class="text-gray-600 flex items-center gap-2">
                                            <i class="ri-price-tag-3-line text-red-600"></i>
                                            <span class="font-medium">Price:</span>
                                            <span class="text-gray-900 font-bold">Rs. {{ number_format($cart->product->price) }}</span>
                                        </p>
                                        <p class="text-gray-600 flex items-center gap-2">
                                            <i class="ri-stack-line text-red-600"></i>
                                            <span class="font-medium">Quantity:</span>
                                            <span class="text-gray-900 font-bold">{{ $cart->quantity }}</span>
                                        </p>
                                    </div>

                                    <div class="pt-2 border-t border-gray-100">
                                        <p class="text-lg font-black text-transparent bg-clip-text bg-gradient-to-r from-red-600 to-pink-600">
                                            Total: Rs. {{ number_format($cart->product->price * $cart->quantity) }}
                                        </p>
                                    </div>
                                </div>

                                <!-- Action Buttons -->
                                <div class="flex sm:flex-col gap-3 flex-shrink-0">
                                    <button onclick="showModal('{{ $cart->id }}')"
                                            class="flex-1 sm:flex-none bg-red-50 hover:bg-red-600 text-red-600 hover:text-white px-4 py-2.5 rounded-xl font-semibold transition-all flex items-center justify-center gap-2 border border-red-200 hover:border-red-600 group">
                                        <i class="ri-delete-bin-line text-lg group-hover:scale-110 transition-transform"></i>
                                        Remove
                                    </button>
                                    <a href="{{ route('checkout', $cart->id) }}"
                                       class="flex-1 sm:flex-none bg-gradient-to-r from-emerald-500 to-teal-600 hover:from-emerald-600 hover:to-teal-700 text-white px-4 py-2.5 rounded-xl font-semibold transition-all flex items-center justify-center gap-2 shadow-md hover:shadow-lg group">
                                        <i class="ri-shopping-bag-3-line text-lg group-hover:scale-110 transition-transform"></i>
                                        Order Now
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

                <!-- Order Summary Sidebar -->
                <div class="lg:col-span-1">
                    <div class="bg-white rounded-2xl shadow-lg border border-gray-100 overflow-hidden sticky top-24">
                        <div class="bg-gradient-to-r from-red-600 to-pink-600 text-white p-6">
                            <h3 class="text-2xl font-bold flex items-center gap-2">
                                <i class="ri-file-list-3-line"></i>
                                Order Summary
                            </h3>
                        </div>

                        <div class="p-6 space-y-4">
                            @php
                                $subtotal = $carts->sum(function($cart) {
                                    return $cart->product->price * $cart->quantity;
                                });
                                $shipping = 100;
                                $total = $subtotal + $shipping;
                            @endphp

                            <div class="space-y-3 pb-4 border-b border-gray-200">
                                <div class="flex justify-between text-gray-600">
                                    <span>Subtotal</span>
                                    <span class="font-semibold text-gray-900">Rs. {{ number_format($subtotal) }}</span>
                                </div>
                                <div class="flex justify-between text-gray-600">
                                    <span>Shipping</span>
                                    <span class="font-semibold text-emerald-600">Rs. {{ number_format($shipping) }}</span>
                                </div>
                            </div>

                            <div class="flex justify-between items-center pt-2">
                                <span class="text-lg font-bold text-gray-900">Total</span>
                                <span class="text-2xl font-black text-transparent bg-clip-text bg-gradient-to-r from-red-600 to-pink-600">
                                    Rs. {{ number_format($total) }}
                                </span>
                            </div>

                            <div class="pt-4 space-y-3">
                                <a href="{{ route('products') }}"
                                   class="w-full inline-flex items-center justify-center gap-2 bg-gray-100 hover:bg-gray-200 text-gray-900 font-semibold px-6 py-3 rounded-xl transition-all">
                                    <i class="ri-arrow-left-line"></i>
                                    Continue Shopping
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endif
    </div>
</div>

<!-- Delete Modal -->
<div class="fixed inset-0 bg-black bg-opacity-50 backdrop-blur-sm hidden items-center justify-center z-50 p-4" id="deleteModal">
    <div class="bg-white rounded-2xl shadow-2xl max-w-md w-full overflow-hidden transform transition-all">
        <form action="{{ route('cart.destroy') }}" method="POST">
            @csrf
            @method('DELETE')
            <input type="hidden" name="dataid" id="cartId">

            <!-- Modal Header -->
            <div class="bg-gradient-to-r from-red-600 to-pink-600 text-white p-6">
                <div class="flex items-center justify-center w-16 h-16 bg-white bg-opacity-20 rounded-full mx-auto mb-4">
                    <i class="ri-error-warning-line text-4xl"></i>
                </div>
                <h2 class="text-2xl font-bold text-center">Confirm Removal</h2>
            </div>

            <!-- Modal Body -->
            <div class="p-6 text-center">
                <p class="text-gray-600 text-lg mb-6">
                    Are you sure you want to remove this item from your cart?
                </p>

                <!-- Modal Actions -->
                <div class="flex gap-3">
                    <button type="button"
                            onclick="hideModal()"
                            class="flex-1 bg-gray-100 hover:bg-gray-200 text-gray-900 font-semibold px-6 py-3 rounded-xl transition-all">
                        Cancel
                    </button>
                    <button type="submit"
                            class="flex-1 bg-gradient-to-r from-red-600 to-red-500 hover:from-red-700 hover:to-red-600 text-white font-semibold px-6 py-3 rounded-xl transition-all shadow-lg hover:shadow-xl">
                        Yes, Remove
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>

<script>
    function hideModal() {
        document.getElementById('deleteModal').classList.add('hidden');
        document.getElementById('deleteModal').classList.remove('flex');
    }

    function showModal(id) {
        document.getElementById('cartId').value = id;
        document.getElementById('deleteModal').classList.remove('hidden');
        document.getElementById('deleteModal').classList.add('flex');
    }
</script>
@endsection
