<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CourseController extends Controller
{
    public function index()
    {
        // Temporary data (later we'll fetch from database)
        $courses = [
            [
                'title' => 'Web Development Fundamentals',
                'duration' => '12 weeks',
                'level' => 'Beginner',
                'price' => '$299'
            ],
            [
                'title' => 'Advanced Data Science',
                'duration' => '16 weeks',
                'level' => 'Advanced',
                'price' => '$499'
            ],
            [
                'title' => 'Mobile App Development',
                'duration' => '10 weeks',
                'level' => 'Intermediate',
                'price' => '$399'
            ],
        ];

        return view('courses.index', compact('courses'));
    }
}
