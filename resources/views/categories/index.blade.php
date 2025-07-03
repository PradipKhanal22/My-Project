@extends('layouts.app')
@extends('layouts.alert')

@section('title')
    Category
@endsection

@section('content')
<div class="my-5 text-right">
    <a href="{{ route('categories.create') }}" class="bg-purple-800 text-white py-2 px-4 rounded-lg hover:bg-purple-700 transition">
         Add Category
    </a>

    {{-- Table Head for Desktop --}}
    <div class="hidden md:grid grid-cols-3 bg-gray-800 text-white p-2 rounded-t-lg mt-4 text-sm font-semibold">
        <div class="p-2">S.N</div>
        <div class="p-2">Category Name</div>
        <div class="p-2">Actions</div>
    </div>

    {{-- Loop Through Categories --}}
    @foreach($categories as $category)
        {{-- Desktop Table Row --}}
        <div class="hidden md:grid grid-cols-3 text-center bg-gray-900 text-white p-2 rounded-lg mt-2 mb-1 text-sm">
            <div class="p-2">{{ $loop->iteration }}</div>
            <div class="p-2">{{ $category->name }}</div>
            <div class="p-2 flex justify-center space-x-2">
                <a href="{{ route('categories.edit', $category->id) }}" class="bg-blue-500 text-white px-3 py-1.5 rounded hover:bg-blue-600 text-xs">Edit</a>
                <a href="{{ route('categories.destroy', $category->id) }}" class="bg-red-700 text-white px-3 py-1.5 rounded hover:bg-red-800 text-xs" onclick="return confirm('Are you sure you want to delete?')">Delete</a>
            </div>
        </div>

        {{-- Mobile Card View --}}
        <div class="md:hidden bg-gray-900 text-white p-4 rounded-lg mt-3 text-sm">
            <div><span class="font-bold">S.N:</span> {{ $loop->iteration }}</div>
            <div><span class="font-bold">Category:</span> {{ $category->name }}</div>
            <div class="flex justify-start space-x-3 mt-3">
                <a href="{{ route('categories.edit', $category->id) }}" class="bg-blue-500 text-white px-3 py-1 rounded hover:bg-blue-600 text-xs">Edit</a>
                <a href="{{ route('categories.destroy', $category->id) }}" class="bg-red-700 text-white px-3 py-1 rounded hover:bg-red-800 text-xs" onclick="return confirm('Are you sure you want to delete?')">Delete</a>
            </div>
        </div>
    @endforeach
</div>
@endsection
