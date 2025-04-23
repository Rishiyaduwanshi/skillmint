<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\Course; // Missing Course model import

class CourseController extends Controller
{
    public function index()
    {
        // DB se sab active courses fetch kar rahe hain
        $courses = DB::table('courses')->where('is_active', 1)->get();

        return view('courses.index', compact('courses'));
    }

    public function show($id)
    {
        $course = DB::table('courses')->where('id', $id)->first();

        if (!$course) {
            abort(404);
        }

        // Topics aur Requirements ko JSON se decode kar rahe hain
        $course->topics = json_decode($course->topics, true);
        $course->requirements = json_decode($course->requirements, true);

        return view('courses.show', compact('course'));
    }

    public function create()  // Missing create method
    {
        return view('admin.courses.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric|min:0',
            'duration' => 'required|string',
            'level' => 'required|in:Beginner,Intermediate,Advanced',
            'instructor' => 'required|string',
            'schedule' => 'nullable|string',
            'topics' => 'nullable|string',
            'requirements' => 'nullable|string',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);
    
        // Handle image upload
        $imagePath = $request->file('image')->store('courses', 'public');
    
        // Convert topics and requirements from textarea to JSON
        $topics = array_filter(explode("\n", $request->topics ?? ''));
        $requirements = array_filter(explode("\n", $request->requirements ?? ''));
    
        // Create course using DB facade since we're using it elsewhere
        DB::table('courses')->insert([
            'title' => $request->title,
            'description' => $request->description,
            'price' => $request->price,
            'duration' => $request->duration,
            'level' => $request->level,
            'instructor' => $request->instructor,
            'schedule' => $request->schedule,
            'topics' => json_encode($topics),
            'requirements' => json_encode($requirements),
            'image' => $imagePath,
            'is_active' => true,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        return redirect()->route('adminDashboard')
            ->with('success', 'Course created successfully!');
    }

    // Remove createCourse method as it's not used
}
