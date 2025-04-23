<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CourseEnrollment;
use Illuminate\Support\Facades\Auth;

class EnrollmentController extends Controller
{
    public function enroll($courseId)
    {
        // Check if user is already enrolled
        $existingEnrollment = CourseEnrollment::where('user_id', Auth::id())
            ->where('course_id', $courseId)
            ->first();

        if ($existingEnrollment) {
            return redirect()->back()->with('error', 'You are already enrolled in this course!');
        }

        // Create new enrollment
        CourseEnrollment::create([
            'user_id' => Auth::id(),
            'course_id' => $courseId,
        ]);

        return redirect()->route('courses.show', $courseId)
            ->with('success', 'Successfully enrolled in the course!');
    }

    public function myEnrollments()
    {
        $enrollments = CourseEnrollment::with('course')
            ->where('user_id', Auth::id())
            ->get();

        return view('enrollments.index', compact('enrollments'));
    }
}