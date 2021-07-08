@extends('layouts.app')

@section('content')
<fieldset>
    <legend>New Booking</legend>
    <form action="{{ route('booking.store') }}" method="post">
        @csrf
        <div class="row">
            <div class="col">
                <div class="form-group">
                  <label for="date">Booking Date</label>
                  <input type="date" name="date" id="booking_date" value="{{ old('date') }}" class="form-control @error('date') {{'is-invalid'}} @enderror" placeholder="" >
                  @error('date')<div class="text-danger">{{ $message }}</div>@enderror</div>
            </div>
            <div class="col">
                <div class="form-group">
                  <label for="time">Booking time</label>
                  <input type="time" name="time" id="booking_time value="{{ old('time') }}" class="form-control @error('time') {{'is-invalid'}} @enderror" placeholder="" >
                  @error('time')<div class="text-danger">{{ $message }}</div>@enderror</div>
            </div>
            <div class="col">
                <div class="form-group">
                  <label for="nbr">Number of seats</label>
                  <input type="number" name="nbr" min="1" max="20" id="seats_nbr" value="{{ old('nbr') }}" class="form-control @error('nbr') {{'is-invalid'}} @enderror" placeholder="" >
                  @error('nbr')<div class="text-danger">{{ $message }}</div>@enderror</div>
            </div>
        </div>
        <div class="row">
            <button type="submit" class="btn btn-outline-primary btn-block">Book now !</button>
        </div>
    </form>
</fieldset>
@endsection