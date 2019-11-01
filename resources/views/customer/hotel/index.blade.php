@extends('layouts.frontLayout.front_design')
@section('content')
 <div class="container p-3">
<form id="form" action="{{url('hotel/search') }}"  method="POST" enctype="multipart/form-data" >
  @csrf <!-- {{ csrf_field() }} -->
    <div class="row">

        <div class="col-sm-12 col-md-12 col-lg-2 ">
          <select id="searchR" name="destination" class="form-control destination" placeholder="очих газар">
            @foreach ($destination  as $des)
              <option value="{{$des->id}}" >{{ $des->name }} </option>
            @endforeach
          </select>
        </div>

        <div class="col-sm-6  col-md-6 col-lg-2">
            {{-- <input id="searchA" type="date" name="datefrom" class="form-control datefrom float-right  datetime1" > --}}
              
                     <div class="form-group">
                        {{-- Booking In: --}}
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text ">
                                    <i class="far fa-calendar-alt"></i>
                                </span>
                            </div>
                            <input  type="text" name="datefrom" class="form-control datefrom float-right datetime1">
                        </div>
                    </div>
        </div>

        <div class="col-sm-6  col-md-6 col-lg-2">
            {{-- <input id="searchB" type="date" name="dateto" class="form-control dateto float-right  datetime2" > --}}
                 <div class="form-group">
                        {{-- Booking Out: --}}
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text ">
                                    <i class="far fa-calendar-alt"></i>
                                </span>
                            </div>
                            <input   type="text" name="dateto" class="form-control dateto  float-right datetime2">
                        </div>
                    </div>
      
        </div>

        <div class="col-sm-6  col-md-6 col-lg-2">
          <input id="searchC" type="number" class="form-control room_quantity"  name="room_quantity" min="1" max="5" placeholder="өрөөний тоо">
        </div>

        <div class="col-sm-6  col-md-6 col-lg-2">
          <input id="searchD" type="number" class="form-control person_quantity"  name="person_quantity" min="1" max="5" placeholder="хүний тоо">
        </div>
        <div class="col-sm-12  col-md-12 col-lg-2"><button type="submit" onclick="getDate()" class="btn btn-primary btn-block">Хайх</button>    </div>
  </div>
{{-- </form> --}}
  </div>

<div  class="container">
  <div  class="row">

        <div  class="col-sm-2">

                  {{-- <div class="dropdown">
                      <button class="btn btn-block btn-info dropdown-toggle " type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Од
                      </button>
                      <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">--}}
                        
                     {{--   @for ($k = 1,$ide = 5; $k <= 5; $k++,$ide-- )
                            
                          <div class="checkbox">
                             <label>
                                <input type="checkbox" onchange="$('#form').submit();"  name="checkbox" value="{{$ide}}" class="checkbox"/>
                                    @for ($i =$k; $i <= 5; $i++)
                                    <i class="far fa-star"></i>
                                    @endfor
                                </label>
                          </div>

                        @endfor    
                            


                        </div>
                  </div><br/> --}}
                  
  {{-- dropdown  rating --}}
                          <div class="checkbox">
                             <label>
                                <input type="checkbox" store="checkbox1"  onchange="$('#form').submit();"  id="searchA" name="check[]" value="05" class="checkbox"/>
                                    <i class="far fa-star"></i>
                                    <i class="far fa-star"></i>
                                    <i class="far fa-star"></i>
                                    <i class="far fa-star"></i>
                                    <i class="far fa-star"></i>
                                </label>
                          </div>
                           <div class="checkbox">
                             <label>
                                <input type="checkbox" store="checkbox2" onchange="$('#form').submit();" id="searchA" name="check[]" value="04" class="checkbox"/>
                                    <i class="far fa-star"></i>
                                    <i class="far fa-star"></i>
                                    <i class="far fa-star"></i>
                                    <i class="far fa-star"></i>
                                </label>
                          </div>
                           <div class="checkbox">
                             <label>
                                <input type="checkbox" store="checkbox3" onchange="$('#form').submit();" id="searchA" name="check[]" value="03" class="checkbox"/>
                                    <i class="far fa-star"></i>
                                    <i class="far fa-star"></i>
                                    <i class="far fa-star"></i>
                                </label>
                          </div>
                          <div class="checkbox">
                             <label>
                                <input type="checkbox" store="checkbox4" onchange="$('#form').submit();" id="searchA" name="check[]" value="02" class="checkbox"/>
                                    <i class="far fa-star"></i>
                                    <i class="far fa-star"></i>
                                </label>
                          </div>
                          <div class="checkbox">
                             <label>
                                <input type="checkbox" store="checkbox5" onchange="$('#form').submit();" id="searchA" name="check[]" value="01" class="checkbox"/>
                                    <i class="far fa-star"></i>
                                </label>
                          </div>
                         
              {{-- бүх үйлчилгээ--}}
  
                      <a name="" id="clears" class="btn btn-link float-right" href="javascript:void(0);" role="button">clear</i></a> {{-- үйлчилгээ clear--}}
                      @foreach ($fac as $ee){{-- бүх үйлчилгээнүүдээ хэвлэж байгаа хэсэг --}}
                          <div class="checkbox">
                            <label>
                              <input type="checkbox" facility="{{$ee->id}}" onchange="$('#form').submit();" id="searchA" name="checkbox[]" value="{{$ee->id}}" class="checkbox"/>
                              {{ $ee->name}}<br/>
                            </label>
                          </div>
                      @endforeach
    </div>
</form>

  

  



          <div  class="col-sm-10"  >

                @foreach ($hotel as $h)
                  <div class="jumbotron  p-5 mb-4" >
                    <div  class="row">
                         <div class="col-lg-4 col-md-4  col-sm-12">
                            {{-- <img src={{ $h->file }} height="42" width="42"><br/> --}}
                            <img src="hotelpicture/hotel.jpg" alt="hotel_image" width="250" height="150" >
                        </div>

                        <div class="col-lg-6 col-md-5 col-sm-8">
                            <h5>{{ $h->title }}
                              @for ($i =0; $i < $h->class; $i++)
                                <small>  <i class="far fa-star"></i></small>
                              @endfor
                            </h5>

                            {{ $h->subtitle }}<br/>
                              <i class="fa fa-map-marker" aria-hidden="true"></i> {{ $h->address }}<br/>
                              {{str_limit($h->descr,130) }}<br/>
                                {{ $h->facilities}}<br/>
                          
                          {{-- form --}}
                          {{-- form --}}
                          {{-- form --}}
                            <form action="{{url('room/search') }}"  method="POST" enctype="multipart/form-data">
                                  @csrf <!-- {{ csrf_field() }} -->
                                  <input   id="searchA" type="hidden" name="datefrom22" class="form-control datefrom float-right datetime1 ">
                                  <input  id="searchB" type="hidden" name="dateto22" class="form-control dateto  float-right datetime2">
                                  <input id="searchC" type="hidden" class="form-control room_quantity"  name="room_quantity22" min="1" max="5" placeholder="өрөөний тоо">
                                  <input id="searchD" type="hidden" class="form-control person_quantity"  name="person_quantity22" min="1" max="5" placeholder="хүний тоо">
                        </div>  
                                <div class="col-lg-2 col-md-3 col-sm-2">  
                                  <p>From $8 / night</p>
                                  <button type="button" class="btn btn-outline-primary btn-block">Дэлгэрэнгүй</button><br/>
                                  <input type="hidden" value="{{$h->id}}" name="hotel"/> <button class="btn  btn-success btn-block" >Захиалах</button>
                                </div> 
                                 
                          </form>

                    </div> {{-- row div --}}
                  </div>
                @endforeach
            </div>
     </div>
   </div>
 @endsection

