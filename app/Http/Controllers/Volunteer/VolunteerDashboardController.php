<?php

namespace App\Http\Controllers\Volunteer;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class VolunteerDashboardController extends Controller
{
    public function index()
    {
        $volunteer = Auth::guard('web')->user();
        $volunteer->load(['applications', 'roleAssignments', 'attendances', 'certificates']);

        $totalApplications = $volunteer->applications->count();
        $approvedApplications = $volunteer->applications->where('status', 'approved')->count();
        $pendingApplications = $volunteer->applications->where('status', 'pending')->count();
        $totalCertificates = $volunteer->certificates->count();

        return view('volunteer.dashboard', compact(
            'volunteer',
            'totalApplications',
            'approvedApplications',
            'pendingApplications',
            'totalCertificates'
        ));
    }
}