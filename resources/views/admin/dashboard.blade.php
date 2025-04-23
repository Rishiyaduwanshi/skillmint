@extends('layouts.app')
@section('content')
<div class="container mx-auto px-6 py-8">
    <!-- Welcome Section -->
    <div class="bg-slate-800 rounded-lg shadow-lg border border-slate-700 p-8 mb-8">
        <h2 class="text-3xl font-bold text-transparent bg-clip-text bg-gradient-to-r from-cyan-400 to-emerald-400 text-right py-2">
            @if(Auth::user())
            Welcome, {{ Auth::user()->name }}!
            @endif
        </h2
    </div>

    <!-- Stats Grid -->
    <div class="grid md:grid-cols-4 gap-6 mb-8">
        <div class="bg-slate-800 rounded-lg shadow-lg border border-slate-700 p-6">
            <div class="flex items-center">
                <div class="p-3 rounded-full bg-cyan-400/10 text-cyan-400">
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/>
                    </svg>
                </div>
                <div class="ml-4">
                    <h3 class="text-xl font-semibold text-gray-100">Total Courses</h3>
                    <p class="text-2xl font-bold text-cyan-400">{{$courseCount ?? 'N/A' }}</p>
                </div>
            </div>
        </div>

        <div class="bg-slate-800 rounded-lg shadow-lg border border-slate-700 p-6">
            <div class="flex items-center">
                <div class="p-3 rounded-full bg-emerald-400/10 text-emerald-400">
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"/>
                    </svg>
                </div>
                <div class="ml-4">
                    <h3 class="text-xl font-semibold text-gray-100">Total Students</h3>
                    <p class="text-2xl font-bold text-emerald-400">{{$studentCount ?? 'N/A'}}</p>
                </div>
            </div>
        </div>

        <div class="bg-slate-800 rounded-lg shadow-lg border border-slate-700 p-6">
            <div class="flex items-center">
                <div class="p-3 rounded-full bg-yellow-400/10 text-yellow-400">
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/>
                    </svg>
                </div>
                <div class="ml-4">
                    <h3 class="text-xl font-semibold text-gray-100">Pending Enrollments</h3>
                    <p class="text-2xl font-bold text-yellow-400">{{$pendingPaymentsCount}}</p>
                </div>
            </div>
        </div>

        <div class="bg-slate-800 rounded-lg shadow-lg border border-slate-700 p-6">
            <div class="flex items-center">
                <div class="p-3 rounded-full bg-purple-400/10 text-purple-400">
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z"/>
                    </svg>
                </div>
                <div class="ml-4">
                    <h3 class="text-xl font-semibold text-gray-100">Certificates Issued</h3>
                    <p class="text-2xl font-bold text-purple-400">45</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Management Sections -->
    <div class="grid md:grid-cols-2 gap-8">
        <!-- Pending Enrollments -->
        <!-- Replace the Pending Enrollments section with this -->
        <div class="bg-slate-800 rounded-lg shadow-lg border border-slate-700 p-6">
            <h3 class="text-xl font-bold mb-4 text-transparent bg-clip-text bg-gradient-to-r from-cyan-400 to-emerald-400">
                Pending Payments
            </h3>
            <div class="overflow-x-auto">
                <table class="w-full text-gray-400">
                    <thead>
                        <tr class="text-left border-b border-slate-700">
                            <th class="pb-3">Student</th>
                            <th class="pb-3">Course</th>
                            <th class="pb-3">Amount</th>
                            <th class="pb-3">Receipt</th>
                            <th class="pb-3">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($pendingPayments as $payment)
                        <tr class="border-b border-slate-700">
                            <td class="py-3">{{ $payment->user->name }}</td>
                            <td>{{ $payment->course->title }}</td>
                            <td>₹{{ $payment->amount }}</td>
                            <td>
                                <a href="{{ asset('storage/' . $payment->upload_receipt) }}" 
                                   target="_blank" 
                                   class="text-cyan-400 hover:text-cyan-300">
                                    View Receipt
                                </a>
                            </td>
                            <td class="space-x-2">
                                <form action="{{ route('admin.payments.approve', $payment->id) }}" method="POST" class="inline-flex items-center gap-2">
                                    @csrf
                                    <input type="text" 
                                           name="transaction_id" 
                                           placeholder="Enter Transaction ID" 
                                           class="bg-slate-900 border border-slate-600 rounded px-2 py-1 text-sm" 
                                           required>
                                    <button type="submit" class="text-emerald-400 hover:text-emerald-300">Verify & Approve</button>
                                </form>
                                <form action="{{ route('admin.payments.reject', $payment->id) }}" method="POST" class="inline ml-2">
                                    @csrf
                                    <button type="submit" class="text-red-400 hover:text-red-300">Reject</button>
                                </form>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="5" class="py-4 text-center text-gray-500">No pending payments</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Course Management -->
        <div class="bg-slate-800 rounded-lg shadow-lg border border-slate-700 p-6">
            <div class="flex justify-between items-center mb-4">
                <h3 class="text-xl font-bold text-transparent bg-clip-text bg-gradient-to-r from-cyan-400 to-emerald-400">
                    Course Management
                </h3>
                <button class="bg-cyan-500 text-white px-4 py-2 rounded-lg hover:bg-cyan-600">
                    <a href="{{ route('courses.create') }}">Add Course</a>
                </button>
            </div>
            <div class="overflow-x-auto">
                <table class="w-full text-gray-400">
                    <thead>
                        <tr class="text-left border-b border-slate-700">
                            <th class="pb-3">Course</th>
                            <th class="pb-3">Instructor</th>
                            <th class="pb-3">Duration</th>
                            <th class="pb-3">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($courses as $course)
                        <tr class="border-b border-slate-700">
                            <td class="py-3">{{$course->title}}</td>
                            <td>{{$course->instructor}}</td>
                            <td>{{$course->duration}}</td>
                            <td class="space-x-2">
                                <button class="text-cyan-400 hover:text-cyan-300">
                                <i> </i>    
                                Edit
                                </button>
                                <button class="text-red-400 hover:text-red-300">Delete</button>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection