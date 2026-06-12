@extends('layouts.admin')

@section('title', 'Event Volunteers')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <h5 class="mb-0">Registered Volunteers</h5>
        <small class="text-muted">{{ $event->event_name }}</small>
    </div>
    <a href="{{ route('admin.events.index') }}" class="btn btn-secondary btn-sm">
        <i class="bi bi-arrow-left me-1"></i>Back
    </a>
</div>

<div class="card border-0 shadow-sm">
    <div class="table-responsive">
        <table class="table table-hover mb-0">
            <thead class="table-dark">
                <tr>
                    <th>#</th>
                    <th>Volunteer Name</th>
                    <th>Email</th>
                    <th>Department</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                @forelse($applications as $application)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $application->volunteer->name }}</td>
                    <td>{{ $application->volunteer->email }}</td>
                    <td>{{ $application->volunteer->department }}</td>
                    <td>
                        @if($application->status === 'approved')
                            <span class="badge bg-success">Approved</span>
                        @elseif($application->status === 'rejected')
                            <span class="badge bg-danger">Rejected</span>
                        @else
                            <span class="badge bg-warning text-dark">Pending</span>
                        @endif
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="5" class="text-center text-muted py-4">No volunteers have applied for this event yet.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection