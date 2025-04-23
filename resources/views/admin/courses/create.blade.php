@extends('layouts.app')

@section('content')
<div class="container mx-auto px-6 py-8">
    <div class="bg-slate-800 rounded-lg shadow-lg border border-slate-700 p-8">
        <h2 class="text-3xl font-bold text-transparent bg-clip-text bg-gradient-to-r from-cyan-400 to-emerald-400 mb-6">
            Create New Course
        </h2>

        <form action="{{ route('courses.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
            @csrf
            
            <div>
                <label class="text-gray-100 block mb-2">Course Title</label>
                <input type="text" name="title" class="w-full bg-slate-700 border border-slate-600 rounded-lg px-4 py-2 text-gray-100" required>
            </div>

            <div>
                <label class="text-gray-100 block mb-2">Description</label>
                <textarea name="description" rows="4" class="w-full bg-slate-700 border border-slate-600 rounded-lg px-4 py-2 text-gray-100"></textarea>
            </div>

            <div class="grid grid-cols-2 gap-6">
                <div>
                    <label class="text-gray-100 block mb-2">Price</label>
                    <input type="number" name="price" step="0.01" class="w-full bg-slate-700 border border-slate-600 rounded-lg px-4 py-2 text-gray-100" required>
                </div>

                <div>
                    <label class="text-gray-100 block mb-2">Duration</label>
                    <input type="text" name="duration" class="w-full bg-slate-700 border border-slate-600 rounded-lg px-4 py-2 text-gray-100" required>
                </div>
            </div>

            <div class="grid grid-cols-2 gap-6">
                <div>
                    <label class="text-gray-100 block mb-2">Level</label>
                    <select name="level" class="w-full bg-slate-700 border border-slate-600 rounded-lg px-4 py-2 text-gray-100">
                        <option value="Beginner">Beginner</option>
                        <option value="Intermediate">Intermediate</option>
                        <option value="Advanced">Advanced</option>
                    </select>
                </div>

                <div>
                    <label class="text-gray-100 block mb-2">Instructor</label>
                    <input type="text" name="instructor" class="w-full bg-slate-700 border border-slate-600 rounded-lg px-4 py-2 text-gray-100" required>
                </div>
            </div>

            <div>
                <label class="text-gray-100 block mb-2">Schedule</label>
                <input type="text" name="schedule" class="w-full bg-slate-700 border border-slate-600 rounded-lg px-4 py-2 text-gray-100">
            </div>

            <div>
                <label class="text-gray-100 block mb-2">Topics (one per line)</label>
                <textarea name="topics" rows="4" class="w-full bg-slate-700 border border-slate-600 rounded-lg px-4 py-2 text-gray-100"></textarea>
            </div>

            <div>
                <label class="text-gray-100 block mb-2">Requirements (one per line)</label>
                <textarea name="requirements" rows="4" class="w-full bg-slate-700 border border-slate-600 rounded-lg px-4 py-2 text-gray-100"></textarea>
            </div>

            <div>
                <label class="text-gray-100 block mb-2">Course Image</label>
                <input type="file" name="image" accept="image/*" class="w-full bg-slate-700 border border-slate-600 rounded-lg px-4 py-2 text-gray-100">
            </div>

            <div class="flex items-center gap-4">
                <button type="submit" class="bg-gradient-to-r from-cyan-500 to-emerald-500 text-white px-6 py-2 rounded-lg hover:opacity-90">
                    Create Course
                </button>
                <a href="{{ route('adminDashboard') }}" class="text-gray-400 hover:text-gray-300">Cancel</a>
            </div>
        </form>
    </div>
</div>
@endsection