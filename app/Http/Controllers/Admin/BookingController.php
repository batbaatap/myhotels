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


    public function gm_strtotime($date)
    {
        date_default_timezone_set('UTC');
        $time = strtotime($date.' GMT');
        // date_default_timezone_set(TIME_ZONE);
        return $time;
    }

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
        
        return view('admin.booking.add_booking')->with(compact('hotels_drop_down', 'rooms_drop_down'));
    } // end of ..addBooking()..

    
    public function viewCalendar(Request $request)
    {
        // $booker = Booking::get();
        $rooms = Room::get();
        
        $from_time = time();
        $to_time = time()+(86400*31);
        
        $from_date = gmdate('d/m/Y', $from_time);
        $to_date = gmdate('d/m/Y', $to_time);

        if($request->method('post')){

            $from_date = $request->from_date;
            $to_date   = $request->to_date;
            
            if($from_date == '') echo 'required field';
            else{
                $time = explode('/', $from_date);
                if(count($time) == 3) $time = $this->gm_strtotime($time[2].'-'.$time[1].'-'.$time[0].' 00:00:00');
                if(!is_numeric($time)) echo 'required field';
                else $from_time = $time;
            }

            if($to_date == '') echo 'required field';
            else{
                $time = explode('/', $to_date);
                if(count($time) == 3) $time = $this->gm_strtotime($time[2].'-'.$time[1].'-'.$time[0].' 00:00:00');
                if(!is_numeric($time)) echo 'required field';
                else $to_time = $time;
            }


            if($to_time > $from_time){
                if(($to_time-$from_time+86400) > (86400*31)) $to_time = $from_time+(86400*30);
                $width = (($to_time-$from_time+86400)/86400)*50;
                
                $time_1d_before = $from_time-86400; 
                // echo '$time_1d_before: '.$time_1d_before.'<br>';

                $time_1d_before = $this->gm_strtotime(gmdate('Y', $time_1d_before).'-'.gmdate('n', $time_1d_before).'-'.gmdate('j', $time_1d_before).' 00:00:00');
                // echo '$time_1d_before: '.$time_1d_before.'<br>';
                
                $time_1d_after = $to_time+86400;$time_1d_after = $this->gm_strtotime(gmdate('Y', $time_1d_after).'-'.gmdate('n', $time_1d_after).'-'.gmdate('j', $time_1d_after).' 00:00:00');
                // echo '$time_1d_after: '.$time_1d_after.'<br>';
                
                $from_time = $this->gm_strtotime(gmdate('Y', $from_time).'-'.gmdate('n', $from_time).'-'.gmdate('j', $from_time).' 00:00:00');
                // echo '$from_time: '.$from_time.'<br>';
            
                $to_time = $this->gm_strtotime(gmdate('Y', $to_time).'-'.gmdate('n', $to_time).'-'.gmdate('j', $to_time).' 00:00:00');
                // echo '$to_time: '.$to_time.'<br>';
                
                $today = $this->gm_strtotime(gmdate('Y').'-'.gmdate('n').'-'.gmdate('j').' 00:00:00');
                // echo '$today: '.$today;


                
                // result closing
                $result_closing = DB::select(DB::raw("SELECT stock, from_date, to_date
                FROM pm_room_closing
                WHERE
                    from_date <= '.$to_time.'
                    AND to_date >= '.$time_1d_before.'
                    AND id_room = 26
                ORDER BY from_date"));

                        
                $date = 0;
                // $day = '(^|,)0(,|$)';
                // result rate
                $result_rate = DB::select(DB::raw("SELECT DISTINCT(price), r.id as rate_id, start_date, end_date
                FROM pm_rate as r, pm_package as p
                WHERE id_package = p.id
                    AND min_nights IN(0,1)
                    AND days REGEXP '(^|,)0(,|$)'
                    AND id_room = 26
                    AND start_date <= '$date' AND end_date >= '$date'
                ORDER BY price DESC
                LIMIT 1"));


                // query room = > result_room
                $result_room = DB::select(DB::raw("SELECT DISTINCT(r.id) as room_id, id_hotel, r.title as room_title, stock, price, start_lock, end_lock
                FROM pm_room as r
                WHERE r.checked = 1
                AND r.lang = 2
                ORDER BY room_title"));

                // $room_id = 26;
                // result_book
                

                $rooms = array();
                $bookings = array();
                $closing = array();
                // if($result_room !== false){
                // $curry = [28,20,27,26];
                foreach($result_room as $j => $row){ 
                    $room_id = $row->room_id;
                    // echo $room_id;
                    
                    $room_title = $row->room_title; 
                    $stock = $row->stock; 
                    $min_price = $row->price; 
                    $start_lock = $row->start_lock;
                    $start_lock = $row->end_lock;
                    
                    $rooms[$room_id] = $row;
                    
                    $max_n = $stock-1;

                    if($result_closing!== false){
                        foreach($result_closing as $i => $row){
                            $start_date = $row->from_date;
                            $end_date = $row->to_date;
                            $stock = $row->stock;
                            
                            $start_date = gm_strtotime(gmdate('Y', $start_date).'-'.gmdate('n', $start_date).'-'.gmdate('j', $start_date).' 00:00:00');
                            $end_date = gm_strtotime(gmdate('Y', $end_date).'-'.gmdate('n', $end_date).'-'.gmdate('j', $end_date).' 00:00:00');
                            
                            $start = ($start_date < $time_1d_before) ? $time_1d_before : $start_date;
                            $end = ($end_date > $time_1d_after) ? $time_1d_after : $end_date;
                            
                            for($s = 0; $s < $stock; $s++){
                                $n = 0;
                                for($date = $start; $date < $end; $date += 86400){
                                    
                                    $k = null;
                                    $c = 0;
                                    while(is_null($k)){
                                        if(!isset($closing[$room_id][$date][$c])) $k = $c;
                                        else $c++;
                                    }
                                    if($c > $n) $n = $c;
                                }
                                for($date = $start; $date < $end; $date += 86400)
                                    $closing[$room_id][$date][$n] = $row;
                                
                                if($n > $max_n) $max_n = $n;
                            }
                        }
                    }

                    $result_book = DB::select(DB::raw("SELECT DISTINCT(b.id) as bookid, status, from_date, to_date, firstname, lastname, total, id_room
                        FROM pm_booking as b, pm_booking_room as br
                        WHERE
                            br.id_booking = b.id
                            AND (status = 4 OR (status = 1 AND (add_date > '.(time()-900).' OR payment_option IN('arrival','check'))))
                            AND from_date <= '$to_time'
                            AND to_date >= '$time_1d_before'
                            AND id_room = '$room_id'
                        ORDER BY bookid")
                            
                    );
                    if($result_book !== false){
                        foreach($result_book as $i => $row){
                            // echo $row->id_room;
                            $start_date = $row->from_date;    
                            $end_date   = $row->to_date;     
                            // echo '$start_date'.$start_date.'<br>';
                            // echo '$end_date'.$end_date.'<br>';
                            $start_date = strtotime(gmdate('Y', $start_date).'-'.gmdate('n', $start_date).'-'.gmdate('j', $start_date).' 00:00:00');
                            $end_date = strtotime(gmdate('Y', $end_date).'-'.gmdate('n', $end_date).'-'.gmdate('j', $end_date).' 00:00:00');
                            
                            $start = ($start_date < $time_1d_before) ? $time_1d_before : $start_date;
                            $end = ($end_date > $time_1d_after) ? $time_1d_after : $end_date;
                            
                            // echo '$start'.$start.'<br>';
                            // echo '$end'.$end.'<br>';
                            
                            $n = 0;
                            for($date = $start; $date < $end; $date += 86400){
                                // echo date('Y/m/d',$date).'<br>';
                                $k = null;
                                $c = 0;
                                while(is_null($k)){
                                    if(!isset($bookings[$room_id][$date][$c]) && !isset($closing[$room_id][$date][$c])) 
                                    {
                                        // echo var_dump(!isset($bookings[$room_id][$date][$c]));
                                        
                                        $k = $c;
                                        // echo $k;

                                    } else {
                                        $c++;
                                        // echo '$c=>'.$c.'...';
                                    }
                                }

                                if($c > $n) $n = $c;
                            }

                            for($date = $start; $date < $end; $date += 86400){
                                $bookings[$room_id][$date][$n] = $row;
                                // var_dump($bookings[$room_id][$date][$n] );
                            }

                            if($n > $max_n) $max_n = $n;
                        }
                    }

                    // echo $max_n.'<br>';
                    $rooms[$room_id]->n = $max_n;
                } 



                return view('admin.booking.view_calendar')->with(compact('rooms','result_closing', 'bookings',
                'result_rate', 'result_book',  'result_room', 'time_1d_before', 'time_1d_after', 'width' , 'from_time', 'to_time', 'today'));
            }
        }// ..request
}
    
    
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
