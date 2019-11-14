@extends('layouts.adminLayout.admin_design')
@section('content')

<form action="{{url('admin/destination/add-destination')}}" method="POST" enctype = "multipart/form-data" novalidate="novalidate" id="add-destination">
    {{ csrf_field() }}

<div class="card card-default">
    <div class="card-header">
        <h1 style="float:left; font-weight:100; font-size:24px;">
            <svg style="width:19px;" class="svg-inline--fa fa-wrench fa-w-16 fa-fw" style="wi" aria-hidden="true" data-fa-processed="" data-prefix="fas" data-icon="wrench" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path fill="currentColor" d="M481.156 200c9.3 0 15.12 10.155 10.325 18.124C466.295 259.992 420.419 288 368 288c-79.222 0-143.501-63.974-143.997-143.079C223.505 65.469 288.548-.001 368.002 0c52.362.001 98.196 27.949 123.4 69.743C496.24 77.766 490.523 88 481.154 88H376l-40 56 40 56h105.156zm-171.649 93.003L109.255 493.255c-24.994 24.993-65.515 24.994-90.51 0-24.993-24.994-24.993-65.516 0-90.51L218.991 202.5c16.16 41.197 49.303 74.335 90.516 90.503zM104 432c0-13.255-10.745-24-24-24s-24 10.745-24 24 10.745 24 24 24 24-10.745 24-24z"></path></svg>
            Чиглэл &nbsp;  
        </h1>    
        <a href="/admin/destination/add-destination" class="btn btn-danger rounded-0 btn-sm">
            <i class="fas fa-plus"></i>  &nbsp;Нэмэх
        </a>
        <a href="/admin/destination/view-destinations" class="btn btn-primary rounded-0 btn-sm">
            <i class="fas fa-reply"></i>  &nbsp;Буцах
        </a>
    </div>
        
    
    <div class="card-body  table-responsive ">

            <!-- text input -->
            <div class="form-group row">
                <label for="inputEmail3" class="col-sm-2 col-form-label text-right">Чиглэлийн нэр</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" id="destination_name" name="destination_name" value="" >
                </div>
            </div>
            <!-- text input -->
            <div class="form-group row">
                <label for="inputEmail3" class="col-sm-2 col-form-label text-right">title</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="destination_title" value=""  >
                </div>
            </div>
            <!-- text input -->
            <div class="form-group row">
                <label for="inputEmail3" class="col-sm-2 col-form-label text-right">Subtitle</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="destination_subtitle" value=""  >
                </div>
            </div>
            <!-- text input -->
            <div class="form-group row">
                <label for="inputEmail3" class="col-sm-2 col-form-label text-right">Title tag</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="destination_title_tag" value="">
                </div>
            </div>
            <!-- text input -->
            <div class="form-group row">
                <label for="inputEmail3" class="col-sm-2 col-form-label text-right">Alias</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="destination_alias" value="">
                </div>
            </div>
            <!-- text input -->
            <div class="form-group row">
                <label for="inputEmail3" class="col-sm-2 col-form-label text-right">Main text</label>
                <div class="col-sm-6">
                        <textarea class="textarea" name="destination_text" placeholder="Place some text here"
                        style="width: 100%; height: 300px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
                </div>
            </div>


             <!-- text input -->
            <div class="form-group row">
                <label for="inputEmail3" class="col-sm-2 col-form-label text-right">Video Url</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="destination_video" value="" placeholder="http://example.com"> 
                </div>
            </div>


            <!-- text input -->
            <div class="form-group row">
                <label for="inputEmail3" class="col-sm-2 col-form-label text-right">Latitude</label>
                <div class="col-sm-6">
                    <input type="number" class="form-control" name="destination_lat" value="0">
                </div>
            </div>


            <div class="form-group row">
                <label for="inputEmail3" class="col-sm-2 col-form-label text-right">Longitude</label>
                <div class="col-sm-6">
                    <input type="number" class="form-control" name="destination_lng" value=""  >
                </div>
            </div>


             <!-- text input -->
             <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label text-right">Ex-tax total</label>
                    <div class="col-sm-6">
                            <textarea  name="destination_descr" placeholder="Place some text here"
                            style="width: 100%; height: 100px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
                    </div>
                </div>


                
        {{-- release --}}
        <div class="form-group row">.
                <label for="inputEmail3" class="col-sm-2 col-form-label text-right">Release</label>
                
                <div class="col-sm-6">
                    <div class="icheck-primary d-inline">
                        <input type="radio" id="pub1" name="checked" checked="" value="1">
                        <label for="pub1">Published
                        </label>
                    </div>

                    <div class="icheck-primary d-inline">
                        <input type="radio" id="pub2" name="checked" value="2">
                        <label for="pub2"> Not published
                        </label>
                    </div>

                    <div class="icheck-primary d-inline">
                        <input type="radio" id="pub3" name="checked" value="0">
                        <label for="pub3">Awaiting
                        </label>
                    </div>

                    <div class="icheck-primary d-inline">
                        <input type="radio" id="pub4" name="checked" value="3">
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
                        <input type="radio" id="homepage1" name="homepage1" checked="" value="1">
                        <label for="homepage1">Тийм
                        </label>
                    </div>

                    <div class="icheck-primary d-inline">
                        <input type="radio" id="homepage2" name="homepage1" value="0">
                        <label for="homepage2"> Үгүй
                        </label>
                    </div>
                </div>
            </div>

             {{-- image --}}
        <div class="form-group row">
                <label for="inputEmail3" class="col-sm-2 col-form-label text-right">Зураг</label>

                <div class="col-sm-6">
                    <div class="controls">
                        <input type="file" name="filename" id="filename">
                    </div>
                </div>
        </div>

            
            
        </div>
        
        <div class="card-footer">
                {{-- <button type="submit">Хадгалах</button> --}}
                <div class="form-group">
                        <div class="col-sm-9 col-sm-offset-4">
                            <button type="submit" class="btn btn-primary" name="signup1" value="Sign up">Хадгалах</button>
                        </div>
                    </div>

        </div>
</div>

</form>
@endsection