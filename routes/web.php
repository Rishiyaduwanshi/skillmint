<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\CertificateController;
use App\Http\Middleware\AdminMiddleware;
use App\Http\Middleware\checkAdmin;
use App\Http\Controllers\adminDashboardController;
use App\Http\Controllers\EnrollmentController;
use App\Http\Controllers\PaymentController;


// Existing routes
Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('/courses', [CourseController::class, 'index'])->name('courses.index');
Route::middleware(checkAdmin::class)->group(function () {
    Route::get('/courses/create', [CourseController::class, 'create'])->name('courses.create');
    Route::post('/courses', [CourseController::class, 'store'])->name('courses.store');
    Route::patch('/courses/{id}', [CourseController::class, 'update'])->name('courses.update');
    Route::delete('/courses/{id}', [CourseController::class, 'destroy'])->name('courses.destroy');
});
Route::get('/courses/{id}', [CourseController::class, 'show'])->name('courses.show');

// Auth routes
Route::get('/login', [LoginController::class, 'show'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::middleware('auth')->group(function () {
    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
    Route::get('/logout', function() {
        return redirect()->back();
    });
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('userDashboard');
    Route::post('/courses/{id}/enroll', [EnrollmentController::class, 'enroll'])->name('courses.enroll');
    Route::get('/my-enrollments', [EnrollmentController::class, 'myEnrollments'])->name('my.enrollments');
    Route::get('/courses/{id}/payment', [PaymentController::class, 'show'])->name('payments.show');
    Route::post('/courses/{id}/payment', [PaymentController::class, 'store'])->name('payments.store');
});

Route::get('/register', [RegisterController::class, 'show'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);

Route::get('/admin/dashboard',[adminDashboardController::class, 'index'])
->name('adminDashboard')
->middleware(AdminMiddleware::class);

Route::get('/cert/{id}', [CertificateController::class, 'show'])
->name('certificate.show');

Route::middleware(checkAdmin::class)->group(function () {
    Route::post('/admin/payments/{payment}/approve', [PaymentController::class, 'approve'])->name('admin.payments.approve');
    Route::post('/admin/payments/{payment}/reject', [PaymentController::class, 'reject'])->name('admin.payments.reject');
});