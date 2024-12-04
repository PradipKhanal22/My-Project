@extends('layouts.app')
@section ('title') Dashboard
@endsection
@section('content')
<p class="mt-3 text-2xl bg-white text-black p-3 rounded-lg">Hi ! Welcome back, <a class="text-red-900 font-bold hover:cursor-pointer">Admin</a></p>
<div class="grid grid-cols-3 gap-10 p-4">
    <div class="px-5 py-8 bg-gradient-to-r from-red-500 to-yellow-400 text-white flex justify-between items-center rounded-lg
     hover:shadow-lg transform hover:scale-105 transition duration-300 hover:cursor-pointer">
        <h2 class="text-2xl font-bold">Total Categories -</h2>
        <p class="text-3xl font-bold">{{$totalcategories}}</p>
    </div>
    <div class="px-5 py-8 bg-purple-700 text-white flex justify-between items-center rounded-lg
    hover:shadow-lg transform hover:scale-105 transition duration-300 hover:cursor-pointer">
        <h2 class="text-2xl font-bold">Total Products -</h2>
        <p class="text-3xl font-bold">{{$totalproduct}}</p>
    </div>
    <div class="px-5 py-8 bg-red-600 text-white flex justify-between items-center rounded-lg
    hover:shadow-lg transform hover:scale-105 transition duration-300 hover:cursor-pointer">
        <h2 class="text-2xl font-bold">Total Orders -</h2>
        <p class="text-3xl font-bold">{{$totalorders}}</p>
    </div>
    <div class="px-5 py-8 bg-purple-600 text-white flex justify-between items-center rounded-lg
    hover:shadow-lg transform hover:scale-105 transition duration-300 hover:cursor-pointer">
        <h2 class="text-2xl font-bold">Pending Orders -</h2>
        <p class="text-3xl font-bold">{{$pendingorders}}</p>
    </div>
    <div class="px-5 py-8 bg-orange-700 text-white flex justify-between items-center rounded-lg
    hover:shadow-lg transform hover:scale-105 transition duration-300 hover:cursor-pointer">
        <h2 class="text-2xl font-bold">Total Users -</h2>
        <p class="text-3xl font-bold">{{$totalusers}}</p>
    </div>
    <div class="px-5 py-8 bg-pink-500 text-white flex justify-between items-center rounded-lg
    hover:shadow-lg transform hover:scale-105 transition duration-300 hover:cursor-pointer">
        <h2 class="text-2xl font-bold">Total Sales -</h2>
        <p class="text-3xl font-bold">{{$deliveredorders}}</p>
    </div>

</div>
@endsection
