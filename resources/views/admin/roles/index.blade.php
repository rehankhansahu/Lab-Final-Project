@extends('layouts.admin')

@section('title', 'Role Assignment')

@section('content')
<h5 class="mb-4">Role Assignment — Select an Event</h5>

@if($events->isEmpty())
    <div class="alert alert-info">No events available.</div>
@else
    <div class="card border-0 shadow-sm">
        <div class="table-responsive">
            <table class="table table-hover mb-0">
                <thead class="table-dark">
                    <tr>
                        <th>#</th>
                        <th>Event Name</th>
                        <th>Event Date</th>
                        <th>Venue</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($events as $event)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $event->event_name }}</td>
                        <td>{{ $event->event_date->format('d M Y') }}</td>
                        <td>{{ $event->venue }}</td>
                        <td>
                            <a href="{{ route('admin.roles.assign', $event) }}" class="btn btn-primary btn-sm">
                                <i class="bi bi-tag me-1"></i>Assign Roles
                            </a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endif
@endsection