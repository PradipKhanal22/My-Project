<!-- resources/views/layouts/app.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RetroKits Nepal</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 text-gray-900">
    <nav>
        <!-- Navigation links -->
    </nav>

    <main>
        @yield('content')
    </main>

    <footer class="bg-gray-800 text-white p-4 text-center">
        <!-- Footer content -->
    </footer>
</body>
</html>