<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Destination;
use Auth;
use App\Hotel;
use App\HotelFile;
use App\Rate;
use App\Room;
use App\Facility;
use DB;
use Carbon\Carbon;

class HotelController extends Controller
{

    public function index()
    {
        $today = Carbon::today();
        $todaydate=  strtotime($today);
        $tomorrow = Carbon::tomorrow();
        $tomorrowdate=  strtotime($tomorrow);


        //=============================================================================
        // чиглэл харгалзахгүйгээр захиалах боломжтой бүх буудлуудыг гаргах
        // ============================================================================
        $hotel = DB::select(DB::raw( "SELECT *
                                FROM `pm_hotel`
                                            where  id in(SELECT w.id_hotel
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

            $destination=DB::select(DB::raw( "SELECT * FROM pm_destination WHERE checked = 1 ")); 
            // dd($request->all());

            $facfile = DB::table('pm_facility')
                ->join('pm_facility_file', 'pm_facility.id', '=', 'pm_facility_file.id_item')
                ->select('pm_facility.*', 'pm_facility_file.*')
                ->get();
            //бүх үйлчилгээнүүдээ хэвлэж байгаа
            $fac=DB::select(DB::raw( "SELECT DISTINCT pm_facility.*
            FROM 
            `pm_facility`,`pm_hotel`
            where FIND_IN_SET(pm_facility.id, pm_hotel.facilities) 
            ORDER BY rank 
                ")); 

            $rate_discount = DB::select(DB::raw("SELECT  `pm_rate`.*
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
            return view('customer/hotel/view_hotels')->with(compact('hotel','destination','facfile','fac','rate_discount','room','rate'));
            
    }



    // Зочид буудал хайлт
    public function hotelsearch(Request $request){

        $destination=DB::select(DB::raw("SELECT * FROM pm_destination WHERE checked = 1")); 
        // dd($request->all());

        $facfile = DB::table('pm_facility')
            ->join('pm_facility_file', 'pm_facility.id', '=', 'pm_facility_file.id_item')
            ->select('pm_facility.*', 'pm_facility_file.*')
            ->get();

        $today = Carbon::today();
        $todaydate=  strtotime($today);
        $rate_discount = DB::select(DB::raw("SELECT  `pm_rate`.*
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


        //бүх үйлчилгээнүүдээ хэвлэж байгаа
        $fac=DB::select(DB::raw( "SELECT DISTINCT pm_facility.*
        FROM 
        `pm_facility`,`pm_hotel`
        where FIND_IN_SET(pm_facility.id, pm_hotel.facilities) 
        ORDER BY rank 
            ")); 


        // Searching hotel..
        if($request->isMethod('post')){
            
            $datefrom =  strtotime($request->datefrom);
            $dateto =  strtotime($request->dateto);
            $room_quantity = $request->room_quantity;
            $person_quantity = $request->person_quantity;
            $dest=$request->destination;

            $checkStar=collect($request->check);//энэ нь сонгосон одыг array утгаар авч байгаа хувьсагч
            $ratingChecked= $checkStar->implode(',', ', ');
            $ratinggChecked = explode(",", $ratingChecked);


            $checked=collect($request->checkbox); //энэ нь сонгосон үйлчилгээнүүдийг array утгаар авч байгаа хувьсагч
            
            $serviceChecked= $checked->implode(',', ', ');
            $servicessChecked = explode(",", $serviceChecked);



            if( $checked->implode(',', ', ')==null ){ //үйлчилгээ орж ирсэн эсэхийг шалгаж байгаа
                if( $checkStar->implode(',', ', ')==null ){ //rating орж ирсэн эсэхийг шалгаж байгаа
                                                            
                                                                //бүх буудлуудаа харуулна(тухайн хэрэглэгчийн оруулсан өдрүүд болон өдөр хүний тоог авч шалгасан query)
                    $hotel=DB::select(DB::raw( "SELECT *
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
                                        ) ")
                    ); 
                    if($hotel==null){ //hereglegchiin opuulsan utgatai hotel baihgu bol
                        back()->withInput()->with('flash_message_notice', 'Хайлтын үр дүн олдсонгүй!');
                    }
                }
                else
                {
                    // dd($ratingChecked); 

                    $hotel=DB::select(DB::raw( 
                                                    // zowhon rating-tei buudluudaa haruulah
                        " SELECT *
                        FROM `pm_hotel`
                        
                        where `class` in ($ratingChecked) and  id_destination=$dest and id in(SELECT w.id_hotel
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
                        )
                    );
                    
                    if($hotel==null){ //hereglegchiin opuulsan utgatai hotel baihgu bol
                        back()->withInput()->with('flash_message_notice', 'Хайлтын үр дүн олдсонгүй!');
                    }
                }
            }
            else
            {
                if( $checkStar->implode(',', ', ')==null ){ //үйлчилгээ байгаа ба од байхгүй 

                    $service= "SELECT * from `pm_hotel` WHERE";
                    $tot=count($servicessChecked );
                    $counter=1;
                        foreach($servicessChecked  as $val)
                        {
                            // dd($counter) ;
                            $service .= " find_in_set('$val', facilities)";
                                if($counter !=$tot)
                                {
                                $service .=" and ";
                                }
                                $counter++;
                        };
                        $service .=" and id_destination=$dest and id in(SELECT w.id_hotel
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
                                        ) ";
                    $hotel=DB::select(DB::raw($service)); // үйлчилгээгээр хайж гарч ирсэн утгууд
                    if($hotel==null){ //hereglegchiin opuulsan utgatai hotel baihgu bol
                        back()->withInput()->with('flash_message_notice', 'Хайлтын үр дүн олдсонгүй!');
                    }
                } 
                else{ //үйлчилгээ болон од байгаа тохиолдолд 
                    $service= "SELECT * from `pm_hotel` WHERE `class` in ($ratingChecked) and ";
                    $tot=count($servicessChecked );
                    $counter=1;
                        foreach($servicessChecked  as $val)
                        {
                            // dd($counter) ;
                            $service .= " find_in_set('$val', facilities)";
                                if($counter !=$tot)
                                {
                                $service .=" and ";
                                }
                                $counter++;
                        };
                        $service .=" and id_destination=$dest and id in(SELECT w.id_hotel
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
                                    ) ";
                    
                        $hotel=DB::select(DB::raw($service)); // үйлчилгээгээр хайж гарч ирсэн buudliin утгууд
                            if($hotel==null){ //hereglegchiin opuulsan utgatai hotel baihgu bol
                                back()->withInput()->with('flash_message_notice', 'Хайлтын үр дүн олдсонгүй!');
                            }
                }  
            }
                        

        } // ..end of request

        $hotelFile = HotelFile::get();

        return view('customer/hotel/view_hotels')->with(compact('hotelFile','hotel','destination','facfile','fac','rate_discount','room','rate'));

    }
}
