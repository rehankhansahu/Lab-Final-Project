<?php

namespace App\Http\Controllers\Volunteer;

use App\Http\Controllers\Controller;
use App\Models\EventApplication;
use Illuminate\Support\Facades\Auth;

class VolunteerApplicationController extends Controller
{
    // View my applications
    public function index()
    {
        $volunteerId = Auth::guard('web')->id();

        $applications = EventApplication::where('volunteer_id', $volunteerId)
            ->with('event')
            ->latest()
            ->get();

        return view('volunteer.applications.index', compact('applications'));
    }
}