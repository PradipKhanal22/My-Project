@extends('layouts.app')

@section('title') Products @endsection

@section('content')
<div class="text-right my-5">
    <a href="{{ route('products.create') }}" class="bg-purple-800 text-white py-2 px-4 rounded-lg hover:bg-purple-700 transition">Add Product</a>
</div>

{{-- Table Headers (Desktop Only) --}}
<div class="hidden md:grid grid-cols-8 bg-gray-800 text-white p-2 rounded-t-lg mt-4 text-sm font-semibold">
    <div class="p-2">S.N</div>
    <div class="p-2">Product Name</div>
    <div class="p-2">Price</div>
    <div class="p-2">Stock</div>
    <div class="p-2">Description</div>
    <div class="p-2">Category</div>
    <div class="p-2">Picture</div>
    <div class="p-2">Action</div>
</div>

@foreach($products as $product)
    {{-- Desktop Grid --}}
    <div class="hidden md:grid grid-cols-8 text-center bg-gray-900 text-white rounded-lg mt-2 mb-1 text-sm">
        <div class="p-2">{{ $loop->iteration }}</div>
        <div class="p-2">{{ $product->name }}</div>
        <div class="p-2">{{ $product->price }}</div>
        <div class="p-2">{{ $product->stock }}</div>
        <div class="p-2 truncate">{{ Str::limit($product->description, 40) }}</div>
        <div class="p-2">{{ $product->category->name }}</div>
        <div class="p-2">
            <img src="{{ asset('images/'.$product->photopath) }}" alt="Image" class="h-16 w-28 object-cover rounded">
        </div>
        <div class="p-2 flex flex-col gap-2 items-center">
            <a href="{{ route('products.edit', $product->id) }}" class="bg-blue-500 text-white px-2 py-1 rounded hover:bg-blue-600 text-xs">Edit</a>
            <a href="{{ route('products.destroy', $product->id) }}" class="bg-red-600 text-white px-2 py-1 rounded hover:bg-red-700 text-xs" onclick="return confirm('Are you sure you want to delete?')">Delete</a>
        </div>
    </div>

    {{-- Mobile Card View --}}
    <div class="md:hidden bg-gray-900 text-white rounded-lg p-4 mb-4 text-sm">
        <div><span class="font-bold">S.N:</span> {{ $loop->iteration }}</div>
        <div><span class="font-bold">Name:</span> {{ $product->name }}</div>
        <div><span class="font-bold">Price:</span> Rs. {{ $product->price }}</div>
        <div><span class="font-bold">Stock:</span> {{ $product->stock }}</div>
        <div><span class="font-bold">Description:</span> {{ Str::limit($product->description, 100) }}</div>
        <div><span class="font-bold">Category:</span> {{ $product->category->name }}</div>
        <div class="my-2">
            <img src="{{ asset('images/'.$product->photopath) }}" alt="Product Image" class="w-full h-40 object-cover rounded">
        </div>
        <div class="flex justify-between mt-2">
            <a href="{{ route('products.edit', $product->id) }}" class="bg-blue-500 text-white px-3 py-1 rounded hover:bg-blue-600 text-xs">Edit</a>
            <a href="{{ route('products.destroy', $product->id) }}" class="bg-red-600 text-white px-3 py-1 rounded hover:bg-red-700 text-xs" onclick="return confirm('Are you sure you want to delete?')">Delete</a>
        </div>
    </div>
@endforeach
@endsection
