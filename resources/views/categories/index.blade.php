@extends('layouts.app')

@section('title')
    Category
@endsection

@section('content')
<div class="my-5 text-right">
    <a href="{{route('products.create')}}" class="bg-purple-800 text-white py-3 px-5 rounded-lg">
        Add Category</a>

    <div class="grid grid-cols-4 gap-4 bg-gray-800 text-white p-2 rounded-t-lg mb-1 ">
        <div class="p-2">S.N</div>
        <div class="p-2">Category Name</div>
        <div class="p-2">Status</div>
        <div class="p-2">Actions</div>
    </div>
    @foreach($categories as $category)
    <div class="grid grid-cols-4 gap-4 text-center bg-gray-900 text-white p-2 rounded-lg mb-1">
        <div class="p-2">{{ $loop->iteration }}</div>
        <div class="p-2">{{ $category->name }}</div>
        <div class="p-2">{{ $category->status }}</div>
        <div class="p-2 flex justify-center space-x-2">
            <a href="{{ route('categories.edit', $category->id) }}" class="bg-blue-500 text-white px-3 py-1.5 rounded-lg">Edit</a>
            <a href="{{ route('categories.destroy', $category->id) }}" class="bg-red-700 text-white px-3 py-1.5 rounded-lg" onclick="return confirm('Are you sure you want to delete')">Delete</a>
        </div>
    </div>
    @endforeach
</div>
@endsection
