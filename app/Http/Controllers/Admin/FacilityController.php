<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Image;
use App\Facility;
use App\FacilityFile;
use DB;

class FacilityController extends Controller
{
    // add Product 
    public function addFacility(Request $request) {
        
        if($request->isMethod('post')){
   
                $data = $request->all();
            
                $facility = new Facility;
                $facility->lang = 2;
                $facility->name = $data['facility_name'];
                $facility->save();

                
                // facility file save
                $facilityFile = new FacilityFile;
                $facilityFile->lang = 2;
                $facilityFile->id_item = $facility->id;
                $facilityFile->home = 0;
                $facilityFile->checked = 1;
                $facilityFile->rank = $facility->id;
                
                // upload image
                if($request->hasFile('filename')){
                $image_tmp = $request->file('filename');
                    if($image_tmp->isValid()){
                        $extension = $image_tmp->getClientOriginalExtension();
                        $filename =  rand(111, 99999).".".$extension;
                        $large_image_path = 'admin/images/facility/'.$filename;
                        // $medium_image_path = 'admin/images/facility/'.$filename;
                        // $small_image_path = 'admin/images/facility/'.$filename;

                        // resize image
                        Image::make($image_tmp)->resize(19,19)->save($large_image_path);
                        // Image::make($image_tmp)->resize(600,600)->save($medium_image_path);
                        // Image::make($image_tmp)->resize(300,300)->save($small_image_path);

                        //  store image name in products table
                        $facilityFile->file = $filename;
                    }
                }
                
                $facilityFile->save();

            // return redirect('/admin/view-facilities');
            return view('admin.facilities.add_facility');
        }

        return view('admin.facilities.add_facility');
    }

    

    // edit
    public function editFacility(Request $request, $id=null){
        if($request->isMethod('post')){
            // getting info from user
            $data = $request->all();

            // upload image
            if($request->hasFile('filename')){
                $image_tmp = $request->file('filename');
                    if($image_tmp->isValid()){
                        $extension = $image_tmp->getClientOriginalExtension();
                        $filename =  rand(111, 99999).".".$extension;
                        $large_image_path = 'admin/images/facility/'.$filename;
                        // $medium_image_path = 'admin/images/facility/'.$filename;
                        // $small_image_path = 'admin/images/facility/'.$filename;

                        // resize image
                        Image::make($image_tmp)->resize(19,19)->save($large_image_path);
                        // Image::make($image_tmp)->resize(600,600)->save($medium_image_path);
                        // Image::make($image_tmp)->resize(300,300)->save($small_image_path);

                        //  store image name in products table
                        $facilityFile->file = $filename;
                    }
                } else if(!empty($data['current_image'])){
                    $filename = $data['current_image'];
                } else {
                    $filename = '';
                }

             
            $facility->lang = 2;
            $facility->name = $data['facility_name'];
            $facility->save();


            // facility file save
            $facilityFile->lang = 2;
            $facilityFile->id_item = $facility->id;
            $facilityFile->home = 0;
            $facilityFile->checked = 1;
            $facilityFile->rank = $facility->id;

            
            Facility::where(['id'=>$id])->update([
                'status'=>$status,
                'category_id'  =>$data['category_id'],
                'post_title' =>$data['post_title'],
                'post_content'  =>$data['post_content'],
                'image'  => $filename
                ]);
                return redirect()->back()->with('flash_message_success','Амжилттай шинэчлэгдлээ');
        }
        // ..request
      
        // get details
        // $facDetails = DB::table('pm_facility')
        // ->join('pm_facility_file', 'pm_facility.id', '=', 'pm_facility_file.id_item')
        // ->select('pm_facility.*', 'pm_facility_file.*')
        // ->get();
 
        // get details
        $facDetails = Facility::where(['id'=>$id])->first();
        $facfileDetails = FacilityFile::where(['id_item'=>$id])->first();

        return view('admin.facilities.edit_facility')->with(compact('facDetails', 'facfileDetails'));
    }


// view posts
    public function viewFacilities(Request $request){
        $fac = DB::table('pm_facility')
            ->join('pm_facility_file', 'pm_facility.id', '=', 'pm_facility_file.id_item')
            ->select('pm_facility.id', 'pm_facility.name', 'pm_facility_file.file')
            ->get();

      

        return view('admin.facilities.view_facilities')->with(compact('fac'));
    }


// delete product image
    public function deletePostImage($id=null) {

        // get post image name
        $postImage = Post::where(['id'=>$id])->first();

        // Get Post image Paths
        $large_image_path = 'images/backend_images/posts/large/';
        $medium_image_path = 'images/backend_images/posts/medium/';
        $small_image_path = 'images/backend_images/posts/small/';

        // Delete large image if not exists in folder
        if(file_exists($large_image_path.$postImage->image)){
            unlink($large_image_path.$postImage->image);
        }
        if(file_exists($medium_image_path.$postImage->image)){
            unlink($medium_image_path.$postImage->image);
        }
        if(file_exists($small_image_path.$postImage->image)){
            unlink($small_image_path.$postImage->image);
        }

        Post::where(['id'=>$id])->update(['image'=>'']);
        return redirect()->back()->with('flash_message_success', 'Зураг устгагдлаа');
        }
    

    public function deletePost($id=null) {
        Post::where(['id'=>$id])->delete();
        return redirect()->back()->with('flash_message_success', 'Нийтлэл устгагдлаа');
    }

}
