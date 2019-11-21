<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Booking;
use App\BookingRoom;

class BookingController extends Controller
{
    public function payment(Request $request)
    {
        if($request->isMethod('post')){
            $data = $request->all();

            // dd($data);

            $request->validate([
                'lastname' => 'required|max:255',
                'email' => 'required',
                'phone' => 'required',
                // 'checkbox' => 'required',
            ]);

            // echo "<pre>"; print_r($data); die;
            $booking = new Booking();
            
            $booking->id_hotel = $data['hotelId'];
            $booking->add_date = 1;
            $booking->edit_date = 1;
            
            // өдрүүд daterange ашигласан учраас explode Хийсэн
            $booking->from_date =  strtotime( $data['bookingfrom']);
            $booking->to_date =    strtotime( $data['bookingto']);
            
            $booking->nights = $data['honog'];
            $booking->adults = 0;
            $booking->children = 0;
            $booking->amount = 0;
            
            $booking->tourist_tax = 1;
            $booking->discount = null;
            $booking->ex_tax = null;
            $booking->tax_amount = null;
            $booking->total = 0;
            
            $booking->down_payment = null;
            $booking->paid = null;
            $booking->balance = 0;
            $booking->extra_services = 0;
            $booking->id_user = 1;
            
            $booking->firstname = null;
            $booking->lastname = $data['lastname'];
            $booking->email = $data['email'];
            $booking->company = null;
            $booking->address = null;

            $booking->postcode = null;
            $booking->city = null;
            $booking->phone = $data['phone'];
            $booking->mobile = null;
            $booking->country = 'Mongolia';
            
            $booking->comments = null;
            $booking->status = 1; //Хүлээгэдж байгаа
            $booking->trans = 1;
            $booking->payment_date = 1;
            $booking->payment_option = 0;

            $booking->users = 1;
            $booking->save();

            
            if(count($request->roomtypeid) > 0)
            {
                foreach($request->roomtypeid as $item=>$v){
                    
                    $data2=array(
                        'id_booking'=>$booking->id,
                        'id_hotel'=>$data['hotelId'],
                        'id_room'=>$request->roomtypeid[$item],
                        'title'=>'coming',
                        'num'=>null,

                        'children' => 1,
                        'adults' =>   1,
                        'amount' =>   1,
                        'ex_tax' =>   null,
                        'tax_rate' => null,
                    );

                    // dd($data2);

                    BookingRoom::insert($data2);
                }
            }

        } 

        
       return view('customer.booking.thanks');
    } 

    public function bookingDetails(Request $request)
    {
        $hotelEyed = $request->hotelId;
        return view('customer.booking.booking_details', compact('hotelEyed'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
