@extends('layouts.app')

@section('content')
    <h2>liste of bookings</h2>
    <ul>
        @foreach($bookings as $booking)
            <li>{{ $booking -> user_id}}</li>
        @endforeach
    </ul>
@endsection