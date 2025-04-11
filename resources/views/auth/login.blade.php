@extends('layouts.app')

@section('content')
<div class="container mx-auto px-6 py-8">
    <div class="max-w-md mx-auto bg-slate-800 rounded-lg shadow-lg border border-slate-700 p-8">
        <h2 class="text-2xl font-bold mb-6 text-transparent bg-clip-text bg-gradient-to-r from-cyan-400 to-emerald-400">Login</h2>
        
        <form method="POST" action="{{ route('login') }}" class="space-y-6">
            @csrf
            
            <div>
                <label for="email" class="block text-gray-300 mb-2">Email</label>
                <input type="email" name="email" id="email" class="w-full bg-slate-900 text-gray-300 border border-slate-600 rounded-lg px-4 py-2 focus:outline-none focus:border-cyan-400">
            </div>

            <div>
                <label for="password" class="block text-gray-300 mb-2">Password</label>
                <input type="password" name="password" id="password" class="w-full bg-slate-900 text-gray-300 border border-slate-600 rounded-lg px-4 py-2 focus:outline-none focus:border-cyan-400">
            </div>

            <div class="flex items-center">
                <label class="flex items-center">
                    <input type="checkbox" name="remember" class="bg-slate-900 border-slate-600 rounded text-cyan-400 focus:ring-cyan-400">
                    <span class="ml-2 text-gray-300">Remember me</span>
                </label>
            </div>

            <button type="submit" class="w-full bg-gradient-to-r from-cyan-500 to-emerald-500 text-white px-4 py-2 rounded-lg hover:opacity-90 transition-all">
                Login
            </button>
        </form>

        <p class="mt-6 text-center text-gray-400">
            Don't have an account? 
            <a href="{{ route('register') }}" class="text-cyan-400 hover:text-cyan-300">Register here</a>
        </p>
    </div>
</div>
@endsection
