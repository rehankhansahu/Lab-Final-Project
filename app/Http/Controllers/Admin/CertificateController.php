<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Event;
use App\Models\Attendance;
use App\Models\Certificate;
use Illuminate\Support\Carbon;

class CertificateController extends Controller
{
    // List events for certificate generation
    public function index()
    {
        $events = Event::latest()->get();
        return view('admin.certificates.index', compact('events'));
    }

    // Generate certificates for all present volunteers in an event
    public function generate(Event $event)
    {
        $presentAttendances = Attendance::where('event_id', $event->id)
            ->where('attendance_status', 'present')
            ->get();

        $count = 0;
        foreach ($presentAttendances as $attendance) {
            Certificate::firstOrCreate(
                [
                    'volunteer_id' => $attendance->volunteer_id,
                    'event_id'     => $attendance->event_id,
                ],
                [
                    'issue_date' => Carbon::today(),
                ]
            );
            $count++;
        }

        return redirect()->route('admin.certificates.index')
                         ->with('success', "Certificates generated for {$count} volunteer(s).");
    }

    // View all generated certificates
    public function all()
    {
        $certificates = Certificate::with(['volunteer', 'event'])->latest()->get();
        return view('admin.certificates.all', compact('certificates'));
    }
}