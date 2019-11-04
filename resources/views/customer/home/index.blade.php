@extends('layouts.frontLayout.front_design')
@section('content')

<div class="container p-3">
    <form action="{{url('hotel/search') }}"  method="POST" enctype="multipart/form-data">
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
        </div>    {{-- row end --}}

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


<div class="container" style="margin-top:50px;">
        <h5 class="text-center">Хамгийн эрэлттэй буудлууд</h5>
        <div class="row">
            @foreach ($hotel as $h)

                <div class="col-lg-4  col-md-4">
                  <div class="card mb-4 box-shadow">
                    {{-- <img class="card-img-top" data-src="holder.js/100px225?theme=thumb&bg=55595c&fg=eceeef&text=Thumbnail" alt="Card image cap"> --}}
                    <img src="hotelpicture/hotel.jpg" alt="hotel_image" width="349" height="230" >
                    
                    <div class="card-body">
                      {{-- <p class="card-text">{{str_limit($h->descr,130) }}<br/></p> --}}
                      <div class="d-flex justify-content-between align-items-center">
                        <div class="btn-group">
                          <button type="button" class="btn btn-sm btn-outline-secondary">View</button>
                          <button type="button" class="btn btn-sm btn-outline-secondary">Edit</button>
                        </div>
                        <small class="text-muted">9 mins</small>
                      </div>
                    </div>
                  </div>
                </div>

              @endforeach
          </div>{{-- div row--}}
    
          {{-- <h5>Хямдралтай буудлууд</h5>
          <div class="row">
              @foreach ($hotel as $h)
  
                  <div class="col-lg-4  col-md-4">
                    <div class="card mb-4 box-shadow">
                      <img src="hotelpicture/hotel.jpg" alt="hotel_image" width="349" height="230" >
                      <div class="card-body">
                        <p class="card-text">{{str_limit($h->descr,130) }}<br/></p>
                        <div class="d-flex justify-content-between align-items-center">
                          <div class="btn-group">
                            <button type="button" class="btn btn-sm btn-outline-secondary">View</button>
                            <button type="button" class="btn btn-sm btn-outline-secondary">Edit</button>
                          </div>
                          <small class="text-muted">9 mins</small>
                        </div>
                      </div>
                    </div>
                  </div>
  
                @endforeach
            </div> --}}


  </div> {{-- div container --}}
 
 @endsection