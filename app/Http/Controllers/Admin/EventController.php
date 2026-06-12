<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http; // Gemini API call ke liye HTTP client

class EventController extends Controller
{
    // List all events
    public function index()
    {
        $events = Event::latest()->get();
        return view('admin.events.index', compact('events'));
    }

    // Show create form
    public function create()
    {
        return view('admin.events.create');
    }

    // One-Click Gemini AI Description Generator (Dynamic Model System)
    public function generateDescription(Request $request)
    {
        $request->validate([
            'event_name' => 'required|string|max:255',
        ]);

        // .env file se API key aur Model ka naam uthana
        $apiKey = trim(env('GEMINI_API_KEY'), " '\""); 
        $model = trim(env('GEMINI_MODEL', 'gemini-2.5-flash'), " '\""); // Default to gemini-2.5-flash if not set
        
        if (!$apiKey) {
            return response()->json(['error' => '.env file mein GEMINI_API_KEY missing hai!'], 500);
        }

        $eventName = $request->input('event_name');
        
        // AI ke liye prompt
        $prompt = "Create an engaging, professional, and clear volunteer event description for an event titled: '{$eventName}'. "
                . "Include sections like 'About the Event', 'What Volunteers Will Do', and 'Benefits of Joining'. "
                . "Keep the tone inspiring. Do not use any markdown formatting like asterisks (**) or hashes (#), write in clean plain text with standard spacing.";

        try {
            // Dynamic URL using stable v1 and the model from .env
            $url = "https://generativelanguage.googleapis.com/v1/models/{$model}:generateContent?key={$apiKey}";

            $response = Http::withHeaders([
                'Content-Type' => 'application/json'
            ])->post($url, [
                'contents' => [
                    [
                        'parts' => [
                            ['text' => $prompt]
                        ]
                    ]
                ]
            ]);

            // Agar request kamyab rahi
            if ($response->successful()) {
                $result = $response->json();
                $aiText = $result['candidates'][0]['content']['parts'][0]['text'] ?? '';
                return response()->json(['description' => trim($aiText)]);
            }

            // Error aane ki soorat mein mukammal tafseel dikhana
            $googleError = $response->json();
            $exactMessage = $googleError['error']['message'] ?? 'No specific message provided by Google.';
            
            return response()->json([
                'error' => "Google API Response (Code: {$response->status()}): {$exactMessage} | Used Model: {$model}"
            ], 500);

        } catch (\Exception $e) {
            return response()->json(['error' => 'Server Error: ' . $e->getMessage()], 500);
        }
    }

    // Store new event
    public function store(Request $request)
    {
        $validated = $request->validate([
            'event_name'         => 'required|string|max:255',
            'event_date'         => 'required|date|after_or_equal:today',
            'venue'              => 'required|string|max:255',
            'description'        => 'required|string',
            'required_volunteers'=> 'required|integer|min:1',
        ]);

        Event::create($validated);

        return redirect()->route('admin.events.index')
                         ->with('success', 'Event created successfully.');
    }

    // Show edit form
    public function edit(Event $event)
    {
        return view('admin.events.edit', compact('event'));
    }

    // Update event
    public function update(Request $request, Event $event)
    {
        $validated = $request->validate([
            'event_name'         => 'required|string|max:255',
            'event_date'         => 'required|date',
            'venue'              => 'required|string|max:255',
            'description'        => 'required|string',
            'required_volunteers'=> 'required|integer|min:1',
        ]);

        $event->update($validated);

        return redirect()->route('admin.events.index')
                         ->with('success', 'Event updated successfully.');
    }

    // Delete event
    public function destroy(Event $event)
    {
        $event->delete();
        return redirect()->route('admin.events.index')
                         ->with('success', 'Event deleted successfully.');
    }

    // View registered volunteers for an event
    public function volunteers(Event $event)
    {
        $applications = $event->applications()->with('volunteer')->get();
        return view('admin.events.volunteers', compact('event', 'applications'));
    }
}