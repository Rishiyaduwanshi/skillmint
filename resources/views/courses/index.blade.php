@extends('layouts.app')

@section('content')
<div class="container mx-auto px-6 py-8">
    <!-- Header -->
    <div class="text-center mb-12">
        <h1 class="text-4xl font-bold mb-4 text-transparent bg-clip-text bg-gradient-to-r from-cyan-400 to-emerald-400">Available Courses</h1>
        <p class="text-gray-400 text-lg">Explore our wide range of professional courses</p>
    </div>

    <!-- Filter Section -->
    <div class="bg-slate-800 p-6 rounded-lg shadow-lg border border-slate-700 mb-8">
        <div class="grid md:grid-cols-4 gap-4">
            <input type="text" placeholder="Search courses..." class="bg-slate-900 text-gray-300 border border-slate-600 rounded-lg px-4 py-2 focus:outline-none focus:border-cyan-400">
            <select class="bg-slate-900 text-gray-300 border border-slate-600 rounded-lg px-4 py-2 focus:outline-none focus:border-cyan-400">
                <option>All Levels</option>
                <option>Beginner</option>
                <option>Intermediate</option>
                <option>Advanced</option>
            </select>
            <select class="bg-slate-900 text-gray-300 border border-slate-600 rounded-lg px-4 py-2 focus:outline-none focus:border-cyan-400">
                <option>All Duration</option>
                <option>0-4 weeks</option>
                <option>5-12 weeks</option>
                <option>13+ weeks</option>
            </select>
            <button class="bg-gradient-to-r from-cyan-500 to-emerald-500 text-white rounded-lg px-4 py-2 hover:opacity-90">
                Apply Filters
            </button>
        </div>
    </div>

    <!-- Courses Grid -->
    <div class="grid md:grid-cols-3 gap-8">
        @foreach($courses as $course)
        <div class="bg-slate-800 rounded-lg shadow-lg border border-slate-700 overflow-hidden card-hover">
            <div class="h-48 bg-gradient-to-br from-cyan-500/10 to-emerald-500/10 flex items-center justify-center">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-20 w-20 text-cyan-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                </svg>
            </div>
            <div class="p-6">
                <h3 class="text-xl font-semibold text-gray-100 mb-3">{{ $course->title }}</h3> <!-- Use object syntax -->
                <div class="space-y-2 text-gray-400">
                    <p><span class="text-cyan-400">Duration:</span> {{ $course->duration }}</p> <!-- Use object syntax -->
                    <p><span class="text-cyan-400">Level:</span> {{ $course->level }}</p> <!-- Use object syntax -->
                    <p><span class="text-cyan-400">Price:</span> {{ $course->price }}</p> <!-- Use object syntax -->
                </div>
                <button class="mt-6 w-full bg-gradient-to-r from-cyan-500 to-emerald-500 text-white px-4 py-2 rounded-lg hover:opacity-90 transition-all">
                    <a href="{{ route('courses.show', ['id' => $course->id]) }}">View Details</a> <!-- Use dynamic id -->
                </button>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection