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
use App\Http\Controllers\userDashboardController;


Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('/courses', [CourseController::class, 'index'])->name('courses.index');
Route::middleware(checkAdmin::class)->group(function () {
    // courses routes
    Route::get('/courses/create', [CourseController::class, 'create'])->name('courses.create');
    Route::post('/courses', [CourseController::class, 'store'])->name('courses.store');
    Route::patch('/courses/{id}', [CourseController::class, 'update'])->name('courses.update');
    Route::delete('/courses/{id}', [CourseController::class, 'destroy'])->name('courses.destroy');

    // certificate routes
    Route::get('/certificates/create', [CertificateController::class, 'create'])->name('certificates.create');
    Route::post('/certificates', [CertificateController::class, 'store'])->name('certificates.store');
    Route::patch('/certificates/{id}', [CertificateController::class, 'update'])->name('certificates.update');
    Route::delete('/certificates/{id}', [CertificateController::class, 'destroy'])->name('certificates.destroy');
});
Route::get('/certificates/{id}', [CertificateController::class, 'show'])->name('certificates.show');
Route::get('/courses/{id}', [CourseController::class, 'show'])->name('courses.show');

// Auth routes
Route::get('/login', [LoginController::class, 'show'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::middleware(['auth'])->group(function () {
    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
    Route::get('/logout', function() {
        return redirect()->back();
    });

    Route::get('/courses/{id}/payment', [PaymentController::class, 'show'])->name('payments.show');
    Route::post('/courses/{id}/payment', [PaymentController::class, 'store'])->name('payments.store');

    Route::get('/dashboard',[userDashboardController::class,'index'])->name('userDashboard');
    Route::post('/courses/{id}/enroll', [EnrollmentController::class, 'enroll'])->name('courses.enroll');
    Route::get('/my-enrollments', [EnrollmentController::class, 'myEnrollments'])->name('my.enrollments');
    
    Route::post('/profile/update', [userDashboardController::class, 'updateProfile'])->name('user.profile.update');
    Route::get('/my-courses', [userDashboardController::class, 'myCourses'])->name('user.courses');
    Route::get('/certificates', [userDashboardController::class, 'viewCertificates'])->name('user.certificates');
    Route::get('/payments', [userDashboardController::class, 'viewPayments'])->name('user.payments');
    Route::get('/course/{courseId}/progress', [userDashboardController::class, 'courseProgress'])->name('user.course.progress');
});
Route::get('/register', [RegisterController::class, 'show'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);

Route::get('/admin/dashboard',[adminDashboardController::class, 'index'])
->name('adminDashboard')
->middleware(AdminMiddleware::class);


Route::middleware(checkAdmin::class)->group(function () {
    Route::post('/admin/payments/{payment}/approve', [PaymentController::class, 'approve'])->name('admin.payments.approve');
    Route::post('/admin/payments/{payment}/reject', [PaymentController::class, 'reject'])->name('admin.payments.reject');
});