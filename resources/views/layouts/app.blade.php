<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>SkillMint</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="{{ asset('css/global.css') }}" rel="stylesheet">
    <!-- Add Toastr CSS and JS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <script src="{{ asset('js/utils/toastr-config.js') }}"></script>
</head>
<body class="bg-slate-900 text-gray-100">
    <!-- Navigation -->
    <nav class="bg-slate-800 shadow-lg border-b border-slate-700">
        <div class="container mx-auto px-6 py-4">
            <div class="flex items-center justify-between">
                <div class="text-xl font-bold text-transparent bg-clip-text bg-gradient-to-r from-cyan-400 to-emerald-400">
                    <a href="/">SkillMint</a>
                </div>
                <div class="hidden md:flex space-x-6">
                    <a href="/" class="hover:text-cyan-400 transition-colors">Home</a>
                    <a href="{{ route('courses.index') }}" class="hover:text-cyan-400 transition-colors">Courses</a>
                    @auth
                        <a href="#" class="hover:text-cyan-400 transition-colors">My Courses</a>
                        <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" 
                            class="hover:text-cyan-400 transition-colors cursor-pointer">
                            Logout
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
                            @csrf
                        </form>
                    @else
                        <a href="{{ route('login') }}" class="hover:text-cyan-400 transition-colors">Login</a>
                        <a href="{{ route('register') }}" class="hover:text-cyan-400 transition-colors">Register</a>
                    @endauth
                </div>
            </div>
        </div>
    </nav>

    <!-- Replace Flash Messages with Toastr -->
    @if(session('success'))
        <script>
            initToastr("{{ session('success') }}", "success");
        </script>
    @endif

    <main>
        @yield('content')
    </main>

    <footer class="bg-slate-800 border-t border-slate-700 mt-12">
        <div class="container mx-auto px-6 py-4">
            <div class="text-center text-gray-400">
                <p>&copy; {{ date('Y') }} SkillMint. All rights reserved.</p>
            </div>
        </div>
    </footer>
</body>
</html>
