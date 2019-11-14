<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Rate;
use App\Hotel;
use App\Room;
use DB;

class RateController extends Controller
{
    
    public function addRate(Request $request)
    {
        
        if($request->isMethod('post')){

            $request->validate([
                'rate_id_room'=> 'required',
                'rate_id_hotel'  => 'required',
                'rate_id_package'  => 'required',
                'date_from_and_date_to'  => 'required',
            ]);


            $data = $request->all();

            // echo "<pre>"; print_r($data); die;
            $rate = new Rate();

            $rate->id_room = $data['rate_id_room'];
            $rate->id_hotel = $data['rate_id_hotel'];
            $rate->id_package = $data['rate_id_package'];
            $rate->users = 1;

            $dates = explode(' - ', $data['date_from_and_date_to']);
            $rate->start_date =   strtotime($dates[0]);
            $rate->end_date =     strtotime($dates[1]);
            $rate->price = $data['rate_price'];
            $rate->child_price = null;
            $rate->discount = $data['rate_discount'];
            $rate->discount_type = 'rate';
            $rate->people = $data['rate_people'];
            $rate->price_sup = 0;
            $rate->fixed_sup = 0;
            $rate->id_tax = null;
            $rate->taxes = null;
            $rate->save();

            return redirect('admin/rate/view-rates')->with('flash_message_success', 'Үнэ нэмэгдлээ');
        } 

        $hotels = Hotel::get();
        $hotels_drop_down = "<option value='' selected> - </option>";
        foreach($hotels as $h){
            $hotels_drop_down .= "<option value='".$h->id."'>".$h->title."</option>";
        }

        $rooms = Room::get();
        $rooms_drop_down = "<option value='' selected> - </option>";
        foreach($rooms as $r){
            $rooms_drop_down .= "<option value='".$r->id."'>".$r->title."</option>";
        }
        
        return view('admin.rate.add_rate')->with(compact('hotels_drop_down', 'rooms_drop_down'));
    }

    public function viewRates()
    {
        $rates = DB::table('pm_rate')
        ->join('pm_room', 'pm_rate.id_room', '=', 'pm_room.id')
        ->select(DB::raw('pm_rate.price as ratesPrice'), 'pm_rate.id', 'pm_room.title', 'pm_rate.start_date', 'pm_rate.end_date', 'pm_rate.id_package' )
        ->get();

        return view('admin.rate.view_rates')->with(compact('rates'));
    }


    // update
    public function editRate(Request $request, $id){

        if($request->isMethod('post')){
            
            $data = $request->all();
            
            $dates = explode(' - ', $data['date_from_and_date_to']);

            Rate::where(['id'=>$id])->update([
                'id_room' => $data['rate_id_room'],
                'id_hotel' => $data['rate_id_hotel'],
                'id_package' => $data['rate_id_package'],
                'users' => 1,
                'start_date' =>   strtotime($dates[0]),
                'end_date' =>     strtotime($dates[1]),
                'price' => $data['rate_price'],
                'child_price' => null,
                'discount' => $data['rate_discount'],
                'discount_type' => 'rate',
                'people' => $data['rate_people'],
                'price_sup' => 0,
                'fixed_sup' => 0,
                'id_tax' => null,
                'taxes' => null,
            ]);
                
            return redirect()->back()->with('flash_message_success','Амжилттай шинэчлэгдлээ');
        }

        $rateDetails = Rate::where(['id'=>$id])->first();

        $hotels = Hotel::get();
        $hotels_drop_down = "";
		foreach($hotels as $h){
            if($rateDetails->id_hotel == $h->id){
				$selected = "selected";
			}else{
				$selected = "";
            }
            
			$hotels_drop_down .= "<option value='".$h->id."' ".$selected.">".$h->title."</option>";
        }

        $rooms = Room::get();
        $rooms_drop_down = "";
        foreach($rooms as $r){
            if($r->id==$rateDetails->id_room){
				$selected = "selected";
			}else{
				$selected = "";
			}
			$rooms_drop_down .= "<option value='".$r->id."' ".$selected.">".$r->title."</option>";
        }

        // cat dropdown end
        return view('admin.rate.edit_rate')->with(compact('rateDetails', 'hotels_drop_down', 'rooms_drop_down'));
    }


    // delete
    public function deleteRate($id=null) {
       
        // // get post image name
        // $hotelImage = HotelFile::where(['id_item'=>$id])->first();

        // // Get Post image Paths
        // $large_image_path = 'admin/images/facility/';
        // // $medium_image_path = 'images/backend_images/posts/medium/';
        // // $small_image_path = 'images/backend_images/posts/small/';

        // // Delete large image if not exists in folder
        // if(file_exists($large_image_path.$hotelImage->file)){
        //     unlink($large_image_path.$hotelImage->file);
        // }

        Rate::where(['id'=>$id])->delete();

        return redirect()->back()->with('flash_message_success', 'Үнэ устгагдлаа');
    }


    
}