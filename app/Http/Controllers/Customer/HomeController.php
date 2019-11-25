<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Destination;
use DB;
use App\Hotel;
use App\Rate;
use App\Room;
use Carbon\Carbon;
class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $today = Carbon::today();
        $todaydate=  strtotime($today);
        $tomorrow = Carbon::tomorrow();
        $tomorrowdate=  strtotime($tomorrow);

       
        $destination=DB::select(DB::raw( "SELECT `pm_destination`.`id`, `pm_destination`.name,`pm_destination`.`checked`, `pm_destination`.home, `pm_destination`.`text`,  `pm_destination_file`.file
                                            FROM `pm_destination`
                                            left JOIN `pm_destination_file` on `pm_destination`.`id`= `pm_destination_file`.`id_item`
                                            limit 4
                                            ")); 

        //=============================================================================
        // чиглэл харгалзахгүйгээр захиалах боломжтой бүх буудлуудыг гаргах
        // ============================================================================
        $hotel = DB::select(DB::raw( "SELECT *
                                        FROM `pm_hotel`
                                                    where id in(SELECT w.id_hotel
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
                                                WHERE (`from_date` BETWEEN '$todaydate' AND '$tomorrowdate')
                                                OR (`to_date` BETWEEN '$todaydate' AND '$tomorrowdate')
                                                OR ( `from_date`<= '$todaydate' AND `to_date`>='$tomorrowdate')
                                                )
                                                )
                                                    
                                                    GROUP BY `pm_booking_room`.id_room
                                                    HAVING uruunii_zuruu>=1  and max_people>=1
                                                    
                                                    UNION 
                                                    
                                                    SELECT `pm_room`.stock as uruunii_zuruu, `pm_room`.*

                                                from `pm_room`
                                                where stock>=1 and  max_people>=1 and  id NOT in (SELECT  id_room
                                                FROM `pm_booking_room` AS rf
                                                WHERE rf.id_booking IN (
                                                select id  FROM `pm_booking`
                                                WHERE (`from_date` BETWEEN '$todaydate' AND '$tomorrowdate')
                                                OR (`to_date` BETWEEN '$todaydate' AND '$tomorrowdate')
                                                OR ( `from_date`<= '$todaydate' AND `to_date`>='$tomorrowdate')
                                                ))
                                                )w
                                        group by w.id_hotel)   ")); 

        $discount = DB::select(DB::raw("SELECT  `pm_rate`.*
                                            FROM `pm_rate` 
                                            WHERE discount IN (SELECT MAX(discount)
                                                FROM `pm_rate` 
                                                where '$todaydate'>= start_date and '$todaydate'<= end_date
                                                GROUP BY id_hotel
                                                )
                                            GROUP BY id_hotel")); // rate доторхи хамгийн их хямдарсан өрөөний буудлынх  үнэ
       
         $rate= DB::select(DB::raw( "SELECT *
                                    from `pm_rate` 
                                    where price in (SELECT  MIN(price)
                                    FROM `pm_rate` 
                                    where id_hotel NOT IN (SELECT  id_hotel
                                    FROM `pm_rate` 
                                    WHERE discount  IN (SELECT MAX(discount)

                                    FROM `pm_rate` 
                                    where '$todaydate'>= start_date and '$todaydate'<= end_date
                                    GROUP BY id_hotel)
                                    )
                                    GROUP BY id_hotel)")); //хямдрал нь дууссан ч rate table-s хасагдаагүй буудал тус бүрийн хамгийн бага үнэтэйг нь гаргасан 
        $room = Room::all();

        return view('customer/home.index', compact('destination','hotel','discount','rate','room'));

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
