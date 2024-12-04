@extends('layouts.app')
@extends('layouts.alert')
@section('title')Products
@endsection
@section('content')
<div class="text-right my-5">
    <a href="{{route('products.create')}}" class="bg-purple-800 text-white py-3 px-5 rounded-lg">Add Product</a>

</div>

    <div class="grid grid-cols-8  bg-gray-800 text-white p-2 rounded-t-lg mt-4 ">
        <div class="p-2">S.N</div>
        <div class="p-2">Product Name</div>
        <div class="p-2 ml-8">Price</div>
        <div class="p-2 ml-8">Stock</div>
        <div class="p-2 ml-4">Description</div>
        <div class="p-2 ml-4">Category</div>
        <div class="p-2 ml-4">Picture</div>
        <div class="p-2 ml-8">Action</div>
    </div>
        @foreach($products as $product)
        <div class="grid grid-cols-8 text-center bg-gray-900 text-white  rounded-lg mt-2 mb-1">
            <div class=" p-2">{{$loop->iteration}}</div>
            <div class=" p-2">{{$product->name}}</div>
            <div class=" p-2">{{$product->price}}</div>
            <div class=" p-2">{{$product->stock}}</div>
            <div class=" p-2">{{$product->description}}</div>
            <div class=" p-2">{{$product->category->name}}</div>
            <div class=" p-2">
                <img src="{{asset('images/'.$product->photopath)}}" alt="" class="h-20 w-32 object-cover rounded-lg">
            </div>
            <div class="p-2 grid gap-4">
                <a href="{{ route('products.edit', $product->id) }}" class="bg-blue-500 text-white px-1.5 py-1.5 rounded-lg">Edit</a>
                <a href="{{ route('products.destroy', $product->id) }}" class="bg-red-700  text-white px-2 py-1.5 rounded-lg" onclick="return confirm('Are you sure you want to delete')">Delete</a>
            </div>
        </div>
        @endforeach



@endsection
