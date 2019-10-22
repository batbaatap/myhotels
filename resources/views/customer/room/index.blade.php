@extends('layouts.frontLayout.front_design')
@section('content')
<div class="container">  
 
  @foreach ($hotels as $h)
      {{ $h->title}}
      {{ $h->address}}
  @endforeach

  @foreach ($rooms as $r)

    <div class="jumbotron"  >  
        <div class="row">  
           
            <div class="col">
                {{-- <img src={{ $h->file }} height="42" width="42"><br/> --}}
                <p>end zurag bga</p>
            </div>

            <div class="col">
                <input type="hidden" value="{{$r->id}}" name="roome" class="roome"/>{{ $r->title }} <br/>
                {{ $r->facilities }} 
            </div>

            <div class="col">
                <p>Өрөөний багтаамж:</p><br/>
                <input type="number" class="form-control custom-selects listen-room-too" min="0" max="{{$r->uruunii_zuruu}}" placeholder="өрөө" onkeyup = "this.value = minmaxfuncz(this.value, 0, {{$r->uruunii_zuruu}} )"><br/>
                
                <input type="number" class="form-control"   min="0" max="{{$r->max_people}}" placeholder="хүн">
            </div>

            <div class="col">
                {{$r->price}}$/ night
            </div>

            <div class="col">
              <p>calendar</p>
            </div>

        </div>  
    </div>
  @endforeach


  <a href="javascript:history.back()" class="btn btn-primary float-left"> Буцах</a>

    <form action="/booking/booking-details">
      @foreach ($hotels as $h)
        <button class="btn btn-primary float-right" onclick ="getData2();">Дараах</button>
          <input type="hidden" value="{{$h->id}}" name="hotelId">
        @endforeach
    </form>

</div>  

@endsection
