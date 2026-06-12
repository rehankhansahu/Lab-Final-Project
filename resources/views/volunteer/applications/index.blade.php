@extends('layouts.volunteer')

@section('title', 'My Applications')

@section('content')
<h5 class="mb-4" style="color:var(--text-primary)">My Applications</h5>

@if($applications->isEmpty())
    <div style="background:var(--accent-light);border:1px solid var(--accent-border);border-radius:8px;padding:14px 18px;font-size:14px;color:var(--accent);">
        You have not applied to any events yet.
        <a href="{{ route('volunteer.events') }}" style="color:var(--accent);font-weight:600;margin-left:6px;">Browse events →</a>
    </div>
@else
    <div class="card border-0" style="background:var(--bg-card);border:1px solid var(--table-border) !important;">
        <div class="table-responsive">
            <table class="table table-hover mb-0" style="color:var(--text-primary)">
                <thead>
                    <tr style="background:var(--table-head)">
                        <th style="color:var(--text-sub);border-color:var(--table-border);background:var(--table-head);font-size:13px;font-weight:600;">#</th>
                        <th style="color:var(--text-sub);border-color:var(--table-border);background:var(--table-head);font-size:13px;font-weight:600;">Event Name</th>
                        <th style="color:var(--text-sub);border-color:var(--table-border);background:var(--table-head);font-size:13px;font-weight:600;">Event Date</th>
                        <th style="color:var(--text-sub);border-color:var(--table-border);background:var(--table-head);font-size:13px;font-weight:600;">Venue</th>
                        <th style="color:var(--text-sub);border-color:var(--table-border);background:var(--table-head);font-size:13px;font-weight:600;">Applied On</th>
                        <th style="color:var(--text-sub);border-color:var(--table-border);background:var(--table-head);font-size:13px;font-weight:600;">Status</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($applications as $application)
                    <tr style="background:var(--bg-card);border-color:var(--table-border)">
                        <td style="color:var(--text-sub);border-color:var(--table-border);background:var(--bg-card);font-size:13.5px;">{{ $loop->iteration }}</td>
                        <td style="color:var(--text-primary);border-color:var(--table-border);background:var(--bg-card);font-size:13.5px;font-weight:500;">{{ $application->event->event_name }}</td>
                        <td style="color:var(--text-sub);border-color:var(--table-border);background:var(--bg-card);font-size:13.5px;">{{ $application->event->event_date->format('d M Y') }}</td>
                        <td style="color:var(--text-sub);border-color:var(--table-border);background:var(--bg-card);font-size:13.5px;">{{ $application->event->venue }}</td>
                        <td style="color:var(--text-sub);border-color:var(--table-border);background:var(--bg-card);font-size:13.5px;">{{ $application->created_at->format('d M Y') }}</td>
                        <td style="border-color:var(--table-border);background:var(--bg-card);">
                            @if($application->status === 'approved')
                                <span class="badge bg-success">Approved</span>
                            @elseif($application->status === 'rejected')
                                <span class="badge bg-danger">Rejected</span>
                            @else
                                <span class="badge bg-warning">Pending</span>
                            @endif
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endif
@endsection