<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use App\Models\Course;
use App\Models\CourseEnrollment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Config;

class PaymentController extends Controller
{
    public function show($courseId)
    {
        $course = Course::findOrFail($courseId);
        $paymentConfig = Config::get('admin');
        
        return view('payments.create', compact('course', 'paymentConfig'));
    }

    public function store(Request $request, $courseId)
    {
        $validated = $request->validate([
            'payment_method' => 'required|in:UPI,Bank transfer',
            'upload_receipt' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $course = Course::findOrFail($courseId);
        
        // Store receipt image
        $receiptPath = $request->file('upload_receipt')->store('receipts', 'public');

        // Create payment record
        $payment = Payment::create([
            'user_id' => Auth::id(),
            'course_id' => $courseId,
            'amount' => $course->price,
            'payment_method' => $validated['payment_method'],
            'upload_receipt' => $receiptPath,
            'status' => 'Pending',
        ]);

        return redirect()->route('courses.show', $courseId)
            ->with('success', 'Payment submitted successfully! Your enrollment will be confirmed after verification.');
    }

    public function approve(Request $request, $id)
    {
        $validated = $request->validate([
            'transaction_id' => 'required|string|min:5'
        ]);

        $payment = Payment::findOrFail($id);
        
        // Check if transaction ID already exists
        $existingPayment = Payment::where('transaction_id', $validated['transaction_id'])
            ->where('id', '!=', $id)
            ->first();
            
        if ($existingPayment) {
            return redirect()->back()->with('error', 'This transaction ID has already been used!');
        }

        $payment->transaction_id = $validated['transaction_id'];
        $payment->status = 'Approved';
        $payment->save();
    
        // Create enrollment
        CourseEnrollment::create([
            'user_id' => $payment->user_id,
            'course_id' => $payment->course_id,
            'payment_id' => $payment->id
        ]);

        return redirect()->back()->with('success', 'Payment verified and enrollment created!');
    }

    public function reject($id)
    {
        $payment = Payment::findOrFail($id);
        $payment->status = 'Rejected';
        $payment->save();
    
        return redirect()->back()->with('success', 'Payment rejected!');
    }
}