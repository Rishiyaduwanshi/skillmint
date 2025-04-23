<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\CertificateController;
use App\Http\Middleware\AdminMiddleware;
use App\Http\Middleware\chechAdmin;
use App\Http\Controllers\adminDashboardController;


// Existing routes
Route::get('/', function () {
    return view('home');
});

Route::get('/courses', [CourseController::class, 'index'])->name('courses.index');
Route::get('/courses/{id}', [CourseController::class, 'show'])->name('courses.show');
Route::middleware('checkAdmin')->group(function () {
    Route::post('/courses', [CourseController::class, 'createCourse']);
    Route::patch('/courses/{id}/', [CourseController::class, 'editCourse']);
    Route::delete('/courses/{id}', [CourseController::class, 'deleteCourse']);
});

// Auth routes
Route::get('/login', [LoginController::class, 'show'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::middleware('auth')->group(function () {
    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
    Route::get('/logout', function() {
        return redirect()->back();
    });
});

Route::get('/register', [RegisterController::class, 'show'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);

// // Admin routes
// Route::middleware(['auth', 'admin'])->group(function () {
//     Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
// });

Route::get('/admin/dashboard',[adminDashboardController::class, 'index'])
->name('adminDashboard')
->middleware(AdminMiddleware::class);

Route::get('/cert/{id}', [CertificateController::class, 'show'])
->name('certificate.show');