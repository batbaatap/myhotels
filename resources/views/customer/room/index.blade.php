@extends('layouts.frontLayout.front_design')
@section('content')
<div class="container">  


 {{-- @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif --}}


  @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                <li>Талбаруудыг бүтэн бөглөнө үү</li>
                @foreach ($errors->all() as $error)
                    {{-- <li>{{ $error }}</li> --}}
                @endforeach
            </ul>
        </div>
    @endif


  @foreach ($hotels as $h)
      <div class="row">  

          <div class="col">
              <p>end zurag bga</p>
              {{ $h->facilities}}
          </div>

          <div class="col">
              <div class="row">  
                  <div class="col">
                    <h6>Хаяг:</h6>{{ $h->address}}
                  </div>
                  <div class="col">
                      <h6>Холбоо барих утас:</h6>{{ $h->phone}}
                  </div>
              </div>
              <h5>{{ $h->title}}</h5>
          </div>

       </div>
  @endforeach

<form id="booking_room"  action="/booking/booking-details" >
  @foreach ($rooms as $r)

      <div class="row">  
              <div class="col-md-10 bg-light p-3  mb-3">

                      <div class="row">
                          <div class="col">
                              {{-- <img src={{ $h->file }} height="42" width="42"><br/> --}}
                              <p>end zurag bga</p>
                          </div>

                          <div class="col">
                              <h5> <input type="hidden" value="{{$r->id}}" name="roome"/>{{ $r->title }} <br/> </h5>
                              {{ $r->facilities }} 
                          </div>

                          <div class="col">
                              <p> Багтаамж:   <i class="fa fa-male" aria-hidden="true"></i> x {{$r->max_people}}</p>
                              <input type="number" name="uruu" class="form-control custom-selects listen-room-too" min="0" max="{{$r->uruunii_zuruu}}"  placeholder="өрөө" onkeyup = "this.value = minmaxfuncz(this.value, 0, {{$r->uruunii_zuruu}} )"><br/>
                              <input type="number"  name="hun" class="form-control"   min="0" max="{{$r->max_people}}" placeholder="хүн"><br/>
                              <button type="button" class="btn btn-outline-primary btn-block">Дэлгэрэнгүй</button>
                          </div>

                          <div class="col">
                              ${{$r->price}} price/ night
                          </div>

                          <div class="col">
                            <p>calendar</p>
                          </div>

                      </div>  
              </div>   {{-- col-md-10 bg-light p-3  mb-3 --}}

       </div>  {{-- row div --}}
  @endforeach

<div class="row">  
              <div class="col-md-10  p-3 mb-3">

                  <a href="javascript:history.back()" class="btn btn-primary float-left"> Буцах</a>

                    <form id="booking_room"  action="/booking/booking-details" >
                      @foreach ($hotels as $h)

                         {{-- <input type="number" name="hh" class="form-control custom-selects listen-room-too" min="0" max="{{$r->uruunii_zuruu}}" placeholder="өрөө" onkeyup = "this.value = minmaxfuncz(this.value, 0, {{$r->uruunii_zuruu}} )"><br/>
                              <input type="number"  name="pp" class="form-control"   min="0" max="{{$r->max_people}}" placeholder="хүн"><br/> --}}

                        <button class="btn btn-primary float-right" onclick ="getData2();">Дараах</button>
                          <input type="hidden" value="{{$h->id}}"  name="hotelId">
                        @endforeach
                    </form>

            </div>  
  </div>  {{-- row div --}}
</form>
</div>  


@endsection
