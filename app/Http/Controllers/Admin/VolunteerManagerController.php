<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Volunteer;

class VolunteerManagerController extends Controller
{
    // List all volunteers
    public function index()
    {
        $volunteers = Volunteer::latest()->get();
        return view('admin.volunteers.index', compact('volunteers'));
    }

    // View single volunteer details
    public function show(Volunteer $volunteer)
    {
        $volunteer->load(['applications.event', 'roleAssignments.event', 'attendances.event', 'certificates.event']);
        return view('admin.volunteers.show', compact('volunteer'));
    }
}