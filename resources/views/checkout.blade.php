@extends('layouts.master')
@section('content')

<div class="min-h-screen bg-gray-50 py-12">
    <div class="container mx-auto px-4 sm:px-6 lg:px-20">

        <!-- Header -->
        <div class="mb-10">
            <h1 class="text-4xl font-bold text-gray-900 flex items-center gap-3">
                <i class="ri-secure-payment-line text-red-600"></i>
                Checkout
            </h1>
            <p class="text-gray-600 mt-2">Complete your order securely</p>
        </div>

        <form action="{{ route('orders.store') }}" method="POST" id="COD">
            @csrf

            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">

                <!-- Product Details & Shipping Info -->
                <div class="lg:col-span-2 space-y-6">

                    <!-- Product Card -->
                    <div class="bg-white rounded-2xl shadow-lg border border-gray-100 overflow-hidden">
                        <div class="bg-gradient-to-r from-red-600 to-red-500 text-white px-6 py-4">
                            <h2 class="text-xl font-bold flex items-center gap-2">
                                <i class="ri-shopping-bag-3-line"></i>
                                Order Details
                            </h2>
                        </div>

                        <div class="p-6 flex flex-col sm:flex-row gap-6">
                            <img src="{{ asset('images/'.$cart->product->photopath) }}"
                                 alt="{{ $cart->product->name }}"
                                 class="w-full sm:w-40 h-40 object-cover rounded-xl shadow-md">

                            <div class="flex-1 space-y-2">
                                <h3 class="text-2xl font-bold text-gray-900">{{ $cart->product->name }}</h3>

                                <div class="space-y-1 text-sm">
                                    <p class="flex items-center gap-2 text-gray-600">
                                        <i class="ri-price-tag-3-line text-red-600"></i>
                                        <span class="font-medium">Price:</span>
                                        <span class="font-bold text-gray-900">Rs. {{ number_format($cart->product->price) }}</span>
                                    </p>
                                    <p class="flex items-center gap-2 text-gray-600">
                                        <i class="ri-stack-line text-red-600"></i>
                                        <span class="font-medium">Quantity:</span>
                                        <span class="font-bold text-gray-900">{{ $cart->quantity }}</span>
                                    </p>
                                </div>

                                <div class="pt-3 border-t border-gray-100">
                                    <p class="text-lg font-black text-transparent bg-clip-text bg-gradient-to-r from-red-600 to-red-500">
                                        Subtotal: Rs. {{ number_format($cart->product->price * $cart->quantity) }}
                                    </p>
                                </div>
                            </div>
                        </div>

                        <input type="hidden" name="product_id" value="{{ $cart->product_id }}">
                        <input type="hidden" name="quantity" value="{{ $cart->quantity }}">
                        <input type="hidden" name="price" value="{{ $cart->product->price }}">
                        <input type="hidden" name="cart_id" value="{{ $cart->id }}">
                    </div>

                    <!-- Shipping Information -->
                    <div class="bg-white rounded-2xl shadow-lg border border-gray-100 overflow-hidden">
                        <div class="bg-gradient-to-r from-red-600 to-red-500 text-white px-6 py-4">
                            <h2 class="text-xl font-bold flex items-center gap-2">
                                <i class="ri-map-pin-line"></i>
                                Shipping Information
                            </h2>
                        </div>

                        <div class="p-6 space-y-4">
                            <div>
                                <label class="text-sm font-semibold text-gray-700 mb-2 flex items-center gap-2">
                                    <i class="ri-user-line text-red-600"></i>
                                    Full Name
                                </label>
                                <input type="text"
                                       name="name"
                                       value="{{ auth()->user()->name }}"
                                       required
                                       class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-red-500 focus:border-red-500 transition-all">
                            </div>

                            <div>
                                <label class="text-sm font-semibold text-gray-700 mb-2 flex items-center gap-2">
                                    <i class="ri-map-pin-line text-red-600"></i>
                                    Delivery Address
                                </label>
                                <input type="text"
                                       name="address"
                                       value="{{ auth()->user()->address }}"
                                       required
                                       class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-red-500 focus:border-red-500 transition-all">
                            </div>

                            <div>
                                <label class="text-sm font-semibold text-gray-700 mb-2 flex items-center gap-2">
                                    <i class="ri-phone-line text-red-600"></i>
                                    Phone Number
                                </label>
                                <input type="text"
                                       name="phone"
                                       value="{{ auth()->user()->phone }}"
                                       required
                                       class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-red-500 focus:border-red-500 transition-all">
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Order Summary Sidebar -->
                <div class="lg:col-span-1">
                    <div class="bg-white rounded-2xl shadow-lg border border-gray-100 overflow-hidden sticky top-24">
                        <div class="bg-gradient-to-r from-red-600 to-red-500 text-white p-6">
                            <h3 class="text-xl font-bold flex items-center gap-2">
                                <i class="ri-bill-line"></i>
                                Order Summary
                            </h3>
                        </div>

                        <div class="p-6 space-y-4">
                            <div class="space-y-3 pb-4 border-b border-gray-200">
                                <div class="flex justify-between text-gray-600">
                                    <span>Subtotal</span>
                                    <span class="font-semibold text-gray-900">Rs. {{ number_format($cart->product->price * $cart->quantity) }}</span>
                                </div>
                                <div class="flex justify-between text-gray-600">
                                    <span>Delivery</span>
                                    <span class="font-semibold text-emerald-600">Free</span>
                                </div>
                            </div>

                            <div class="flex justify-between items-center pt-2 pb-4 border-b border-gray-200">
                                <span class="text-lg font-bold text-gray-900">Total</span>
                                <span class="text-2xl font-black text-transparent bg-clip-text bg-gradient-to-r from-red-600 to-red-500">
                                    Rs. {{ number_format($cart->product->price * $cart->quantity) }}
                                </span>
                            </div>

                            <!-- Payment Method -->
                            <div>
                                <label class="text-sm font-semibold text-gray-700 mb-3 flex items-center gap-2">
                                    <i class="ri-bank-card-line text-red-600"></i>
                                    Payment Method
                                </label>
                                <select name="payment_method"
                                        class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-red-500 focus:border-red-500 transition-all font-medium text-gray-700">
                                    <option value="COD">💵 Cash On Delivery</option>
                                    <option value="esewa">💳 eSewa</option>
                                </select>
                            </div>

                            <!-- Order Button -->
                            <button type="button"
                                    onclick="myfunction()"
                                    class="w-full bg-gradient-to-r from-red-600 to-red-500 hover:from-red-700 hover:to-red-600 text-white font-bold py-4 px-6 rounded-xl shadow-lg hover:shadow-xl transition-all flex items-center justify-center gap-2 group mt-6">
                                <i class="ri-checkbox-circle-line text-xl group-hover:scale-110 transition-transform"></i>
                                Place Order
                            </button>

                            <!-- Security Info -->
                            <p class="text-xs text-gray-500 text-center pt-4">
                                <i class="ri-shield-check-line text-emerald-500"></i>
                                Your payment information is secure
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </form>

        <!-- eSewa Hidden Form -->
        <form action="https://rc-epay.esewa.com.np/api/epay/main/v2/form" method="POST" id="esewa" class="hidden">
            <input type="hidden" id="amount" name="amount" value="100" required>
            <input type="hidden" id="tax_amount" name="tax_amount" value="0" required>
            <input type="hidden" id="total_amount" name="total_amount" value="110" required>
            <input type="hidden" id="transaction_uuid" name="transaction_uuid" value="241028" required>
            <input type="hidden" id="product_code" name="product_code" value="EPAYTEST" required>
            <input type="hidden" id="product_service_charge" name="product_service_charge" value="0" required>
            <input type="hidden" id="product_delivery_charge" name="product_delivery_charge" value="0" required>
            <input type="hidden" id="success_url" name="success_url" value="{{ route('orders.storeEsewa',$cart->id) }}" required>
            <input type="hidden" id="failure_url" name="failure_url" value="{{ route('mycart') }}" required>
            <input type="hidden" id="signed_field_names" name="signed_field_names" value="total_amount,transaction_uuid,product_code" required>
            <input type="hidden" id="signature" name="signature" value="" required>
        </form>
    </div>
</div>

@php
    $total_amount = $cart->product->price * $cart->quantity;
    $transaction_uuid = time();
    $msg = "total_amount=$total_amount,transaction_uuid=$transaction_uuid,product_code=EPAYTEST";
    $secret="8gBm/:&EnhH.1/q";
    $s = hash_hmac('sha256', $msg, $secret, true);
    $signature = base64_encode($s);
@endphp

<script>
    document.getElementById('amount').value = "{{ $total_amount }}";
    document.getElementById('total_amount').value = "{{ $total_amount }}";
    document.getElementById('transaction_uuid').value = "{{ $transaction_uuid }}";
    document.getElementById('signature').value = "{{ $signature }}";

    function myfunction() {
        const paymentMethod = document.querySelector('select[name="payment_method"]').value;

        if (paymentMethod === "COD") {
            document.getElementById('COD').submit();
        } else if (paymentMethod === "esewa") {
            document.getElementById('esewa').submit();
        } else {
            alert("Please select a valid payment method.");
        }
    }
</script>
@endsection
