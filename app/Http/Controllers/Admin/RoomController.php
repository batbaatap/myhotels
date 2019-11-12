<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Room;
use App\destination;
use App\Facility;
use App\Hotel;
use DB;

class RoomController extends Controller
{
    public function addRoom (Request $request)
    {
        if($request->isMethod('post')){
            $data = $request->all();

            $request->validate([
                'room_id_hotel' => 'required',
                'room_title'=>'required',
                'room_id_hotel'=>'required',
                'room_alias'=>'required',
                'room_subtitle'=>'required',
                'room_stock'=>'required',
                'room_price'=>'required',
                'room_max_children'=>  'required',
                'room_max_adults'=>  'required',
                'room_max_people'=>  'required',
                'room_min_people'=>  'required',
            ]);

            // echo "<pre>"; print_r($data); die;

            $arr = $data['room_facilities'];
            $i =  implode(',', $arr);
            $room = new Room();    

            $room->lang=2;
            $room->users=1;
            $room->id_hotel=$data['room_id_hotel'];
            $room->max_children=$data['room_max_children'];
            $room->max_adults=$data['room_max_adults'];

            $room->max_people=$data['room_max_people'];
            $room->min_people=$data['room_min_people'];
            $room->title=$data['room_title'];
            $room->subtitle=$data['room_subtitle'];
            $room->alias=$data['room_alias'];

            $room->descr=$data['room_descr'];
            $room->facilities= $i;
            $room->stock=$data['room_stock'];
            $room->price=$data['room_price'];
            $room->home=$data['homepage1'];

            $room->checked=$data['checked'];
            $room->rank=null;
            $room->start_lock=null;
            $room->end_lock=null;


            $room->save();
        } 

        $hotels = Hotel::get();
        $hotels_drop_down = "<option value='' selected> - </option>";
        foreach($hotels as $h){
            $hotels_drop_down .= "<option value='".$h->id."'>".$h->title."</option>";
        }


        $facilities = Facility::get();
        $facilities_drop_down = "";
        foreach($facilities as $h){
            $facilities_drop_down .= "<option value='".$h->id."'>".$h->name."</option>";
        }


        $destinations = Destination::get();
        $destinations_drop_down = "<option value='' selected> - </option>";
        foreach($destinations as $r){
            $destinations_drop_down .= "<option value='".$r->id."'>".$r->name."</option>";
        }
        
        return view('admin.room.add_room')->with(compact('hotels_drop_down', 'facilities_drop_down', 'destinations_drop_down'));
    }

    public function viewRoom()
    {
        $rooms = DB::table('pm_room')
        ->leftJoin('pm_hotel', 'pm_room.id_hotel', '=', 'pm_hotel.id')
        ->select(DB::raw('pm_hotel.title as sameTitle'),  'pm_room.max_people', 'pm_room.checked', 'pm_room.id', 'pm_room.title',
                 'pm_room.subtitle',  'pm_room.home',
                 'pm_room.checked' )
        ->get();

        return view('admin.room.view_rooms')->with(compact('rooms'));
    }
}
