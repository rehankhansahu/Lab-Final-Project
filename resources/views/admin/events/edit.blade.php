@extends('layouts.admin')

@section('title', 'Edit Event')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h5 class="mb-0">Edit Event</h5>
    <a href="{{ route('admin.events.index') }}" class="btn btn-secondary btn-sm">
        <i class="bi bi-arrow-left me-1"></i>Back
    </a>
</div>

<div class="card border-0 shadow-sm">
    <div class="card-body p-4">
        @if($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('admin.events.update', $event) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label class="form-label fw-semibold">Event Name <span class="text-danger">*</span></label>
                <input type="text" name="event_name" class="form-control @error('event_name') is-invalid @enderror"
                       value="{{ old('event_name', $event->event_name) }}" required>
                @error('event_name') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>

            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="form-label fw-semibold">Event Date <span class="text-danger">*</span></label>
                    <input type="date" name="event_date" class="form-control @error('event_date') is-invalid @enderror"
                           value="{{ old('event_date', $event->event_date->format('Y-m-d')) }}" required>
                    @error('event_date') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label fw-semibold">Venue <span class="text-danger">*</span></label>
                    <input type="text" name="venue" class="form-control @error('venue') is-invalid @enderror"
                           value="{{ old('venue', $event->venue) }}" required>
                    @error('venue') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>
            </div>

            <div class="mb-3">
                <label class="form-label fw-semibold">Description <span class="text-danger">*</span></label>
                <textarea name="description" class="form-control @error('description') is-invalid @enderror"
                          rows="4" required>{{ old('description', $event->description) }}</textarea>
                @error('description') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>

            <div class="mb-4">
                <label class="form-label fw-semibold">Required Volunteers <span class="text-danger">*</span></label>
                <input type="number" name="required_volunteers" class="form-control @error('required_volunteers') is-invalid @enderror"
                       value="{{ old('required_volunteers', $event->required_volunteers) }}" min="1" required>
                @error('required_volunteers') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>

            <button type="submit" class="btn btn-primary">
                <i class="bi bi-check-circle me-1"></i>Update Event
            </button>
        </form>
    </div>
</div>
@endsection