<?php

namespace App\Http\Controllers;

use App\Models\Certificate;
use Barryvdh\DomPDF\Facade\Pdf;

class CertificateController extends Controller
{
    public function show($id)
    {
        // Fetch certificate data with related student and course
        $certificate = Certificate::with(['student', 'course'])->findOrFail($id);

        // Return the view with certificate data
        return view('certificates.template', compact('certificate'));
    }

    public function generatePDF(Certificate $certificate)
    {
        $pdf = PDF::loadView('certificates.template', compact('certificate'));
        return $pdf->download('certificate-'.$certificate->id.'.pdf');
    }
}