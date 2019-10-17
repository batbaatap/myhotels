@extends('layouts.frontLayout.front_design')
@section('content')


  @foreach ($rooms as $r)
    <div class="jumbotron"  >  
    
    <form action="{{url('roomcount') }}"  method="POST" enctype="multipart/form-data">
          @csrf <!-- {{ csrf_field() }} -->
       <input   id="searchA" type="hidden" name="datefrom33" class="form-control datefrom float-right datetime1 ">
       <input  id="searchB" type="hidden" name="dateto33" class="form-control dateto  float-right datetime2">
       <input type="hidden" value="{{$r->id}}" name="roome"/>{{ $r->title }} {{-- opoonii id --}}

   </form>

        <input type="number"   min="1" max="5" placeholder="тоо">
        
    </div>
  @endforeach
  <a href="#" class="btn btn-primary float-right" > Захиалах </a>
@endsection