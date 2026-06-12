@extends('layouts.admin')

@section('title', 'Volunteer Details')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h5 class="mb-0">Volunteer: {{ $volunteer->name }}</h5>
    <a href="{{ route('admin.volunteers.index') }}" class="btn btn-secondary btn-sm">
        <i class="bi bi-arrow-left me-1"></i>Back
    </a>
</div>

<div class="row g-3">
    <div class="col-md-4">
        <div class="card border-0 shadow-sm">
            <div class="card-body">
                <h6 class="card-title mb-3">Personal Info</h6>
                <p><strong>Name:</strong> {{ $volunteer->name }}</p>
                <p><strong>Email:</strong> {{ $volunteer->email }}</p>
                <p><strong>Phone:</strong> {{ $volunteer->phone }}</p>
                <p><strong>Department:</strong> {{ $volunteer->department }}</p>
                <p><strong>Registered:</strong> {{ $volunteer->created_at->format('d M Y') }}</p>
            </div>
        </div>
    </div>

    <div class="col-md-8">
        <div class="card border-0 shadow-sm mb-3">
            <div class="card-body">
                <h6 class="card-title">Applications ({{ $volunteer->applications->count() }})</h6>
                @forelse($volunteer->applications as $app)
                    <div class="d-flex justify-content-between align-items-center border-bottom py-2">
                        <span>{{ $app->event->event_name }}</span>
                        @if($app->status === 'approved')
                            <span class="badge bg-success">Approved</span>
                        @elseif($app->status === 'rejected')
                            <span class="badge bg-danger">Rejected</span>
                        @else
                            <span class="badge bg-warning text-dark">Pending</span>
                        @endif
                    </div>
                @empty
                    <p class="text-muted small">No applications.</p>
                @endforelse
            </div>
        </div>

        <div class="card border-0 shadow-sm">
            <div class="card-body">
                <h6 class="card-title">Assigned Roles ({{ $volunteer->roleAssignments->count() }})</h6>
                @forelse($volunteer->roleAssignments as $role)
                    <div class="d-flex justify-content-between border-bottom py-2">
                        <span>{{ $role->event->event_name }}</span>
                        <span class="badge bg-primary">{{ $role->role_name }}</span>
                    </div>
                @empty
                    <p class="text-muted small">No roles assigned.</p>
                @endforelse
            </div>
        </div>
    </div>
</div>
@endsection