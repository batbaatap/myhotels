@extends('layouts.frontLayout.front_design')
@section('content')
 <div class="container">
<form action="{{url('hotelsearch') }}"  method="POST" enctype="multipart/form-data">
@csrf <!-- {{ csrf_field() }} -->
  <div class="row">

        <div class="col">
          <select id="searchR" name="destination" class="form-control destination">
            @foreach ($destination  as $des)
              <option value="{{$des->id}}" >{{ $des->name }}</option>
            @endforeach
          </select>
        </div>

        <div class="col">
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

        <div class="col">
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

        <div class="col">
          <input id="searchC" type="number" class="form-control room_quantity"  name="room_quantity" min="1" max="5" placeholder="өрөөний тоо">
        </div>

        <div class="col">
          <input id="searchD" type="number" class="form-control person_quantity"  name="person_quantity" min="1" max="5" placeholder="хүний тоо">
        </div>
    <button type="submit" onclick="getDate()" class="btn btn-primary">Хайх</button>

  </div>
</form>
  </div>

<div  class="container">
  <div  class="row">

        <div  class="col-sm-2">
          @include('layouts.frontLayout.front_sidebar')
        </div>

          <div  class="col-sm-10">
                @foreach ($hotel as $h)
                  <div class="jumbotron" >
                    <div  class="row">
                         <div class="col">
                            {{-- <img src={{ $h->file }} height="42" width="42"><br/> --}}
                            <p>end zurag bga</p>
                        </div>

                        <div class="col">
                            <h5>{{ $h->title }}</h5>
                            {{ $h->subtitle }}<br/>
                              <i class="fa fa-map-marker" aria-hidden="true"></i> {{ $h->address }}<br/>
                            {{ $h->descr}}<br/>
                            {{ $h->facilities}}<br/>
                          
                          {{-- form --}}
                          {{-- form --}}
                          {{-- form --}}
                          <form action="{{url('roomsearch') }}"  method="POST" enctype="multipart/form-data">
                                  @csrf <!-- {{ csrf_field() }} -->
                                  <input   id="searchA" type="hidden" name="datefrom22" class="form-control datefrom float-right datetime1 ">
                                  <input  id="searchB" type="hidden" name="dateto22" class="form-control dateto  float-right datetime2">
                                  <input id="searchC" type="hidden" class="form-control room_quantity"  name="room_quantity22" min="1" max="5" placeholder="өрөөний тоо">
                                  <input id="searchD" type="hidden" class="form-control person_quantity"  name="person_quantity22" min="1" max="5" placeholder="хүний тоо">
                                  </div>  
                                  <div class="col">  
                                          <p>From $8 / night</p>
                                          <button type="button" class="btn btn-outline-primary">Дэлгэрэнгүй</button><br/><br/>
                                          <input type="hidden" value="{{$h->id}}" name="hotel"/> <button >Захиалах</button>
                                        </div> 
                          </form>

                        </div>
                  </div>
                @endforeach
            </div>
     </div>
   </div>
 @endsection
 

