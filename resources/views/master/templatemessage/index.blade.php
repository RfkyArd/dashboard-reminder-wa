@extends('layouts.user')

@section('content')
<div class="container">
    <h1 class="mb-4">Template Messages</h1>

    <div class="mb-3">
        <a href="{{ route('template.create') }}" class="btn btn-primary">
            Add New Template Message
        </a>
    </div>

    <div class="card">
        <div class="card-header">
            <h5 class="mb-0">List of Template Messages</h5>
        </div>
        <div class="card-body">
            @if($templateMessages->isEmpty())
                <p class="text-muted">No template messages available.</p>
            @else
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Title</th>
                            <th>Body</th>
                            <th>Created At</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($templateMessages as $index => $template)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $template->title }}</td>
                                <td>{{ Str::limit($template->body, 50) }}</td>
                                <td>{{ $template->created_at->format('d M Y') }}</td>
                                <td>
                                    <a href="{{ route('template.edit', $template->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                    <form action="{{ route('template.destroy', $template->id) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @endif
        </div>
    </div>
</div>
@endsection
