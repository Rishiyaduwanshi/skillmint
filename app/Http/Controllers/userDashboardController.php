<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Course;
use App\Models\CourseEnrollment;
use App\Models\Certificate;
use App\Models\Payment;
use Illuminate\Support\Facades\Auth;

class userDashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        
        $enrollments = CourseEnrollment::where('user_id', $user->id)
            ->with('course')
            ->get();

        $certificates = Certificate::where('student_id', $user->id)
            ->with('course')
            ->get();

        $pendingPayments = Payment::where('user_id', $user->id)
            ->where('status', 'Pending')
            ->with('course')
            ->get();


        return view('dashboard', [
            'user' => $user,
            'enrollments' => $enrollments,
            'certificates' => $certificates,
            'pendingPayments' => $pendingPayments,
            'totalEnrollments' => $enrollments->count(),
            'payments' => Payment::where('user_id', $user->id)->latest()->get() 
        ]);
    }


    public function updateProfile(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . Auth::id(),
            'phone' => 'nullable|string|max:15',
            'address' => 'nullable|string|max:255'
        ]);

        $user = Auth::user();
        $user->update($request->all());

        return redirect()->back()->with('success', 'प्रोफ़ाइल सफलतापूर्वक अपडेट की गई');
    }

    public function myCourses()
    {
        $enrollments = CourseEnrollment::where('user_id', Auth::id())
            ->with(['course'])
            ->get();

        return view('user.courses', compact('enrollments'));
    }

    public function viewCertificates()
    {
        $certificates = Certificate::where('student_id', Auth::id())
            ->with(['course'])
            ->get();

        return view('certificates.template', compact('certificates'));
    }

    public function viewPayments()
    {
        $payments = Payment::where('user_id', Auth::id())
            ->with(['course'])
            ->latest()
            ->get();

        return view('user.payments', compact('payments'));
    }

    public function courseProgress($courseId)
    {
        $enrollment = CourseEnrollment::where('user_id', Auth::id())
            ->where('course_id', $courseId)
            ->with(['course'])
            ->firstOrFail();

        return view('user.course-progress', compact('enrollment'));
    }
}
