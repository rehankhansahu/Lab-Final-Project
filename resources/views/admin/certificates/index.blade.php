@extends('layouts.admin')

@section('title', 'Certificate Generation')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h5 class="mb-0">Generate Certificates</h5>
    <a href="{{ route('admin.certificates.all') }}" class="btn btn-info btn-sm">
        <i class="bi bi-list-ul me-1"></i>View All Certificates
    </a>
</div>

<p class="text-muted small mb-4">
    Certificates are automatically generated for all volunteers marked <strong>Present</strong> in an event.
</p>

@if($events->isEmpty())
    <div class="alert alert-info">No events found.</div>
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
                            <form action="{{ route('admin.certificates.generate', $event) }}" method="POST" class="d-inline"
                                  onsubmit="return confirm('Generate certificates for all present volunteers?')">
                                @csrf
                                <button type="submit" class="btn btn-success btn-sm">
                                    <i class="bi bi-award me-1"></i>Generate Certificates
                                </button>
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