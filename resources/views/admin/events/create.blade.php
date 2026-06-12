@extends('layouts.admin')

@section('title', 'Create Event')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h5 class="mb-0">Create New Event</h5>
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

        <form action="{{ route('admin.events.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label class="form-label fw-semibold">Event Name <span class="text-danger">*</span></label>
                <input type="text" id="event_name" name="event_name" class="form-control @error('event_name') is-invalid @enderror"
                       value="{{ old('event_name') }}" required placeholder="e.g. Clean Green Plantation Drive">
                @error('event_name') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>

            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="form-label fw-semibold">Event Date <span class="text-danger">*</span></label>
                    <input type="date" name="event_date" class="form-control @error('event_date') is-invalid @enderror"
                           value="{{ old('event_date') }}" required>
                    @error('event_date') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label fw-semibold">Venue <span class="text-danger">*</span></label>
                    <input type="text" name="venue" class="form-control @error('venue') is-invalid @enderror"
                           value="{{ old('venue') }}" required placeholder="e.g. Main Auditorium / City Park">
                    @error('venue') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>
            </div>

            <div class="mb-3">
                <div class="d-flex justify-content-between align-items-center mb-2">
                    <label class="form-label fw-semibold mb-0">Description <span class="text-danger">*</span></label>
                    
                    <button type="button" id="generate-ai-btn" class="btn btn-sm btn-outline-primary py-1 px-2" style="font-weight: 500; border-radius: 6px; font-size: 0.85rem;">
                        ✨ Generate with Gemini AI
                    </button>
                </div>
                <textarea id="description" name="description" class="form-control @error('description') is-invalid @enderror"
                          rows="8" required placeholder="Enter event details or write title above and click the AI button... ">{{ old('description') }}</textarea>
                @error('description') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>

            <div class="mb-4">
                <label class="form-label fw-semibold">Required Volunteers <span class="text-danger">*</span></label>
                <input type="number" name="required_volunteers" class="form-control @error('required_volunteers') is-invalid @enderror"
                       value="{{ old('required_volunteers') }}" min="1" required>
                @error('required_volunteers') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>

            <button type="submit" class="btn btn-primary">
                <i class="bi bi-check-circle me-1"></i>Create Event
            </button>
        </form>
    </div>
</div>

<script>
document.getElementById('generate-ai-btn').addEventListener('click', function() {
    const nameInput = document.getElementById('event_name').value;
    const descTextarea = document.getElementById('description');
    const btn = this;

    // Check if Event Name is empty
    if (!nameInput.trim()) {
        alert('Bhai, pehle Event Name likho taake AI uske mutabiq description generate kare!');
        return;
    }

    // Button Loading State
    const originalText = btn.innerHTML;
    btn.innerHTML = '⏳ Writing Description...';
    btn.disabled = true;

    // AJAX Request to Laravel Backend
    fetch("{{ route('admin.events.generate-description') }}", {
        method: "POST",
        headers: {
            "Content-Type": "application/json",
            "X-CSRF-TOKEN": "{{ csrf_token() }}"
        },
        body: JSON.stringify({ event_name: nameInput })
    })
    .then(response => response.json())
    .then(data => {
        if (data.description) {
            descTextarea.value = data.description; // Injects AI description into textarea
        } else if (data.error) {
            alert('Error: ' + data.error);
        } else {
            alert('Kuch ajeeb masla hua hai response mein.');
        }
    })
    .catch(error => {
        console.error('Error:', error);
        alert('Server se connect nahi ho paye. Route ya network check karein.');
    })
    .finally(() => {
        // Reset Button State
        btn.innerHTML = originalText;
        btn.disabled = false;
    });
});
</script>
@endsection