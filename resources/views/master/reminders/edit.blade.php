@extends('layouts.user')

@section('content')
<div class="container">
    <h1 class="mb-4">Edit Reminder</h1>

    <form action="{{ route('reminders.update', $reminder->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="card">
            <div class="card-header">
                <h5 class="mb-0">Reminder Details</h5>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="mb-3">
                        <input type="checkbox" id="use_template" name="use_template" {{ $reminder->template_message_id ? 'checked' : '' }} onclick="toggleTemplateSelection()">
                        <label for="use_template">Use a Template Message</label>
                    </div>

                    <div class="mb-3 col-md-12" id="title_field" style="{{ $reminder->template_message_id ? 'display: none;' : 'display: block;' }}">
                        <label for="title" class="form-label">Title</label>
                        <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" value="{{ old('title', $reminder->title) }}">
                        @error('title')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3" id="message_field" style="{{ $reminder->template_message_id ? 'display: none;' : 'display: block;' }}">
                        <label for="message" class="form-label">Message</label>
                        <textarea class="form-control @error('message') is-invalid @enderror" id="message" name="message" rows="4" >{{ old('message', $reminder->message) }}</textarea>
                        @error('message')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    
                    <div class="mb-3" id="template_selection" style="{{ $reminder->template_message_id ? 'display: block;' : 'display: none;' }}">
                        <label for="template_message_id" class="form-label">Select Template</label>
                        <select class="form-control @error('template_message_id') is-invalid @enderror" id="template_message_id" name="template_message_id">
                            <option value="">-- Select Template --</option>
                            @foreach($templates as $template)
                                <option value="{{ $template->id }}" {{ old('template_message_id', $reminder->template_message_id) == $template->id ? 'selected' : '' }}>{{ $template->title }}</option>
                            @endforeach
                        </select>
                        @error('template_message_id')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3 col-md-4">
                        <label for="start_date" class="form-label">Start Date</label>
                        <input type="datetime-local" class="form-control @error('start_date') is-invalid @enderror" id="start_date" name="start_date" value="{{ old('start_date', $reminder->start_date->format('Y-m-d\TH:i')) }}" required>
                        @error('start_date')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3 col-md-4">
                        <label for="end_date" class="form-label">End Date</label>
                        <input type="datetime-local" class="form-control @error('end_date') is-invalid @enderror" id="end_date" name="end_date" value="{{ old('end_date', $reminder->end_date->format('Y-m-d\TH:i')) }}" required>
                        @error('end_date')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3 col-md-4">
                        <label for="counter" class="form-label">Counter</label>
                        <input type="number" class="form-control @error('counter') is-invalid @enderror" id="counter" name="counter" value="{{ old('counter', $reminder->counter) }}" required>
                        @error('counter')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Submit Button -->
                    <button type="submit" class="btn btn-success">Update Reminder</button>
                </div>
            </div>
        </div>
    </form>
</div>

<script>
    // Fungsi untuk menampilkan dropdown template jika checkbox dicentang
    function toggleTemplateSelection() {
        var checkbox = document.getElementById('use_template');
        var templateSelection = document.getElementById('template_selection');
        var titleField = document.getElementById('title_field');
        var messageField = document.getElementById('message_field');

        if (checkbox.checked) {
            templateSelection.style.display = 'block';
            titleField.style.display = 'none';
            messageField.style.display = 'none';
        } else {
            templateSelection.style.display = 'none';
            titleField.style.display = 'block';
            messageField.style.display = 'block';
        }
    }
</script>
@endsection
