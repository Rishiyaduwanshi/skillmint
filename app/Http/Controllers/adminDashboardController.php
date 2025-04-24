<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\User;
use App\Models\Payment;
use App\Models\CourseEnrollment;
use App\Models\Certificate;

class adminDashboardController extends Controller
{
    public function index()
    {
        $certificates = Certificate::with(['student', 'course'])->get();
        $pendingPayments = Payment::where('status', 'Pending')
            ->with(['user', 'course'])
            ->get();

        $courseEnrollments = CourseEnrollment::with(['user','course'])->get();
        
        return view('admin.dashboard', [
            'courseCount' => Course::count(),
            'studentCount' => User::where('role', 'user')->count(),
            'courses' => Course::all(),
            'pendingPaymentsCount' => $pendingPayments->count(),
            'pendingPayments' => $pendingPayments,
            'courseEnrollments' => $courseEnrollments,
            'certificates' => $certificates,
        ]);
    }
}
