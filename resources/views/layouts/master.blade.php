<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.1/css/all.min.css" integrity="sha512-5Hs3dF2AEPkpNAR7UiOHba+lRSJNeM2ECkwxUIxC1Q/FLycGTbNapWXB4tP889k5T5Ju8fs4b1P5z/iB4nMfSQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Document</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>
    @include('layouts.alert')
    <div class="flex justify-between items-center px-20 bg-orange-500 text-white py-2 h-10">
        <div>
            <a href="" class="sm:block hidden"><i class="fa fa-phone p-2 bg-blue-500 rounded-full" aria-hidden="true"></i> 9765660867</a>
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
                <a href="/login" class=" relative text-black font-bold font-serif text-lg inline-block group"><i class="fa fa-user" aria-hidden="true"></i>
                    <span
                        class="absolute left-0 bottom-0 h-[2px] w-0 bg-black transition-all duration-300 group-hover:w-full"></span>
                </a>
            @endauth
        </div>
    </div>
    <nav
        class="lg:flex hidden justify-between sticky top-0 items-center h-14 px-14 py-5 shadow-lg bg-white ; "style="z-index: 10000000">
        <div class="px-2 py-2  flex justify-between items-center rounded-lg">
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
        <div class="grid md:grid-cols-3 sm:gird-cols-2 px-20 gap-20 bg-slate-200 py-10 ">
            <div>
                <h2 class = "text-2xl font-bold"> Quick Links </h2>
                <ul>
                    <li><a href="{{ route('home') }}" class="p-2 font-bold">Home </a>
                    <li><a href="{{ route('about') }}" class="p-2 font-bold"> About </a>
                    <li><a href="{{ route('contact') }}" class="p-2 font-bold"> Contact </a>
                </ul>
            </div>
            <div class="font-semibold mr-20">
                <h2 class = "text-2xl font-bold"> Contact Us </h2>
                <p><i class="ri-mail-line"></i> Email : retronepal74@gmail.com<br> <i class="ri-phone-fill"></i>Phone:
                    9765660867</p>
                <p><i class="ri-map-pin-line"></i>Address: Kawasoti-9,
                    Nawalpur <br>
                    Nepal
                </p>
            </div>
            <div class="ml-20">
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
        <div class = "bg-black text-white text-center py-5">
            <p> &copy; 2025 All rights reserved. This theme was developed by <a href="" class="font-bold text-orange-600 underline">Pradip Khanal</a>. Please refrain from using it for Commercial Purposes.</p>
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
