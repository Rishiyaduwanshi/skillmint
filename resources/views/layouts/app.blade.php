<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Training Center Management</title>
    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">
    <!-- Navigation -->
    <nav class="bg-blue-600 text-white shadow-lg">
        <div class="container mx-auto px-6 py-4">
            <div class="flex items-center justify-between">
                <div class="text-xl font-bold">
                    Training Center
                </div>
                <div class="hidden md:flex space-x-6">
                    <a href="/" class="hover:text-blue-200">Home</a>
                    <a href="#" class="hover:text-blue-200">Courses</a>
                    <a href="#" class="hover:text-blue-200">About</a>
                    <a href="#" class="hover:text-blue-200">Contact</a>
                </div>
            </div>
        </div>
    </nav>

    <!-- Content -->
    <main>
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="bg-blue-600 text-white mt-12">
        <div class="container mx-auto px-6 py-4">
            <div class="text-center">
                <p>&copy; {{ date('Y') }} Training Center Management. All rights reserved.</p>
            </div>
        </div>
    </footer>
</body>
</html>