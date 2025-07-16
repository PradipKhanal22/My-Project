<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }} - @yield('title')</title>

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.1/css/all.min.css" crossorigin="anonymous" />
    <link href="https://cdn.jsdelivr.net/npm/remixicon@4.3.0/fonts/remixicon.css" rel="stylesheet">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans antialiased bg-gray-300">
    <div class="md:flex min-h-screen">
        <!-- Mobile Toggle -->
        <div class="md:hidden bg-purple-600 text-white flex items-center justify-between px-4 py-3 shadow-lg">
            <div class="font-bold text-lg">Admin Panel</div>
            <button id="menu-toggle" class="focus:outline-none">
                <i class="ri-menu-line text-2xl"></i>
            </button>
        </div>

        <!-- Sidebar -->
        <aside id="sidebar"
            class="md:block hidden w-64 bg-gradient-to-b from-purple-600 to-purple-500 text-white md:h-screen fixed top-0 left-0 z-50 transition-transform duration-300 ease-in-out transform md:translate-x-0">
            <div class="flex flex-col items-center py-5">
                <img src="{{ asset('image.png') }}" alt="Logo" class="w-20 h-20 bg-white p-2 rounded-full shadow-lg">
                <h2 class="text-white font-bold mt-4 text-lg">Admin Panel</h2>
            </div>
            <nav class="mt-6 space-y-2 px-2">
                <a href="{{ route('dashboard') }}" class="p-3 block hover:bg-gray-600 rounded @if(Route::is('dashboard')) bg-gray-600 @endif">
                    <i class="ri-dashboard-line mr-2"></i> Dashboard
                </a>
                <a href="{{ route('categories.index') }}" class="p-3 block hover:bg-gray-600 rounded @if(Route::is('categories.index')) bg-gray-600 @endif">
                    <i class="ri-folder-line mr-2"></i> Categories
                </a>
                <a href="{{ route('products.index') }}" class="p-3 block hover:bg-gray-600 rounded @if(Route::is('products.index')) bg-gray-600 @endif">
                    <i class="ri-shopping-bag-2-line mr-2"></i> Products
                </a>
                <a href="{{ route('orders.index') }}" class="p-3 block hover:bg-gray-600 rounded @if(Route::is('orders.index')) bg-gray-600 @endif">
                    <i class="ri-shopping-cart-line mr-2"></i> Orders
                </a>
                <a href="{{ route('reviews.index') }}" class="p-3 block hover:bg-gray-600 rounded @if(Route::is('reviews.index')) bg-gray-600 @endif">
                    <i class="ri-chat-check-line mr-2"></i> Reviews
                </a>
                <a href="{{ route('users.index') }}" class="p-3 block hover:bg-gray-600 rounded @if(Route::is('users.index')) bg-gray-600 @endif">
                    <i class="ri-user-line mr-2"></i> Users
                </a>
                <form action="{{ route('logout') }}" method="POST" class="p-3 block hover:bg-red-700 rounded">
                    @csrf
                    <button type="submit" class="w-full text-left flex items-center">
                        <i class="ri-logout-box-line mr-2 text-red-300"></i> Logout
                    </button>
                </form>
                
            </nav>
        </aside>

        <!-- Overlay for mobile -->
        <div id="overlay" class="fixed inset-0 bg-black bg-opacity-50 z-40 hidden md:hidden"></div>

        <!-- Main Content -->
        <div class="flex-1 p-4 md:ml-64">
            <h1 class="text-3xl font-bold text-black mb-1">@yield('title')</h1>
            <hr class="h-1 bg-black font-bold mb-4">
            @yield('content')
        </div>

    </div>

    <div id="notification" class="hidden fixed top-4 right-4 bg-green-500 text-white py-3 px-6 rounded shadow-lg z-50">
        Product added to cart successfully!
    </div>

    <script>
        // Toggle Sidebar
        const toggleButton = document.getElementById('menu-toggle');
        const sidebar = document.getElementById('sidebar');
        const overlay = document.getElementById('overlay');

        toggleButton?.addEventListener('click', () => {
            sidebar.classList.toggle('hidden');
            overlay.classList.toggle('hidden');
        });

        overlay?.addEventListener('click', () => {
            sidebar.classList.add('hidden');
            overlay.classList.add('hidden');
        });

        // Notification
        function showNotification(message, type = 'success') {
            const notification = document.getElementById('notification');
            notification.textContent = message;
            notification.className = `fixed top-4 right-4 py-3 px-6 rounded shadow-lg z-50 ${type === 'success' ? 'bg-green-500' : 'bg-red-500'} text-white`;
            notification.classList.remove('hidden');
            setTimeout(() => notification.classList.add('hidden'), 3000);
        }

        @if (session('success'))
            showNotification("{{ session('success') }}", 'success');
        @endif
        @if (session('error'))
            showNotification("{{ session('error') }}", 'error');
        @endif
    </script>
</body>
</html>
