<!-- resources/views/bookings/index.blade.php -->
@extends('layouts.app')

@section('title', 'Bookings')

@section('content')
    <div class="container">
        <h1>Your Bookings</h1>

        @if ($bookings->isEmpty())
            <p>You have no bookings.</p>
        @else
            <ul class="list-group">
                @foreach ($bookings as $booking)
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        <span>Bus: {{ $booking->bus->name }} - {{ $booking->date }}</span>

                        <span>
                            <a href="{{ route('bookings.destroy', $booking->id) }}" 
                               onclick="event.preventDefault(); document.getElementById('delete-booking-form-{{ $booking->id }}').submit();" 
                               class="btn btn-danger btn-sm">
                               Cancel
                            </a>

                            <form id="delete-booking-form-{{ $booking->id }}" action="{{ route('bookings.destroy', $booking->id) }}" method="POST" style="display: none;">
                                @csrf
                                @method('DELETE')
                            </form>
                        </span>
                    </li>
                @endforeach
            </ul>
        @endif
    </div>
@endsection
