@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Book Bus: {{ $bus->name }}</h1>
    <form action="{{ route('booking.store', ['bus_id' => $bus->id]) }}" method="POST">
        @csrf
        <input type="hidden" name="bus_id" value="{{ $bus->id }}">

        <div class="form-group">
            <label for="route_id">Select Route:</label>
            <select name="route_id" id="route_id" class="form-control" required>
                @foreach($routes as $route)
                    <option value="{{ $route->id }}">
                        {{ $route->origin }} to {{ $route->destination }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="seats_booked">Number of Seats:</label>
            <input type="number" name="seats_booked" id="seats_booked" class="form-control" min="1" max="{{ $bus->seating_capacity }}" required>
        </div>

        <button type="submit" class="btn btn-success">Book Now</button>
    </form>
</div>
@endsection
