@extends('layouts.app')

@section('content')
<div class="container mx-auto px-6 py-8">
    <!-- Back Button -->
    <a href="{{ route('courses.index') }}" class="inline-flex items-center text-cyan-400 hover:text-cyan-300 mb-6">
        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
        </svg>
        Back to Courses
    </a>

    <!-- Course Header -->
    <div class="bg-slate-800 rounded-lg shadow-lg border border-slate-700 p-8 mb-8">
        @if($course->image)
            <div class="mb-6">
                <img src="{{ asset('storage/' . $course->image) }}" alt="{{ $course->title }}" 
                    class="w-full max-h-[500px] object-contain rounded-lg">
            </div>
        @endif
        <h1 class="text-3xl font-bold text-transparent bg-clip-text bg-gradient-to-r from-cyan-400 to-emerald-400 mb-4">
            {{ $course->title }} <!-- Use object syntax -->
        </h1>
        <div class="grid md:grid-cols-3 gap-6 text-gray-400">
            <div class="flex items-center">
                <svg class="w-5 h-5 text-cyan-400 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                </svg>
                Duration: {{ $course->duration }} <!-- Use object syntax -->
            </div>
            <div class="flex items-center">
                <svg class="w-5 h-5 text-cyan-400 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"/>
                </svg>
                Level: {{ $course->level }} <!-- Use object syntax -->
            </div>
            <div class="flex items-center">
                <svg class="w-5 h-5 text-cyan-400 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                </svg>
                Price: {{ $course->price }} <!-- Use object syntax -->
            </div>
        </div>
    </div>

    <!-- Course Content -->
    <div class="grid md:grid-cols-3 gap-8">
        <!-- Main Content -->
        <div class="md:col-span-2 space-y-8">
            <div class="bg-slate-800 rounded-lg shadow-lg border border-slate-700 p-6">
                <h2 class="text-xl font-semibold text-gray-100 mb-4">Course Description</h2>
                <p class="text-gray-400">{{ $course->description }} <!-- Use object syntax --></p>
            </div>

            <div class="bg-slate-800 rounded-lg shadow-lg border border-slate-700 p-6">
                <h2 class="text-xl font-semibold text-gray-100 mb-4">Course Topics</h2>
                <ul class="space-y-3">
                    @foreach($course->topics as $topic) <!-- Use object syntax -->
                    <li class="flex items-center text-gray-400">
                        <svg class="w-5 h-5 text-emerald-400 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                        </svg>
                        {{ $topic }} <!-- Use object syntax -->
                    </li>
                    @endforeach
                </ul>
            </div>
        </div>

        <!-- Sidebar -->
        <div class="space-y-8">
            <div class="bg-slate-800 rounded-lg shadow-lg border border-slate-700 p-6">
                <h2 class="text-xl font-semibold text-gray-100 mb-4">Course Information</h2>
                <div class="space-y-4 text-gray-400">
                    <div>
                        <h3 class="text-cyan-400 mb-2">Instructor</h3>
                        <p>{{ $course->instructor }} <!-- Use object syntax --></p>
                    </div>
                    <div>
                        <h3 class="text-cyan-400 mb-2">Schedule</h3>
                        <p>{{ $course->schedule }} <!-- Use object syntax --></p>
                    </div>
                </div>
            </div>

            <div class="bg-slate-800 rounded-lg shadow-lg border border-slate-700 p-6">
                <h2 class="text-xl font-semibold text-gray-100 mb-4">Requirements</h2>
                <ul class="space-y-3">
                    @foreach($course->requirements as $requirement) <!-- Use object syntax -->
                    <li class="flex items-center text-gray-400">
                        <svg class="w-5 h-5 text-cyan-400 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                        {{ $requirement }} <!-- Use object syntax -->
                    </li>
                    @endforeach
                </ul>
            </div>

            <button class="w-full bg-gradient-to-r from-cyan-500 to-emerald-500 text-white px-6 py-3 rounded-lg hover:opacity-90 transition-all transform hover:-translate-y-1">
                Enroll Now
            </button>
        </div>
    </div>
</div>
@endsection