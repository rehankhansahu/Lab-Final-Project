<?php

namespace App\Http\Controllers\Volunteer;

use App\Http\Controllers\Controller;
use App\Models\Event;
use App\Models\EventApplication;
use Illuminate\Support\Facades\Auth;

class VolunteerEventController extends Controller
{
    // Show all available events
    public function index()
    {
        $volunteerId = Auth::guard('web')->id();

        $events = Event::latest()->get();

        // Get events the volunteer has already applied for
        $appliedEventIds = EventApplication::where('volunteer_id', $volunteerId)
            ->pluck('event_id')
            ->toArray();

        return view('volunteer.events.index', compact('events', 'appliedEventIds'));
    }

    // Show single event details
    public function show(Event $event)
    {
        $volunteerId = Auth::guard('web')->id();

        $application = EventApplication::where('volunteer_id', $volunteerId)
            ->where('event_id', $event->id)
            ->first();

        return view('volunteer.events.show', compact('event', 'application'));
    }

    // Apply for an event
    public function apply(Event $event)
    {
        $volunteerId = Auth::guard('web')->id();

        // Check if already applied
        $exists = EventApplication::where('volunteer_id', $volunteerId)
            ->where('event_id', $event->id)
            ->exists();

        if ($exists) {
            return back()->with('error', 'You have already applied for this event.');
        }

        EventApplication::create([
            'volunteer_id' => $volunteerId,
            'event_id'     => $event->id,
            'status'       => 'pending',
        ]);

        return redirect()->route('volunteer.applications')
                         ->with('success', 'Application submitted successfully. Status: Pending.');
    }
}