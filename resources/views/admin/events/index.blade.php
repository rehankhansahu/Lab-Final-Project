@extends('layouts.admin')

@section('title', 'Manage Events')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h5 class="mb-0" style="color:var(--text-primary)">All Events</h5>
    <a href="{{ route('admin.events.create') }}" class="btn btn-primary btn-sm">
        <i class="bi bi-plus-circle me-1"></i>Create Event
    </a>
</div>

@if($events->isEmpty())
    <div style="background:var(--accent-light);border:1px solid var(--accent-border);border-radius:8px;padding:14px 18px;font-size:14px;color:var(--accent);">
        No events found. <a href="{{ route('admin.events.create') }}" style="color:var(--accent);font-weight:600;">Create one now.</a>
    </div>
@else
    <div class="card border-0" style="background:var(--bg-card);border:1px solid var(--table-border) !important;">
        <div class="table-responsive">
            <table class="table table-hover mb-0">
                <thead>
                    <tr style="background:var(--table-head)">
                        <th style="color:var(--text-sub);border-color:var(--table-border);background:var(--table-head);font-size:13px;font-weight:600;">#</th>
                        <th style="color:var(--text-sub);border-color:var(--table-border);background:var(--table-head);font-size:13px;font-weight:600;">Event Name</th>
                        <th style="color:var(--text-sub);border-color:var(--table-border);background:var(--table-head);font-size:13px;font-weight:600;">Date</th>
                        <th style="color:var(--text-sub);border-color:var(--table-border);background:var(--table-head);font-size:13px;font-weight:600;">Venue</th>
                        <th style="color:var(--text-sub);border-color:var(--table-border);background:var(--table-head);font-size:13px;font-weight:600;">Required</th>
                        <th style="color:var(--text-sub);border-color:var(--table-border);background:var(--table-head);font-size:13px;font-weight:600;">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($events as $event)
                    <tr style="background:var(--bg-card);border-color:var(--table-border)">
                        <td style="color:var(--text-sub);border-color:var(--table-border);background:var(--bg-card);font-size:13.5px;">{{ $loop->iteration }}</td>
                        <td style="color:var(--text-primary);border-color:var(--table-border);background:var(--bg-card);font-size:13.5px;font-weight:500;">{{ $event->event_name }}</td>
                        <td style="color:var(--text-sub);border-color:var(--table-border);background:var(--bg-card);font-size:13.5px;">{{ $event->event_date->format('d M Y') }}</td>
                        <td style="color:var(--text-sub);border-color:var(--table-border);background:var(--bg-card);font-size:13.5px;">{{ $event->venue }}</td>
                        <td style="color:var(--text-sub);border-color:var(--table-border);background:var(--bg-card);font-size:13.5px;">{{ $event->required_volunteers }}</td>
                        <td style="border-color:var(--table-border);background:var(--bg-card);">
                            <a href="{{ route('admin.events.volunteers', $event) }}" class="btn btn-info btn-sm" title="Volunteers"><i class="bi bi-people"></i></a>
                            <a href="{{ route('admin.events.edit', $event) }}" class="btn btn-warning btn-sm" title="Edit"><i class="bi bi-pencil"></i></a>
                            <form action="{{ route('admin.events.destroy', $event) }}" method="POST" class="d-inline" onsubmit="return confirm('Delete this event?')">
                                @csrf @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" title="Delete"><i class="bi bi-trash"></i></button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endif
@endsection