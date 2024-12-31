@extends('layouts.app')

@section('title', 'Book a Bus')

@section('content')
    <h1>Book Your Bus</h1>

    <div class="booking-details">
        <h2>Bus: {{ $bus->name }}</h2>
        <p><strong>Route:</strong> {{ $bus->route->origin }} to {{ $bus->route->destination }}</p>
        <p><strong>Departure Time:</strong> {{ $bus->route->departure_time }}</p>
        <p><strong>Arrival Time:</strong> {{ $bus->route->arrival_time }}</p>
        <p><strong>Seats Available:</strong> {{ $bus->seating_capacity }}</p>
        <p><strong>Price per Seat:</strong> Rs. {{ $bus->route->price }}</p>
    </div>

    <form action="{{ route('bookings.store') }}" method="POST">
        @csrf
        <input type="hidden" name="bus_id" value="{{ $bus->id }}">
        <input type="hidden" name="route_id" value="{{ $bus->route->id }}">
        <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">

        <div>
            <label for="seats_booked">Number of Seats:</label>
            <input type="number" name="seats_booked" id="seats_booked" min="1" max="{{ $bus->seating_capacity }}" required>
        </div>

        <div>
            <p><strong>Total Price: </strong><span id="total-price">Rs. 0</span></p>
        </div>

        <button type="submit" class="btn btn-primary">Book Now</button>
    </form>

    <a href="{{ route('buses.index') }}" class="btn btn-secondary">Cancel</a>

    <script>
        const pricePerSeat = {{ $bus->route->price }};
        const seatsInput = document.getElementById('seats_booked');
        const totalPriceElement = document.getElementById('total-price');

        seatsInput.addEventListener('input', function () {
            const totalPrice = pricePerSeat * parseInt(seatsInput.value || 0);
            totalPriceElement.textContent = `Rs. ${totalPrice}`;
        });
    </script>
@endsection
