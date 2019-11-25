@extends('layouts.adminLayout.admin_design')
@section('content')

<form action="{{ url('/admin/hotel/edit-hotel/'. $hotelDetails->id) }}" method="POST" enctype = "multipart/form-data" novalidate="novalidate" id="add-hotel">
    {{ csrf_field() }}


    @if(Session::has('flash_message_error'))
    <div class="alert alert-error alert-block">
        <button type="button" class="close" data-dismiss="alert">×</button> 
            <strong>{!! session('flash_message_error') !!}</strong>
    </div>
@endif   
@if(Session::has('flash_message_success'))
    <div class="alert alert-success alert-block">
        <button type="button" class="close" data-dismiss="alert">×</button> 
            <strong>{!! session('flash_message_success') !!}</strong>
    </div>
@endif


<div class="alert alert-warning alert-dismissible fade show" role="alert">
        Тохирох зургийн хэмжээ: 1400 x 800px
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>


    <div class="card card-default">
    <div class="card-header">
        <h1 style="float:left; font-weight:100; font-size:24px;">
            <svg style="width:19px;" class="svg-inline--fa fa-wrench fa-w-16 fa-fw" style="wi" aria-hidden="true" data-fa-processed="" data-prefix="fas" data-icon="wrench" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path fill="currentColor" d="M481.156 200c9.3 0 15.12 10.155 10.325 18.124C466.295 259.992 420.419 288 368 288c-79.222 0-143.501-63.974-143.997-143.079C223.505 65.469 288.548-.001 368.002 0c52.362.001 98.196 27.949 123.4 69.743C496.24 77.766 490.523 88 481.154 88H376l-40 56 40 56h105.156zm-171.649 93.003L109.255 493.255c-24.994 24.993-65.515 24.994-90.51 0-24.993-24.994-24.993-65.516 0-90.51L218.991 202.5c16.16 41.197 49.303 74.335 90.516 90.503zM104 432c0-13.255-10.745-24-24-24s-24 10.745-24 24 10.745 24 24 24 24-10.745 24-24z"></path></svg>
            Зочид буудал &nbsp;  
        </h1>    
        <a href="/admin/hotel/add-hotel" class="btn btn-danger rounded-0 btn-sm">
            <i class="fas fa-plus"></i>  &nbsp;Нэмэх
        </a>
        <a href="/admin/hotel/view-hotels" class="btn btn-primary rounded-0 btn-sm">
            <i class="fas fa-reply"></i>  &nbsp;Буцах
        </a>
    </div>


    <div class="card-body  table-responsive ">
         
        <!-- title -->
         <div class="form-group row">
            <label for="inputEmail3" class="col-sm-2 col-form-label text-right">Нэр</label>
            <div class="col-sm-6">
                <input type="text" class="form-control" id="hotel_title" name="hotel_title" value="{{$hotelDetails->title}}" >
            </div>
        </div>

        <!-- subtitle -->
        <div class="form-group row">
            <label for="inputEmail3" class="col-sm-2 col-form-label text-right">Subtitle</label>
            <div class="col-sm-6">
                <input type="text" class="form-control" id="hotel_subtitle" name="hotel_subtitle" value="{{$hotelDetails->subtitle}}" >
            </div>
        </div>

        <!-- subtitle -->
        <div class="form-group row">
            <label for="inputEmail3" class="col-sm-2 col-form-label text-right">Alias</label>
            <div class="col-sm-6">
                <input type="text" class="form-control" id="hotel_alias" name="hotel_alias" value="{{$hotelDetails->alias}}">
            </div>
        </div>

        <!-- desc -->
        <div class="form-group row">
            <label for="inputEmail3" class="col-sm-2 col-form-label text-right">Description</label>
            <div class="col-sm-6">
                <textarea class="textarea" name="hotel_description"  placeholder="Place some text here"
                          style="width: 100%; height: 300px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">
                        {{$hotelDetails->descr}}
                        </textarea>
            </div>
        </div>

        <div class="form-group row">
            <label for="inputEmail3" class="col-sm-2 col-form-label text-right">Facility сонгох </label>
            <div class="col-lg-6">
                <div class="card card-default">
                    <div class="card-body">
                        <div class="row">
                        <div class="col-12">
                            <div class="form-group">
                                <select class="duallistbox" multiple="multiple" name="hotel_facilities[]">
                                    {{-- @php
                                        $hotelFacValues = preg_split("/[\s,]+/", $hotelDetails->facilities);
                                    @endphp --}}

                                    {{-- @foreach ($hotelFacValues as $facValue)
                                        @foreach ($facilities as $key=>$realFac)
                                            @if ($facValue == $realFac->id)
                                              
                                            @endif
                                        @endforeach
                                    @endforeach --}}

                                    @php
                                    $arrB = preg_split("/[\s,]+/", $hotelDetails->facilities);
                                    @endphp 

                                    @foreach($arrB as $item)
                                    @foreach($facilities as $key=>$value)
                                        @php
                                            $selected = '';
                                        @endphp
                                        @if ($item == $value->id )
                                            @php
                                                $selected = 'selected="selected"';
                                            @endphp
                                        @endif
                                        <option value="{{ $value->id }}" {{ $selected }} />{{ $value->name }}</option>
                                    @endforeach
                                    @endforeach

                                </select>
                            </div>
                        </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        
        {{-- dest --}}
        <div class="form-group row">
            <label for="inputEmail3" class="col-sm-2 col-form-label text-right">Чиглэл</label>
                <div class="col-sm-6">
                    <select class="form-control" name="id_destination" style="width: 100%;">
                            <?php echo $dest_drop_down; ?>
                    </select>
                </div>
        </div>


        {{-- star --}}
        <div class="form-group row">.
            <label for="inputEmail3" class="col-sm-2 col-form-label text-right">Одны зэрэглэл</label>
            <div class="col-sm-6">
                <div class="icheck-primary d-inline">
                        
                {{-- <input type="checkbox" name="feature_item" id="feature_item" @if($productDetails->feature_item == "1") checked @endif value="1"> --}}

                <input type="radio" id="radioPrimary1" name="hotel_class"  @if($hotelDetails->class == "0") checked @endif  value="0">

                <label for="radioPrimary1">None
                </label>
                </div>
                <div class="icheck-primary d-inline">
                <input type="radio" id="radioPrimary2" name="hotel_class"  @if($hotelDetails->class == "1") checked @endif value="1">
                <label for="radioPrimary2">1 Од
                </label>
                </div>
                <div class="icheck-primary d-inline">
                <input type="radio" id="radioPrimary3" name="hotel_class"  @if($hotelDetails->class == "2") checked @endif value="2">
                <label for="radioPrimary3">2 Од
                </label>
                </div>
                <div class="icheck-primary d-inline">
                <input type="radio" id="radioPrimary4" name="hotel_class"  @if($hotelDetails->class == "3") checked @endif value="3">
                <label for="radioPrimary4">3 Од
                </label>
                </div>
                <div class="icheck-primary d-inline">
                <input type="radio" id="radioPrimary5" name="hotel_class"  @if($hotelDetails->class == "4") checked @endif value="4">
                <label for="radioPrimary5">4 Од
                </label>
                </div>
                <div class="icheck-primary d-inline">
                <input type="radio" id="radioPrimary6" name="hotel_class"  @if($hotelDetails->class == "5") checked @endif value="5">
                <label for="radioPrimary6">5 Од
                </label>
                </div>
            </div>
        </div>
            

        <!-- phone -->
        <div class="form-group row">
            <label for="inputEmail3" class="col-sm-2 col-form-label text-right">Утас</label>
            <div class="col-sm-6">
            <input type="number" class="form-control" id="hotel_phone" name="hotel_phone" value="{{$hotelDetails->phone}}" >
            </div>
        </div>

        <!-- phone -->
        <div class="form-group row">
            <label for="inputEmail3" class="col-sm-2 col-form-label text-right">Имэйл</label>
            <div class="col-sm-6">
                <input type="text" class="form-control" id="hotel_email" name="hotel_email" value="{{$hotelDetails->email}}" >
            </div>
        </div>
        <!-- web -->
        <div class="form-group row">
            <label for="inputEmail3" class="col-sm-2 col-form-label text-right">Web</label>
            <div class="col-sm-6">
                <input type="text" class="form-control" id="hotel_web" name="hotel_web" value="{{$hotelDetails->web}}" >
            </div>
        </div>
        <!-- address -->
        <div class="form-group row">
            <label for="inputEmail3" class="col-sm-2 col-form-label text-right">Address</label>
            <div class="col-sm-6">
                <input type="text" class="form-control" id="hotel_address" name="hotel_address" value="{{$hotelDetails->address}}" >
            </div>
        </div>
        <!-- lat -->
        <div class="form-group row">
            <label for="inputEmail3" class="col-sm-2 col-form-label text-right">lat</label>
            <div class="col-sm-6">
                <input type="text" class="form-control" id="hotel_lat" name="hotel_lat" value="{{$hotelDetails->lat}}" >
            </div>
        </div>
        <!-- long -->
        <div class="form-group row">
            <label for="inputEmail3" class="col-sm-2 col-form-label text-right">long</label>
            <div class="col-sm-6">
                <input type="text" class="form-control" id="hotel_long" name="hotel_long" value="{{$hotelDetails->lng}}" >
            </div>
        </div>
        

        {{-- release --}}
        <div class="form-group row">.
                <label for="inputEmail3" class="col-sm-2 col-form-label text-right">Release</label>
                
                <div class="col-sm-6">
                    <div class="icheck-primary d-inline">
                        <input type="radio" id="pub1" name="checked"  @if($hotelDetails->checked == "1") checked @endif   value="1">
                        <label for="pub1">Published
                        </label>
                    </div>

                    <div class="icheck-primary d-inline">
                        <input type="radio" id="pub2" name="checked"  @if($hotelDetails->checked == "2") checked @endif  value="2">
                        <label for="pub2"> Not published
                        </label>
                    </div>

                    <div class="icheck-primary d-inline">
                        <input type="radio" id="pub3" name="checked" @if($hotelDetails->checked == "0") checked @endif  value="0">
                        <label for="pub3">Awaiting
                        </label>
                    </div>

                    <div class="icheck-primary d-inline">
                        <input type="radio" id="pub4" name="checked" @if($hotelDetails->checked == "3") checked @endif  value="3">
                        <label for="pub4">Archived
                        </label>
                    </div>
                </div>
            </div>


        {{-- release --}}
        <div class="form-group row">.
                <label for="inputEmail3" class="col-sm-2 col-form-label text-right">Нүүр хуудас дээр гаргах</label>
                
                <div class="col-sm-6">
                    <div class="icheck-primary d-inline">
                        <input type="radio" id="homepage1" name="homepage1" @if($hotelDetails->home == "1") checked @endif   value="1">
                        <label for="homepage1">Тийм
                        </label>
                    </div>

                    <div class="icheck-primary d-inline">
                        <input type="radio" id="homepage2" name="homepage1" @if($hotelDetails->home == "0") checked @endif value="0">
                        <label for="homepage2"> Үгүй
                        </label>
                    </div>
                </div>
            </div>
            

        {{-- image --}}
        {{-- <div class="form-group row">
            <label for="inputEmail3" class="col-sm-2 col-form-label text-right">Зураг</label>
            <div class="col-sm-6">
                <input type="file" name="filename" id="filename"> 
                @if(!empty($hotelDetailsFile->file))
                    <input type="hidden" name="current_image" value="{{ $hotelDetailsFile->file }}" >
                    
                    <img src="{{ asset('admin/images/hotels/large/'.$hotelDetailsFile->file) }}" style="width:100px;height:100px;" > |
                    
                    <a href="{{ url('/admin/hotel/delete-hotel-image/'.$hotelDetailsFile->id_item) }}">Зураг устгах</a> 
                @endif
            </div>
        </div> --}}



        {{-- image --}}
        <div class="form-group row">
               <label for="inputEmail3" class="col-sm-2 col-form-label text-right">Зураг</label>
               <div class="col-md-6 ic">
                   <div class="input-group controls increment" >
                       {{-- File --}}
                       <input type="file" name="upload_files[]" id="upload_files"   multiple> 
                   </div>
               </div>
           </div>
       
           <div class="form-group row">
               <label for="inputEmail3" class="col-sm-2 col-form-label text-right"></label>
               <div class="col-md-10 ic bg-light pb-3">
                   <div  id="preview_file_div">
                       <ul class="ul-img pl-2"></ul>
                   </div>
               </div>
           </div>
           

        {{-- image --}}
        <div class="form-group row">
                <label for="inputEmail3" class="col-sm-2 col-form-label text-right"></label>
                <div class="col-md-10  ic bg-light pb-3">
                    <ul class="files-list sortable" id="files_list_2">

                            @foreach($hotelDetailsFile as $files)

                            <li id="file_26">
                                <div class="prev-file">
                                    {{-- <img src="/panda/medias/hotel/medium/26/516aa31ec69ef8-90048505.jpg" alt="" border="0"> --}}
                                    <img src="{{ asset('admin/images/hotels/large/'.$files->file) }}" title=''>

                                </div>
                                <div class="actions-file">
                                    <a class="image-link" href="{{ asset('admin/images/hotels/large/'.$files->file) }}  " target="_blank">
                                        <svg class="svg-inline--fa fa-search-plus fa-w-16 fa-fw" aria-hidden="true" data-fa-processed="" data-prefix="fas" data-icon="search-plus" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                            <path fill="currentColor" d="M304 192v32c0 6.6-5.4 12-12 12h-56v56c0 6.6-5.4 12-12 12h-32c-6.6 0-12-5.4-12-12v-56h-56c-6.6 0-12-5.4-12-12v-32c0-6.6 5.4-12 12-12h56v-56c0-6.6 5.4-12 12-12h32c6.6 0 12 5.4 12 12v56h56c6.6 0 12 5.4 12 12zm201 284.7L476.7 505c-9.4 9.4-24.6 9.4-33.9 0L343 405.3c-4.5-4.5-7-10.6-7-17V372c-35.3 27.6-79.7 44-128 44C93.1 416 0 322.9 0 208S93.1 0 208 0s208 93.1 208 208c0 48.3-16.4 92.7-44 128h16.3c6.4 0 12.5 2.5 17 7l99.7 99.7c9.3 9.4 9.3 24.6 0 34zM344 208c0-75.2-60.8-136-136-136S72 132.8 72 208s60.8 136 136 136 136-60.8 136-136z"></path>
                                        </svg>
                                        <!-- <i class="fas fa-fw fa-search-plus"></i> --></a>
                                    {{-- <svg class="svg-inline--fa fa-check fa-w-16 fa-fw text-muted" aria-hidden="true" data-fa-processed="" data-prefix="fas" data-icon="check" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                        <path fill="currentColor" d="M173.898 439.404l-166.4-166.4c-9.997-9.997-9.997-26.206 0-36.204l36.203-36.204c9.997-9.998 26.207-9.998 36.204 0L192 312.69 432.095 72.596c9.997-9.997 26.207-9.997 36.204 0l36.203 36.204c9.997 9.997 9.997 26.206 0 36.204l-294.4 294.401c-9.998 9.997-26.207 9.997-36.204-.001z"></path>
                                    </svg> --}}
                                    <!-- <i class="fas fa-fw fa-check text-muted"></i> -->
                                    {{-- <a class="tips" href="index.php?view=form&amp;id=1&amp;file=26&amp;csrf_token=20588128395ddb9fbb03fc88.91267600&amp;action=uncheck_file" title="" data-original-title="Unpublish">
                                        <svg class="svg-inline--fa fa-ban fa-w-16 fa-fw text-danger" aria-hidden="true" data-fa-processed="" data-prefix="fas" data-icon="ban" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                            <path fill="currentColor" d="M256 8C119.034 8 8 119.033 8 256s111.034 248 248 248 248-111.034 248-248S392.967 8 256 8zm130.108 117.892c65.448 65.448 70 165.481 20.677 235.637L150.47 105.216c70.204-49.356 170.226-44.735 235.638 20.676zM125.892 386.108c-65.448-65.448-70-165.481-20.677-235.637L361.53 406.784c-70.203 49.356-170.226 44.736-235.638-20.676z"></path>
                                        </svg> --}}
                                        <!-- <i class="fas fa-fw fa-ban text-danger"></i> --></a>
                                    {{-- <a class="tips" href="index.php?view=form&amp;id=1&amp;file=26&amp;csrf_token=20588128395ddb9fbb03fc88.91267600&amp;action=display_home_file" title="" data-original-title="Show on homepage">
                                        <svg class="svg-inline--fa fa-home fa-w-18 fa-fw text-danger" aria-hidden="true" data-fa-processed="" data-prefix="fas" data-icon="home" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512">
                                            <path fill="currentColor" d="M488 312.7V456c0 13.3-10.7 24-24 24H348c-6.6 0-12-5.4-12-12V356c0-6.6-5.4-12-12-12h-72c-6.6 0-12 5.4-12 12v112c0 6.6-5.4 12-12 12H112c-13.3 0-24-10.7-24-24V312.7c0-3.6 1.6-7 4.4-9.3l188-154.8c4.4-3.6 10.8-3.6 15.3 0l188 154.8c2.7 2.3 4.3 5.7 4.3 9.3zm83.6-60.9L488 182.9V44.4c0-6.6-5.4-12-12-12h-56c-6.6 0-12 5.4-12 12V117l-89.5-73.7c-17.7-14.6-43.3-14.6-61 0L4.4 251.8c-5.1 4.2-5.8 11.8-1.6 16.9l25.5 31c4.2 5.1 11.8 5.8 16.9 1.6l235.2-193.7c4.4-3.6 10.8-3.6 15.3 0l235.2 193.7c5.1 4.2 12.7 3.5 16.9-1.6l25.5-31c4.2-5.2 3.4-12.7-1.7-16.9z"></path>
                                        </svg> --}}
                                        <!-- <i class="fas fa-fw fa-home text-danger"></i> --></a>
                                    <a class="tips" href="javascript:if(confirm('Устгах уу? You will lose all not saved datas.')) window.location = 'index.php?view=form&amp;id=1&amp;file=26&amp;csrf_token=20588128395ddb9fbb03fc88.91267600&amp;action=delete_file';" title="" data-original-title="Delete">
                                        <svg class="svg-inline--fa fa-trash-alt fa-w-14 fa-fw text-danger" aria-hidden="true" data-fa-processed="" data-prefix="fas" data-icon="trash-alt" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                                            <path fill="currentColor" d="M0 84V56c0-13.3 10.7-24 24-24h112l9.4-18.7c4-8.2 12.3-13.3 21.4-13.3h114.3c9.1 0 17.4 5.1 21.5 13.3L312 32h112c13.3 0 24 10.7 24 24v28c0 6.6-5.4 12-12 12H12C5.4 96 0 90.6 0 84zm416 56v324c0 26.5-21.5 48-48 48H80c-26.5 0-48-21.5-48-48V140c0-6.6 5.4-12 12-12h360c6.6 0 12 5.4 12 12zm-272 68c0-8.8-7.2-16-16-16s-16 7.2-16 16v224c0 8.8 7.2 16 16 16s16-7.2 16-16V208zm96 0c0-8.8-7.2-16-16-16s-16 7.2-16 16v224c0 8.8 7.2 16 16 16s16-7.2 16-16V208zm96 0c0-8.8-7.2-16-16-16s-16 7.2-16 16v224c0 8.8 7.2 16 16 16s16-7.2 16-16V208z"></path>
                                        </svg>
                                        <!-- <i class="fas fa-fw fa-trash-alt text-danger"></i> --></a>
                                    <a href="{{ asset('admin/images/hotels/large/'.$files->file) }} " target="_blank">
                                        <svg class="svg-inline--fa fa-download fa-w-16 fa-fw" aria-hidden="true" data-fa-processed="" data-prefix="fas" data-icon="download" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                            <path fill="currentColor" d="M216 0h80c13.3 0 24 10.7 24 24v168h87.7c17.8 0 26.7 21.5 14.1 34.1L269.7 378.3c-7.5 7.5-19.8 7.5-27.3 0L90.1 226.1c-12.6-12.6-3.7-34.1 14.1-34.1H192V24c0-13.3 10.7-24 24-24zm296 376v112c0 13.3-10.7 24-24 24H24c-13.3 0-24-10.7-24-24V376c0-13.3 10.7-24 24-24h146.7l49 49c20.1 20.1 52.5 20.1 72.6 0l49-49H488c13.3 0 24 10.7 24 24zm-124 88c0-11-9-20-20-20s-20 9-20 20 9 20 20 20 20-9 20-20zm64 0c0-11-9-20-20-20s-20 9-20 20 9 20 20 20 20-9 20-20z"></path>
                                        </svg>
                                        <!-- <i class="fas fa-fw fa-download"></i> --></a>
                        
                                    {{-- <input type="checkbox" name="multiple_file[]" value="26"> --}}
                                </div>
                                <div class="infos-file">
                                    {{-- <input name="file_26_2_label" placeholder="Label" class="form-control" type="text" value=""> --}}
                                    <span class="filename">
                                        {{$files->file}}
                                    </span>
                                    <br>
                                    <span class="filesize">
                                        @php
                                            // create an image
                                        //  echo    getImageSize($files->file);
                                        @endphp
                                    </span>
                                </div>
                            </li>
                        
                            @endforeach
                
                        </ul>
                </div>
        </div>  

       
            
        
        <div class="card-footer">
                <div class="form-group">
                    <div class="col-sm-9 col-sm-offset-4">
                        <button type="submit" class="btn btn-primary" name="signup1" value="Sign up">Хадгалах</button>
                    </div>
                </div>
        </div>
    </div>

</form>
@endsection




<style>
.infos-file {
    padding: 10px;
}

ul.files-list {
    margin: 0;
    padding: 0;
    list-style-type: none;
}


ul.files-list > li {
    width: 240px;
    height: 264px;
    float: left;
    margin: 10px 20px 0 0;
    padding: 0;
    background: #fff;
    border: 1px solid #ddd;
    color: #666;
    font-size: 14px;
    position: relative;
}
    .prev-file {
    width: 238px;
    height: 135px;
    text-align: center;
    background: #fff;
    font-size: 14px;
}

.prev-file img {
    max-height: 135px;
    max-width: 240px;
}

    ul.ul-img.pl-2 {
    list-style: none;
}

ul.files-list > li {
    width: 240px;
    height: 264px;
    float: left;
    margin: 10px 20px 0 0;
    padding: 0;
    background: #fff;
    border: 1px solid #ddd;
    color: #666;
    font-size: 14px;
    position: relative;
}
    .list-files{
        width: 200px;
        height: 160px;
        float: left;
        margin: 10px 20px 0 0;
        padding: 0;
        background: #fff;
        border: 1px solid #ddd;
        color: #666;
        font-size: 14px;
        position: relative;
    }
    .ic-sing-file {
        width: 198px;
    height: 135px;
    text-align: center;
    background: #fff;
    font-size: 14px;
    }
   .actions-file {
    position: absolute;
    bottom: 10px;
    right: 10px;
    
    }
    .actions-file * {
    padding: 0px 2px;
    opacity: 0.6;
}

}
    .ic-sing-file img {
    max-height: 135px;max-width: 198px;
    }
   .cus-close {
        display: inline-block;
        padding: 0 5px;
        font-size: 15px;
        cursor: pointer;
    }
    .remov{
        position: absolute;
    right: 3px;
    top: 0;
    color: #337ab7;
    }
</style>