@extends('layouts.app')
@section('title') Orders
@endsection
@section('content')
<table class="mt-5 w-full">

        <tr>
            <th class="border p-2 bg-green-700">Order Time</th>
            <th class="border p-2 bg-green-700">Product Image</th>
            <th class="border p-2 bg-green-700">Product Name</th>
            <th class="border p-2 bg-green-700">Customer Name</th>
            <th class="border p-2 bg-green-700">Phone</th>
            <th class="border p-2 bg-green-700">Address</th>
            <th class="border p-2 bg-green-700">Quantity</th>
            <th class="border p-2 bg-green-700">Price</th>
            <th class="border p-2 bg-green-700">Total</th>
            <th class="border p-2 bg-green-700">Payment Method</th>
            <th class="border p-2 bg-green-700">Status</th>
            <th class="border p-2 bg-green-700">Action</th>
        </tr>
        @foreach ($orders as $order )
        <tr>
            <td class="border p-2">{{$order->created_at}}</td>
            <td class="border p-2">
                <img src="{{asset('images/'.$order->product->photopath)}}" alt="" class="h-28">
            </td>
            <td class="border p-2">{{$order->product->name}}</td>
            <td class="border p-2">{{$order->name}}</td>
            <td class="border p-2">{{$order->phone}}</td>
            <td class="border p-2">{{$order->address}}</td>
            <td class="border p-2">{{$order->quantity}}</td>
            <td class="border p-2">{{$order->price}}</td>
            <td class="border p-2">{{$order->quantity * $order->price}}</td>
            <td class="border p-2">{{$order->payment_method}}</td>
            <td class="border p-2">{{$order->status}}</td>
            <td class="border p-2 grid gap-1">
                <a href="{{route('orders.status',[$order->id,'Pending'])}}" class="bg-blue-700 text-white rounded-lg p-1">Pending</a>
                <a href="{{route('orders.status',[$order->id,'Processing'])}}" class="bg-yellow-700 text-white rounded-lg p-1">Processing</a>
                <a href="{{route('orders.status',[$order->id,'Delivered'])}}" class="bg-green-800 text-white rounded-lg p-1">Delivered</a>
            </td>
        </tr>
        @endforeach
</table>


@endsection
