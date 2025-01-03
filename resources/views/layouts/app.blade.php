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
    <body class="font-sans antialiased bg-gray-500">
        {{-- @include('layouts.alert') --}}
        <div class="flex flex-col md:flex-row">
            <!-- Sidebar -->
            <div class="w-full md:w-56 h-screen sticky top-0 bg-purple-500 shadow md:block hidden">
                <img src="{{asset('image.png')}}" alt="" class="w-8/12 mx-auto mt-5 bg-white p-2 rounded-lg shadow-lg">
                <div class="mt-5">
                    <a href="{{route('dashboard')}}" class="block p-3 text-white hover:bg-black font-bold">Dashboard</a>
                    <a href="{{route('categories.index')}}" class="block p-3 text-white hover:bg-black font-bold">Category</a>
                    <a href="{{route('products.index')}}" class="block p-3 text-white hover:bg-black font-bold">Products</a>
                    <a href="{{route('orders.index')}}" class="block p-3 text-white hover:bg-black font-bold">Orders</a>
                    <a href="{{route('users.index')}}" class="block p-3 text-white hover:bg-black font-bold">Users</a>
                    <form action="{{route('logout')}}" method="POST">
                        @csrf
                        <button type="submit" class="block w-full p-3 text-white hover:bg-black text-left">
                            <i class="ri-logout-box-line"></i> Logout
                        </button>
                    </form>
                </div>
            </div>
            <!-- Mobile Toggle Button -->
            <div class="bg-purple-500 p-4 md:hidden flex justify-between items-center">
                <button id="toggle-sidebar" class="text-white font-bold">
                    <i class="ri-menu-line text-2xl"></i> Menu
                </button>
            </div>
            <!-- Sidebar Mobile -->
            <div id="mobile-sidebar" class="w-full absolute bg-purple-500 shadow-lg hidden md:hidden z-50">
                <div class="flex justify-between items-center p-4">
                    <img src="{{asset('image.png')}}" alt="" class="w-8/12 bg-white p-2 rounded-lg shadow-lg">
                    <button id="close-sidebar" class="text-white font-bold">
                        <i class="ri-close-line text-2xl"></i>
                    </button>
                </div>
                <div class="mt-5">
                    <a href="{{route('dashboard')}}" class="block p-3 text-white hover:bg-black font-bold">Dashboard</a>
                    <a href="{{route('categories.index')}}" class="block p-3 text-white hover:bg-black font-bold">Category</a>
                    <a href="{{route('products.index')}}" class="block p-3 text-white hover:bg-black font-bold">Products</a>
                    <a href="{{route('orders.index')}}" class="block p-3 text-white hover:bg-black font-bold">Orders</a>
                    <a href="{{route('users.index')}}" class="block p-3 text-white hover:bg-black font-bold">Users</a>
                    <form action="{{route('logout')}}" method="POST">
                        @csrf
                        <button type="submit" class="block w-full p-3 text-white hover:bg-black text-left">
                            <i class="ri-logout-box-line"></i> Logout
                        </button>
                    </form>
                </div>
            </div>
            <!-- Content -->
            <div class="p-4 flex-1">
                <h1 class="text-3xl font-bold text-black mb-1">@yield('title')</h1>
                <hr class="h-1 bg-black font-bold">
                @yield('content')
            </div>
        </div>

        <script>
            // JavaScript to toggle the sidebar
            const toggleButton = document.getElementById('toggle-sidebar');
            const closeButton = document.getElementById('close-sidebar');
            const mobileSidebar = document.getElementById('mobile-sidebar');

            toggleButton.addEventListener('click', () => {
                mobileSidebar.classList.remove('hidden');
            });

            closeButton.addEventListener('click', () => {
                mobileSidebar.classList.add('hidden');
            });
        </script>
    </body>
</html>
