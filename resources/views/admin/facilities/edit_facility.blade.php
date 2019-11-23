@extends('layouts.adminLayout.admin_design')
@section('content')
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

<form action="{{ url('/admin/facility/edit-facility/'. $facDetails->id) }}" method="POST" enctype = "multipart/form-data" novalidate="novalidate">
    {{ csrf_field() }}

{{-- <form class="form-horizontal" method="post" action="{{ url('admin/edit-category/'.$categoryDetails->id) }}" 
    name="add_category" id="add_category" novalidate="novalidate"> --}}

    <div class="card card-default">
        <div class="card-header">
            <h1 style="float:left; font-weight:100; font-size:24px;">
                <svg style="width:19px;" class="svg-inline--fa fa-wrench fa-w-16 fa-fw" style="wi" aria-hidden="true" data-fa-processed="" data-prefix="fas" data-icon="wrench" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path fill="currentColor" d="M481.156 200c9.3 0 15.12 10.155 10.325 18.124C466.295 259.992 420.419 288 368 288c-79.222 0-143.501-63.974-143.997-143.079C223.505 65.469 288.548-.001 368.002 0c52.362.001 98.196 27.949 123.4 69.743C496.24 77.766 490.523 88 481.154 88H376l-40 56 40 56h105.156zm-171.649 93.003L109.255 493.255c-24.994 24.993-65.515 24.994-90.51 0-24.993-24.994-24.993-65.516 0-90.51L218.991 202.5c16.16 41.197 49.303 74.335 90.516 90.503zM104 432c0-13.255-10.745-24-24-24s-24 10.745-24 24 10.745 24 24 24 24-10.745 24-24z"></path></svg>
                Үйлчилгээ &nbsp;  
            </h1>    
            <a href="/admin/facility/add-facility" class="btn btn-danger rounded-0 btn-sm">
                <i class="fas fa-plus"></i>  &nbsp;Нэмэх
            </a>
            <a href="/admin/facility/view-facilities" class="btn btn-primary rounded-0 btn-sm">
                <i class="fas fa-reply"></i>  &nbsp;Буцах
            </a>
        </div>

    <div class="card-body  table-responsive ">

            <!-- text input -->
            <div class="form-group row">
                <label for="inputEmail3" class="col-sm-2 col-form-label text-right">Нэр </label>
                <div class="col-sm-6">
                    <input type="text" name="facility_name" class="form-control" value="{{$facDetails->name}}" placeholder="">
                </div>
            </div>

            {{-- <!-- text input -->
            <div class="form-group row">
                <label for="inputEmail3" class="col-sm-2 col-form-label text-right">Нэр </label>
                <div class="col-sm-6">
                    <input type="text" name="firstname" class="form-control" value="{{$facDetails->name}}" placeholder="">
                </div>
            </div> --}}

            <div class="form-group row">
                <label class="col-sm-2 col-form-label text-right">Зураг</label>
                <div class="col-sm-6">
                    <input type="file" name="filename" id="filename"> 
                        @if(!empty($facfileDetails->file))
                            <input type="hidden" name="current_image" value="{{ $facfileDetails->file }}">
                            
                            <img src="{{ asset('admin/images/facility/'.$facfileDetails->file) }}"> |
                            
                            <a href="{{ url('/admin/facility/delete-facility-image/'.$facfileDetails->id_item) }}">Зураг устгах</a> 
                        @endif
                </div>
            </div>
        
    </div>
    
    <div class="card-footer">
        <div class="form-group">
            <div class="col-sm-9 col-sm-offset-4">
                <button type="submit" class="btn btn-primary">Хадгалах</button>
            </div>
        </div>
    </div>
    </div>

</form>
@endsection