@extends('layouts.app')
@section('title')Edit Category
@endsection
@section('content')
    <form action="{{route('categories.update', $category->id) }}" method="post" class="mt-5">
        @csrf
        <div class="mb-5">
            <input type="text" placeholder="Enter Priority" class="p-3 w-full rounded-lg" name="priority"
                   value="{{ $category->priority }}">
            @error('priority')
              <div class="text-red-700 mt-2 text-sm">
                * {{ $message }}
              </div>
            @enderror
        </div>
        <div class="mb-5">
             <input type="text" placeholder="Enter Category" class="p-3 w-full rounded-lg" name="name"
                    value="{{ $category->name }}">
             @error('name')
              <div class="text-red-700 mt-2 text-sm">
                * {{ $message }}
              </div>
            @enderror
        </div>
        <div class="flex justify-center">
            <button type="submit" class="bg-indigo-700 text-white py-3 px-5 rounded-lg font-bold">
                Update Category
            </button>
            <a href="{{ route('categories.index') }}" class="bg-red-700 text-white py-3 px-5 rounded-lg font-bold ml-3">
                Cancel
            </a>
        </div>
    </form>

@endsection
