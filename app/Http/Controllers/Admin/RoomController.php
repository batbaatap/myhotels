<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Image;
use App\Room;
use App\RoomFile;
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


             // h file save
            $roomfile = new RoomFile;
            $roomfile->lang = 2;
            $roomfile->id_item = $room->id;
            $roomfile->home = 0;
            $roomfile->checked = 1;
            $roomfile->rank = $room->id;

            // upload image
            if($request->hasFile('filename')){
                $image_tmp = $request->file('filename');
                    if($image_tmp->isValid()){
                        $extension = $image_tmp->getClientOriginalExtension();
                        $filename =  rand(111, 99999).".".$extension;
                        $large_image_path = 'admin/images/rooms/large/'.$filename;
                        // $medium_image_path = 'admin/images/hotels/medium/'.$filename;
                        // $small_image_path = 'admin/images/hotels/small/'.$filename;

                        // resize image
                        Image::make($image_tmp)->resize(800,400)->save($large_image_path);
                        // Image::make($image_tmp)->resize(600,600)->save($medium_image_path);
                        // Image::make($image_tmp)->resize(300,300)->save($small_image_path);

                        //  store image name in products table
                        $roomfile->file = $filename;
                    }
            }

            $roomfile->save();

            return redirect('admin/room/view-rooms')->with('flash_message_success', 'Өрөө нэмэгдлээ');

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
        ->leftJoin('pm_room_file', 'pm_room.id', '=', 'pm_room_file.id_item')
        ->select(DB::raw('pm_hotel.title as sameTitle'),  'pm_room.max_people', 'pm_room.checked', 'pm_room.id', 'pm_room.title',
                 'pm_room.subtitle', 'pm_room_file.file', 'pm_room.home',
                 'pm_room.checked' )
        ->get();

        return view('admin.room.view_rooms')->with(compact('rooms'));
    }



    public function editRoom(Request $request, $id=null){
        
        // Update Mode
        if($request->isMethod('post')){
            // getting info from user
            $data = $request->all();

            $arr = $data['room_facilities'];
            $i =  implode(',', $arr);
            
            Room::where(['id'=>$id])->update([
                'lang'=> 2,
                'users'=>1,
                'id_hotel'=>$data['room_id_hotel'],
                'max_children'=>$data['room_max_children'],
                'max_adults'=>$data['room_max_adults'],
    
                'max_people'=>$data['room_max_people'],
                'min_people'=>$data['room_min_people'],
                'title'=>$data['room_title'],
                'subtitle'=>$data['room_subtitle'],
                'alias'=>$data['room_alias'],
    
                'descr'=>$data['room_descr'],
                'facilities'=> $i,
                'stock'=>$data['room_stock'],
                'price'=>$data['room_price'],
                'home'=>$data['homepage1'],
    
                'checked'=>$data['checked'],
                'rank'=>null,
                'start_lock'=>null,
                'end_lock'=>null,
            ]);
    
             // upload image
            if($request->hasFile('filename')){
                $image_tmp = $request->file('filename');
                    if($image_tmp->isValid()){
                        $extension = $image_tmp->getClientOriginalExtension();
                        $filename =  rand(111, 99999).".".$extension;
                        $large_image_path = 'admin/images/rooms/large/'.$filename;
                        // $medium_image_path = 'admin/images/facility/'.$filename;
                        // $small_image_path = 'admin/images/facility/'.$filename;
    
                        // resize image
                        Image::make($image_tmp)->resize(1000,600)->save($large_image_path);
                        // Image::make($image_tmp)->resize(600,600)->save($medium_image_path);
                        // Image::make($image_tmp)->resize(300,300)->save($small_image_path);
    
                        //  store image name in products table
                        // $facilityFile->file = $filename;
                    }
                } else if(!empty($data['current_image'])){
                    $filename = $data['current_image'];
                } else {
                    $filename = '';
                }
    
                RoomFile::where(['id_item'=>$id])->update([
                    'file'  => $filename
                ]);
                    
            return redirect()->back()->with('flash_message_success', 'Амжилттай засвар хийгдлээ');
        }
        


        // Edit Mode
        $facilities = Facility::get();

        // get details
        $roomDetails = Room::where(['id'=>$id])->first();
        $roomDetailsFile = RoomFile::where(['id_item'=>$id])->first();

        
        $hotels = Hotel::get();

       


        $hotels_drop_down = "";
		foreach($hotels as $h){
			if($h->id==$roomDetails->id_hotel){
				$selected = "selected";
			}else{
				$selected = "";
			}
			$hotels_drop_down .= "<option value='".$h->id."' ".$selected.">".$h->title."</option>";
        }

        
        return view('admin.room.edit_room')->with(compact('roomDetails', 'roomDetailsFile', 'facilities', 'hotels_drop_down'));
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
     public function deleteRoom($id=null) {
       
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

        Room::where(['id'=>$id])->delete();

        return redirect()->back()->with('flash_message_success', 'Өрөө устгагдлаа');
    }


}
