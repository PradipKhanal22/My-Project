@extends('layouts.app')
@section ('title')Create Product
@endsection
@section('content')

    <form action="{{route('products.store')}}" method="post" class="mt-5" enctype="multipart/form-data">
        @csrf
        <div class="mb-5">
            <select name="category_id" class="p-3 w-full rounded-lg">
                @foreach ($categories as $category )
                <option value="{{$category->id}}">{{$category->name}}</option>
                @endforeach
             </select>
         </div>
        <div class="mb-5">
             <input type="text" placeholder="Enter Product Name" class="p-3 w-full rounded-lg" name="name"
             value="{{old('name')}}">
             @error('name')
              <div class="text-red-700 mt-2 text-sm">
                * {{$message}}
              </div>
            @enderror
        </div>
        <div class="grid grid-cols-2 gap-10">
        <div class="mb-5">
            <input type="text" placeholder="Enter Product Price" class="p-3 w-full rounded-lg" name="price"
            value="{{old('price')}}">
            @error('price')
             <div class="text-red-700 mt-2 text-sm">
               * {{$message}}
             </div>
           @enderror
       </div>
       <div class="mb-5">
        <input type="text" placeholder="Enter Product Stock" class="p-3 w-full rounded-lg" name="stock"
        value="{{old('stock')}}">
        @error('stock')
         <div class="text-red-700 mt-2 text-sm">
           * {{$message}}
         </div>
       @enderror
   </div>
</div>
   <div class="mb-5">
    <textarea name="description" rows="5" placeholder="Enter Product Description"
    class="p-3 w-full rounded-lg">{{old('description')}}</textarea>
    @error('description')
     <div class="text-red-700 mt-2 text-sm">
       * {{$message}}
     </div>
   @enderror
</div>
<div class="mb-5">
    <input type="file" placeholder="Enter Photo Path" class="p-3 w-full rounded-lg" name="photopath"
    value="{{old('photopath')}}">
    @error('photopath')
     <div class="text-red-700 mt-2 text-sm">
       * {{$message}}
     </div>
   @enderror
</div>
        <div class="flex justify-center">
            <button type="submit" class="bg-indigo-700 text-white py-3 px-5 rounded-lg font-bold">
                Add Product </button>
            <a href="{{route('products.index')}}" class="bg-red-700 text-white py-3 px-5 rounded-lg font-bold ml-3">Cancel</a>

        </div>
    </form>

@endsection
