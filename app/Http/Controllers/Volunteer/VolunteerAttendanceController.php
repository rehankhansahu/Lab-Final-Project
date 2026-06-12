<?php

namespace App\Http\Controllers\Volunteer;

use App\Http\Controllers\Controller;
use App\Models\Attendance;
use Illuminate\Support\Facades\Auth;

class VolunteerAttendanceController extends Controller
{
    // View my attendance
    public function index()
    {
        $volunteerId = Auth::guard('web')->id();

        $attendances = Attendance::where('volunteer_id', $volunteerId)
            ->with('event')
            ->latest()
            ->get();

        return view('volunteer.attendance.index', compact('attendances'));
    }
}