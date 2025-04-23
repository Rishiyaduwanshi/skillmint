<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\User;
use App\Models\Payment;

class adminDashboardController extends Controller
{
    public function index()
    {
        $pendingPayments = Payment::where('status', 'Pending')
            ->with(['user', 'course'])
            ->get();
        
        return view('admin.dashboard', [
            'courseCount' => Course::count(),
            'studentCount' => User::where('role', 'user')->count(),
            'courses' => Course::all(),
            'pendingPaymentsCount' => $pendingPayments->count(),
            'pendingPayments' => $pendingPayments,
        ]);
    }
}
