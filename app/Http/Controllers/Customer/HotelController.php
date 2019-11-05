<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Destination;
use Auth;
use App\Hotel;
use App\Room;
use App\Facility;
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
       
        
        $facall = DB::table('pm_facility')->get();

        // $image=DB::select(DB::raw( "SELECT * FROM pm_hotel_file WHERE checked = 1 and id_item= ")); 

        $destination=DB::select(DB::raw( "SELECT * FROM pm_destination WHERE checked = 1 ")); 
        // $hotel = Hotel::all();
        // $hotel=DB::select(DB::raw( "  SELECT * 
        // FROM `pm_hotel` 
        // LEFT JOIN `pm_hotel_file` 
        // ON `pm_hotel`.id = `pm_hotel_file` .id_item")); 

        //  $aa= DB::select(DB::raw( "SELECT facilities FROM pm_hotel WHERE checked = 1 and id=1"));
        // $aa='1,2,3,4,5,6,7';

        $hotel=DB::select(DB::raw( "SELECT * FROM `pm_hotel` "));
        $fac=DB::select(DB::raw( "SELECT DISTINCT pm_facility.*
                                    FROM 
                                    `pm_facility`,`pm_hotel`
                                    where FIND_IN_SET(pm_facility.id, pm_hotel.facilities) 
                                    ORDER BY rank 
                                ")); 
                            
       
        return view('customer/hotel.index', compact('destination','hotel','facall','fac'));
    }


    

    public function hotelsearch(Request $request){


        $destination=DB::select(DB::raw( "SELECT * FROM pm_destination WHERE checked = 1 ")); 
    
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
                            ) ")); 

        }
        else{
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
             ));
            //  if($hotel==null){ //hereglegchiin opuulsan utgatai hotel baihgu bol
            //      dd(123);
                 
            //  }
        }


   }
    else{
        if( $checkStar->implode(',', ', ')==null ){ //үйлчилгээ орж ирсэн ба од байхгүй 

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
            
        }  
    }
                            //бүх үйлчилгээнүүдээ хэвлэж байгаа
            $fac=DB::select(DB::raw( "SELECT DISTINCT pm_facility.*
                            FROM 
                            `pm_facility`,`pm_hotel`
                            where FIND_IN_SET(pm_facility.id, pm_hotel.facilities) 
                            ORDER BY rank 
                        ")); 

       

            return view('customer/hotel.index', compact('hotel','destination','fac'));
        }
    }

    
    public function show()
    {
        
    }
    
}
