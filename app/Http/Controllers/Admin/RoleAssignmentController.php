<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Event;
use App\Models\EventApplication;
use App\Models\RoleAssignment;
use Illuminate\Http\Request;

class RoleAssignmentController extends Controller
{
    // Predefined volunteer roles
    public const ROLES = [
        'Registration Desk',
        'Technical Support',
        'Stage Management',
        'Hospitality',
        'Photography',
        'Crowd Management',
    ];

    // List events to pick for role assignment
    public function index()
    {
        $events = Event::latest()->get();
        return view('admin.roles.index', compact('events'));
    }

    // Show approved volunteers for a specific event to assign roles
    public function assignForm(Event $event)
    {
        $approvedApplications = EventApplication::where('event_id', $event->id)
            ->where('status', 'approved')
            ->with('volunteer')
            ->get();

        $existingAssignments = RoleAssignment::where('event_id', $event->id)
            ->pluck('role_name', 'volunteer_id')
            ->toArray();

        $roles = self::ROLES;

        return view('admin.roles.assign', compact('event', 'approvedApplications', 'existingAssignments', 'roles'));
    }

    // Save role assignments
    public function assign(Request $request, Event $event)
    {
        $request->validate([
            'roles'   => 'required|array',
            'roles.*' => 'required|string|in:' . implode(',', self::ROLES),
        ]);

        foreach ($request->roles as $volunteerId => $roleName) {
            RoleAssignment::updateOrCreate(
                ['volunteer_id' => $volunteerId, 'event_id' => $event->id],
                ['role_name' => $roleName]
            );
        }

        return redirect()->route('admin.roles.index')
                         ->with('success', 'Roles assigned successfully.');
    }
}