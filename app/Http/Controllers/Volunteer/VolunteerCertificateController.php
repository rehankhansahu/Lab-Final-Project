<?php

namespace App\Http\Controllers\Volunteer;

use App\Http\Controllers\Controller;
use App\Models\Certificate;
use Illuminate\Support\Facades\Auth;
use Barryvdh\DomPDF\Facade\Pdf;

class VolunteerCertificateController extends Controller
{
    // View my certificates
    public function index()
    {
        $volunteerId = Auth::guard('web')->id();

        $certificates = Certificate::where('volunteer_id', $volunteerId)
            ->with('event')
            ->latest()
            ->get();

        return view('volunteer.certificates.index', compact('certificates'));
    }

    // Download certificate as PDF
    public function download(Certificate $certificate)
    {
        $volunteerId = Auth::guard('web')->id();

        // Make sure the certificate belongs to this volunteer
        if ($certificate->volunteer_id !== $volunteerId) {
            abort(403, 'Unauthorized.');
        }

        $certificate->load(['volunteer', 'event']);

        $pdf = Pdf::loadView('pdf.certificate', compact('certificate'));
        $pdf->setPaper('A4', 'landscape');

        $filename = 'certificate_' . $certificate->volunteer->name . '_' . $certificate->event->event_name . '.pdf';
        $filename = preg_replace('/[^A-Za-z0-9_\-.]/', '_', $filename);

        return $pdf->download($filename);
    }
}