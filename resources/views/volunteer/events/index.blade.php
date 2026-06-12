@extends('layouts.volunteer')

@section('title', 'Available Events')

@section('content')
<h5 class="mb-4" style="color:var(--text-primary)">Available Events</h5>

@if($events->isEmpty())
    <div style="background:var(--accent-light);border:1px solid var(--accent-border);border-radius:8px;padding:14px 18px;color:var(--accent);font-size:14px;">
        No events available at the moment.
    </div>
@else
    <div class="row row-cols-1 row-cols-md-2 g-4">
        @foreach($events as $event)
        <div class="col">
            <div class="card border-0 h-100" style="background:var(--bg-card);border:1px solid var(--table-border) !important;">
                <div class="card-body" style="background:var(--bg-card);border-radius:10px 10px 0 0;">
                    <div class="d-flex justify-content-between align-items-start mb-2">
                        <h6 style="color:var(--text-primary);font-weight:600;margin:0;font-size:15px;">{{ $event->event_name }}</h6>
                        <span class="badge bg-primary ms-2" style="white-space:nowrap">{{ $event->event_date->format('d M Y') }}</span>
                    </div>
                    <p style="color:var(--text-muted);font-size:13px;margin-bottom:4px;">
                        <i class="bi bi-geo-alt me-1"></i>{{ $event->venue }}
                    </p>
                    <p style="color:var(--text-muted);font-size:13px;margin-bottom:12px;">
                        <i class="bi bi-people me-1"></i>{{ $event->required_volunteers }} volunteers needed
                    </p>
                    <p style="color:var(--text-sub);font-size:13.5px;margin:0;">{{ Str::limit($event->description, 120) }}</p>
                </div>
                <div class="card-footer" style="background:var(--bg-card);border-top:1px solid var(--table-border);border-radius:0 0 10px 10px;padding:12px 16px;">
                    @if(in_array($event->id, $appliedEventIds))
                        <span class="btn btn-success btn-sm disabled w-100">
                            <i class="bi bi-check-circle me-1"></i>Applied
                        </span>
                    @else
                        <div class="d-flex gap-2">
                            <a href="{{ route('volunteer.events.show', $event) }}"
                               class="btn btn-sm"
                               style="border:1px solid var(--table-border);color:var(--text-sub);background:transparent;">
                                View Details
                            </a>
                            <form action="{{ route('volunteer.events.apply', $event) }}" method="POST" class="flex-grow-1">
                                @csrf
                                <button type="submit" class="btn btn-primary btn-sm w-100">
                                    <i class="bi bi-clipboard-plus me-1"></i>Apply Now
                                </button>
                            </form>
                        </div>
                    @endif
                </div>
            </div>
        </div>
        @endforeach
    </div>
@endif
@endsection