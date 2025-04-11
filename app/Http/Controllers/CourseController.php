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

    public function show($id)
    {
        // Temporary data (will be replaced with database later)
        $course = [
            'id' => $id,
            'title' => 'Web Development Fundamentals',
            'duration' => '12 weeks',
            'level' => 'Beginner',
            'price' => '$299',
            'description' => 'Learn the fundamentals of web development including HTML, CSS, and JavaScript. This course is perfect for beginners who want to start their journey in web development.',
            'instructor' => 'John Doe',
            'schedule' => 'Monday and Wednesday, 6:00 PM - 8:00 PM',
            'topics' => [
                'HTML5 Basics',
                'CSS3 Styling',
                'JavaScript Fundamentals',
                'Responsive Design',
                'Basic Backend Concepts',
                'Project Deployment'
            ],
            'requirements' => [
                'Basic computer knowledge',
                'Laptop with internet connection',
                'Text editor (VS Code recommended)'
            ]
        ];

        return view('courses.show', compact('course'));
    }
}
