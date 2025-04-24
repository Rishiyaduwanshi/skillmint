
@extends('layouts.app')
@section('content')
<div class="container mx-auto px-6 py-8">
    <!-- Welcome Section -->
    <div class="bg-slate-800 rounded-lg shadow-lg border border-slate-700 p-8 mb-8">
        <h2 class="text-3xl font-bold text-transparent bg-clip-text bg-gradient-to-r from-cyan-400 to-emerald-400">
            @if(Auth::user())
            Hi, {{ Auth::user()->name }}!
            @endif
        </h2>
    </div>

    <!-- Stats Grid -->
    <div class="grid md:grid-cols-4 gap-6 mb-8">
        <!-- Total Enrollments -->
        <div class="bg-slate-800 rounded-lg shadow-lg border border-slate-700 p-6">
            <div class="flex items-center">
                <div class="p-3 rounded-full bg-cyan-400/10 text-cyan-400">
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/>
                    </svg>
                </div>
                <div class="ml-4">
                    <h3 class="text-xl font-semibold text-gray-100">Enrolled Courses</h3>
                    <p class="text-2xl font-bold text-cyan-400">{{ $totalEnrollments  ?? 'N/A'}}</p>
                </div>
            </div>
        </div>

        <!-- Pending Payments -->
        <div class="bg-slate-800 rounded-lg shadow-lg border border-slate-700 p-6">
            <div class="flex items-center">
                <div class="p-3 rounded-full bg-purple-400/10 text-purple-400">
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z"/>
                    </svg>
                </div>
                <div class="ml-4">
                    <h3 class="text-xl font-semibold text-gray-100">Pending Payments</h3>
                    <p class="text-2xl font-bold text-purple-400">{{ $pendingPayments->count()}}</p>
                </div>
            </div>
        </div>

        <!-- Certificates -->
        <div class="bg-slate-800 rounded-lg shadow-lg border border-slate-700 p-6">
            <div class="flex items-center">
                <div class="p-3 rounded-full bg-yellow-400/10 text-yellow-400">
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z"/>
                    </svg>
                </div>
                <div class="ml-4">
                    <h3 class="text-xl font-semibold text-gray-100">Total Certificates</h3>
                    <p class="text-2xl font-bold text-yellow-400">{{ $certificates->count() ?? 'N/A'}}</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Main Content Tabs -->
    <div x-data="{ activeTab: 'enrolled' }" class="bg-slate-800 rounded-lg shadow-lg border border-slate-700 p-6">
        <!-- Tab Navigation -->
        <div class="flex flex-wrap gap-2 mb-6 border-b border-slate-700">
            <button @click="activeTab = 'enrolled'" :class="{ 'text-cyan-400 border-cyan-400': activeTab === 'enrolled' }" class="px-4 py-2 text-sm font-medium border-b-2 hover:text-cyan-400">
                Enrolled Courses
            </button>
            <button @click="activeTab = 'payments'" :class="{ 'text-cyan-400 border-cyan-400': activeTab === 'payments' }" class="px-4 py-2 text-sm font-medium border-b-2 hover:text-cyan-400">
                Payments
            </button>
            <button @click="activeTab = 'certificates'" :class="{ 'text-cyan-400 border-cyan-400': activeTab === 'certificates' }" class="px-4 py-2 text-sm font-medium border-b-2 hover:text-cyan-400">
                Certificates
            </button>
        </div>

        <!-- Enrolled Courses Tab -->
        <div x-show="activeTab === 'enrolled'" class="overflow-x-auto">
            <table class="w-full">
                <thead>
                    <tr class="text-left text-gray-300">
                        <th class="pb-3">Course Name</th>
                        <th class="pb-3">Enrollment Date</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($enrollments as $enrollment)
                    <tr class="border-b border-slate-700">
                        <td class="py-3">{{ $enrollment->course->title }}</td>
                        <td>{{ $enrollment->created_at->format('M d, Y') }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <!-- Payments Tab -->
        <div x-show="activeTab === 'payments'" class="overflow-x-auto">
    <!-- Pending Payments Section -->
    <h3 class="text-xl font-semibold mb-4 text-gray-100">Pending Payments</h3>
    <table class="w-full min-w-[800px] mb-8">
        <thead>
            <tr class="text-left text-gray-300">
                <th class="pb-3">Payment ID</th>
                <th class="pb-3">Course</th>
                <th class="pb-3">Amount</th>
                <th class="pb-3">Status</th>
                <th class="pb-3">Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse($pendingPayments as $payment)
            <tr class="border-b border-slate-700">
                <td class="py-3">#{{ $payment->id }}</td>
                <td>{{ $payment->course->title }}</td>
                <td>₹{{ $payment->amount }}</td>
                <td>
                    <span class="px-2 py-1 text-xs rounded-full bg-yellow-400/10 text-yellow-400">
                        {{ $payment->status }}
                    </span>
                </td>
                <td>
                    <a href="{{ route('payments.show', $payment->course_id) }}" class="text-cyan-400 hover:text-cyan-300 flex items-center gap-1">
                        <!-- Eye Icon -->
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12H9m0 0l3-3m-3 3l3 3" />
                        </svg>
                        View
                    </a>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="5" class="text-center text-gray-400 py-4">No pending payments found.</td>
            </tr>
            @endforelse
        </tbody>
    </table>

    <!-- Payment History Section -->
    <h3 class="text-xl font-semibold mb-4 text-gray-100">Payment History</h3>
    <table class="w-full min-w-[800px]">
        <thead>
            <tr class="text-left text-gray-300">
                <th class="pb-3">Date</th>
                <th class="pb-3">Course</th>
                <th class="pb-3">Amount</th>
                <th class="pb-3">Status</th>
                <th class="pb-3">Transaction ID</th>
            </tr>
        </thead>
        <tbody>
            @forelse($payments ?? [] as $payment)
            <tr class="border-b border-slate-700">
                <td class="py-3">{{ $payment->created_at->format('M d, Y') }}</td>
                <td>{{ $payment->course->title }}</td>
                <td>₹{{ $payment->amount }}</td>
                <td>
                    @switch($payment->status)
                        @case('Pending')
                            <span class="px-2 py-1 text-xs rounded-full bg-yellow-400/10 text-yellow-500">Pending</span>
                            @break
                        @case('Successful')
                            <span class="px-2 py-1 text-xs rounded-full bg-blue-400/10 text-blue-500">Successful</span>
                            @break
                        @case('Approved')
                            <span class="px-2 py-1 text-xs rounded-full bg-emerald-400/10 text-emerald-500">Approved</span>
                            @break
                        @case('Rejected')
                            <span class="px-2 py-1 text-xs rounded-full bg-orange-400/10 text-orange-500">Rejected</span>
                            @break
                        @case('Failed')
                            <span class="px-2 py-1 text-xs rounded-full bg-red-400/10 text-red-500">Failed</span>
                            @break
                        @default
                            <span class="px-2 py-1 text-xs rounded-full bg-gray-300 text-gray-700">Unknown</span>
                    @endswitch
                </td>
                <td>{{ $payment->transaction_id ?? 'N/A' }}</td>
            </tr>
            @empty
            <tr>
                <td colspan="5" class="text-center text-gray-400 py-4">No payment history available.</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>


        <!-- Certificates Tab -->
        <div x-show="activeTab === 'certificates'" class="overflow-x-auto">
            <table class="w-full">
                <thead>
                    <tr class="text-left text-gray-300">
                        <th class="pb-3">Certificate ID</th>
                        <th class="pb-3">Course Name</th>
                        <th class="pb-3">Issue Date</th>
                        <th class="pb-3">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($certificates as $certificate)
                    <tr class="border-b border-slate-700">
                        <td class="py-3">#{{ $certificate->id }}</td>
                        <td>{{ $certificate->course->title }}</td>
                        <td>{{ $certificate->created_at }}</td>
                        <td>
                            <a href="{{ route('certificates.show', $certificate->id) }}" class="text-cyan-400 hover:text-cyan-300">
                                View Certificate
                            </a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
<script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>

@endsection
