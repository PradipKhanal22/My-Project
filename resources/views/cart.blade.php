@extends('layouts.master')
@section('content')
<a href="{{route('user.orderHistory')}}" class="ml-8 mt-6 inline-block bg-yellow-500 text-gray-900 font-bold px-6 py-3 rounded-full shadow-md hover:bg-yellow-300 transition duration-300">View My History</a>

    <h1 class="text-4xl font-bold text-black  text-center py-20">My Cart</h1>
    <div class="grid grid-cols-1 md:grid-cols-2 gap-10 px-5 md:px-20">
        @foreach ($carts as $cart)
            <div class="p-5 border shadow-lg flex gap-5 rounded-lg bg-white mb-4">
                <img src="{{ asset('images/' . $cart->product->photopath) }}" alt="Product Image"
                    class="w-32 h-32 object-cover rounded-lg">
                <div class="flex-1">
                    <h1 class="text-2xl font-bold">{{ $cart->product->name }}</h1>
                    <p class="text-gray-600">Price: Rs. {{ number_format($cart->product->price, 2) }}</p>
                    <p class="text-gray-600">Quantity: {{ $cart->quantity }}</p>
                    <p class="text-gray-800 font-semibold">Total: Rs.
                        {{ number_format($cart->product->price * $cart->quantity, 2) }}</p>
                </div>
                <div class="grid gap-2">
                    <a onclick="showModal('{{ $cart->id }}')"
                        class="bg-red-500 text-center text-white px-3 py-2 rounded-md hover:bg-red-600 cursor-pointer">Remove</a>
                    <a href="{{ route('checkout', $cart->id) }}"
                        class="bg-green-500 text-center text-white px-3 py-2 rounded-md hover:bg-green-600">Order Now</a>
                </div>
            </div>
        @endforeach
    </div>

    <!-- Delete Modal -->
    <div class="fixed inset-0 bg-blue-400 bg-opacity-45 backdrop-blur-md hidden items-center justify-center"
        id="deleteModal">
        <form action="{{ route('cart.destroy') }}" method="POST" class="bg-white p-6 rounded-lg shadow-lg">
            @csrf
            @method('DELETE')
            <input type="hidden" name="dataid" id="cartId">
            <h1 class="text-2xl font-bold text-center text-blue-700">Are You Sure To Delete?</h1>
            <div class="flex justify-center gap-5 mt-5">
                <button type="submit" class="bg-blue-600 text-white px-5 py-3 rounded-lg">Yes, Delete</button>
                <a onclick="hideModal()" class="bg-red-600 text-white block px-12 py-3 rounded-lg cursor-pointer">No</a>
            </div>
        </form>
    </div>

    @if ($carts->isEmpty())
        <div class="text-center text-gray-500 mt-10">
            <h2 class="text-2xl font-semibold">Your cart is empty</h2>
            <p class="mt-2">Add some products to your cart to see them here.</p>
        </div>
    @endif

    
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
