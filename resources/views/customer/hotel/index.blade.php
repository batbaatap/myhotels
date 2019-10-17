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
    <button type="submit" onclick="getData()" class="btn btn-primary">Хайх</button>

  </div>
</form>
  </div>
{{-- <script type="text/javascript">
       
    $('#searchA,#searchB,#searchC,#searchD,#searchR').focus(function(event){
        $valueA=$('#searchA').val();
        $valueB=$('#searchB').val();
        $valueC=$('#searchC').val();
        $valueD=$('#searchD').val();
        $valueR=$('#searchR').val();
       
        console.log($valueA,$valueB,$valueC,$valueD,$valueR);
    $.ajax({
        type : 'get',
        url  : '{{URL::to('hotelsearch')}}',
        data :{'datefrom':$valueA, 'dateto':$valueB,'datefrom':$valueC, 'room_quantity':$valueD,'person_quantity':$valueR},
        success:function(data){
    $('.ger-list-ajax').html(data);
        console.log(data);
        urgeljluulehtovch();
    }
    });
    })
    
    </script>
  <script type="text/javascript">
    $.ajaxSetup({ headers: { 'csrftoken' : '{{ csrf_token() }}' } }); 
    </script>--}}
    
        {{-- @if(Session::has('flash_message_success'))
	            <div class="alert alert-success alert-block">
	                <button type="button" class="close" data-dismiss="alert">×</button> 
	                    <strong>{!! session('flash_message_success') !!}</strong>
	            </div>
	        @endif
	        @if(Session::has('flash_message_error'))
	            <div class="alert alert-error alert-block" style="background-color:#f4d2d2">
	                <button type="button" class="close" data-dismiss="alert">×</button> 
	                    <strong>{!! session('flash_message_error') !!}</strong>
	            </div>
    		@endif   --}}

  @foreach ($hotel as $h)
    <div class="jumbotron" >
        {{ $h->title }}
        {{-- <button>захиалах</button> --}}
        
        {{-- <a href="{{ url('roomsearch') }}" class="btn btn-primary" name="hotel" value="{{$h->id}}">Захиалах</a> --}}
     {{-- <a href="{{ url('roomsearch') }}"> </a>
      --}}

      <form action="{{url('roomsearch') }}"  method="POST" enctype="multipart/form-data">
          @csrf <!-- {{ csrf_field() }} -->
       <input   id="searchA" type="hidden" name="datefrom22" class="form-control datefrom float-right datetime1 ">
       <input  id="searchB" type="hidden" name="dateto22" class="form-control dateto  float-right datetime2">
        <input id="searchC" type="hidden" class="form-control room_quantity"  name="room_quantity22" min="1" max="5" placeholder="өрөөний тоо">
        <input id="searchD" type="hidden" class="form-control person_quantity"  name="person_quantity22" min="1" max="5" placeholder="хүний тоо">
       <input type="hidden" value="{{$h->id}}" name="hotel"/><button>захиалах</button>
   </form>

    </div>
  @endforeach


          {{-- <select id="destination" name="destination" class="form-control ">
            @foreach ($destination  as $des)
              <option value="{{$des->id}}" >{{ $des->name }}</option>
            @endforeach
          </select> --}}

 @endsection
 

