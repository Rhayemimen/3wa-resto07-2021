@extends('layouts.app')

@section('content')
<a href="" class="btn btn-info">Add Booking</a>

<div class="row">
    <div class="col">
        <h2>Upcoming bookings</h2>
    <ul class="list-group">
        @foreach ($comingBookings as $booking)
        <li class="list-group-item list-group-item-action">
            Your booking will be for the <strong>{{ $booking->booking_date->format('l, F jS Y') }}</strong>
            at <strong>{{date('H:i',strtotime($booking->booking_time))}}</strong> for <strong>{{ $booking->seats_nbr }}</strong> persons.
        </li>
        @endforeach
    </ul>
    </div>
    <div class="col">
        <h2>Old bookings</h2>
    <ul class="list-group">
        @foreach ($passedBookings as $booking)
        <li class="list-group-item list-group-item-action">
            Your booking will be for the <strong>{{ $booking->booking_date->format('l, F jS Y') }}</strong>
            at <strong>{{date('H:i',strtotime($booking->booking_time))}}</strong> for <strong>{{ $booking->seats_nbr }}</strong> persons.
        </li>
        @endforeach
    </ul>
    </div>
</div>

@endsection