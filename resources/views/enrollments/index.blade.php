@extends('layouts.app')

@section('content')
<div class="container mx-auto px-6 py-8">
    <h2 class="text-3xl font-bold text-transparent bg-clip-text bg-gradient-to-r from-cyan-400 to-emerald-400 mb-6">
        My Enrolled Courses
    </h2>

    <div class="grid md:grid-cols-3 gap-6">
        @foreach($enrollments as $enrollment)
        <div class="bg-slate-800 rounded-lg shadow-lg border border-slate-700 overflow-hidden">
            @if($enrollment->course->image)
                <img src="{{ asset('storage/' . $enrollment->course->image) }}" 
                     alt="{{ $enrollment->course->title }}" 
                     class="w-full h-48 object-cover">
            @endif
            <div class="p-6">
                <h3 class="text-xl font-semibold text-gray-100 mb-2">{{ $enrollment->course->title }}</h3>
                <p class="text-gray-400 mb-4">{{ $enrollment->course->instructor }}</p>
                <a href="{{ route('courses.show', $enrollment->course->id) }}" 
                   class="inline-block bg-cyan-500 text-white px-4 py-2 rounded-lg hover:bg-cyan-600">
                    Go to Course
                </a>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection