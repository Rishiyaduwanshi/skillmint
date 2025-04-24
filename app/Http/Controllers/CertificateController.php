<?php

namespace App\Http\Controllers;

use App\Models\Certificate;
use App\Models\User;
use App\Models\Course;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class CertificateController extends Controller
{

    public function show($id)
    {
        $certificate = Certificate::with(['student', 'course'])->findOrFail($id);

        return view('certificates.template', compact('certificate'));
    }

    public function generatePDF(Certificate $certificate)
    {
        $pdf = PDF::loadView('certificates.template', compact('certificate'));
        return $pdf->download('certificate-'.$certificate->id.'.pdf');
    }

    public function store(Request $request)
    {
        $request->validate([
            'student_id' => 'required|exists:users,id',
            'course_id' => 'required|exists:courses,id',
            'percentage' => 'nullable|numeric',
            'status' => 'required|in:Pending,Issued,Revoked',
        ]);

        $certificate = Certificate::create([
            'student_id' => $request->student_id,
            'course_id' => $request->course_id,
            'percentage' => $request->percentage,
            'status' => $request->status,
            'generated_by' => auth()->id(),
            'certificate_link' => '',
        ]);
        $certificate->certificate_link = "/certificate/".$certificate->id;
        $certificate->save();
        
        return back()->with('success', 'Certificate '.$certificate->id.' created successfully!');
    }

    public function create()
    {
        $students = User::where('role', 'user')->get();
        $courses = Course::all();       
        return view('certificates.create', compact('students', 'courses'));
    }

    public function destroy($id)
    {
        $certificate = Certificate::findOrFail($id);
        $certificate->delete();
        return back()->with('success', 'Certificate '.$certificate->id.' deleted successfully!');
    }
}