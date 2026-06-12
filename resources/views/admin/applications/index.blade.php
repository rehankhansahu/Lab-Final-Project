@extends('layouts.admin')

@section('title', 'Event Applications')

@section('content')
<h5 class="mb-4">All Event Applications</h5>

@if($applications->isEmpty())
    <div class="alert alert-info">No applications found.</div>
@else
    <div class="card border-0 shadow-sm">
        <div class="table-responsive">
            <table class="table table-hover mb-0">
                <thead class="table-dark">
                    <tr>
                        <th>#</th>
                        <th>Volunteer</th>
                        <th>Event</th>
                        <th>Applied On</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($applications as $application)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $application->volunteer->name }}</td>
                        <td>{{ $application->event->event_name }}</td>
                        <td>{{ $application->created_at->format('d M Y') }}</td>
                        <td>
                            @if($application->status === 'approved')
                                <span class="badge bg-success">Approved</span>
                            @elseif($application->status === 'rejected')
                                <span class="badge bg-danger">Rejected</span>
                            @else
                                <span class="badge bg-warning text-dark">Pending</span>
                            @endif
                        </td>
                        <td>
                            @if($application->status === 'pending')
                                <form action="{{ route('admin.applications.approve', $application) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('PATCH')
                                    <button type="submit" class="btn btn-success btn-sm">
                                        <i class="bi bi-check-lg"></i> Approve
                                    </button>
                                </form>
                                <form action="{{ route('admin.applications.reject', $application) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('PATCH')
                                    <button type="submit" class="btn btn-danger btn-sm">
                                        <i class="bi bi-x-lg"></i> Reject
                                    </button>
                                </form>
                            @else
                                <span class="text-muted small">No action</span>
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