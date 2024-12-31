@extends('layouts.app')

@section('title', 'Buses')

@section('content')
<div class="container">
    <!-- Display success message if available -->
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <h1 class="mb-4">Available Buses</h1>

    <table class="table table-striped">
        <thead class="thead-dark">
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Seating Capacity</th>
                <th>Type</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @forelse($buses as $bus)
                <tr>
                    <td>{{ $bus->id }}</td>
                    <td>{{ $bus->name }}</td>
                    <td>{{ $bus->seating_capacity }}</td>
                    <td>{{ $bus->type }}</td>
                    <td>{{ $bus->status }}</td>
                    <td>
                        @if($bus->status === 'Available' && $bus->seating_capacity > 0)
                            <a href="{{ route('booking.create', ['bus_id' => $bus->id]) }}" class="btn btn-primary btn-sm">Book Now</a>
                        @else
                            <button class="btn btn-secondary btn-sm" disabled>Unavailable</button>
                        @endif
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="6" class="text-center">No buses available at the moment.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
