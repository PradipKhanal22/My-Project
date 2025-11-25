<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.1/css/all.min.css" integrity="sha512-5Hs3dF2AEPkpNAR7UiOHba+lRSJNeM2ECkwxUIxC1Q/FLycGTbNapWXB4tP889k5T5Ju8fs4b1P5z/iB4nMfSQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/remixicon@3.5.0/fonts/remixicon.css" rel="stylesheet">
    <title>RetroKits Nepal - Authentic Vintage Sportswear</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="flex flex-col min-h-screen">
    @include('layouts.alert')

    <!-- Top Bar -->
    <div class="bg-gradient-to-r from-red-600 to-yellow-500 text-white py-2 sticky top-0 z-50 shadow-md">
        <div class="container mx-auto px-4 sm:px-6 lg:px-12">
            <div class="flex justify-between items-center text-sm">
                <!-- Contact Info -->
                <div class="flex items-center gap-4">
                    <a href="tel:9765660867" class="hidden sm:flex items-center gap-2 hover:text-gray-100 transition-colors">
                        <i class="fa-solid fa-phone"></i>
                        <span>9765660867</span>
                    </a>
                    <a href="mailto:retronepal74@gmail.com" class="hidden md:flex items-center gap-2 hover:text-gray-100 transition-colors">
                        <i class="fa-solid fa-envelope"></i>
                        <span>retronepal74@gmail.com</span>
                    </a>
                </div>

                <!-- User Actions -->
                <div class="flex items-center gap-3">
                    @auth
                        <span class="hidden sm:inline text-sm">Welcome, <strong>{{ auth()->user()->name }}</strong></span>

                        <!-- Cart -->
                        <a href="{{ route('mycart') }}" class="relative hover:text-gray-100 transition-colors p-1">
                            <i class="fa-solid fa-cart-shopping text-lg"></i>
                            @php
                                $no_of_items = \App\Models\Cart::where('user_id', auth()->id())->count();
                            @endphp
                            @if($no_of_items > 0)
                            <span class="absolute -top-2 -right-2 w-5 h-5 text-xs flex items-center justify-center bg-white text-red-600 rounded-full font-bold">
                                {{ $no_of_items }}
                            </span>
                            @endif
                        </a>

                        <!-- Wishlist -->
                        <a href="{{ route('wishlist.index') }}" class="hover:text-gray-100 transition-colors p-1">
                            <i class="fa-regular fa-heart text-lg"></i>
                        </a>

                        <!-- Logout -->
                        <form action="{{ route('logout') }}" method="post" class="inline">
                            @csrf
                            <button type="submit" class="hover:text-gray-100 transition-colors flex items-center gap-1 p-1">
                                <i class="ri-logout-box-line text-lg"></i>
                                <span class="hidden sm:inline">Logout</span>
                            </button>
                        </form>
                    @else
                        <a href="/login" class="bg-white text-red-600 px-4 py-1 rounded-full font-semibold hover:bg-gray-100 transition-all flex items-center gap-2">
                            <i class="fa-solid fa-user"></i>
                            <span>Login</span>
                        </a>
                    @endauth
                </div>
            </div>
        </div>
    </div>

    <!-- Main Navigation -->
    <nav class="bg-white shadow-md sticky top-10 z-40 border-b border-gray-100">
        <div class="container mx-auto px-4 sm:px-6 lg:px-8 xl:px-12">
            <div class="flex justify-between items-center h-20">
                <!-- Logo -->
                <a href="{{ route('home') }}" class="flex items-center group flex-shrink-0">
                    <img src="{{ asset('logo1.png') }}" alt="RetroKits Nepal" class="h-12 w-auto transition-all duration-300 group-hover:scale-110 drop-shadow-md">
                </a>

                <!-- Desktop Navigation -->
                <div class="hidden lg:flex items-center gap-1 flex-1 justify-center">
                    <a href="{{ route('home') }}" class="px-4 py-2.5 {{ request()->routeIs('home') ? 'bg-red-600 text-white' : 'text-gray-800 hover:text-white' }} hover:bg-gradient-to-r hover:from-red-600 hover:to-red-500 font-semibold rounded-lg transition-all duration-300 relative overflow-hidden group">
                        <span class="relative z-10 flex items-center gap-1.5 text-sm">
                            <i class="ri-home-5-line"></i>
                            Home
                        </span>
                    </a>

                    @php
                        $categories = App\models\Category::orderBy('priority')->get();
                    @endphp
                    @foreach ($categories as $category)
                        <a href="{{ route('categoryproduct', $category->id) }}" class="px-4 py-2.5 {{ request()->routeIs('categoryproduct') && request()->route('id') == $category->id ? 'bg-red-600 text-white' : 'text-gray-800 hover:text-white' }} hover:bg-gradient-to-r hover:from-red-600 hover:to-red-500 font-semibold rounded-lg transition-all duration-300 relative overflow-hidden group">
                            <span class="relative z-10 flex items-center gap-1.5 text-sm">
                                <i class="ri-shirt-line"></i>
                                {{ $category->name }}
                            </span>
                        </a>
                    @endforeach
                </div>

                <!-- Search Bar & User Profile -->
                <div class="hidden lg:flex items-center gap-3 flex-shrink-0">
                    <form action="{{ route('search') }}" method="GET" class="relative group">
                        <input type="search"
                               placeholder="Search..."
                               class="pl-4 pr-11 py-2.5 border-2 border-gray-200 rounded-full focus:outline-none focus:border-red-600 focus:shadow-lg transition-all w-52 bg-gray-50 focus:bg-white text-sm"
                               name="qry"
                               value="{{ request()->qry }}"
                               minlength="2"
                               required>
                        <button type="submit" class="absolute right-2 top-1/2 -translate-y-1/2 bg-gradient-to-r from-red-600 to-red-500 text-white w-7 h-7 rounded-full hover:from-red-700 hover:to-red-600 transition-all flex items-center justify-center shadow-md">
                            <i class="fa-solid fa-magnifying-glass text-xs"></i>
                        </button>
                    </form>

                    @auth
                        <a href="{{ route('userprofile.edit') }}" class="group relative flex-shrink-0">
                            <img src="{{ asset('avatar.jpg') }}" alt="User Avatar" class="w-10 h-10 rounded-full shadow-md group-hover:shadow-xl transition-all border-2 border-gray-200 group-hover:border-red-600 ring-2 ring-transparent group-hover:ring-red-100">
                        </a>
                    @endauth
                </div>

                <!-- Mobile Menu Button -->
                <button onclick="toggleMobileMenu()" class="lg:hidden text-gray-700 hover:text-red-600 p-2 rounded-lg hover:bg-red-50 transition-all">
                    <i class="ri-menu-3-line text-3xl" id="menuIcon"></i>
                </button>
            </div>
        </div>

        <!-- Mobile Navigation -->
        <div id="mobileMenu" class="lg:hidden hidden border-t border-gray-200 bg-white shadow-inner">
            <div class="container mx-auto px-4 py-4 space-y-2">
                <!-- Mobile Search -->
                <form action="{{ route('search') }}" method="GET" class="mb-4">
                    <div class="relative">
                        <input type="search"
                               placeholder="Search products..."
                               class="w-full pl-5 pr-12 py-3 border-2 border-gray-200 rounded-full focus:outline-none focus:border-red-600 bg-gray-50 focus:bg-white transition-all"
                               name="qry"
                               value="{{ request()->qry }}"
                               minlength="2"
                               required>
                        <button type="submit" class="absolute right-2 top-1/2 -translate-y-1/2 bg-gradient-to-r from-red-600 to-red-500 text-white w-9 h-9 rounded-full flex items-center justify-center">
                            <i class="fa-solid fa-magnifying-glass"></i>
                        </button>
                    </div>
                </form>

                <!-- Mobile Menu Links -->
                <a href="{{ route('home') }}" class="flex items-center gap-3 px-4 py-3 {{ request()->routeIs('home') ? 'bg-red-600 text-white' : 'text-gray-700 hover:text-red-600' }} hover:bg-gradient-to-r hover:from-red-50 hover:to-yellow-50 rounded-xl font-semibold transition-all">
                    <i class="ri-home-3-fill text-xl"></i>
                    <span>Home</span>
                </a>

                @foreach ($categories as $category)
                    <a href="{{ route('categoryproduct', $category->id) }}" class="flex items-center gap-3 px-4 py-3 {{ request()->routeIs('categoryproduct') && request()->route('id') == $category->id ? 'bg-red-600 text-white' : 'text-gray-700 hover:text-red-600' }} hover:bg-gradient-to-r hover:from-red-50 hover:to-yellow-50 rounded-xl font-semibold transition-all">
                        <i class="ri-shirt-line text-xl"></i>
                        <span>{{ $category->name }}</span>
                    </a>
                @endforeach

                @auth
                    <a href="{{ route('userprofile.edit') }}" class="flex items-center gap-3 px-4 py-3 {{ request()->routeIs('userprofile.edit') ? 'bg-red-600 text-white' : 'text-gray-700 hover:text-red-600' }} hover:bg-gradient-to-r hover:from-red-50 hover:to-yellow-50 rounded-xl font-semibold transition-all">
                        <i class="ri-user-line text-xl"></i>
                        <span>My Profile</span>
                    </a>
                @endauth
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <main class="flex-grow">
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="bg-gray-900 text-gray-300 mt-20">
        <!-- Main Footer Content -->
        <div class="container mx-auto px-6 lg:px-12 py-16">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-12">
                <!-- Company Info -->
                <div class="space-y-4">
                    <div class="flex items-center gap-3">
                        <img src="{{ asset('logo1.png') }}" alt="RetroKits Nepal" class="h-12 w-auto">
                        <div>
                            <h3 class="text-xl font-bold text-white">RetroKits</h3>
                            <p class="text-sm text-red-500 font-semibold">Nepal</p>
                        </div>
                    </div>
                    <p class="text-sm leading-relaxed">
                        Your ultimate destination for authentic vintage sportswear. We bring you the finest collection of retro sports jerseys and memorabilia.
                    </p>
                    <!-- Social Links -->
                    <div class="flex gap-3 pt-2">
                        <a href="https://www.facebook.com/search/top?q=retro%20kits%20nepal" target="_blank" class="w-10 h-10 bg-gray-800 hover:bg-blue-600 rounded-full flex items-center justify-center transition-all duration-300 hover:scale-110">
                            <i class="fab fa-facebook-f text-lg"></i>
                        </a>
                        <a href="https://www.instagram.com/retrokitsnp/" target="_blank" class="w-10 h-10 bg-gray-800 hover:bg-pink-600 rounded-full flex items-center justify-center transition-all duration-300 hover:scale-110">
                            <i class="fab fa-instagram text-lg"></i>
                        </a>
                        <a href="https://www.twitter.com/RetroKitsNepal" target="_blank" class="w-10 h-10 bg-gray-800 hover:bg-blue-400 rounded-full flex items-center justify-center transition-all duration-300 hover:scale-110">
                            <i class="fab fa-twitter text-lg"></i>
                        </a>
                    </div>
                </div>

                <!-- Quick Links -->
                <div>
                    <h3 class="text-lg font-bold text-white mb-6 relative inline-block">
                        Quick Links
                        <span class="absolute bottom-0 left-0 w-12 h-0.5 bg-red-600"></span>
                    </h3>
                    <ul class="space-y-3">
                        <li>
                            <a href="{{ route('home') }}" class="flex items-center gap-2 hover:text-red-500 transition-colors group">
                                <i class="ri-arrow-right-s-line group-hover:translate-x-1 transition-transform"></i>
                                Home
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('products') }}" class="flex items-center gap-2 hover:text-red-500 transition-colors group">
                                <i class="ri-arrow-right-s-line group-hover:translate-x-1 transition-transform"></i>
                                Shop
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('about') }}" class="flex items-center gap-2 hover:text-red-500 transition-colors group">
                                <i class="ri-arrow-right-s-line group-hover:translate-x-1 transition-transform"></i>
                                About Us
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('contact') }}" class="flex items-center gap-2 hover:text-red-500 transition-colors group">
                                <i class="ri-arrow-right-s-line group-hover:translate-x-1 transition-transform"></i>
                                Contact
                            </a>
                        </li>
                        @auth
                        <li>
                            <a href="{{ route('mycart') }}" class="flex items-center gap-2 hover:text-red-500 transition-colors group">
                                <i class="ri-arrow-right-s-line group-hover:translate-x-1 transition-transform"></i>
                                My Cart
                            </a>
                        </li>
                        @endauth
                    </ul>
                </div>

                <!-- Categories -->
                <div>
                    <h3 class="text-lg font-bold text-white mb-6 relative inline-block">
                        Categories
                        <span class="absolute bottom-0 left-0 w-12 h-0.5 bg-red-600"></span>
                    </h3>
                    <ul class="space-y-3">
                        @php
                            $footerCategories = App\models\Category::orderBy('priority')->take(5)->get();
                        @endphp
                        @foreach ($footerCategories as $category)
                        <li>
                            <a href="{{ route('categoryproduct', $category->id) }}" class="flex items-center gap-2 hover:text-red-500 transition-colors group">
                                <i class="ri-arrow-right-s-line group-hover:translate-x-1 transition-transform"></i>
                                {{ $category->name }}
                            </a>
                        </li>
                        @endforeach
                    </ul>
                </div>

                <!-- Contact Info -->
                <div>
                    <h3 class="text-lg font-bold text-white mb-6 relative inline-block">
                        Contact Us
                        <span class="absolute bottom-0 left-0 w-12 h-0.5 bg-red-600"></span>
                    </h3>
                    <ul class="space-y-4">
                        <li class="flex items-start gap-3">
                            <i class="ri-map-pin-line text-red-500 text-xl mt-1"></i>
                            <div>
                                <p class="font-semibold text-white">Address</p>
                                <p class="text-sm">Kawasoti-9, Nawalpur<br>Nepal</p>
                            </div>
                        </li>
                        <li class="flex items-start gap-3">
                            <i class="ri-phone-line text-red-500 text-xl mt-1"></i>
                            <div>
                                <p class="font-semibold text-white">Phone</p>
                                <a href="tel:9765660867" class="text-sm hover:text-red-500 transition-colors">9765660867</a>
                            </div>
                        </li>
                        <li class="flex items-start gap-3">
                            <i class="ri-mail-line text-red-500 text-xl mt-1"></i>
                            <div>
                                <p class="font-semibold text-white">Email</p>
                                <a href="mailto:retronepal74@gmail.com" class="text-sm hover:text-red-500 transition-colors break-all">retronepal74@gmail.com</a>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        <!-- Payment Methods & Trust Badges -->
        <div class="border-t border-gray-800">
            <div class="container mx-auto px-6 lg:px-12 py-6">
                <div class="flex flex-wrap items-center justify-center gap-6 text-sm text-gray-400">
                    <div class="flex items-center gap-2">
                        <i class="ri-shield-check-line text-green-500 text-xl"></i>
                        <span>100% Authentic</span>
                    </div>
                    <div class="flex items-center gap-2">
                        <i class="ri-truck-line text-blue-500 text-xl"></i>
                        <span>Fast Delivery</span>
                    </div>
                    <div class="flex items-center gap-2">
                        <i class="ri-lock-line text-yellow-500 text-xl"></i>
                        <span>Secure Payment</span>
                    </div>
                    <div class="flex items-center gap-2">
                        <i class="ri-customer-service-2-line text-purple-500 text-xl"></i>
                        <span>24/7 Support</span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Bottom Bar -->
        <div class="bg-black text-gray-400">
            <div class="container mx-auto px-6 lg:px-12 py-6">
                <div class="flex flex-col md:flex-row justify-between items-center gap-4 text-sm">
                    <p class="text-center md:text-left">
                        &copy; {{ date('Y') }} <span class="text-red-500 font-semibold">RetroKits Nepal</span>. All rights reserved.
                    </p>
                    <p class="text-center">
                        Designed & Developed by
                        <a href="https://pradipkhanal25.com.np/" class="text-red-500 hover:text-red-400 font-semibold transition-colors">Pradip Khanal</a>
                    </p>
                    <div class="flex gap-4">
                        <a href="#" class="hover:text-white transition-colors">Privacy Policy</a>
                        <span>|</span>
                        <a href="#" class="hover:text-white transition-colors">Terms of Service</a>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <!-- Back to Top Button -->
    <button id="backToTop" class="fixed bottom-8 right-8 w-12 h-12 bg-gradient-to-r from-red-600 to-yellow-500 text-white rounded-full shadow-lg hover:shadow-xl transform hover:scale-110 transition-all duration-300 z-50 hidden items-center justify-center">
        <i class="ri-arrow-up-line text-xl"></i>
    </button>

    <!-- Scripts -->
    <script>
        // Mobile Menu Toggle
        function toggleMobileMenu() {
            const menu = document.getElementById('mobileMenu');
            const icon = document.getElementById('menuIcon');

            if (menu.classList.contains('hidden')) {
                menu.classList.remove('hidden');
                icon.classList.remove('ri-menu-3-line');
                icon.classList.add('ri-close-line');
            } else {
                menu.classList.add('hidden');
                icon.classList.remove('ri-close-line');
                icon.classList.add('ri-menu-3-line');
            }
        }

        // Back to Top Button
        const backToTopButton = document.getElementById('backToTop');

        window.addEventListener('scroll', () => {
            if (window.pageYOffset > 300) {
                backToTopButton.classList.remove('hidden');
                backToTopButton.classList.add('flex');
            } else {
                backToTopButton.classList.add('hidden');
                backToTopButton.classList.remove('flex');
            }
        });

        backToTopButton.addEventListener('click', () => {
            window.scrollTo({
                top: 0,
                behavior: 'smooth'
            });
        });

        // Close mobile menu when clicking outside
        document.addEventListener('click', (e) => {
            const menu = document.getElementById('mobileMenu');
            const menuButton = document.querySelector('[onclick="toggleMobileMenu()"]');

            if (!menu.contains(e.target) && !menuButton.contains(e.target) && !menu.classList.contains('hidden')) {
                toggleMobileMenu();
            }
        });

        // Active link highlighting
        const currentPath = window.location.pathname;
        const navLinks = document.querySelectorAll('nav a');

        navLinks.forEach(link => {
            if (link.getAttribute('href') === currentPath) {
                link.classList.add('text-red-600');
            }
        });
    </script>
</body>

</html>
