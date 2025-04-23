<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB; 

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
        // Specific course ko DB se fetch kar rahe hain
        $course = DB::table('courses')->where('id', $id)->first();

        // Agar course nahi milta to 404 dikhana
        if (!$course) {
            abort(404);
        }

        // Topics aur Requirements ko JSON se decode kar rahe hain
        $course->topics = json_decode($course->topics, true);
        $course->requirements = json_decode($course->requirements, true);

        return view('courses.show', compact('course'));
    }

    public function createCourse(){
        
    }
}
