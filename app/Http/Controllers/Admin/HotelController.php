<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Hotel;

use App\Facility;
use App\Destination;
use App\Room;
use App\BookingRoom;
use DB;

class HotelController extends Controller
{
    public function addHotel(Request $request)
    {
        if($request->isMethod('post')){
            $data = $request->all();

            // echo "<pre>"; print_r($data); die;

            $arr = $data['hotel_facilities'];
            // echo implode(" ",$arr);
            // echo json_encode($arr);
            $i =  implode(',', $arr);
            $hotel = new Hotel();            
            $hotel->lang=2;
            $hotel->users=1;
            $hotel->title=$data['title'];
            $hotel->subtitle=$data['subtitle'];
            $hotel->alias=$data['alias'];
            $hotel->class=$data['class'];
            $hotel->address=$data['address'];
            $hotel->lat=$data['lat'];
            $hotel->lng=$data['long'];
            $hotel->email=$data['email'];
            $hotel->phone=$data['phone'];
            $hotel->web=$data['web'];
            $hotel->descr=$data['description'];
            $hotel->facilities= $i;
            $hotel->id_destination=$data['id_destination'];

            // $hotel->paypal_email='';
            // $hotel->home=$data['title'];
            // $hotel->checked=$data['title'];
            // $hotel->rank=$data['title'];

            // if(count($request->hotel_facilities) > 0)
            // {
            //     foreach($request->hotel_facilities as $item=>$v){
            //         $data2=array(
            //             'facilities'=>$hotel->hotel_facilities[$item]
            //         );
            //         Hotel::insert($data2);
            //     }
            // }

            $hotel->save();

            // for ($i = 1; $i < count($request->hotel_facilities); $i++) {
            //     $answers[] = [
            //         'facilities' => $request->hotel_facilities[$i]
            //     ];
            // }
            // Hotel::insert($answers);
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
        
        return view('admin.hotel.add_hotel')->with(compact('facilities_drop_down', 'destinations_drop_down'));
    }

    public function viewHotel()
    {
        $hotels = DB::table('pm_hotel')
        ->leftJoin('pm_destination', 'pm_hotel.id_destination', '=', 'pm_destination.id')
        ->select('pm_destination.name', 'pm_hotel.id', 'pm_hotel.title',
                 'pm_hotel.subtitle', 'pm_hotel.class', 'pm_hotel.home',
                 'pm_hotel.checked', )
        ->get();

        return view('admin.hotel.view_hotels')->with(compact('hotels'));
    }
    
}
