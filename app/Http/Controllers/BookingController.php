<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

use App\Booking;
use App\Mail\NewBooking;

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
        $request->validate($this->validationRules());     

        $booking = new Booking;

        $booking->user_id = Auth::id();
    
        $booking->booking_date = $request->booking_date;

        $booking->booking_time = $request->booking_time;

        $booking->seats_nbr = $request->seats_nbr;
    
        $booking->save();

        //envoyer un mail au moment de la confirmation de la création
        Mail::to(Auth::user()->email)->send(new NewBooking($booking));

        //apres la redirection on afficher un message
        return redirect()->route('booking.index')->with('bookingNotification', 'New booking added successfully !');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Booking $booking)//si on met $booking une instenciation de la classe Booking (au lieu de $id) on n'est pas obliger de mettre ::find()
    {
        //return view('booking.show', ['booking' => Booking::find($id)]);
        return view('booking.show',
        [
            'booking' => $booking
        ]);

        // ou return view('booking.show')->with('booking', $booking);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Booking $booking)
    {
        return view('booking.edit',
        [
            'booking' => $booking
        ]);

        //return view('booking.edit', compact('booking'));
        //var_dump($request) = dd($request);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Booking $booking)
    {
        $validatedData = $request->validate($this->validationRules()); 

        $booking -> update($validatedData);
        //c'est un enregistrement de masse

        return redirect()->route('booking.index')->with('bookingNotification', 'Update booking successfully !');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $booking = Booking::find($id);

        $booking->delete();
        
        return redirect()->route('booking.index')->with('bookingNotification', 'Booking deleted successfully !');
    }

    private function validationRules()
    {
        return 
        [
            'booking_date' => 'required|date',
            'booking_time' => 'required',
            'seats_nbr' => 'required|min:1|max:15',
        ];
    }
}
