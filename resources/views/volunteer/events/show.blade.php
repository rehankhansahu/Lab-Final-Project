@extends('layouts.volunteer')

@section('title', $event->event_name)

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h5 class="mb-0" style="color:var(--text-primary)">Event Details</h5>
    <a href="{{ route('volunteer.events') }}" class="btn btn-sm"
       style="border:1px solid var(--table-border);color:var(--text-sub);background:transparent;">
        <i class="bi bi-arrow-left me-1"></i>Back
    </a>
</div>

<div class="card border-0" style="background:var(--bg-card);border:1px solid var(--table-border) !important;">
    <div class="card-body p-4" style="background:var(--bg-card);border-radius:12px;">
        <div class="d-flex justify-content-between align-items-start mb-3">
            <h4 style="font-weight:700;color:var(--text-primary);margin:0">{{ $event->event_name }}</h4>
            <span class="badge bg-primary fs-6">{{ $event->event_date->format('d M Y') }}</span>
        </div>

        <p style="color:var(--text-sub);font-size:14px;margin-bottom:6px;">
            <i class="bi bi-geo-alt me-2" style="color:var(--text-muted)"></i><strong style="color:var(--text-sub)">Venue:</strong> {{ $event->venue }}
        </p>
        <p style="color:var(--text-sub);font-size:14px;margin-bottom:20px;">
            <i class="bi bi-people me-2" style="color:var(--text-muted)"></i><strong style="color:var(--text-sub)">Volunteers Needed:</strong> {{ $event->required_volunteers }}
        </p>

        <h6 style="font-weight:600;color:var(--text-primary);margin-bottom:8px;">Description</h6>
        <p style="color:var(--text-sub);font-size:14px;line-height:1.7;">{{ $event->description }}</p>

        <hr style="border-color:var(--table-border)">

        @if($application)
            <div style="background:var(--accent-light);border:1px solid var(--accent-border);border-radius:8px;padding:12px 16px;font-size:14px;color:var(--text-sub);">
                <strong style="color:var(--text-primary)">Your Application Status:</strong>
                @if($application->status === 'approved')
                    <span class="badge bg-success ms-2">Approved</span>
                @elseif($application->status === 'rejected')
                    <span class="badge bg-danger ms-2">Rejected</span>
                @else
                    <span class="badge bg-warning ms-2">Pending</span>
                @endif
            </div>
        @else
            <form action="{{ route('volunteer.events.apply', $event) }}" method="POST">
                @csrf
                <button type="submit" class="btn btn-primary">
                    <i class="bi bi-clipboard-plus me-1"></i>Apply for This Event
                </button>
            </form>
        @endif
    </div>
</div>
@endsection