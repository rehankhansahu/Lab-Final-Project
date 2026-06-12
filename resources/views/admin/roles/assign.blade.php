@extends('layouts.admin')

@section('title', 'Assign Roles')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <h5 class="mb-0">Assign Roles</h5>
        <small class="text-muted">{{ $event->event_name }} — {{ $event->event_date->format('d M Y') }}</small>
    </div>
    <a href="{{ route('admin.roles.index') }}" class="btn btn-secondary btn-sm">
        <i class="bi bi-arrow-left me-1"></i>Back
    </a>
</div>

@if($approvedApplications->isEmpty())
    <div class="alert alert-warning">No approved volunteers for this event yet. Approve applications first.</div>
@else
    <div class="card border-0 shadow-sm">
        <div class="card-body p-4">
            <form action="{{ route('admin.roles.assign', $event) }}" method="POST">
                @csrf

                <div class="table-responsive">
                    <table class="table mb-4">
                        <thead class="table-light">
                            <tr>
                                <th>Volunteer</th>
                                <th>Department</th>
                                <th>Assign Role <span class="text-danger">*</span></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($approvedApplications as $application)
                            <tr>
                                <td>{{ $application->volunteer->name }}</td>
                                <td>{{ $application->volunteer->department }}</td>
                                <td>
                                    <select name="roles[{{ $application->volunteer_id }}]"
                                            class="form-select form-select-sm @error('roles.'.$application->volunteer_id) is-invalid @enderror"
                                            required>
                                        <option value="">-- Select Role --</option>
                                        @foreach($roles as $role)
                                            <option value="{{ $role }}"
                                                {{ isset($existingAssignments[$application->volunteer_id]) && $existingAssignments[$application->volunteer_id] === $role ? 'selected' : '' }}>
                                                {{ $role }}
                                            </option>
                                        @endforeach
                                    </select>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <button type="submit" class="btn btn-primary">
                    <i class="bi bi-check-circle me-1"></i>Save Roles
                </button>
            </form>
        </div>
    </div>
@endif
@endsection