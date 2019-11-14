<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Image;
use App\Hotel;
use App\HotelFile;
use App\Facility;
use App\Destination;
use App\Room;
use App\BookingRoom;
use DB;


class HotelController extends Controller
{
    // add hotel
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
            $hotel->checked=$data['homepage1'];
            $hotel->save();


            
            // h file save
            $hotelfile = new HotelFile;
            $hotelfile->lang = 2;
            $hotelfile->id_item = $hotel->id;
            $hotelfile->home = 0;
            $hotelfile->checked = 1;
            $hotelfile->rank = $hotel->id;

            // upload image
            if($request->hasFile('filename')){
                $image_tmp = $request->file('filename');
                    if($image_tmp->isValid()){
                        $extension = $image_tmp->getClientOriginalExtension();
                        $filename =  rand(111, 99999).".".$extension;
                        $large_image_path = 'admin/images/hotels/large/'.$filename;
                        // $medium_image_path = 'admin/images/hotels/medium/'.$filename;
                        $small_image_path = 'admin/images/hotels/small/'.$filename;

                        // resize image
                        Image::make($image_tmp)->resize(800,400)->save($large_image_path);
                        // Image::make($image_tmp)->resize(600,600)->save($medium_image_path);
                        Image::make($image_tmp)->resize(160,45)->save($small_image_path);

                        //  store image name in products table
                        $hotelfile->file = $filename;
                    }
                }
                
            

            $hotelfile->save();
            return redirect('admin/hotel/view-hotels')->with('flash_message_success', 'Буудал нэмэгдлээ');
            // return redirect()->back()->back()
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


    // edit hotel
    public function editHotel(Request $request, $id=null){
        if($request->isMethod('post')){
            // getting info from user
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
            
            if(!empty($data['id_destination'])) {
                $id_d = $data['id_destination'];
            }else {
                $id_d = null;
            }

            Hotel::where(['id'=>$id])->update([
                'lang'=>2,
                'users'=>1,
                'title'=>$data['hotel_title'],
                'subtitle'=>$data['hotel_subtitle'],
                'alias'=>$data['hotel_alias'],
                'class'=>$data['hotel_class'],
                'address'=>$data['hotel_address'],
                'lat'=>$data['hotel_lat'],
                'lng'=>$data['hotel_long'],
                'email'=>$data['hotel_email'],
                'phone'=>$data['hotel_phone'],
                'web'=>$data['hotel_web'],
                'descr'=>$data['hotel_description'],
                'facilities'=> $i,
                'id_destination'=>$id_d,
                'checked'=>$data['checked'],
                'home'=>$data['homepage1'],
            ]);

            // upload image
            if($request->hasFile('filename')){
            $image_tmp = $request->file('filename');
                if($image_tmp->isValid()){
                    $extension = $image_tmp->getClientOriginalExtension();
                    $filename =  rand(111, 99999).".".$extension;
                    $large_image_path = 'admin/images/hotels/large/'.$filename;
                    // $medium_image_path = 'admin/images/hotels/small/'.$filename;
                    $small_image_path = 'admin/images/hotels/small/'.$filename;

                    // resize image
                    Image::make($image_tmp)->resize(1000,600)->save($large_image_path);
                    // Image::make($image_tmp)->resize(300,370)->save($medium_image_path);
                    Image::make($image_tmp)->resize(160,45)->save($small_image_path);

                    //  store image name in products table
                    // $facilityFile->file = $filename;
                }
            } else if(!empty($data['current_image'])){
                $filename = $data['current_image'];
            } else {
                $filename = '';
            }

            HotelFile::where(['id_item'=>$id])->update([
                'file'  => $filename
            ]);
            
            return redirect()->back()->with('flash_message_success', 'Амжилттай засвар хийгдлээ');
        }


        $facilities   = Facility::get();
        $destinations = Destination::get();

        // get details
        $hotelDetails = Hotel::where(['id'=>$id])->first();
        $hotelDetailsFile = HotelFile::where(['id_item'=>$id])->first();

        $dest_drop_down = "<option value='' disabled>Select</option>";
		foreach($destinations as $dest){
			if($dest->id==$hotelDetails->id_destination){
				$selected = "selected";
			}else{
				$selected = "";
			}
			$dest_drop_down .= "<option value='".$dest->id."' ".$selected.">".$dest->name."</option>";
        }
        
        return view('admin.hotel.edit_hotel')->with(compact('hotelDetails', 'hotelDetailsFile', 'facilities', 'dest_drop_down'));
    }

    // view hotel
    public function viewHotel()
    {
        $hotels = DB::table('pm_hotel')
        ->leftJoin('pm_destination', 'pm_hotel.id_destination', '=', 'pm_destination.id')
        ->leftJoin('pm_hotel_file', 'pm_hotel.id', '=', 'pm_hotel_file.id_item')
        ->select('pm_destination.name', 'pm_hotel.id', 'pm_hotel.title',
                 'pm_hotel.subtitle','pm_hotel_file.file', 'pm_hotel.class', 'pm_hotel.home',
                 'pm_hotel.checked')
        ->get();

        // $hotels=Hotel::join('pm_hotel_file', 'pm_hotel.id', '=', 'pm_hotel_file.id_item')
        //     ->select('pm_hotel.id', 'pm_hotel.title',
        //          'pm_hotel.subtitle','pm_hotel_file.file', 'pm_hotel.class', 'pm_hotel.home',
        //          'pm_hotel.checked')
        //     ->get();

        return view('admin.hotel.view_hotels')->with(compact('hotels'));
    }

    // delete product image
    public function deleteHotelImage($id=null) {

        // get post image name
        $facImage = HotelFile::where(['id_item'=>$id])->first();

        // Get Post image Paths
        $large_image_path = 'admin/images/hotels/large/';
        // $medium_image_path = 'images/backend_images/posts/medium/';
        // $small_image_path = 'images/backend_images/posts/small/';

        // Delete large image if not exists in folder
        if(file_exists($large_image_path.$facImage->file)){
            unlink($large_image_path.$facImage->file);
        }

        // if(file_exists($medium_image_path.$postImage->image)){
        //     unlink($medium_image_path.$postImage->image);
        // }

        // if(file_exists($small_image_path.$postImage->image)){
        //     unlink($small_image_path.$postImage->image);
        // }fa

        HotelFile::where(['id_item'=>$id])->update(['file'=>'']);
            return redirect()->back()->with('flash_message_success', 'Зураг устгагдлаа');
            
    }
    
     // delete fac
     public function deleteHotel($id=null) {
       
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

        Hotel::where(['id'=>$id])->delete();

        return redirect()->back()->with('flash_message_success', 'Буудал устгагдлаа');
    }

}
