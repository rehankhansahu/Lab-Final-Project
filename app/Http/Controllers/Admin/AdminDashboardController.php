<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Volunteer;
use App\Models\Event;
use App\Models\EventApplication;
use App\Models\Certificate;

class AdminDashboardController extends Controller
{
    public function index()
    {
        $totalVolunteers    = Volunteer::count();
        $totalEvents        = Event::count();
        $pendingApplications = EventApplication::where('status', 'pending')->count();
        $totalCertificates  = Certificate::count();

        return view('admin.dashboard', compact(
            'totalVolunteers',
            'totalEvents',
            'pendingApplications',
            'totalCertificates'
        ));
    }
}