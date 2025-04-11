@extends('layouts.app')

@section('content')
<div class="container mx-auto px-6 py-8">
    <!-- Hero Section -->
    <div class="text-center mb-12">
        <h1 class="text-5xl font-bold mb-4 text-transparent bg-clip-text bg-gradient-to-r from-cyan-400 to-emerald-400">Welcome to Training Center</h1>
        <p class="text-gray-400 text-lg">Empowering minds through quality education and training</p>
    </div>

    <!-- Features Section -->
    <div class="grid md:grid-cols-3 gap-8 mb-12">
        <div class="bg-slate-800 p-6 rounded-lg shadow-lg border border-slate-700 card-hover">
            <div class="text-cyan-400 mb-4">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                </svg>
            </div>
            <h3 class="text-xl font-semibold text-gray-100 mb-3">Professional Courses</h3>
            <p class="text-gray-400">Access a wide range of professional courses designed to enhance your skills.</p>
        </div>
        <div class="bg-slate-800 p-6 rounded-lg shadow-lg border border-slate-700 card-hover">
            <div class="text-emerald-400 mb-4">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" />
                </svg>
            </div>
            <h3 class="text-xl font-semibold text-gray-100 mb-3">Expert Instructors</h3>
            <p class="text-gray-400">Learn from industry experts with years of practical experience.</p>
        </div>
        <div class="bg-slate-800 p-6 rounded-lg shadow-lg border border-slate-700 card-hover">
            <div class="text-cyan-400 mb-4">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z" />
                </svg>
            </div>
            <h3 class="text-xl font-semibold text-gray-100 mb-3">Certifications</h3>
            <p class="text-gray-400">Earn recognized certifications to boost your career prospects.</p>
        </div>
    </div>

    <!-- CTA Section -->
    <div class="bg-slate-800 rounded-lg p-8 text-center border border-slate-700">
        <h2 class="text-3xl font-bold text-transparent bg-clip-text bg-gradient-to-r from-cyan-400 to-emerald-400 mb-4">Ready to Start Learning?</h2>
        <p class="text-gray-400 mb-6">Browse our courses and begin your journey towards success.</p>
        <button class="bg-gradient-to-r from-cyan-500 to-emerald-500 text-white px-8 py-3 rounded-lg hover:opacity-90 transition-all transform hover:-translate-y-1">
            View Courses
        </button>
    </div>
</div>
@endsection