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
        //fac
        
        // $fac = DB::table('pm_facility')->get();

        // $image=DB::select(DB::raw( "SELECT * FROM pm_hotel_file WHERE checked = 1 and id_item= ")); 

        $destination=DB::select(DB::raw( "SELECT * FROM pm_destination WHERE checked = 1 ")); 
        // $hotel = Hotel::all();
        $hotel=DB::select(DB::raw( "  SELECT * 
        FROM `pm_hotel` 
        LEFT JOIN `pm_hotel_file` 
        ON `pm_hotel`.id = `pm_hotel_file` .id_item")); 

        //  $aa= DB::select(DB::raw( "SELECT facilities FROM pm_hotel WHERE checked = 1 and id=1"));
        // $aa='1,2,3,4,5,6,7';

       
        $facility=DB::select(DB::raw( 
            "SELECT pm_facility.*
            FROM 
                `pm_facility`,`pm_hotel`
             where FIND_IN_SET(pm_facility.id, pm_hotel.facilities) 
                  ORDER BY rank ")); 
      



      
        return view('customer/hotel.index', compact('destination','hotel','facility'));
    }

    public function hotelsearch(Request $request){
        $destination=DB::select(DB::raw( "SELECT * FROM pm_destination WHERE checked = 1 ")); 
        // if($request->ajax())
        // {
        //     $output="";
 if($request->isMethod('post')){
     
        $datefrom =  strtotime($request->datefrom);
        $dateto =  strtotime($request->dateto);
        // dd($datefrom,$dateto);
         $room_quantity = $request->room_quantity;
        //  if($room_quantity==0){
        //     return redirect()->back()->with('flash_message_error');
        //  }
        $person_quantity = $request->person_quantity;
        $dest=$request->destination;
     
       
        $hotel= DB::select(DB::raw(
           
            " SELECT *
            FROM `pm_hotel`
            
            where  id_destination=$dest and id in(SELECT w.id_hotel
            FROM 
            (SELECT  `pm_room`.stock-COUNT(`pm_booking_room`.id_room) as uruunii_zuruu, `pm_room`.*
                        FROM `pm_room`
                        INNER JOIN `pm_booking_room`
                        ON pm_room.id = pm_booking_room.id_room
                        
                        WHERE   id_room IN (
                            
                        SELECT  id_room
                        FROM `pm_booking_room` AS rf
                        WHERE rf.id_booking IN (
                         select id  FROM `pm_booking`
                        WHERE (`from_date` BETWEEN '$datefrom' AND '$dateto')
                        OR (`to_date` BETWEEN '$datefrom' AND '$dateto')
                        OR ( `from_date`<= '$datefrom' AND `to_date`>='$dateto')
                          )
                            )
                            
                            GROUP BY `pm_booking_room`.id_room
                            HAVING uruunii_zuruu>=$room_quantity  and max_people>=$person_quantity
                            
                            UNION 
                            
                             SELECT `pm_room`.stock as uruunii_zuruu, `pm_room`.*
                        from `pm_room`
                        where stock>=$room_quantity and  max_people>=$person_quantity and  id NOT in (SELECT  id_room
                        FROM `pm_booking_room` AS rf
                        WHERE rf.id_booking IN (
                         select id  FROM `pm_booking`
                        WHERE (`from_date` BETWEEN '$datefrom' AND '$dateto')
                        OR (`to_date` BETWEEN '$datefrom' AND '$dateto')
                        OR ( `from_date`<= '$datefrom' AND `to_date`>='$dateto')
                          ))
                           )w
            group by w.id_hotel
                            )
            
            "
            ));

            return view('customer/hotel.index', compact('hotel','destination'));
        }
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
