<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@4.3.0/fonts/remixicon.css" rel="stylesheet" />
    <title>Document</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>
    @include('layouts.alert')
    <div class="mb-1 flex justify-between items-center px-5 bg-gradient-to-r from-orange-500 to-blue-400 text-white py-2">
        <div>
            <a href="" class="sm:block hidden ri-phone-fill"> 9765660867</a>
        </div>
        <div>
            @auth
                <a href="" class="text-black font-bold">Hi , <i
                        class="ri-user-line"></i>{{ auth()->user()->name }}</a>
                <a href="{{ route('mycart') }}" class="p-2 text-black font-bold"><i class="ri-shopping-cart-fill"></i>My
                    Cart</a>
                <form action="{{ route('logout') }}" method="post" class="inline">
                    @csrf
                    <button type="submit" class="p-2 font-bold text-black"><i
                            class="ri-logout-box-line"></i>Logout</button>
                </form>
            @else
                <a href="/login" class="p-2 relative text-black font-bold font-serif text-lg inline-block group">Login
                    <span
                        class="absolute left-0 bottom-0 h-[2px] w-0 bg-black transition-all duration-300 group-hover:w-full"></span>
                </a>
            @endauth
        </div>
    </div>
    <nav
        class="lg:flex hidden justify-between sticky top-0 items-center px-20 py-5 shadow-md bg-yellow-500 "style="z-index: 10000000">
        <div class="px-2 py-2  flex justify-between items-center rounded-lg ">
            {{-- <img src="{{asset('logo.png')}}" alt="No images found" class="w-12 h-12"> --}}
            <a href="{{ route('home') }}" class="text-2xl font-bold font-serif px-2">RetroKits Nepal</a>
        </div>
        <div>
            <a href="{{ route('home') }}" class="p-2 relative text-black font-bold text-lg inline-block group ">
                <span
                    class="absolute left-0 bottom-0 h-[2px] w-0 bg-black transition-all duration-300 group-hover:w-full 0"></span> Home</a>
            @php
                $categories = App\models\Category::orderBy('priority')->get();
            @endphp
            @foreach ($categories as $category)
                <a href="{{ route('categoryproduct', $category->id) }}"
                    class="p-2 relative text-black font-bold text-lg inline-block group">{{ $category->name }}
                    <span
                        class="absolute left-0 bottom-0 h-[2px] w-0 bg-black transition-all duration-300 group-hover:w-full"></span>
                </a>
            @endforeach
        </div>
    </nav>
    <nav
        class="lg:hidden block  sticky top-0 items-center px-20 py-5 shadow-md bg-yellow-500 "style="z-index: 10000000">
        <div class=" px-2 py-2  flex justify-between items-center rounded-lg ">
            {{-- <img src="{{asset('logo.png')}}" alt="No images found" class="w-12 h-12"> --}}
            <a href="{{ route('home') }}" class="text-2xl font-bold font-serif px-2">RetroKits Nepal</a>
            <i class="ri-menu-3-line text-2xl border p-4 rounded-lg" onclick="toggleMenu()"></i>
        </div>
        <div class="hidden mt-4 sticky top-0 font-bold" id="mob-menu">
            <a href="{{ route('home') }}" class="p-2  relative text-black font-bold text-lg inline-block group"> <i
                    class="ri-home-3-fill"></i> Home
                <span
                    class="absolute left-0 bottom-0 h-[2px] w-0 bg-black transition-all duration-300 group-hover:w-full"></span></a>
            @php
                $categories = App\models\Category::orderBy('priority')->get();
            @endphp
            @foreach ($categories as $category)
                <a href="{{ route('categoryproduct', $category->id) }}"
                    class="p-2 relative text-black font-bold text-lg inline-block group">{{ $category->name }}
                    <span
                        class="absolute left-0 bottom-0 h-[2px] w-0 bg-black transition-all duration-300 group-hover:w-full"></span>
                </a>
            @endforeach
        </div>
    </nav>
    @yield('content')
    <footer class="mt-1">
        <div class="grid md:grid-cols-4 sm:gird-cols-2 px-20 gap-10 bg-pink-300 py-10 mb-2">
            <div>
                <h2 class = "text-2xl font-bold"> Quick Links </h2>
                <ul>
                    <li><a href="{{ route('home') }}" class="p-2 font-bold">Home </a>
                    <li><a href="{{ route('about') }}" class="p-2 font-bold"> About </a>
                    <li><a href="{{ route('contact') }}" class="p-2 font-bold"> Contact </a>
                </ul>
            </div>
            <div class="font-semibold">
                <h2 class = "text-2xl font-bold"> Contact Us </h2>
                <p><i class="ri-mail-line"></i> Email : retronepal74@gmail.com<br> <i class="ri-phone-fill"></i>Phone:
                    9765660867</p>
                <p><i class="ri-map-pin-line"></i>Address: Kawasoti-9,
                    Nawalpur <br>
                    Nepal
                </p>
            </div>
            <div>
                <h2 class = "text-2xl font-bold">Social Links</h2>
                <ul>
                    <li><a href="https://www.facebook.com/search/top?q=retro%20kits%20nepal" class="font-bold"><i
                                class="ri-facebook-circle-fill"></i> Facebook </a> </li>
                    <li><a href="https://www.twitter.com/RetroKitsNepal" class="font-bold"> <i
                                class="ri-twitter-line"></i> Twitter </a> </li>
                    <li><a href="https://www.instagram.com/retrokitsnp/" class="font-bold"><i
                                class="ri-instagram-fill"></i> Instagram </a> </li>
                </ul>
            </div>
        </div>
        <div class = "bg-purple-700 text-white text-center py-5">
            <p> @RetroKits Nepal &copy; 2021 All rights reserved</p>
        </div>
        </div>
    </footer>
    <script>
        function toggleMenu() {
            let menu = document.getElementById('mob-menu');
            if (menu.classList.contains('hidden'))
             {
                menu.classList.remove('hidden');
                menu.classList.add('grid');
            } else {
                menu.classList.add('hidden');
                menu.classList.remove('grid');
            }
        }
    </script>
</body>

</html>
