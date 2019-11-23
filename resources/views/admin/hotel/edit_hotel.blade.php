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
        <div class="form-group row">
            <label for="inputEmail3" class="col-sm-2 col-form-label text-right">Зураг</label>
            <div class="col-sm-6">
                <input type="file" name="filename" id="filename"> 
                @if(!empty($hotelDetailsFile->file))
                    <input type="hidden" name="current_image" value="{{ $hotelDetailsFile->file }}" >
                    
                    <img src="{{ asset('admin/images/hotels/large/'.$hotelDetailsFile->file) }}" style="width:100px;height:100px;" > |
                    
                    <a href="{{ url('/admin/hotel/delete-hotel-image/'.$hotelDetailsFile->id_item) }}">Зураг устгах</a> 
                @endif
            </div>
        </div>


        {{-- image --}}
        <div class="form-group row">
            <label for="inputEmail3" class="col-sm-2 col-form-label text-right">Зураг</label>
                <div class="col-md-6 ic">
                    <div class="input-group controls increment" >
                        <input type="file" id="inputGroupFile01" name="filename[]" multiple  class="imgInp form-control" aria-describedby="inputGroupFileAddon01">
                    </div>


                    @for ($i = 0; $i < count($hotelDetailsFile); $i++)
                    <div class="clone hide">
                        <div class="control-group input-group" style="margin-top:10px">
                                <input type="file" id="inputGroupFile01"  name="filename[]" multiple  class="imgInp form-control  aria-describedby="inputGroupFileAddon01">
                                <div class="input-group-btn"> 
                                    <button class="btn btn-danger rounded-0" type="button"><i class="glyphicon glyphicon-remove "></i> x </button>
                                </div>
                            </div>
                        </div> 
                    @endfor
                    
                    
                    <div class="input-group-btn mt-2"> 
                        <button class="btn btn-primary add-primary-el" type="button"><i class="glyphicon glyphicon-plus"></i>Add</button>
                    </div>
                </div>
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