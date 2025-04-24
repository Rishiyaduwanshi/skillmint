@extends('layouts.app')
@section('content')

<div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-slate-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-100">
                    <h2 class="text-2xl font-bold mb-4">Generate Certificate</h2>

                    <form action="{{ route('certificates.store') }}" method="POST" class="space-y-4">
                        @csrf
                        
                        <div>
                            <label for="student_id" class="block text-sm font-medium text-gray-300">Select the student</label>
                            <select name="student_id" id="student_id" required class="mt-1 block w-full rounded-md border-gray-600 bg-slate-700 text-gray-100 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                                <option value="">Choose Student</option>
                                @foreach($students as $student)
                                    <option value="{{ $student->id }}">{{ $student->name }}</option> 
                                @endforeach
                            </select>
                        </div>

                        <div>
                            <label for="course_id" class="block text-sm font-medium text-gray-300">Select the course</label>
                            <select name="course_id" id="course_id" required class="mt-1 block w-full rounded-md border-gray-600 bg-slate-700 text-gray-100 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                                <option value="">Choose Course</option>
                                @foreach($courses as $course)
                                    <option value="{{ $course->id }}">{{ $course->title }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div>
                            <label for="percentage" class="block text-sm font-medium text-gray-300">Percentage Obtained</label>
                            <input type="number" name="percentage" id="percentage" step="0.01" class="mt-1 block w-full rounded-md border-gray-600 bg-slate-700 text-gray-100 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                        </div>

                        <div>
                            <label for="status" class="block text-sm font-medium text-gray-300">Status</label>
                            <select name="status" id="status" required class="mt-1 block w-full rounded-md border-gray-600 bg-slate-700 text-gray-100 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                                <option value="Issued">Issued</option>
                                <option value="Pending">Pending</option>
                                <option value="Revoked">Revoked</option>
                            </select>
                        </div>

                        <div class="flex justify-end">
                            <button type="submit" class="bg-gradient-to-r from-purple-500 to-indigo-500 text-white px-4 py-2 rounded-lg hover:opacity-90">
                                Generate Certificate
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection