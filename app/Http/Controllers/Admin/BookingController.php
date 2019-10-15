<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Booking;
use App\Hotel;
use App\Room;
use App\BookingRoom;

class BookingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bookings = Booking::get();
        return view('admin.booking.index')->with(compact('bookings'));
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    // protected $booking;
    // protected $hotel;
    // protected $room;
    // public function __construct(){
    //     $this->booking = new Booking();
    //     $this->hotel = new Hotel();
    //     $this->room = new Room();
    // }

    // Storing data to same time
    // Below mentioned, at first we use 'addBooking' function in order to save values to 'pm_booking' table.
    // Meanwhile, we save data to 'pm_booking_room' table as well.
    public function addBooking(Request $request)
    {
        // echo 'hi';
        if($request->isMethod('post')){
            $data = $request->all();

            // echo "<pre>"; print_r($data); die;
            $booking = new Booking();
            
            $booking->id_hotel = $data['hotel_booking'];
            $booking->add_date = 1;
            $booking->edit_date = 1;
            
            // өдрүүд daterange ашигласан учраас explode Хийсэн
            $dates = explode(' - ', $data['date_from_and_date_to']);
            $booking->from_date =   strtotime($dates[0]);
            $booking->to_date =     strtotime($dates[1]);

            $booking->nights = $data['nights'];
            $booking->adults = $data['adults'];
            $booking->children = $data['children'];
            $booking->amount = $data['tax_amount'];
            
            $booking->tourist_tax = 1;
            $booking->discount = $data['discount'];
            $booking->ex_tax = $data['ex_tax'];
            $booking->tax_amount = $data['tax_amount'];
            $booking->total = $data['total'];
            
            $booking->down_payment = $data['down_payment'];
            $booking->paid = $data['paid'];
            $booking->balance = $data['balance'];
            $booking->extra_services = 0;
            $booking->id_user = 1;
            
            $booking->firstname = $data['firstname'];
            $booking->lastname = $data['lastname'];
            $booking->email = $data['email'];
            $booking->company = $data['company'];
            $booking->address = $data['address'];

            $booking->postcode = $data['postcode'];
            $booking->city = $data['city'];
            $booking->phone = $data['phone'];
            $booking->mobile = $data['mobile'];
            $booking->country = $data['country'];
            
            $booking->comments = $data['comments'];
            $booking->status = $data['status'];
            $booking->trans = 1;
            $booking->payment_date = 1;
            $booking->payment_option = $data['payment_option'];

            $booking->users = 1;
            
            $booking->save();

            // 2
            $gr = new BookingRoom();
            $gr->id_room = 1;
            $gr->id_hotel = 1;
            $gr->title = '';
            $gr->num = '';
            $gr->children = $data['children_r'];

            $gr->adults = $data['adult_r'];
            $gr->amount = $data['amount_r'];
            $gr->ex_tax = 1;
            $gr->tax_rate = $data['taxrater'];

            $booking->brooms()->save($gr);
        }
     

        $hotels = Hotel::get();
        $hotels_drop_down = "<option value='' selected> - </option>";
        foreach($hotels as $h){
            $hotels_drop_down .= "<option value='".$h->id."'>".$h->title."</option>";
        }

        $rooms = Room::get();
        $rooms_drop_down = "<option value='' selected> - </option>";
        foreach($rooms as $r){
            $rooms_drop_down .= "<option value='".$r->id."'>".$r->title."</option>";
        }
        
        return view('admin.booking.add_booking')->with(compact('hotels_drop_down', 'rooms_drop_down'));;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
