<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Booking;
use App\Hotel;
use App\Room;
use App\BookingRoom;
use DB;

class BookingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function viewBookings()
    {
        $bookings = DB::table('pm_booking')
            ->join('pm_hotel', 'pm_booking.id_hotel', '=', 'pm_hotel.id')
            ->select('pm_booking.*', 'pm_hotel.title')
            ->get();

        return view('admin.booking.view_bookings')->with(compact('bookings'));
    }
    
    // Storing data to same time
    // Below mentioned, at first we use 'addBooking' function in order to save values to 'pm_booking' table.
    // Meanwhile, we save data to 'pm_booking_room' table as well.
    public function addBooking(Request $request)
    {
        if($request->isMethod('post')){
            $data = $request->all();

            // echo "<pre>"; print_r($data); die;
            $booking = new Booking();
            
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
                        'title'=>null,
                        'num'=>null,

                        'children' => null,
                        'adults' => null,
                        'amount' => null,
                        'ex_tax' => null,
                        'tax_rate' =>null,
                    );
                    BookingRoom::insert($data2);
                }
            }
        } // end of ...if($request->isMethod('post'))..

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
    } // end of ..addBooking()..

    

    // edit 
    public function editBooking(Request $request, $id){
        
        // if($request->isMethod('post')){
        //     $data = $request->all();

        //     Category::where(['id'=>$id])->update(['status'=>$status,'name'=>$data['category_name'],'parent_id'=>$data['parent_id'],'description'=>$data['description']]);
        //     return redirect()->back()->with('flash_message_success', 'Category has been updated successfully');
        // }

        // $categoryDetails = Category::where(['id'=>$id])->first();
        // $levels = Category::where(['parent_id'=>0])->get();
        // return view('admin.categories.edit_category')->with(compact('categoryDetails','levels'));


        if($request->isMethod('post')){
            
            $data = $request->all();

            Booking::where(['id'=>$id])->update([
                'id_hotel' => $data['id_hotel'],
                'add_date' => 1,
                'edit_date' => 1,
                
                // өдрүүд daterange ашигласан учраас explode Хийсэн
                $dates = explode(' - ', $data['date_from_and_date_to']),
                'from_date' =>   strtotime($dates[0]),
                'to_date' =>     strtotime($dates[1]),
                
                'nights' => $data['nights'],
                'adults' => $data['adults'],
                'children' => $data['children'],
                'amount' => $data['tax_amount'],
                
                'tourist_tax' => 1,
                'discount' => $data['discount'],
                'ex_tax' => $data['ex_tax'],
                'tax_amount' => $data['tax_amount'],
                'total' => $data['total'],
                
                'down_payment' => $data['down_payment'],
                'paid' => $data['paid'],
                'balance' => $data['balance'],
                'extra_services' => 0,
                'id_user' => 1,
                
                'firstname' => $data['firstname'],
                'lastname' => $data['lastname'],
                'email' => $data['email'],
                'company' => $data['company'],
                'address' => $data['address'],
    
                'postcode' => $data['postcode'],
                'city' => $data['city'],
                'phone' => $data['phone'],
                'mobile' => $data['mobile'],
                'country' => 'Mongolia',
                
                'comments' => $data['comments'],
                'status' => $data['status'],
                'trans' => 1,
                'payment_date' => 1,
                'payment_option' => $data['payment_option']
    
                ]);
                
                // if(count($request->id_hotel_sub) > 0)
                // {
                //     foreach($request->id_hotel_sub as $item=>$v)
                //     {
                //         BookingRoom::where(['id'=>$id])->update([
                //             $data2=array(
                //                 'id_booking'=>$booking->id,
                //                 'id_hotel'=>$request->id_hotel_sub[$item],
                //                 'id_room'=>$request->room_id_sub[$item],
                //                 'title'=>null,
                //                 'num'=>null,
        
                //                 'children' => null,
                //                 'adults' => null,
                //                 'amount' => null,
                //                 'ex_tax' => null,
                //                 'tax_rate' =>null,
                //             )
                //         ]);

                //         BookingRoom::insert($data2);
                //     }
                // }


               
                return redirect()->back()->with('flash_message_success','Амжилттай шинэчлэгдлээ');

            // Get Details
        }
        $bookingDetails = Booking::where(['id'=>$id])->first();

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

        //    $bookingDetails = Booking::all()->toArray();

        // cat dropdown end
        return view('admin.booking.edit_booking')->with(compact('bookingDetails', 'hotels_drop_down', 'rooms_drop_down'));
    
    }


    // delete
    public function deleteBooking($id)
    {
        //
    }
}
