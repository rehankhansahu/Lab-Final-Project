<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\EventApplication;
use Illuminate\Http\Request;

class ApplicationController extends Controller
{
    // List all applications
    public function index()
    {
        $applications = EventApplication::with(['volunteer', 'event'])
                            ->latest()
                            ->get();
        return view('admin.applications.index', compact('applications'));
    }

    // Approve an application
    public function approve(EventApplication $application)
    {
        $application->update(['status' => 'approved']);
        return back()->with('success', 'Application approved successfully.');
    }

    // Reject an application
    public function reject(EventApplication $application)
    {
        $application->update(['status' => 'rejected']);
        return back()->with('success', 'Application rejected.');
    }
}