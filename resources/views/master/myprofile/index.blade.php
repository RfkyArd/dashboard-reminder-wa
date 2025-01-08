@extends('layouts.user')

@section('content')
<div class="container">
    <h1 class="mb-4">My Profile</h1>

    <div class="card">
        <div class="card-header">
            <h5 class="mb-0">Profile Details</h5>
        </div>
        <div class="card-body">
            <table class="table table-bordered">
                <tbody>
                    <tr>
                        <th>Name</th>
                        <td>{{ auth()->user()->name }}</td>
                    </tr>
                    <tr>
                        <th>Number</th>
                        <td>{{ auth()->user()->number }}</td>
                    </tr>
                    <tr>
                        <th>Email</th>
                        <td>{{ auth()->user()->email }}</td>
                    </tr>
                    <tr>
                        <th>Role</th>
                        <td>{{ ucfirst(auth()->user()->role) }}</td>
                    </tr>
                    <tr>
                        <th>Member Since</th>
                        <td>{{ auth()->user()->created_at->format('d M Y') }}</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <div class="mt-4">
        <a href="{{ route('users.edit', $user->id) }}" class="btn btn-primary">Edit User</a>
        <a href="{{ route('logout') }}" class="btn btn-danger" 
            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
            Logout
        </a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
        </form>
    </div>
</div>
@endsection
