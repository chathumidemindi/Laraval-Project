@extends('layouts.app')

@section('content')
    <h1>Manage Users</h1>

    <table>
        <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Role</th>
            <th>Actions</th>
        </tr>
       <!-- Display users -->
@foreach ($users as $user)
    <div>
        <h4>{{ $user->name }} ({{ $user->email }})</h4>

        <!-- Form for assigning role to the user -->
        <form action="{{ route('admin.assignRole', $user->id) }}" method="POST">
            @csrf
            <label for="role">Assign Role</label>
            <select name="role" id="role">
                <option value="1" {{ $user->roles->contains(1) ? 'selected' : '' }}>Admin</option>
                <option value="2" {{ $user->roles->contains(2) ? 'selected' : '' }}>User</option>
            </select>
            <button type="submit">Assign Role</button>
        </form>
    </div>
@endforeach

    </table>
@endsection
