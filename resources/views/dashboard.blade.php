
@extends('layouts.app')

@section('content')
<div class="container mx-auto px-6 py-8">
    <!-- Welcome Section -->
    <div class="bg-slate-800 rounded-lg shadow-lg border border-slate-700 p-8 mb-8">
        <h2 class="text-3xl font-bold text-transparent bg-clip-text bg-gradient-to-r from-cyan-400 to-emerald-400">
            @if(Auth::user())
            नमस्ते, {{ Auth::user()->name }}!
            @endif
        </h2>
    </div>

    <!-- Stats Grid -->
    <div class="grid md:grid-cols-3 gap-6 mb-8">
        <!-- Enrolled Courses -->
        <div class="bg-slate-800 rounded-lg shadow-lg border border-slate-700 p-6">
            <div class="flex items-center">
                <div class="p-3 rounded-full bg-cyan-400/10 text-cyan-400">
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/>
                    </svg>
                </div>
                <div class="ml-4">
                    <h3 class="text-xl font-semibold text-gray-100">मेरे कोर्स</h3>
                    <p class="text-2xl font-bold text-cyan-400">{{ auth()->user()->enrollments->count() }}</p>
                </div>
            </div>
        </div>

        <!-- Completed Courses -->
        <div class="bg-slate-800 rounded-lg shadow-lg border border-slate-700 p-6">
            <div class="flex items-center">
                <div class="p-3 rounded-full bg-emerald-400/10 text-emerald-400">
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z"/>
                    </svg>
                </div>
                <div class="ml-4">
                    <h3 class="text-xl font-semibold text-gray-100">पूरे किए गए कोर्स</h3>
                    <p class="text-2xl font-bold text-emerald-400">{{ auth()->user()->completedCourses()->count() }}</p>
                </div>
            </div>
        </div>

        <!-- Pending Payments -->
        <div class="bg-slate-800 rounded-lg shadow-lg border border-slate-700 p-6">
            <div class="flex items-center">
                <div class="p-3 rounded-full bg-yellow-400/10 text-yellow-400">
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                </div>
                <div class="ml-4">
                    <h3 class="text-xl font-semibold text-gray-100">बाकी भुगतान</h3>
                    <p class="text-2xl font-bold text-yellow-400">{{ auth()->user()->payments()->where('status', 'Pending')->count() }}</p>
                </div>
            </div>
        </div>
    </div>

    <!-- My Courses Section -->
    <div class="bg-slate-800 rounded-lg shadow-lg border border-slate-700 p-6">
        <h3 class="text-xl font-bold mb-4 text-transparent bg-clip-text bg-gradient-to-r from-cyan-400 to-emerald-400">
            मेरे कोर्स
        </h3>
        <div class="overflow-x-auto">
            <table class="w-full text-gray-400">
                <thead>
                    <tr class="text-left border-b border-slate-700">
                        <th class="pb-3">कोर्स</th>
                        <th class="pb-3">प्रगति</th>
                        <th class="pb-3">स्थिति</th>
                        <th class="pb-3">कार्रवाई</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse (auth()->user()->enrollments as $enrollment)
                    <tr class="border-b border-slate-700">
                        <td class="py-3">{{ $enrollment->course->title }}</td>
                        <td>{{ $enrollment->progress }}%</td>
                        <td>{{ $enrollment->status }}</td>
                        <td>
                            <a href="{{ route('courses.show', $enrollment->course->id) }}" 
                               class="text-cyan-400 hover:text-cyan-300">
                                देखें
                            </a>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="4" class="py-4 text-center text-gray-500">कोई कोर्स नहीं मिला</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
