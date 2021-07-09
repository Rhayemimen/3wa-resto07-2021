@extends('layouts.app')

@section('content')
<fieldset>
    <legend>New Booking</legend>
    <form action="{{ route('booking.update',$booking->id) }}" method="POST">
        @csrf
        @method('PATCH')
        <div class="row">
            <div class="col">
                <div class="form-group">
                  <label for="date">Booking Date</label>
                  <input type="date" name="booking_date" id="booking_date" value="{{ $booking->booking_date->format('Y-m-d') }}" class="form-control @error('date') {{'is-invalid'}} @enderror" placeholder="" >
                  @error('date')<div class="text-danger">{{ $message }}</div>@enderror</div>
            </div>
            <div class="col">
                <div class="form-group">
                  <label for="time">Booking time</label>
                  <input type="time" name="booking_time" id="booking_time" value="{{ $booking->booking_time }}" class="form-control @error('time') {{'is-invalid'}} @enderror" placeholder="" >
                  @error('time')<div class="text-danger">{{ $message }}</div>@enderror</div>
            </div>
            <div class="col">
                <div class="form-group">
                  <label for="nbr">Number of seats</label>
                  <input type="number" name="seats_nbr" min="1" max="20" id="seats_nbr" value="{{ $booking->seats_nbr }}" class="form-control @error('nbr') {{'is-invalid'}} @enderror" placeholder="" >
                  @error('nbr')<div class="text-danger">{{ $message }}</div>@enderror</div>
            </div>
        </div>
        <div class="row">
            <button type="submit" class="btn btn-outline-primary btn-block">Book now !</button>
        </div>
    </form>
</fieldset>
@endsection