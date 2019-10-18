<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Hotel;

use App\Facility;
use App\Destination;
use App\Room;
use App\BookingRoom;
use DB;

class HotelController extends Controller
{
    public function addHotel(Request $request)
    {
        if($request->isMethod('post')){
            $data = $request->all();

            // echo "<pre>"; print_r($data); die;
            $booking = new Hotel();
            
            $booking->id_hotel = $data['id_hotel'];
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
            $booking->country = 'Mongolia';
            
            $booking->comments = $data['comments'];
            $booking->status = $data['status'];
            $booking->trans = 1;
            $booking->payment_date = 1;
            $booking->payment_option = $data['payment_option'];

            $booking->users = 1;
            $booking->save();

            // $lastid=Booking::create($data)->id;

            if(count($request->id_hotel_sub) > 0)
            {
                foreach($request->id_hotel_sub as $item=>$v){
                    
                    $data2=array(
                        'id_booking'=>$booking->id,
                        'id_hotel'=>$request->id_hotel_sub[$item],
                        'id_room'=>$request->room_id_sub[$item],
                        'title'=>$request->description_r[$item],
                        'num'=>null,

                        'children' => $request->children_r[$item],
                        'adults' => $request->children_r[$item],
                        'amount' => $request->amount_r[$item],
                        'ex_tax' => null,
                        'tax_rate' =>null,
                    );
                    BookingRoom::insert($data2);
                }
            }
        } // end of ...if($request->isMethod('post'))..

        $facilities = Facility::get();
        $facilities_drop_down = "<option value='' selected> - </option>";
        foreach($facilities as $h){
            $facilities_drop_down .= "<option value='".$h->id."'>".$h->name."</option>";
        }

        $destinations = Destination::get();
        $destinations_drop_down = "<option value='' selected> - </option>";
        foreach($destinations as $r){
            $destinations_drop_down .= "<option value='".$r->id."'>".$r->name."</option>";
        }
        
        return view('admin.hotel.add_hotel')->with(compact('facilities_drop_down', 'destinations_drop_down'));;
    }
}
