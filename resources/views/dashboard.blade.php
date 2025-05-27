@extends('layouts.app')
@section('title', 'Dashboard')

@section('content')
<div class="container mx-auto px-4 py-8">
    <p class="mt-3 text-2xl bg-white text-gray-800 p-4 rounded-lg shadow-md">
        Hi! Welcome back, <span class="text-red-600 font-bold hover:underline cursor-pointer">Admin</span>
    </p>

    {{-- Stats Cards --}}
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 mt-6">
        {{-- Total Categories --}}
        <div class="px-6 py-8 bg-gradient-to-r from-red-500 to-yellow-400 text-white rounded-lg shadow-md hover:shadow-lg transform hover:scale-105 transition">
            <div class="flex items-center justify-between">
                <div>
                    <i class="ri-list-settings-line text-5xl"></i>
                </div>
                <div class="ml-4">
                    <h2 class="text-lg font-semibold">Total Categories</h2>
                    <p class="text-3xl font-bold">{{ $totalcategories }}</p>
                    <a href="{{ route('categories.index') }}" class="text-white underline text-sm">View Info >></a>
                </div>
            </div>
        </div>

        {{-- Total Products --}}
        <div class="px-6 py-8 bg-purple-700 text-white rounded-lg shadow-md hover:shadow-lg transform hover:scale-105 transition">
            <div class="flex items-center justify-between">
                <div>
                    <i class="ri-box-line text-5xl"></i>
                </div>
                <div class="ml-4">
                    <h2 class="text-lg font-semibold">Total Products</h2>
                    <p class="text-3xl font-bold">{{ $totalproduct }}</p>
                    <a href="{{ route('products.index') }}" class="text-white underline text-sm">View Info >></a>
                </div>
            </div>
        </div>

        {{-- Total Orders --}}
        <div class="px-6 py-8 bg-red-600 text-white rounded-lg shadow-md hover:shadow-lg transform hover:scale-105 transition">
            <div class="flex items-center justify-between">
                <div>
                    <i class="ri-shopping-cart-line text-5xl"></i>
                </div>
                <div class="ml-4">
                    <h2 class="text-lg font-semibold">Total Orders</h2>
                    <p class="text-3xl font-bold">{{ $totalorders }}</p>
                    <a href="{{ route('orders.index') }}" class="text-white underline text-sm">View Info >></a>
                </div>
            </div>
        </div>

        {{-- Pending Orders --}}
        <div class="px-6 py-8 bg-purple-600 text-white rounded-lg shadow-md hover:shadow-lg transform hover:scale-105 transition">
            <div class="flex items-center space-x-4">
                <i class="ri-time-line text-5xl"></i>
                <div>
                    <h2 class="text-lg font-semibold">Pending Orders</h2>
                    <p class="text-3xl font-bold">{{ $pendingorders }}</p>
                </div>
            </div>
        </div>

        {{-- Total Users --}}
        <div class="px-6 py-8 bg-orange-700 text-white rounded-lg shadow-md hover:shadow-lg transform hover:scale-105 transition">
            <div class="flex items-center justify-between">
                <div>
                    <i class="ri-user-line text-5xl"></i>
                </div>
                <div class="ml-4">
                    <h2 class="text-lg font-semibold">Total Users</h2>
                    <p class="text-3xl font-bold">{{ $totalusers }}</p>
                    <a href="{{ route('users.index') }}" class="text-white underline text-sm">View Info >></a>
                </div>
            </div>
        </div>

        {{-- Total Sales --}}
        <div class="px-6 py-8 bg-pink-500 text-white rounded-lg shadow-md hover:shadow-lg transform hover:scale-105 transition">
            <div class="flex items-center space-x-4">
                <i class="ri-money-dollar-circle-line text-5xl"></i>
                <div>
                    <h2 class="text-lg font-semibold">Total Sales</h2>
                    <p class="text-3xl font-bold">{{ $deliveredorders }}</p>
                </div>
            </div>
        </div>
    </div>

    {{-- Charts Section --}}
    <div class="mt-12 space-y-12">
        {{-- Category wise Product --}}
        <div class="w-full max-w-5xl mx-auto">
            <p class="text-red-500 font-bold text-2xl mb-4 text-center">Category wise Product</p>
            <canvas id="myChart" class="w-full h-auto"></canvas>
        </div>

        {{-- Total Orders --}}
        <div class="w-full max-w-5xl mx-auto">
            <p class="text-red-500 font-bold text-2xl mb-4 text-center">Total Orders</p>
            <canvas id="myChart2" class="w-full h-auto"></canvas>
        </div>

        {{-- Total Products --}}
        <div class="w-full max-w-5xl mx-auto">
            <p class="text-red-500 font-bold text-2xl mb-4 text-center">Total Products</p>
            <canvas id="myChart3" class="w-full h-auto"></canvas>
        </div>
    </div>
</div>

{{-- Chart JS --}}
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

{{-- Pie Chart --}}
<script>
    const ctx = document.getElementById('myChart');
    new Chart(ctx, {
        type: 'pie',
        data: {
            labels: {!! json_encode($allcategories) !!},
            datasets: [{
                label: 'No of Products',
                data: {!! json_encode($categoryproduct) !!},
                borderWidth: 1
            }]
        }
    });
</script>

{{-- Orders Line Chart --}}
<script>
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
        }
    });
</script>

{{-- Products Line Chart --}}
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
        }
    });
</script>
@endsection
