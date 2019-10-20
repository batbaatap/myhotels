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
                      <input type="hidden" value="{{$r->id}}" name="roome"/>{{ $r->title }} <br/>
                      {{ $r->facilities }} 
                  </div>

                  <div class="col">
                     <p>Өрөөний багтаамж:</p><br/>
                     <input type="number" class="form-control"   min="1" max="{{$r->uruunii_zuruu}}" placeholder="өрөө"><br/>
                      
                     <input type="number" class="form-control"   min="1" max="{{$r->max_people}}" placeholder="хүн">
                  </div>
                  <div class="col">
                     {{$r->price}}$
                   <p>гадаад хүн:</p>
                  </div>

                  <div class="col">
                     
                   <p>calendar</p>
                  </div>
        </div>  
    </div>

  @endforeach


   <a href="hotel" class="btn btn-primary float-left" > Буцах</a>
  <a href="#" class="btn btn-primary float-right" > Захиалах </a>


</div>  

@endsection