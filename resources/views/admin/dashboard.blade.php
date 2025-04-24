@extends('layouts.app')
@section('content')
<div class="container mx-auto px-4 py-8">
    <!-- Welcome Section -->
    <div class="bg-slate-800 rounded-lg shadow-lg border border-slate-700 p-6 mb-8">
        <h2 class="text-3xl font-bold text-transparent bg-clip-text bg-gradient-to-r from-cyan-400 to-emerald-400 text-right">
            Welcome, {{ Auth::user()->name }}!
        </h2>
    </div>

    <!-- Quick Stats -->
    <div class="grid md:grid-cols-4 gap-4 mb-8">
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
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/>
                    </svg>
                </div>
                <div class="ml-4">
                    <h3 class="text-xl font-semibold text-gray-100">Certificates Issued</h3>
                    <p class="text-2xl font-bold text-purple-400">{{$certificates->count()}}</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Management Sections -->

    <div x-data="{ activeTab: 'courses' }" class="bg-slate-800 rounded-lg shadow-lg border border-slate-700 p-6">
    <!-- Tab Navigation -->
    <div class="flex flex-wrap gap-2 mb-6 border-b border-slate-700">
        <button @click="activeTab = 'courses'" 
                :class="{ 'border-cyan-400 text-cyan-400': activeTab === 'courses' }"
                class="px-4 py-2 font-medium border-b-2 border-transparent hover:text-cyan-400 transition-all">
            Courses
        </button>
        <button @click="activeTab = 'students'" 
                :class="{ 'border-emerald-400 text-emerald-400': activeTab === 'students' }"
                class="px-4 py-2 font-medium border-b-2 border-transparent hover:text-emerald-400 transition-all">
            Students
        </button>
        <button @click="activeTab = 'payments'" 
                :class="{ 'border-yellow-400 text-yellow-400': activeTab === 'payments' }"
                class="px-4 py-2 font-medium border-b-2 border-transparent hover:text-yellow-400 transition-all">
            Payments
        </button>
        <button @click="activeTab = 'certificates'" 
                :class="{ 'border-purple-400 text-purple-400': activeTab === 'certificates' }"
                class="px-4 py-2 font-medium border-b-2 border-transparent hover:text-purple-400 transition-all">
            Certificates
        </button>
    </div>

    <!-- Tab Content -->
    <div class="overflow-hidden">
        <!-- Courses Tab -->
        <div x-show="activeTab === 'courses'" class="space-y-6">
            <div class="flex justify-between items-center">
                <div class="flex items-center space-x-4">
                    <input type="text" placeholder="Search courses..." 
                           class="bg-slate-900 border border-slate-700 rounded-lg px-4 py-2 focus:outline-none focus:border-cyan-400">
                    <select class="bg-slate-900 border border-slate-700 rounded-lg px-4 py-2 focus:outline-none focus:border-cyan-400">
                        <option>All Levels</option>
                        <option>Beginner</option>
                        <option>Intermediate</option>
                        <option>Advanced</option>
                    </select>
                </div>
                <a href="{{ route('courses.create') }}" 
                   class="bg-gradient-to-r from-cyan-500 to-emerald-500 text-white px-4 py-2 rounded-lg hover:opacity-90">
                    Add Course
                </a>
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
                                <form action="{{ route('courses.destroy', $course->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this course?');">
                                    @csrf
                                    @method('DELETE')
                                        <button type="submit" class="text-red-400 hover:text-red-300">Delete</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Students Tab -->
        <div x-show="activeTab === 'students'" class="space-y-6">
            <div class="flex items-center space-x-4">
                <input type="text" placeholder="Search students..." 
                       class="bg-slate-900 border border-slate-700 rounded-lg px-4 py-2 focus:outline-none focus:border-emerald-400">
                <select class="bg-slate-900 border border-slate-700 rounded-lg px-4 py-2 focus:outline-none focus:border-emerald-400">
                    <option>All Courses</option>
                    <option>Active Students</option>
                    <option>Completed</option>
                </select>
            </div>
            <div class="overflow-x-auto">
                <table class="w-full text-gray-400">
                    <thead>
                        <tr class="text-left border-b border-slate-700">
                            <th class="pb-3">Student Name</th>
                            <th class="pb-3">Course</th>
                            <th class="pb-3">Enrollment Date</th>
                            <th class="pb-3">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($courseEnrollments as $enrollment) 
                        <tr class="border-b border-slate-700">
                            <td class="py-3">{{$enrollment->user->name}}</td>
                            <td>{{$enrollment->course->title}}</td>
                            <td>{{$enrollment->created_at}}</td> 
                            <td class="space-x-2">
                                <button class="text-emerald-400 hover:text-emerald-300">
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

        <!-- Payments Tab -->
        <div x-show="activeTab === 'payments'" class="space-y-6">
            <div class="flex items-center space-x-4">
                <input type="text" placeholder="Search payments..." 
                       class="bg-slate-900 border border-slate-700 rounded-lg px-4 py-2 focus:outline-none focus:border-yellow-400">
                <select class="bg-slate-900 border border-slate-700 rounded-lg px-4 py-2 focus:outline-none focus:border-yellow-400">
                    <option>All Status</option>
                    <option>Pending</option>
                    <option>Approved</option>
                    <option>Rejected</option>
                </select>
            </div>
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
                       @foreach ($pendingPayments as $payment)
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
                      @endforeach 
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Certificates Tab -->
        <div x-show="activeTab === 'certificates'" class="space-y-6">
            <div class="flex justify-between items-center">
                <div class="flex items-center space-x-4">
                    <input type="text" placeholder="Search certificates..." 
                           class="bg-slate-900 border border-slate-700 rounded-lg px-4 py-2 focus:outline-none focus:border-purple-400">
                    <select class="bg-slate-900 border border-slate-700 rounded-lg px-4 py-2 focus:outline-none focus:border-purple-400">
                        <option>All Courses</option>
                        <option>Recent First</option>
                        <option>Oldest First</option>
                    </select>
                </div>
                <a href="{{ route('certificates.create') }}" 
                   class="bg-gradient-to-r from-purple-500 to-indigo-500 text-white px-4 py-2 rounded-lg hover:opacity-90">
                    Create Certificate
                </a>
            </div>
            <div class="overflow-x-auto">
                <table class="w-full text-gray-400">
                    <thead>
                        <tr class="text-left border-b border-slate-700">
                            <th class="pb-3">Student</th>
                            <th class="pb-3">Course</th>
                            <th class="pb-3">Issue Date</th>
                            <th class="pb-3">Certificate ID</th>
                            <th class="pb-3">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($certificates as $certificate)
                        <tr class="border-b border-slate-700">
                            <td class="py-3">{{$certificate->student->name}}</td>
                            <td>{{$certificate->course->title}}</td>
                            <td>{{$certificate->created_at->format('Y-m-d')}}</td>
                            <td>{{$certificate->id}}</td>
                            <td class="space-x-2">
                                <a href="{{ route('certificates.show', $certificate->id) }}" 
                                   class="text-purple-400 hover:text-purple-300">
                                    View
                                </a>
                                <form action="{{ route('certificates.destroy', $certificate->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this certificate?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-400 hover:text-red-300">Delete</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
</div>

<script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
@endsection