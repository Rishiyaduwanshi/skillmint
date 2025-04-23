<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\User;

class adminDashboardController extends Controller
{
    public function index()
    {
        return view('admin.dashboard', [
            'courseCount' => Course::count(),
            'studentCount' => User::where('role', 'user')->count(),
        ]);
    }
}
