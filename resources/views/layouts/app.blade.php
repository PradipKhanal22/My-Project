<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <link
              href="https://cdn.jsdelivr.net/npm/remixicon@4.3.0/fonts/remixicon.css"
              rel="stylesheet"/>
        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased bg-yellow-300">
        {{-- @include('layouts.alert') --}}
        <div class="flex">
            <div class="w-56 h-screen sticky top-0 bg-black shadow">
                <img src="{{asset('image.png')}}" alt="" class="w-8/12 mx-auto mt-5 bg-white p-2 rounded-lg shadow-lg">
                <div class="mt-5">
                    <a href="{{route('dashboard')}}" class="block p-3 text-white
                     hover:bg-gray-300 font-bold">Dashboard</a>
                    <a href="{{route('categories.index')}}" class="block p-3 text-white   hover:bg-gray-300 font-bold ">Category</a>
                    <a href="{{route('products.index')}}" class="block p-3 text-white hover:bg-gray-300 font-bold">Product</a>
                    <a href="{{route('orders.index')}}" class="block p-3 text-white hover:bg-gray-300 font-bold">Orders</a>
                    <a href="" class="block p-3 text-white hover:bg-gray-300 font-bold"><i class="ri-user-line"></i>Users</a>
                    <form action="{{route('logout')}}" method="POST">
                        @csrf
                        <button type="submit" class="block w-full p-3 text-white
                         hover:bg-gray-300 text-left"><i class="ri-logout-box-line"></i>Logout</button>
                    </form>

                </div>

            </div>
        <div class="p-4 flex-1 sticky top-0">
            <h1 class="text-3xl font-bold text-black mb-1" >@yield('title')</h1>
            <hr class="h-1 bg-black font-bold">
            @yield('content')

        </div>
        </div>

    </body>
</html>
