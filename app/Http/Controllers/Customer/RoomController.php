<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Hotel;
use App\Room;
use DB;
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
        $room= Room::all();
        return view('customer/room.index', compact('room'));
    }
    
    public function roomsearch(Request $request){
        // $destination=DB::select(DB::raw( "SELECT * FROM pm_destination WHERE checked = 1 ")); 
        // if($request->get)
        // $datefrom22 = $request->datefrom22;
        // $dateto22 = $request->dateto22;
        // $room_quantity22 = $request->room_quantity22;
        // $person_quantity22 = $request->person_quantity22;
        // $hotel22 = $request->hotel;
        
        $rooms= DB::select(DB::raw(
             "SELECT `pm_room`.stock-COUNT(`pm_booking_room`.id_room) as uruunii_zuruu, `pm_room`.*
             FROM `pm_room`
             INNER JOIN `pm_booking_room`
             ON pm_room.id = pm_booking_room.id_room

             -- using as 
             WHERE   id_room IN (
             SELECT  id_room
             FROM `pm_booking_room` AS rf

             WHERE rf.id_booking IN (
             select id  FROM `pm_booking`
             WHERE (`from_date` BETWEEN '1571270400' AND '1571443200')
             OR (`to_date` BETWEEN '1571270400' AND '1571443200')
             OR ( `from_date`<= '1571270400' AND `to_date`>='1571443200')
             )
             )
                
             GROUP BY `pm_booking_room`.id_room
             HAVING uruunii_zuruu>=2 and `pm_room`.id_hotel=1 and max_people>=2

             UNION

             SELECT `pm_room`.stock as uruunii_zuruu, `pm_room`.*
             from `pm_room`
             where stock>=2 and id_hotel=1 and  max_people>=2 and  id NOT in (SELECT  id_room
             FROM `pm_booking_room` AS rf
             WHERE rf.id_booking IN (
             select id  FROM `pm_booking`
             WHERE (`from_date` BETWEEN '1571270400' AND '1571443200')
             OR (`to_date` BETWEEN '1571270400' AND '1571443200')
             OR ( `from_date`<= '1571270400' AND `to_date`>='1571443200')
             ))
             "
         ));

        // $rooms = DB::table('pm_room')
        //     ->select(DB::raw("pm_room.stock - COUNT('pm_booking_room.id_room') as uruunii_zuruu"))
        //     // ->where('category_id', '=', 1)
        //     ->join('pm_booking_room', 'pm_room.id', '=', 'pm_booking_room.id_room')
        //     // ->left_join('issue_subscriptions', 'issues.id', '=', 'issue_subscriptions.issue_id')
        //     ->groupBy('pm_booking_room.id_room')
        //     // ->order_by('followers', 'desc')
        //     ->get();


        // $rooms = DB::table('pm_room')
        // ->select(DB::raw('pm_room'.stock-COUNT('pm_booking_room'.id_room) as uruunii_zuruu, 'pm_room'.*))
        // ->join('pm_booking_room', 'pm_room.id', '=', 'pm_booking_room.id_room')
        // // ->groupBy(DB::raw('pm_booking_room.id_room'))
        // ->get();
        
        return view('customer/room.index', compact('rooms'));

    }

    
public function roomcount(Request $request){ // oroo bolgonii id -g awan user-iin zahialah bolomjit toon utgiig haruulj bgaa
    $datefrom33 = $request->datefrom33;
    $dateto33 = $request->dateto33;
    $room_quantity33 = $request->room_quantity33;
    $roome = $request->room_roome;
    dd($request->datefrom33);

    $rooms= DB::select(DB::raw(
           
        "
    "
));

        return view('customer/room.index', compact('rooms'));

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
