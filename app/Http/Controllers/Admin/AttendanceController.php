<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Event;
use App\Models\EventApplication;
use App\Models\Attendance;
use Illuminate\Http\Request;

class AttendanceController extends Controller
{
    // List events for attendance management
    public function index()
    {
        $events = Event::latest()->get();
        return view('admin.attendance.index', compact('events'));
    }

    // Show attendance form for a specific event
    public function manage(Event $event)
    {
        $approvedApplications = EventApplication::where('event_id', $event->id)
            ->where('status', 'approved')
            ->with('volunteer')
            ->get();

        $existingAttendance = Attendance::where('event_id', $event->id)
            ->pluck('attendance_status', 'volunteer_id')
            ->toArray();

        return view('admin.attendance.manage', compact('event', 'approvedApplications', 'existingAttendance'));
    }

    // Save attendance records
    public function save(Request $request, Event $event)
    {
        $request->validate([
            'attendance'   => 'required|array',
            'attendance.*' => 'required|string|in:present,absent',
        ]);

        foreach ($request->attendance as $volunteerId => $status) {
            Attendance::updateOrCreate(
                ['volunteer_id' => $volunteerId, 'event_id' => $event->id],
                ['attendance_status' => $status]
            );
        }

        return redirect()->route('admin.attendance.index')
                         ->with('success', 'Attendance saved successfully.');
    }
}