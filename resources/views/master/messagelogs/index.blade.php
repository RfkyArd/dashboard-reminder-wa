@extends('layouts.user')

@section('content')
<div class="container">
    <h1 class="mb-4">Message Logs</h1>

    <div class="card">
        <div class="card-header">
            <h5 class="mb-0">List of Message Logs</h5>
        </div>
        <div class="card-body">
            @if($messageLogs->isEmpty())
                <p class="text-muted">No message logs available.</p>
            @else
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Reminder</th>
                            <th>User</th>
                            <th>Status</th>
                            <th>Sent At</th>
                            <th>Response</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($messageLogs as $index => $log)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $log->reminder->title ?? 'N/A' }}</td>
                                <td>{{ $log->user->name ?? 'N/A' }}</td>
                                <td>{{ ucfirst($log->status) }}</td>
                                <td>{{ $log->sent_at ? $log->sent_at->format('d M Y H:i') : '-' }}</td>
                                <td>{{ $log->response ?? '-' }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @endif
        </div>
    </div>
</div>
@endsection
