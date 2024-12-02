<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-black flex items-center justify-center min-h-screen">
        <form class="shadow-md rounded px-8 pt-6 pb-8 mb-4"action="{{route('login')}}" method="POST">
            @csrf
            <h1 class="text-center text-2 text-white font-serif font-bold py-2">Login</h1>
            <div class="mb-4">
                <input class="rounded-2xl w-full py-2 px-8" name="email" type="email" placeholder="Enter Email">
                @error('email')
                    <p class="text-red-700">{{($message)}}</p>
                @enderror
            </div>
            <div class="mb-6">
                <input class="rounded-2xl w-full px-8 py-2" name="password" type="password" placeholder="Enter Password">
                @error('password')
                    <p class="text-red-700">{{($message)}}</p>
                @enderror
            </div>
            <p class="my-4 text-blue-600 tetx-center">
                <a href="" class="">Forgot Password ?</a>
             </p>
                <button type="submit" class=" rounded-2xl w-full bg-gradient-to-r from-orange-500 to-pink-500 hover:bg-gradient-to-l text-white font-bold py-2 px-8"> Login</button>
        </form>
</body>
</html>
