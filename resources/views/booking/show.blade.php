@extends('layouts.app')

@section('content')

<table class="table">
    <thead>
      <tr class="table-dark">
        <th scope="col">User Id</th>
        <th scope="col">Date</th>
        <th scope="col">Time</th>
        <th scope="col">Number Seats</th>
        <th scope="col">Action</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>{{ $booking->user_id }}</td>
        <td>{{ $booking->booking_date->format('d/m/Y') }}</td>
        <td>{{ $booking->booking_time }}</td>
        <td>{{ $booking->seats_nbr }}</td>
        <td>
          <a href="{{ route('booking.edit', $booking->id) }}" type="button" class="btn btn-outline-warning">Edit</a>
          <a href="#" class="btn btn-outline-danger" data-toggle="modal" data-target="#confirmDeleteModal">Delete</a>
        </td>
      </tr>
    </tbody>
</table>

<!-- Modal -->
<div class="modal fade" id="confirmDeleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Delete booking</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          Are you sure to delete your booking ?
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-outline-danger"
              onclick="event.preventDefault();
              document.querySelector('#delete-booking-form').submit();">Confirm delete</button>
        </div>
        <form id="delete-booking-form" action="{{ route('booking.destroy', $booking->id) }}" method="POST" style="display: none;">
          @csrf
          @method('DELETE')
        </form>
    </div>
  </div>
</div>

@endsection