{{-- resources/views/buses/show.blade.php --}}

@extends('layouts.app')

@section('title', 'Bus Details')

@section('content')
    <h1>Bus Details</h1>

    <div class="bus-details">
        <h2>{{ $bus->name }}</h2>

        <!-- Display Route if it exists -->
        <p><strong>Route:</strong> 
            {{ $bus->route ? $bus->route->name : 'No route assigned' }}
        </p>

        <!-- Display Seating Capacity -->
        <p><strong>Seating Capacity:</strong> {{ $bus->seating_capacity }}</p>

        <p><strong>type:</strong> {{ $bus->type }}</p>

        <!-- Display Status -->
        <p><strong>Status:</strong> {{ $bus->status }}</p>

        <!-- Display Created At and Updated At -->
        <p><strong>Created At:</strong> {{ $bus->created_at }}</p>
        <p><strong>Updated At:</strong> {{ $bus->updated_at }}</p>

        <!-- If you have more details to display about the bus, you can add more fields here -->

        <a href="{{ route('buses.index') }}" class="btn btn-secondary">Back to Bus List</a>
    </div>
@endsection
