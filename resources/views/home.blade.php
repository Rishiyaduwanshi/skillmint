@extends('layouts.app')

@section('content')
<div class="container mx-auto px-6 py-8">
    <!-- Hero Section -->
    <div class="text-center mb-12">
        <h1 class="text-4xl font-bold text-gray-800 mb-4">Welcome to Training Center</h1>
        <p class="text-gray-600 text-lg">Empowering minds through quality education and training</p>
    </div>

    <!-- Features Section -->
    <div class="grid md:grid-cols-3 gap-8 mb-12">
        <div class="bg-white p-6 rounded-lg shadow-md">
            <h3 class="text-xl font-semibold text-gray-800 mb-3">Professional Courses</h3>
            <p class="text-gray-600">Access a wide range of professional courses designed to enhance your skills.</p>
        </div>
        <div class="bg-white p-6 rounded-lg shadow-md">
            <h3 class="text-xl font-semibold text-gray-800 mb-3">Expert Instructors</h3>
            <p class="text-gray-600">Learn from industry experts with years of practical experience.</p>
        </div>
        <div class="bg-white p-6 rounded-lg shadow-md">
            <h3 class="text-xl font-semibold text-gray-800 mb-3">Certifications</h3>
            <p class="text-gray-600">Earn recognized certifications to boost your career prospects.</p>
        </div>
    </div>

    <!-- CTA Section -->
    <div class="bg-blue-50 rounded-lg p-8 text-center">
        <h2 class="text-2xl font-bold text-gray-800 mb-4">Ready to Start Learning?</h2>
        <p class="text-gray-600 mb-6">Browse our courses and begin your journey towards success.</p>
        <button class="bg-blue-600 text-white px-6 py-2 rounded-lg hover:bg-blue-700 transition-colors">
            View Courses
        </button>
    </div>
</div>
@endsection