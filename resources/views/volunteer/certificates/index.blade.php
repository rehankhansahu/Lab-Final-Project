@extends('layouts.volunteer')

@section('title', 'My Certificates')

@section('content')
<h5 class="mb-4">My Certificates</h5>

@if($certificates->isEmpty())
    <div class="alert alert-info">
        No certificates available yet. Certificates are issued to volunteers who were marked <strong>Present</strong> at an event.
    </div>
@else
    <div class="row row-cols-1 row-cols-md-2 g-4">
        @foreach($certificates as $cert)
        <div class="col">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-body d-flex align-items-start gap-3">
                    <div class="text-warning fs-1">
                        <i class="bi bi-award-fill"></i>
                    </div>
                    <div>
                        <h6 class="fw-bold mb-1">{{ $cert->event->event_name }}</h6>
                        <p class="text-muted small mb-1">
                            <i class="bi bi-calendar me-1"></i>Event Date: {{ $cert->event->event_date->format('d M Y') }}
                        </p>
                        <p class="text-muted small mb-2">
                            <i class="bi bi-patch-check me-1"></i>Issued: {{ $cert->issue_date->format('d M Y') }}
                        </p>
                        <a href="{{ route('volunteer.certificates.download', $cert) }}" class="btn btn-success btn-sm">
                            <i class="bi bi-download me-1"></i>Download PDF
                        </a>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
@endif
@endsection