@extends('layouts.user')

@section('content')
<div class="container">
    <h1 class="mb-4">Reminders</h1>

    <div class="mb-3">
        <a href="{{ route('reminders.create') }}" class="btn btn-primary">
            Add New Reminder
        </a>
    </div>

    <div class="card">
        <div class="card-header">
            <h5 class="mb-0">List of Reminders</h5>
        </div>
        <div class="card-body">
            @if($reminders->isEmpty())
                <p class="text-muted">No reminders available.</p>
            @else
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Title</th>
                            <th>Message</th>
                            <th>Start Date</th>
                            <th>End Date</th>
                            <th>Counter</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($reminders as $index => $reminder)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $reminder->title ?? '-' }}</td>
                                <td>{{ $reminder->message ?? '-' }}</td>
                                <td>{{ $reminder->start_date->format('d M Y') }}</td>
                                <td>{{ $reminder->end_date->format('d M Y') }}</td>
                                <td>{{ $reminder->counter }}</td>
                                <td>{{ ucfirst($reminder->status) }}</td>
                                <td>
                                    <a href="{{ route('reminders.edit', $reminder->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                    <form action="{{ route('reminders.destroy', $reminder->id) }}" method="POST" class="d-inline">
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
