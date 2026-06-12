@extends('layouts.admin')

@section('title', 'Dashboard')

@section('content')
<h5 class="mb-4">Dashboard Overview</h5>

<div class="row g-3 mb-4">
    <div class="col-md-3">
        <div class="card border-0 shadow-sm text-center p-3">
            <div class="text-primary fs-2 fw-bold">{{ $totalVolunteers }}</div>
            <div class="text-muted small mt-1">Total Volunteers</div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card border-0 shadow-sm text-center p-3">
            <div class="text-success fs-2 fw-bold">{{ $totalEvents }}</div>
            <div class="text-muted small mt-1">Total Events</div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card border-0 shadow-sm text-center p-3">
            <div class="text-warning fs-2 fw-bold">{{ $pendingApplications }}</div>
            <div class="text-muted small mt-1">Pending Applications</div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card border-0 shadow-sm text-center p-3">
            <div class="text-info fs-2 fw-bold">{{ $totalCertificates }}</div>
            <div class="text-muted small mt-1">Certificates Issued</div>
        </div>
    </div>
</div>

<div class="row g-3">
    <div class="col-md-4">
        <div class="card border-0 shadow-sm">
            <div class="card-body">
                <h6 class="card-title">Quick Actions</h6>
                <div class="d-grid gap-2 mt-3">
                    <a href="{{ route('admin.events.create') }}" class="btn btn-outline-primary btn-sm">
                        <i class="bi bi-plus-circle me-1"></i>Create New Event
                    </a>
                    <a href="{{ route('admin.applications.index') }}" class="btn btn-outline-warning btn-sm">
                        <i class="bi bi-clipboard-check me-1"></i>Review Applications
                    </a>
                    <a href="{{ route('admin.certificates.index') }}" class="btn btn-outline-info btn-sm">
                        <i class="bi bi-award me-1"></i>Generate Certificates
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection