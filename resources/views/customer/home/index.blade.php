@extends('layouts.frontLayout.front_design')
@section('content')


<div class="container">
<form action="{{url('hotelsearch') }}"  method="POST" enctype="multipart/form-data">
@csrf <!-- {{ csrf_field() }} -->
  <div class="row">

        <div class="col-lg-4 col-md-12  col-sm-12">
          <select id="searchR" name="destination" class="form-control destination" >
            @foreach ($destination  as $des)
              <option value="{{$des->id}}" >{{ $des->name }} </option>
            @endforeach
          </select>
        </div>

        <div class="col-lg-4 col-md-6  col-sm-12">
            {{-- <input id="searchA" type="date" name="datefrom" class="form-control datefrom float-right  datetime1" > --}}
              
                     <div class="form-group">
                        {{-- Booking In: --}}
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text ">
                                    <i class="far fa-calendar-alt"></i>
                                </span>
                            </div>
                            <input  id="searchA" type="text" name="datefrom" class="form-control datefrom float-right datetime1">
                        </div>
                    </div>
        </div>

        <div class="col-lg-4 col-md-6  col-sm-12">
            {{-- <input id="searchB" type="date" name="dateto" class="form-control dateto float-right  datetime2" > --}}
                 <div class="form-group">
                        {{-- Booking Out: --}}
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text ">
                                    <i class="far fa-calendar-alt"></i>
                                </span>
                            </div>
                            <input  id="searchB" type="text" name="dateto" class="form-control dateto  float-right datetime2">
                        </div>
                    </div>
      
        </div>
  
</div>      
<div class="row">
        <div class="col-lg-5 col-md-5  col-sm-12">
          <input id="searchC" type="number" class="form-control room_quantity"  name="room_quantity" min="1" max="5" placeholder="өрөөний тоо">
        </div>

        <div class="col-lg-5 col-md-5  col-sm-12">
          <input id="searchD" type="number" class="form-control person_quantity"  name="person_quantity" min="1" max="5" placeholder="хүний тоо">
        </div>

        <div class="col-lg-2 col-md-2  col-sm-12">
           <button type="submit" onclick="getDate()" class="btn btn-primary btn-block">Хайх</button>
        </div>
</div>

</form>
  </div>


 @endsection