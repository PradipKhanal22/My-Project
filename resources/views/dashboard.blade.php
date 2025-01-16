@extends('layouts.app')
@section('title', 'Dashboard')
@section('content')
<div class="container mx-auto px-4 py-8">
    <p class="mt-3 text-2xl bg-white text-gray-800 p-3 rounded-lg shadow-md">
        Hi! Welcome back, <a class="text-red-600 font-bold hover:underline cursor-pointer">Admin</a>
    </p>

    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8 mt-6">
        <!-- Total Categories -->
        <div class="px-6 py-8 bg-gradient-to-r from-red-500 to-yellow-400 text-white flex items-center rounded-lg shadow-md hover:shadow-lg transform hover:scale-105 transition duration-300 cursor-pointer">
            <div class="flex items-center space-x-4">
                <i class="ri-list-settings-line text-5xl"></i>
                <div class="flex">
                    <div>
                    <h2 class="text-lg font-semibold">Total Categories</h2>
                    <p class="text-3xl font-bold">{{$totalcategories}}</p>
                    </div>
                    <a href="{{route('categories.index')}}" class="ml-8 font-bold text-xl underline">ViewInfo>></a>
                </div>
            </div>
        </div>

        <!-- Total Products -->
        <div class="px-6 py-8 bg-purple-700 text-white flex items-center rounded-lg shadow-md hover:shadow-lg transform hover:scale-105 transition duration-300 cursor-pointer">
            <div class="flex items-center space-x-4">
                <i class="ri-box-line text-5xl"></i>
                <div class="flex">
                    <div>
                    <h2 class="text-lg font-semibold">Total Products</h2>
                    <p class="text-3xl font-bold">{{$totalproduct}}</p>
                    </div>
                    <a href="{{route('products.index')}}" class="ml-8 font-bold text-xl underline">ViewInfo>></a>

                </div>
            </div>
        </div>

        <!-- Total Orders -->
        <div class="px-6 py-8 bg-red-600 text-white flex items-center rounded-lg shadow-md hover:shadow-lg transform hover:scale-105 transition duration-300 cursor-pointer">
            <div class="flex items-center space-x-4">
                <i class="ri-shopping-cart-line text-5xl"></i>
                <div class="flex">
                    <div>
                    <h2 class="text-lg font-semibold">Total Orders</h2>
                    <p class="text-3xl font-bold">{{$totalorders}}</p>
                    </div>
                    <a href="{{route('orders.index')}}" class="ml-8 font-bold text-xl underline">ViewInfo>></a>
                </div>
            </div>
        </div>

        <!-- Pending Orders -->
        <div class="px-6 py-8 bg-purple-600 text-white flex items-center rounded-lg shadow-md hover:shadow-lg transform hover:scale-105 transition duration-300 cursor-pointer">
            <div class="flex items-center space-x-4">
                <i class="ri-time-line text-5xl"></i>
                <div>
                    <h2 class="text-lg font-semibold">Pending Orders</h2>
                    <p class="text-3xl font-bold">{{$pendingorders}}</p>
                </div>
            </div>
        </div>

        <!-- Total Users -->
        <div class="px-6 py-8 bg-orange-700 text-white flex items-center rounded-lg shadow-md hover:shadow-lg transform hover:scale-105 transition duration-300 cursor-pointer">
            <div class="flex items-center space-x-4">
                <i class="ri-user-line text-5xl"></i>
                <div class="flex">
                    <div>
                    <h2 class="text-lg font-semibold">Total Users</h2>
                    <p class="text-3xl font-bold">{{$totalusers}}</p>
                    </div>
                    <a href="{{route('users.index')}}" class="ml-8 font-bold text-xl underline">ViewInfo>></a>
                </div>
            </div>
        </div>

        <!-- Total Sales -->
        <div class="px-6 py-8 bg-pink-500 text-white flex items-center rounded-lg shadow-md hover:shadow-lg transform hover:scale-105 transition duration-300 cursor-pointer">
            <div class="flex items-center space-x-4">
                <i class="ri-money-dollar-circle-line text-5xl"></i>
                <div>
                    <h2 class="text-lg font-semibold">Total Sales</h2>
                    <p class="text-3xl font-bold">{{$deliveredorders}}</p>
                </div>
            </div>
        </div>
            <div>
                <p class="text-red-500 font-bold ml-16 mb-8 text-3xl">Category wise Product</p>
                <canvas id="myChart"></canvas>
            </div>
        </div>
        <div class="w-50px mb-8">
            <p class="text-red-500 font-bold ml-96 mb-8 text-3xl">Total Orders</p>
            <canvas id="myChart2"></canvas>
        </div>
        <div class="w-50px">
            <p class="text-red-500 font-bold ml-96 mb-8 text-3xl">Total Products</p>
            <canvas id="myChart3"></canvas>
        </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
  const ctx = document.getElementById('myChart');

  new Chart(ctx, {
    type: 'pie',
    data: {
      labels: {!! json_encode($allcategories) !!},
      datasets: [{
        label: 'No of products',
        data: {!! json_encode($categoryproduct) !!},
        borderWidth: 1
      }]
    },
    options: {
      scales: {

      }
    }
  });
</script>

<script class="mb-8">
    const ctx2 = document.getElementById('myChart2');

    new Chart(ctx2, {
      type: 'line',

        data: {
            labels: {!! $orderdates !!},
            datasets: [{
            label: 'Total Orders',
            data: {!! $ordercount !!},
            borderWidth: 1.5,
            backgroundColor: 'rgba(54, 162, 235, 0.7)',
            borderColor: 'rgba(0, 0, 255, 0.5)',
            tension: 0.2
            }]
        },
    });
  </script>
<script>
    const ctx3 = document.getElementById('myChart3');

    new Chart(ctx3, {
      type: 'line',

        data: {
            labels: {!! $productdates !!},
            datasets: [{
            label: 'Total Products',
            data: {!! $productcount !!},
            borderWidth: 1.5,
            backgroundColor: 'rgba(54, 162, 235, 0.7)',
            borderColor: 'rgba(0, 0, 255, 0.5)',
            tension: 0.2
            }]
        },
    });
  </script>

@endsection
