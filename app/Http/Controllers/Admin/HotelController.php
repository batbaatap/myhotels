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
use Illuminate\Support\Facades\Storage; //Laravel Filesystem
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
            // $hotelfile = new HotelFile;
            // $hotelfile->lang = 2;
            // $hotelfile->id_item = $hotel->id;
            // $hotelfile->home = 0;
            // $hotelfile->checked = 1;
            // $hotelfile->rank = $hotel->id;


            if ($files = $request->file('filename')) {
                // Define upload path
                $destinationPath = public_path('/admin/images/hotels/large/'); // upload path
                // Image::make($profileImage)->resize(800,400)->save($destinationPath);
                foreach($files as $img) {
                    // dd($img);

                    // Upload Orginal Image           
                    $profileImage =$img->getClientOriginalName();

                    $img->move($destinationPath, $profileImage);
                    
                     // Save In Database
                     $hotelfile = new HotelFile;
                     $hotelfile->lang = 2;
                     $hotelfile->id_item = $hotel->id;
                     $hotelfile->home = 0;
                     $hotelfile->file = $profileImage;
                     $hotelfile->checked = 1;
                     $hotelfile->rank = $hotel->id;
                     $hotelfile->save();
                }
            }

            // Route::post('process', function (Request $request) {
            //     $photos = $request->file('photos');
            //     $paths  = [];
            
            //     foreach ($photos as $photo) {
            //         $extension = $photo->getClientOriginalExtension();
            //         $filename  = 'profile-photo-' . time() . '.' . $extension;
            //         $paths[]   = $photo->storeAs('photos', $filename);
            //     }
            
            //     dd($paths);
            // });

            // if ($request->hasFile( 'filename' ) ) {
            //     $gImgs = $request->filename;
            //     foreach ( $gImgs as $gImg ) {
            //         if($gImg->isValid()){
            //         $filename = time() . '.' . $gImg->getClientOriginalExtension();
            //         // Image::make( $gImg )->resize( 1890, 1358 )->save( '/admin/images/hotels/large/' . $filename );
            //         // Image::make( $gImg )->fit( 800, 600 )->save( '/admin/images/hotels/large/' . $filename );

            //         Image::make( $gImg )->resize( 1000, 500 )->save( '/admin/images/hotels/large/' . $filename );
            //         Image::make( $gImg )->fit( 646, 250 )->save( '/admin/images/hotels/large/' . $filename );

            //         // $dcoImg       
            //         $hotelfile = new HotelFile;
            //         $hotelfile->lang = 2;
            //         $hotelfile->id_item = $hotel->id;
            //         $hotelfile->home = 0;
            //         $dcoImg->file         = $filename;
            //         $hotelfile->checked = 1;
            //         $hotelfile->rank = $hotel->id;
            //         $hotelfile->save();
            //     }
            //     }
            // }

            // upload image
            // if($request->hasFile('filename')){
            //     $image_tmp = $request->filename;
            //     foreach($image_tmp as $file){
            //         if($image_tmp->isValid()){
            //             $extension = $image_tmp->getClientOriginalExtension();
            //             $filename =  rand(111, 99999).".".$extension;
            //             $large_image_path = 'admin/images/hotels/large/'.$filename;
            //             // $medium_image_path = 'admin/images/hotels/medium/'.$filename;
            //             $small_image_path = 'admin/images/hotels/small/'.$filename;

            //             // resize image
            //             Image::make($image_tmp)->resize(800,400)->save($large_image_path);
            //             // Image::make($image_tmp)->resize(600,600)->save($medium_image_path);
            //             Image::make($image_tmp)->resize(160,45)->save($small_image_path);

            //             //  store image name in products table
            //             $hotelfile->file = $filename;
            //     }
            // }
            // }   

            // // public function store(Request $request)
            // // {
            //     if ($request->hasFile('filename')) {
            
            //         foreach($request->file('filename') as $file){
            
            //             //get filename with extension
            //             $filenamewithextension = $file->getClientOriginalName();
            
            //             //get filename without extension
            //             $filename = pathinfo($filenamewithextension, PATHINFO_FILENAME);
            
            //             //get file extension
            //             $extension = $file->getClientOriginalExtension();
            
            //             //filename to store
            //             $filenametostore = $filename.'_'.uniqid().'.'.$extension;
            
            //             Storage::put('admin/images/hotels/large/'. $filenametostore, fopen($file, 'r+'));
            //             Storage::put('admin/images/hotels/large/'. $filenametostore, fopen($file, 'r+'));
            
            //             //Resize image here
            //             $thumbnailpath = public_path('storage/admin/images/hotels/large/'.$filenametostore);
            //             $img = Image::make($thumbnailpath)->resize(400, 150, function($constraint) {
            //                 $constraint->aspectRatio();
            //             });
            //             $img->save($thumbnailpath);
            //         }
            
            //         return redirect('REDIRECT_URL')->with('status', "Image uploaded successfully.");
            //     }
            // // }

            // if($request->hasFile('filename'))
            // {
            //     $allowedfileExtension=['pdf','jpg','png','docx'];
            //     $files = $request->file('filename');

            //     foreach($files as $file){

            //         $filename = $file->getClientOriginalName();
            //         $extension = $file->getClientOriginalExtension();
            //         $check=in_array($extension,$allowedfileExtension);
            //         // dd($check);

            //         if($check)
            //         { 
            //             foreach ($request->filename as $photo) {
            //             $filename = $photo->store('filename');
            //                 HotelFile::create([
            //                     'id_item' => $hotel->id,
            //                     'file' => $filename
            //                 ]);
            //             }
            //             echo "Upload Successfully";
            //         }
            //             else
            //         {
            //             echo '<div class="alert alert-warning"><strong>Warning!</strong> Sorry Only Upload png , jpg , doc</div>';
            //         }
            //     }
            // }
           
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
        $hotelDetailsFile = DB::select(DB::raw("SELECT pm_hotel_file.* from pm_hotel_file where id_item = $id"));

        // dd($hotelDetailsFile);

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
        // $hotels = DB::table('pm_hotel')
        // ->leftJoin('pm_destination', 'pm_hotel.id_destination', '=', 'pm_destination.id')
        // ->leftJoin('pm_hotel_file', 'pm_hotel.id', '=', 'pm_hotel_file.id_item')
        // ->select(DB::raw('pm_hotel.id as hotelId, pm_hotel.class as hotelClass, pm_hotel.home as hotelHome, pm_hotel.checked as hotelChecked'),
        //         'pm_destination.name',  'pm_hotel.title',
        //         'pm_hotel.subtitle', DB::raw('pm_hotel_file.file'), 
        // )
        
        // ->get();

        $hotels = DB::select(DB::raw("SELECT 
        h.id as hotelId, 
        h.class as hotelClass,
        h.home as hotelHome, 
        h.checked as hotelChecked,
        h.title as hTitle, h.subtitle as hSubTitle,
        b.file,
        d.name
            FROM pm_hotel h
                LEFT JOIN  (SELECT id_item, file from pm_hotel_file GROUP BY id_item ) b ON b.id_item  = h.id
                LEFT JOIN pm_destination    d                                            ON d.id       = h.id_destination
        "));

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
