<nav class="bg-slate-800 border-b border-slate-700">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                <!-- Logo -->
                <div class="flex-shrink-0 flex items-center">
                    <a href="{{ route('home') }}" class="text-2xl font-bold text-transparent bg-clip-text bg-gradient-to-r from-cyan-400 to-emerald-400">
                        {{ config('admin.app_name') }}
                    </a>
                </div>

                <!-- Navigation Links -->
                <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                    <a href="{{ route('courses.index') }}" class="text-gray-300 hover:text-white px-3 py-2 rounded-md text-sm font-medium">
                        Courses
                    </a>
                    
                    @auth
                        @if(auth()->user()->role === 'admin')
                            <a href="{{ route('adminDashboard') }}" class="text-gray-300 hover:text-white px-3 py-2 rounded-md text-sm font-medium">
                                Admin Dashboard
                            </a>
                        @else
                            <a href="{{ route('my.enrollments') }}" class="text-gray-300 hover:text-white px-3 py-2 rounded-md text-sm font-medium">
                                My Courses
                            </a>
                        @endif
                    @endauth
                </div>
            </div>

            <!-- Right Side -->
            <div class="flex items-center">
                @auth
                    <span class="text-gray-300 mr-4">{{ Auth::user()->name }}</span>
                    <form method="POST" action="{{ route('logout') }}" class="inline">
                        @csrf
                        <button type="submit" class="text-gray-300 hover:text-white px-3 py-2 rounded-md text-sm font-medium">
                            Logout
                        </button>
                    </form>
                @else
                    <a href="{{ route('login') }}" class="text-gray-300 hover:text-white px-3 py-2 rounded-md text-sm font-medium">Login</a>
                    <a href="{{ route('register') }}" class="text-gray-300 hover:text-white px-3 py-2 rounded-md text-sm font-medium ml-4">Register</a>
                @endauth
            </div>
        </div>
    </div>
</nav>
