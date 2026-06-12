@extends('layouts.admin')

@section('title', 'Mark Attendance')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <h5 class="mb-0">Mark Attendance</h5>
        <small class="text-muted">{{ $event->event_name }} — {{ $event->event_date->format('d M Y') }}</small>
    </div>
    <a href="{{ route('admin.attendance.index') }}" class="btn btn-secondary btn-sm">
        <i class="bi bi-arrow-left me-1"></i>Back
    </a>
</div>

@if($approvedApplications->isEmpty())
    <div class="alert alert-warning">No approved volunteers for this event yet.</div>
@else
    <div class="card border-0 shadow-sm">
        <div class="card-body p-4">
            <form action="{{ route('admin.attendance.save', $event) }}" method="POST">
                @csrf

                <div class="table-responsive">
                    <table class="table mb-4">
                        <thead class="table-light">
                            <tr>
                                <th>Volunteer</th>
                                <th>Department</th>
                                <th>Attendance <span class="text-danger">*</span></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($approvedApplications as $application)
                            <tr>
                                <td>{{ $application->volunteer->name }}</td>
                                <td>{{ $application->volunteer->department }}</td>
                                <td>
                                    <select name="attendance[{{ $application->volunteer_id }}]"
                                            class="form-select form-select-sm" required>
                                        <option value="present"
                                            {{ isset($existingAttendance[$application->volunteer_id]) && $existingAttendance[$application->volunteer_id] === 'present' ? 'selected' : '' }}>
                                            Present
                                        </option>
                                        <option value="absent"
                                            {{ isset($existingAttendance[$application->volunteer_id]) && $existingAttendance[$application->volunteer_id] === 'absent' ? 'selected' : '' }}>
                                            Absent
                                        </option>
                                    </select>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <button type="submit" class="btn btn-primary">
                    <i class="bi bi-save me-1"></i>Save Attendance
                </button>
            </form>
        </div>
    </div>
@endif
@endsection