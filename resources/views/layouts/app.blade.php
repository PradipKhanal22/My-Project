<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }} - @yield('title')</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.1/css/all.min.css"
        integrity="sha512-5Hs3dF2AEPkpNAR7UiOHba+lRSJNeM2ECkwxUIxC1Q/FLycGTbNapWXB4tP889k5T5Ju8fs4b1P5z/iB4nMfSQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/remixicon@4.3.0/fonts/remixicon.css" rel="stylesheet">

    

    <!-- Vite -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans antialiased bg-gray-300">
    <div class="flex">
        <!-- Sidebar -->
        <aside class="w-56 h-screen sticky top-0 bg-gradient-to-b from-purple-600 to-purple-500 shadow-lg">
            <div class="flex flex-col items-center py-5">
                <img src="{{ asset('image.png') }}" alt="Logo"
                    class="w-20al h-20 bg-white p-2 rounded-full shadow-lg">
                <h2 class="text-white font-bold mt-4 text-lg">Admin Panel</h2>
            </div>
            <nav class="mt-6 space-y-2">
                <a href="{{ route('dashboard') }}"
                    class="p-3 text-white hover:bg-gray-600 flex items-center transition duration-200 ease-in-out
    @if (Route::is('dashboard')) bg-gray-600 @endif">
                    <i class="ri-dashboard-line mr-2"></i> Dashboard
                </a>
                <a href="{{ route('categories.index') }}"
                    class="p-3 text-white hover:bg-gray-600 flex items-center transition duration-200 ease-in-out
    @if (Route::is('categories.index')) bg-gray-600 @endif">
                    <i class="ri-folder-line mr-2"></i> Categories
                </a>
                <a href="{{ route('products.index') }}"
                    class="p-3 text-white hover:bg-gray-600 flex items-center transition duration-200 ease-in-out
    @if (Route::is('products.index')) bg-gray-600 @endif">
                    <i class="ri-shopping-bag-2-line mr-2"></i> Products
                </a>
                <a href="{{ route('orders.index') }}"
                    class="p-3 text-white hover:bg-gray-600 flex items-center transition duration-200 ease-in-out
    @if (Route::is('orders.index')) bg-gray-600 @endif">
                    <i class="ri-shopping-cart-line mr-2"></i> Orders
                </a>
                <a href="{{ route('reviews.index') }}"
                    class="p-3 text-white hover:bg-gray-600 flex items-center transition duration-200 ease-in-out
    @if (Route::is('reviews.index')) bg-gray-600 @endif">
                    <i class="ri-chat-check-line mr-2"></i> Reviews
                </a>
                <a href="{{ route('users.index') }}"
                    class="p-3 text-white hover:bg-gray-600 flex items-center transition duration-200 ease-in-out
    @if (Route::is('users.index')) bg-gray-600 @endif">
                    <i class="ri-user-line mr-2"></i> Users
                </a>
                <form action="{{ route('logout') }}" method="POST"
                    class=" p-3 text-white hover:bg-red-700 flex items-center text-left transition duration-200 ease-in-out">
                    @csrf
                    <button type="submit" class="w-full flex items-center">
                        <i class="ri-logout-box-line text-red-900 mr-2"></i> Logout
                    </button>
                </form>
            </nav>
        </aside>

        <!-- Main Content -->
        <div class="p-4 flex-1 sticky top-0">
            <h1 class="text-3xl font-bold text-black mb-1">@yield('title')</h1>
            <hr class="h-1 bg-black font-bold">
            @yield('content')

        </div>
    </div>
    <div id="notification" class="hidden fixed top-4 right-4 bg-green-500 text-white py-3 px-6 rounded shadow-lg z-50">
        Product added to cart successfully!
    </div>

    <script>
        function showNotification(message, type = 'success') {
            const notification = document.getElementById('notification');
            notification.textContent = message;
            notification.className = `fixed top-4 right-4 py-3 px-6 rounded shadow-lg z-50 ${
                type === 'success' ? 'bg-green-500' : 'bg-red-500'
            } text-white`;
            notification.classList.remove('hidden');

            // Automatically hide the notification after 3 seconds
            setTimeout(() => {
                notification.classList.add('hidden');
            }, 3000);
        }

        // Trigger the notification if a session message is available
        @if (session('success'))
            showNotification("{{ session('success') }}", 'success');
        @endif
        @if (session('error'))
            showNotification("{{ session('error') }}", 'error');
        @endif
    </script>

</body>

</html>
