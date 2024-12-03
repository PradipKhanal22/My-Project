@extends('layouts.master')
@section('content')
<div class="bg-white flex items-center justify-center min-h-screen">
    <div class="text-center p-4">
        <h1 class="text-8xl font-extrabold text-orange-500 mb-6">CONTACT US</h1>
        <p class="text-2xl mb-3">
            Whether you have questions about RetroKits or would like to support, we would love to hear from you.
        </p>
        <div class="flex justify-center space-x-4 mb-1">
            <a href="" class="bg-orange-500 text-white py-2 px-4 rounded-lg font-bold">GET IN TOUCH</a>
            <a href="{{route('contactinfo')}}" class="text-gray-700 underline">PRESS CONTACT</a>
        </div>
    </div>
</div>
<div class="flex items-center justify-center h-screen bg-white mt-0">
    <div class="text-center">
        <div class="mb-8">
            <img src="{{ asset('logo.png') }}" alt="RetroKIts NEpal" class="mx-auto w-24">
        </div>
        <div class="text-5xl font-bold">
            <span>WE</span> <span class="text-yellow-500">BELIEVE</span> THAT<br>
            SPORTS CAN BE THE MOST<br>
            <span class="text-yellow-500">POSITIVE FORCE</span> ON EARTH
        </div>
    </div>
</div>
@endsection
