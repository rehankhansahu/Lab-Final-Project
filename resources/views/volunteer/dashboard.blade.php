@extends('layouts.volunteer')

@section('title', 'My Dashboard')

@section('content')
<h5 class="mb-1">Welcome, {{ $volunteer->name }}!</h5>
<p style="color:var(--text-muted)" class="mb-4">Here's your volunteer activity overview.</p>

<div class="row g-3 mb-4">
    <div class="col-6 col-md-3">
        <div class="card border-0 text-center p-3">
            <div style="font-size:28px;font-weight:800;color:var(--accent)">{{ $totalApplications }}</div>
            <div style="font-size:12px;color:var(--text-muted);margin-top:4px;">Total Applications</div>
        </div>
    </div>
    <div class="col-6 col-md-3">
        <div class="card border-0 text-center p-3">
            <div style="font-size:28px;font-weight:800;color:#22c55e">{{ $approvedApplications }}</div>
            <div style="font-size:12px;color:var(--text-muted);margin-top:4px;">Approved</div>
        </div>
    </div>
    <div class="col-6 col-md-3">
        <div class="card border-0 text-center p-3">
            <div style="font-size:28px;font-weight:800;color:#eab308">{{ $pendingApplications }}</div>
            <div style="font-size:12px;color:var(--text-muted);margin-top:4px;">Pending</div>
        </div>
    </div>
    <div class="col-6 col-md-3">
        <div class="card border-0 text-center p-3">
            <div style="font-size:28px;font-weight:800;color:#0891b2">{{ $totalCertificates }}</div>
            <div style="font-size:12px;color:var(--text-muted);margin-top:4px;">Certificates</div>
        </div>
    </div>
</div>

<div class="row g-3">
    <div class="col-md-6">
        <div class="card border-0">
            <div class="card-body">
                <h6 style="color:var(--text-primary);font-weight:600;margin-bottom:14px;">My Info</h6>
                <div style="border:1px solid var(--table-border);border-radius:8px;overflow:hidden;">
                    <div style="display:flex;padding:10px 14px;background-color:var(--bg-card);border-bottom:1px solid var(--table-border);">
                        <span style="width:38%;font-size:13px;color:var(--text-muted);">Name</span>
                        <span style="font-size:13px;color:var(--text-primary);">{{ $volunteer->name }}</span>
                    </div>
                    <div style="display:flex;padding:10px 14px;background-color:var(--bg-card);border-bottom:1px solid var(--table-border);">
                        <span style="width:38%;font-size:13px;color:var(--text-muted);">Email</span>
                        <span style="font-size:13px;color:var(--text-primary);">{{ $volunteer->email }}</span>
                    </div>
                    <div style="display:flex;padding:10px 14px;background-color:var(--bg-card);border-bottom:1px solid var(--table-border);">
                        <span style="width:38%;font-size:13px;color:var(--text-muted);">Phone</span>
                        <span style="font-size:13px;color:var(--text-primary);">{{ $volunteer->phone }}</span>
                    </div>
                    <div style="display:flex;padding:10px 14px;background-color:var(--bg-card);">
                        <span style="width:38%;font-size:13px;color:var(--text-muted);">Department</span>
                        <span style="font-size:13px;color:var(--text-primary);">{{ $volunteer->department }}</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="card border-0">
            <div class="card-body">
                <h6 style="color:var(--text-primary);font-weight:600;margin-bottom:14px;">Quick Links</h6>
                <div class="d-grid gap-2">
                    <a href="{{ route('volunteer.events') }}" class="btn btn-outline-primary btn-sm text-start">
                        <i class="bi bi-calendar-event me-2"></i>Browse Available Events
                    </a>
                    <a href="{{ route('volunteer.applications') }}" class="btn btn-outline-secondary btn-sm text-start">
                        <i class="bi bi-clipboard me-2"></i>View My Applications
                    </a>
                    <a href="{{ route('volunteer.certificates') }}" class="btn btn-outline-success btn-sm text-start">
                        <i class="bi bi-award me-2"></i>My Certificates
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection