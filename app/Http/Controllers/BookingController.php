<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Booking;

class BookingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$bookings = Auth::user()->bookings()->get();//apporter les bookings de user authentifier pas tous les bookings 
        
        $comingBookings = Auth::user()->bookings()->comingBookings()->orderBy('booking_date')->get();
        $passedBookings = Auth::user()->bookings()->passedBookings()->orderBy('booking_date', 'desc')->get();

        return view('booking.index', 
        [
            'comingBookings' => $comingBookings,
            'passedBookings' => $passedBookings
        ]);


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('booking.create');


    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Valider le formulaite puis afficher des erreure 
        $request->validate([
            'date' => 'required|date',
            'time' => 'required',
            'nbr' => 'required|min:1|max:15',
        ]);

        $booking = new Booking;

        $booking->user_id = Auth::id();
    
        $booking->booking_date = $request->date;

        $booking->booking_time = $request->time;

        $booking->seats_nbr = $request->nbr;
    
        $booking->save();

        //apres la redirection on afficher un message
        return redirect()->route('booking.index')->with('addBooking', 'New Booking added successfully !');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Booking $booking)//si on met $booking une instenciation de la classe Booking on n'est pas obliger de mettre ::find()
    {
        return view('booking.show',
        [
            'booking' => $booking
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
