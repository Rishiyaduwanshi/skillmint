<nav class="bg-gradient-to-r from-slate-900 to-slate-800 border-b border-slate-700 sticky top-0 z-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex items-center">
                <!-- Logo -->
                <div class="flex-shrink-0 flex items-center">
                    <a href="{{ route('home') }}" class="flex items-center">
                        <span class="text-xl md:text-2xl font-bold text-transparent bg-clip-text bg-gradient-to-r from-cyan-400 to-emerald-400 hover:from-emerald-400 hover:to-cyan-400 transition-all">
                            {{ config('admin.app_name', 'SkillMint') }}
                        </span>
                    </a>
                </div>

                <!-- Navigation Links - Desktop -->
                <div class="hidden md:flex space-x-4 sm:ml-6">
                    <a href="{{ route('courses.index') }}" 
                       class="text-gray-300 hover:text-white hover:bg-slate-700 px-3 py-2 rounded-md text-sm font-medium transition-all">
                        Courses
                    </a>

                    @auth
                        @if(auth()->user()->role === 'admin')
                            <a href="{{ route('adminDashboard') }}" 
                               class="text-gray-300 hover:text-white hover:bg-slate-700 px-3 py-2 rounded-md text-sm font-medium transition-all">
                                Dashboard
                            </a>
                        @else
                            <a href="{{ route('my.enrollments') }}" 
                               class="text-gray-300 hover:text-white hover:bg-slate-700 px-3 py-2 rounded-md text-sm font-medium transition-all">
                                My Courses
                            </a>
                        @endif
                    @endauth
                </div>
            </div>

            <!-- Mobile Menu Button -->
            <div class="md:hidden flex items-center">
                <button type="button" class="mobile-menu-button text-gray-300 hover:text-white focus:outline-none">
                    <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
                    </svg>
                </button>
            </div>

            <!-- User Menu -->
            <div class="hidden md:flex items-center space-x-4">
                @auth
                    <span class="text-gray-300 text-sm">Hi, {{ auth()->user()->name }}!</span>
                    <form method="POST" action="{{ route('logout') }}" class="flex">
                        @csrf
                        <button type="submit" 
                                class="text-gray-300 hover:text-white hover:bg-slate-700 px-3 py-2 rounded-md text-sm font-medium transition-all">
                            Logout
                        </button>
                    </form>
                @else
                    <a href="{{ route('login') }}" 
                       class="text-gray-300 hover:text-white hover:bg-slate-700 px-3 py-2 rounded-md text-sm font-medium transition-all">
                        Login
                    </a>
                    <a href="{{ route('register') }}" 
                       class="bg-gradient-to-r from-cyan-500 to-emerald-500 hover:from-emerald-500 hover:to-cyan-500 text-white px-4 py-2 rounded-md text-sm font-medium transition-all">
                        Register
                    </a>
                @endauth
            </div>
        </div>
    </div>

    <!-- Mobile Menu -->
    <div class="md:hidden mobile-menu hidden">
        <div class="px-2 pt-2 pb-3 space-y-1">
            <a href="{{ route('courses.index') }}" 
               class="block text-gray-300 hover:text-white hover:bg-slate-700 px-3 py-2 rounded-md text-base font-medium">
                Courses
            </a>

            @auth
                @if(auth()->user()->role === 'admin')
                    <a href="{{ route('adminDashboard') }}" 
                       class="block text-gray-300 hover:text-white hover:bg-slate-700 px-3 py-2 rounded-md text-base font-medium">
                        Dashboard
                    </a>
                @else
                    <a href="{{ route('my.enrollments') }}" 
                       class="block text-gray-300 hover:text-white hover:bg-slate-700 px-3 py-2 rounded-md text-base font-medium">
                        My Courses
                    </a>
                @endif

                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" 
                            class="w-full text-left text-gray-300 hover:text-white hover:bg-slate-700 px-3 py-2 rounded-md text-base font-medium">
                        Logout
                    </button>
                </form>
            @else
                <a href="{{ route('login') }}" 
                   class="block text-gray-300 hover:text-white hover:bg-slate-700 px-3 py-2 rounded-md text-base font-medium">
                    Login
                </a>
                <a href="{{ route('register') }}" 
                   class="block text-gray-300 hover:text-white hover:bg-slate-700 px-3 py-2 rounded-md text-base font-medium">
                    Register
                </a>
            @endauth
        </div>
    </div>
</nav>

<script>
    // Mobile menu toggle
    document.querySelector('.mobile-menu-button').addEventListener('click', function() {
        document.querySelector('.mobile-menu').classList.toggle('hidden');
    });
</script>
