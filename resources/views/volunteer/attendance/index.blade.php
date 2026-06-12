@extends('layouts.volunteer')

@section('title', 'My Attendance')

@section('content')
<h5 class="mb-4" style="color:var(--text-primary)">My Attendance Records</h5>

@if($attendances->isEmpty())
    <div style="background:var(--accent-light);border:1px solid var(--accent-border);border-radius:8px;padding:14px 18px;font-size:14px;color:var(--accent);">
        No attendance records found. Attendance is recorded by the admin after events.
    </div>
@else
    <div class="card border-0" style="background:var(--bg-card);border:1px solid var(--table-border) !important;">
        <div class="table-responsive">
            <table class="table table-hover mb-0">
                <thead>
                    <tr style="background:var(--table-head)">
                        <th style="color:var(--text-sub);border-color:var(--table-border);background:var(--table-head);font-size:13px;font-weight:600;">#</th>
                        <th style="color:var(--text-sub);border-color:var(--table-border);background:var(--table-head);font-size:13px;font-weight:600;">Event Name</th>
                        <th style="color:var(--text-sub);border-color:var(--table-border);background:var(--table-head);font-size:13px;font-weight:600;">Event Date</th>
                        <th style="color:var(--text-sub);border-color:var(--table-border);background:var(--table-head);font-size:13px;font-weight:600;">Venue</th>
                        <th style="color:var(--text-sub);border-color:var(--table-border);background:var(--table-head);font-size:13px;font-weight:600;">Status</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($attendances as $attendance)
                    <tr style="background:var(--bg-card);border-color:var(--table-border)">
                        <td style="color:var(--text-sub);border-color:var(--table-border);background:var(--bg-card);font-size:13.5px;">{{ $loop->iteration }}</td>
                        <td style="color:var(--text-primary);border-color:var(--table-border);background:var(--bg-card);font-size:13.5px;font-weight:500;">{{ $attendance->event->event_name }}</td>
                        <td style="color:var(--text-sub);border-color:var(--table-border);background:var(--bg-card);font-size:13.5px;">{{ $attendance->event->event_date->format('d M Y') }}</td>
                        <td style="color:var(--text-sub);border-color:var(--table-border);background:var(--bg-card);font-size:13.5px;">{{ $attendance->event->venue }}</td>
                        <td style="border-color:var(--table-border);background:var(--bg-card);">
                            @if($attendance->attendance_status === 'present')
                                <span class="badge bg-success">Present</span>
                            @else
                                <span class="badge bg-danger">Absent</span>
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