<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Training Center Management</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="{{ asset('css/global.css') }}" rel="stylesheet">
</head>
<body class="bg-slate-900 text-gray-100">
    <!-- Navigation -->
    <nav class="bg-slate-800 shadow-lg border-b border-slate-700">
        <div class="container mx-auto px-6 py-4">
            <div class="flex items-center justify-between">
                <div class="text-xl font-bold text-transparent bg-clip-text bg-gradient-to-r from-cyan-400 to-emerald-400">
                    Training Center
                </div>
                <div class="hidden md:flex space-x-6">
                    <a href="/" class="hover:text-cyan-400 transition-colors">Home</a>
                    <a href="#" class="hover:text-cyan-400 transition-colors">Courses</a>
                    <a href="#" class="hover:text-cyan-400 transition-colors">About</a>
                    <a href="#" class="hover:text-cyan-400 transition-colors">Contact</a>
                </div>
            </div>
        </div>
    </nav>

    <main>
        @yield('content')
    </main>

    <footer class="bg-slate-800 border-t border-slate-700 mt-12">
        <div class="container mx-auto px-6 py-4">
            <div class="text-center text-gray-400">
                <p>&copy; {{ date('Y') }} Training Center Management. All rights reserved.</p>
            </div>
        </div>
    </footer>
</body>
</html>