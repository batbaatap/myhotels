<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Destination;
use Auth;
use App\Hotel;
use App\Room;
use DB;
class HotelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $destination=DB::select(DB::raw( "SELECT * FROM pm_destination WHERE checked = 1 ")); 
        $hotel = Hotel::all();
        return view('customer/hotel.index', compact('destination','hotel'));
    }

    public function hotelsearch(Request $request){
        $destination=DB::select(DB::raw( "SELECT * FROM pm_destination WHERE checked = 1 ")); 
        // if($request->ajax())
        // {
        //     $output="";

        $datefrom = $request->datefrom;
        $dateto = $request->dateto;
         $room_quantity = $request->room_quantity;
        //  if($room_quantity==0){
        //     return redirect()->back()->with('flash_message_error');
        //  }
        $person_quantity = $request->person_quantity;
        $dest=$request->destination;

       
        $hotel= DB::select(DB::raw(
           
            "SELECT *
            from `pm_hotel`
            where  id_destination=$dest and id in (SELECT id_hotel
            from `pm_room`
            where stock>=$room_quantity and max_people>=$person_quantity and id in (
                
                SELECT  id_room
            FROM `pm_booking_room` AS rf
            WHERE rf.id_booking IN (
             select id  FROM `pm_booking`
            WHERE (`from_date` BETWEEN '$datefrom ' AND '$dateto')
            OR (`to_date` BETWEEN '$datefrom ' AND '$dateto')
            OR ( `from_date`<= '$datefrom ' AND `to_date`>='$dateto')
              ))
             
            UNION
             
             SELECT id_hotel
            from `pm_room`
            where stock>=$room_quantity and max_people>=$person_quantity and id NOT in (
                
                
                SELECT  id_room
            FROM `pm_booking_room` AS rf
            WHERE rf.id_booking IN (
             select id  FROM `pm_booking`
            WHERE (`from_date` BETWEEN '$datefrom ' AND '$dateto')
            OR (`to_date` BETWEEN '$datefrom ' AND '$dateto')
            OR ( `from_date`<= '$datefrom ' AND `to_date`>='$dateto')
              ))
             
            )
            "
            ));

            // if($hotel)
            // {
            //     foreach ($hotel as $h) {
            //         $output.='
                    
            //         <div class="jumbotron" >
            //                  '.$h->title.'
            //                 <button>захиалах</button>
            //         </div>
                 
                    
            //         ';
            //     }
            // }

            return view('customer/hotel.index', compact('hotel','destination'));
            // return Response($output);
    // }
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
