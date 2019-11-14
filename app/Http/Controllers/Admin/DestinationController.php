<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Image;
use App\Hotel;
use App\HotelFile;
use App\Facility;
use App\Destination;
use App\DestinationFile;
use App\Room;
use App\BookingRoom;
use DB;


class DestinationController extends Controller
{

    //======================= 
    // CREATE
    //=======================
    public function addDestination(Request $request)
    {
        if($request->isMethod('post')){
            $data = $request->all();

            // $request->validate([
            //     'hotel_title'=> 'required',
            //     'hotel_alias'  => 'required',
            //     'hotel_address'  => 'required',
            //     'hotel_lat'  => 'required',
            //     'hotel_long'  => 'required',
            // ]);

            $destination = new Destination();            
            $destination->lang=2;
            $destination->name=$data['destination_name'];
            $destination->title=$data['destination_title'];
            $destination->subtitle=$data['destination_subtitle'];
            $destination->title_tag=$data['destination_title_tag'];
            $destination->alias=$data['destination_alias'];

            $destination->descr=$data['destination_descr'];

            $destination->text=$data['destination_text'];
            $destination->video=$data['destination_video'];

            $destination->lat=$data['destination_lat'];
            $destination->lng=$data['destination_lng'];
        
            $destination->home=$data['homepage1'];
            $destination->checked=$data['checked'];
            $destination->rank=1;

            $destination->save();
            
            // h file save
            $destinationFile = new DestinationFile;
            $destinationFile->lang = 2;
            $destinationFile->id_item = $destination->id;
            $destinationFile->home = 0;
            $destinationFile->checked = 1;
            $destinationFile->rank = $destination->id;

            // upload image
            if($request->hasFile('filename')){
                $image_tmp = $request->file('filename');
                    if($image_tmp->isValid()){
                        $extension = $image_tmp->getClientOriginalExtension();
                        $filename =  rand(111, 99999).".".$extension;
                        $large_image_path = 'admin/images/destination/large/'.$filename;
                        // $medium_image_path = 'admin/images/hotels/medium/'.$filename;
                        // $small_image_path = 'admin/images/hotels/small/'.$filename;

                        // resize image
                        Image::make($image_tmp)->resize(800,400)->save($large_image_path);
                        // Image::make($image_tmp)->resize(600,600)->save($medium_image_path);
                        // Image::make($image_tmp)->resize(300,300)->save($small_image_path);

                        //  store image name in products table
                        $destinationFile->file = $filename;
                    }
                }
                
            $destinationFile->save();
            return redirect('admin/destination/view-destinations')->with('flash_message_success', 'Амжилттай нэмэгдлээ');
            // return redirect()->back()->back()
        }
        
        return view('admin.destination.add_destination');
    }


    //======================= 
    // READ
    //=======================
    public function viewDestination()
    {
        $destinations = DB::table('pm_destination')
        ->leftJoin('pm_destination_file', 'pm_destination.id', '=', 'pm_destination_file.id_item')
        ->select('pm_destination.name', 'pm_destination.id', 'pm_destination.text',
                 'pm_destination_file.file', 'pm_destination.home',
                 'pm_destination.checked')
        ->get();

        // $hotels=Hotel::join('pm_hotel_file', 'pm_hotel.id', '=', 'pm_hotel_file.id_item')
        //     ->select('pm_hotel.id', 'pm_hotel.title',
        //          'pm_hotel.subtitle','pm_hotel_file.file', 'pm_hotel.class', 'pm_hotel.home',
        //          'pm_hotel.checked')
        //     ->get();

        return view('admin.destination.view_destinations')->with(compact('destinations'));
    }


    //======================= 
    // UPDATE
    //=======================
    public function editDestination(Request $request, $id=null)
    {
        if($request->isMethod('post')){
            // getting info from user
            $data = $request->all();
            
            Destination::where(['id'=>$id])->update([
                'lang'=>2,
                'name'=> $data['destination_name'],
                'title'=> $data['destination_title'],
                'subtitle'=> $data['destination_subtitle'],
                'title_tag'=> $data['destination_title_tag'],
                'alias'=> $data['destination_alias'],
    
                'descr'=> $data['destination_descr'],
    
                'text'=> $data['destination_text'],
                'video'=> $data['destination_video'],
    
                'lat'=> $data['destination_lat'],
                'lng'=> $data['destination_lng'],
            
                'home'=> $data['homepage1'],
                'checked'=> $data['checked'],
                'rank'=>1,
            ]);

            // upload image
            if($request->hasFile('filename')){
            $image_tmp = $request->file('filename');
                if($image_tmp->isValid()){
                    $extension = $image_tmp->getClientOriginalExtension();
                    $filename =  rand(111, 99999).".".$extension;
                    $large_image_path = 'admin/images/destination/large/'.$filename;
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

            DestinationFile::where(['id_item'=>$id])->update([
                'file'  => $filename
            ]);
            
            return redirect()->back()->with('flash_message_success', 'Амжилттай засвар хийгдлээ');
        }


        // get details
        $destinationDetail = Destination::where(['id'=>$id])->first();
        $destinationDetailsFile = DestinationFile::where(['id_item'=>$id])->first();
        
        return view('admin.destination.edit_destination')->with(compact('destinationDetail', 'destinationDetailsFile'));
    }
    
   
    //======================= 
    // DELETE
    //=======================
    public function deleteDestination($id=null) 
    {
       
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

        Destination::where(['id'=>$id])->delete();

        return redirect()->back()->with('flash_message_success', 'Буудал устгагдлаа');
    }



     // delete product image
     public function deleteDestinationImage($id=null) {

        // get post image name
        $facImage = DestinationFile::where(['id_item'=>$id])->first();

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

        DestinationFile::where(['id_item'=>$id])->update(['file'=>'']);
            return redirect()->back()->with('flash_message_success', 'Зураг устгагдлаа');
            
    }
    
    

}

