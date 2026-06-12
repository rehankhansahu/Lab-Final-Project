@extends('layouts.admin')

@section('title', 'All Certificates')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h5 class="mb-0">All Issued Certificates</h5>
    <a href="{{ route('admin.certificates.index') }}" class="btn btn-secondary btn-sm">
        <i class="bi bi-arrow-left me-1"></i>Back
    </a>
</div>

@if($certificates->isEmpty())
    <div class="alert alert-info">No certificates have been issued yet.</div>
@else
    <div class="card border-0 shadow-sm">
        <div class="table-responsive">
            <table class="table table-hover mb-0">
                <thead class="table-dark">
                    <tr>
                        <th>#</th>
                        <th>Volunteer</th>
                        <th>Event</th>
                        <th>Issue Date</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($certificates as $cert)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $cert->volunteer->name }}</td>
                        <td>{{ $cert->event->event_name }}</td>
                        <td>{{ $cert->issue_date->format('d M Y') }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endif
@endsection