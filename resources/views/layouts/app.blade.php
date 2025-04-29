<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>SkillMint</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="{{ asset('css/global.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <script src="{{ asset('js/utils/toastr-config.js') }}"></script>
</head>
<body class="bg-slate-900 text-gray-100">

    {{-- Include Navigation --}}
    @include('layouts.navigation')

    {{-- Show success message if any --}}
    @if(session('success'))
        <script>
            initToastr("{{ session('success') }}", "success");
        </script>
    @endif

    @if(session('error'))
    <script>
        initToastr("{{ session('error') }}", "error");
    </script>
    @endif

    {{-- Page Content --}}
    <main>
        @yield('content')
    </main>

    {{-- Footer --}}
    <footer class="bg-slate-800 border-t border-slate-700 mt-12">
        <div class="container mx-auto px-6 py-4">
            <div class="text-center text-gray-400">
                <p>&copy; {{ date('Y') }} SkillMint. All rights reserved.</p>
            </div>
        </div>
    </footer>

</body>
</html>
