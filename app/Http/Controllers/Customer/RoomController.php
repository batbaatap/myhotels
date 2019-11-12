<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Hotel;
use App\Room;
use DB;
use Illuminate\Pagination\Paginator;
use Illuminate\Pagination\LengthAwarePaginator;

class RoomController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
       
$page = 2;
$size = 2;
        // dd($rooms);
        $rooms= Room::all();
        // $hotels =DB::table('pm_hotel')->get();
        // $hotels =DB::table('pm_hotel')->paginate(1);
        $hotels=DB::select(DB::raw( "SELECT * FROM `pm_hotel` ")); 
        // $collect = collect($hotel);
        // $hotels = new LengthAwarePaginator(
        //     $collect->forPage($page, $size),
        //     $collect->count(), 
        //     $size, 
        //     $page
        //   );
        // $hotels=  Hotel::all();
       
        // dd($hotels);
        
        // $rooms = Room::paginate(2);
        return view('customer/room.index', compact('rooms','hotels'));
    }
    
public function roomsearch(Request $request){
    
    if($request->isMethod('post')){

        $datefrom22 =  strtotime($request->datefrom22);
        $dateto22 =  strtotime($request->dateto22);
        $room_quantity22 = $request->room_quantity22;
        $person_quantity22 = $request->person_quantity22;
        $hotel22 = $request->hotel;
       
    
        // $hotels= DB::select(DB::raw("  SELECT * FROM `pm_hotel` WHERE id='$hotel22' "));
        $hotels=DB::select(DB::raw( "  SELECT *  FROM `pm_hotel` LEFT JOIN `pm_hotel_file` ON `pm_hotel`.id = `pm_hotel_file` .id_item where `pm_hotel`.id='$hotel22'" )); 


        $rooms= DB::select(DB::raw(
            "SELECT  `pm_room`.stock-COUNT(`pm_booking_room`.id_room) as uruunii_zuruu, `pm_room`.*
            FROM `pm_room`
            INNER JOIN `pm_booking_room`
            ON pm_room.id = pm_booking_room.id_room
            
            WHERE   id_room IN (
                
            SELECT  id_room
            FROM `pm_booking_room` AS rf
            WHERE rf.id_booking IN (
             select id  FROM `pm_booking`
            WHERE (`from_date` BETWEEN '$datefrom22' AND ' $dateto22')
            OR (`to_date` BETWEEN '$datefrom22' AND ' $dateto22')
            OR ( `from_date`<= '$datefrom22' AND `to_date`>=' $dateto22')
              )
                )
                
                GROUP BY `pm_booking_room`.id_room
                HAVING uruunii_zuruu>=$room_quantity22 and `pm_room`.id_hotel=$hotel22 and max_people>=$person_quantity22
                
                UNION 
                 SELECT `pm_room`.stock as uruunii_zuruu, `pm_room`.*
            from `pm_room`
            where stock>=$room_quantity22 and id_hotel=$hotel22 and  max_people>=$person_quantity22 and  id NOT in (SELECT  id_room
            FROM `pm_booking_room` AS rf
            WHERE rf.id_booking IN (
             select id  FROM `pm_booking`
            WHERE (`from_date` BETWEEN '$datefrom22' AND ' $dateto22')
            OR (`to_date` BETWEEN '$datefrom22' AND ' $dateto22')
            OR ( `from_date`<= '$datefrom22' AND `to_date`>=' $dateto22')
              ))
            "
            ));

            return view('customer/room.index', compact('rooms','hotels'));
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
