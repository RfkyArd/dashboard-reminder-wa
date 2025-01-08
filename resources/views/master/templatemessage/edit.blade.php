@extends('layouts.user')

@section('content')
<div class="container">
    <h1 class="mb-4">Edit Template Message</h1>

    <div class="card">
        <div class="card-header">
            <h5 class="mb-0">Edit Template Message Details</h5>
        </div>
        <div class="card-body">
            <form action="{{ route('template.update', $templateMessage->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label for="title" class="form-label">Title</label>
                    <input type="text" name="title" class="form-control" id="title" value="{{ old('title', $templateMessage->title) }}" required>
                    @error('title')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="body" class="form-label">Body</label>
                    <textarea name="body" class="form-control" id="body" rows="5" required>{{ old('body', $templateMessage->body) }}</textarea>
                    @error('body')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <button type="submit" class="btn btn-primary">Update</button>
                <a href="{{ route('template.index') }}" class="btn btn-secondary">Cancel</a>
            </form>
        </div>
    </div>
</div>
@endsection
