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

            $request->validate([
                'hotel_title'=> 'required',
                'hotel_alias'  => 'required',
                'hotel_address'  => 'required',
                'hotel_lat'  => 'required',
                'hotel_long'  => 'required',
            ]);
            
            
            $arr = $data['hotel_facilities'];
            $i =  implode(',', $arr);
            

            $hotel = new Hotel();            
            $hotel->lang=2;
            $hotel->users=1;
            $hotel->title=$data['hotel_title'];
            $hotel->subtitle=$data['hotel_subtitle'];
            $hotel->alias=$data['hotel_alias'];
            $hotel->class=$data['hotel_class'];
            $hotel->address=$data['hotel_address'];
            $hotel->lat=$data['hotel_lat'];
            $hotel->lng=$data['hotel_long'];
            $hotel->email=$data['hotel_email'];
            $hotel->phone=$data['hotel_phone'];
            $hotel->web=$data['hotel_web'];
            $hotel->descr=$data['hotel_description'];
            $hotel->facilities= $i;
            $hotel->id_destination=$data['id_destination'];
            $hotel->checked=$data['checked'];

            // upload image
            if($request->hasFile('filename')){
                $image_tmp = $request->file('filename');
                    if($image_tmp->isValid()){
                        $extension = $image_tmp->getClientOriginalExtension();
                        $filename =  rand(111, 99999).".".$extension;
                        $large_image_path = 'admin/images/hotels/large/'.$filename;
                        $medium_image_path = 'admin/images/hotels/medium/'.$filename;
                        $small_image_path = 'admin/images/hotels/small/'.$filename;

                        // resize image
                        Image::make($image_tmp)->save($large_image_path);
                        Image::make($image_tmp)->resize(600,600)->save($medium_image_path);
                        Image::make($image_tmp)->resize(300,300)->save($small_image_path);

                        //  store image name in products table
                        $hotel->file = $filename;
                    }
                }


            $hotel->save();

        } 

        $facilities = Facility::get();
        $facilities_drop_down = "<option value selected='selected'></option>";
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
                 'pm_hotel.checked')
        ->get();

        return view('admin.hotel.view_hotels')->with(compact('hotels'));
    }
    
}
