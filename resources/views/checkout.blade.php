@extends('layouts.master')
@section('content')
    <h1 class="text-4xl font-bold text-black  text-center py-10">Checkout</h1>
    <form action="{{route('orders.store')}}" method="POST" id="COD">
        @csrf
    <div class="grid grid-cols-5 gap-10 px-24 py-10 border-black">
        <div class="col-span-2 flex gap-5 shadow-lg border-black rounded-lg ">
            <img src="{{ asset('images/'.$cart->product->photopath) }}" alt="checkout" class="w-1/3 hover:shadow-lg transform hover:scale-105 transition duration-300 cursor-pointer">
            <div>
                <h2 class="text-3xl font-semibold text-black">{{ $cart->product->name }}</h2>
                <p class="text-lg text-gray-600">Price: {{ $cart->product->price }}</p>
                <p class="text-lg text-gray-600">Quantity: {{ $cart->quantity }}</p>
                <p class="text-lg text-gray-600">Total: Rs. {{ $cart->product->price * $cart->quantity }}</p>
                <input type="hidden" name="product_id" value="{{$cart->product_id}}">
                <input type="hidden" name="quantity" value="{{$cart->quantity}}">
                <input type="hidden" name="price" value="{{$cart->product->price}}">
                <input type="hidden" name="cart_id" value="{{$cart->id}}">
            </div>
        </div>
        <div class="border shadow-lg rounded-lg px-2 col-span-2">
            <input type="text" placeholder="Name" name="name" class="w-full border rounded-lg p-2" value="{{auth()->user()->name}}">
            <input type="text" placeholder="Address" name="address" class="w-full border rounded-lg p-2 mt-2">
            <input type="text" placeholder="Phone" name="phone" class="w-full border rounded-lg p-2 mt-2">

        </div>
        <div class="col-span-1 border shadow-lg rounded-lg px-2 ">
            <h2 class="text-2xl font-semibold text-gray-800">Total: Rs. {{ $cart->product->price * $cart->quantity }}</h2>
            <select name="payment_method" class="w-full border rounded-lg p-2 mt-2 text-black cursor-pointer">
                <option value="COD">Cash On Delivery</option>
                <option value="esewa">Esewa</option>
            </select>
            <button class="bg-green-500 ml-8 mb-2 text-white p-2 rounded-lg mt-5 pointer hover:bg-green-700 hover:text-black font-bold" onclick="myfunction()">Order now</button>
        </div>
    </div>
</form>

<form action="https://rc-epay.esewa.com.np/api/epay/main/v2/form" method="POST" id="esewa">
    <input type="hidden" id="amount" name="amount" value="100" required>
    <input type="hidden" id="tax_amount" name="tax_amount" value ="0" required>
    <input type="hidden" id="total_amount" name="total_amount" value="110" required>
    <input type="hidden" id="transaction_uuid" name="transaction_uuid" value="241028" required>
    <input type="hidden" id="product_code" name="product_code" value ="EPAYTEST" required>
    <input type="hidden" id="product_service_charge" name="product_service_charge" value="0" required>
    <input type="hidden" id="product_delivery_charge" name="product_delivery_charge" value="0" required>
    <input type="hidden" id="success_url" name="success_url" value="{{route('orders.storeEsewa',$cart->id)}}" required>
    <input type="hidden" id="failure_url" name="failure_url" value="{{route('mycart')}}" required>
    <input type="hidden" id="signed_field_names" name="signed_field_names" value="total_amount,transaction_uuid,product_code" required>
    <input type="hidden" id="signature" name="signature" value="" required>
    {{-- <input value="Pay with Esewa" class="bg-green-600 font-bold text-white block mx-auto p-4 mb-5 px-10 rounded-lg cursor-pointer" type="submit"> --}}
    </form>

    @php
    $total_amount = $cart->product->price * $cart->quantity;
    $transaction_uuid = time();
        $msg = "total_amount=$total_amount,transaction_uuid=$transaction_uuid,product_code=EPAYTEST";
        $secret="8gBm/:&EnhH.1/q";
        $s = hash_hmac('sha256', $msg, $secret, true);
        $signature = base64_encode($s);
    @endphp
    <script>
        document.getElementById('amount').value = "{{$total_amount}}";
        document.getElementById('total_amount').value = "{{$total_amount}}";
        document.getElementById('transaction_uuid').value = "{{$transaction_uuid}}";
        document.getElementById('signature').value = "{{$signature}}";


    document.addEventListener("DOMContentLoaded", function () {
        // Attach a click event listener to the "Order now" button
        document.querySelector("button[onclick='myfunction()']").addEventListener("click", function (event) {
            event.preventDefault(); // Prevent default form submission behavior

            // Get the selected payment method
            const paymentMethod = document.querySelector('select[name="payment_method"]').value;

            if (paymentMethod === "COD") {
                // Submit the "COD" form
                document.getElementById('COD').submit();
            } else if (paymentMethod === "esewa") {
                // Submit the "esewa" form
                document.getElementById('esewa').submit();
            } else {
                alert("Please select a valid payment method.");
            }
        });
    });


    </script>
@endsection
