<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CourseController;

Route::get('/', function () {
    return view('home');
});

Route::get('/courses', [CourseController::class, 'index'])->name('courses.index');
