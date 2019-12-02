@extends('layouts.frontLayout.front_design')
@section('content')

{{-- <div class="section section-lg bg-primary overlay-dark text-white pt-3"  data-background="../../img/hero.jpg" style="background-size:cover;background-image: url({{asset('customer/images/ub_20170414053231.jpg')}});">
    <div class="container">
    </div>
  </div> --}}
  
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


    {{-- Section 1 --}}
    <div class="row">
       
        <div class="col-lg-8 pr-0" >
            {{-- @if(!empty('$hotels->file')) --}}
                {{-- <div style="height:560px; background-image:url({{ asset ('admin/images/hotels/large/'.$item->file) }});background-size:cover;background-position:center center;" ></div> --}}

                    <style>
                        .carousel-indicators .active{
                            background: #0b3e59;
                        } 
                        .carousel-indicators li{
                            background: #868686;
                        }
                        .carousel-indicators{
                            bottom: -5px;
                        }
                    </style>

                <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                     <ol class="carousel-indicators">
                         @foreach( $hotFile as $info )
                             <li data-target="#carouselExampleIndicators" data-slide-to="{{ $loop->index }}" class="{{ $loop->first ? 'active' : '' }}"></li>
                         @endforeach
                     </ol>
     
                    <div class="carousel-inner">
                        @foreach ($hotFile as $info)
                            <div class="carousel-item  {{ $loop->first ? 'active' : '' }}">
                                    
                                        {{-- <p class="mt-3 font-weight-bold" style="display:inline-block;color:#0b3e59;">{{$info->title}} </p> --}}
                                        <img class="d-block w-100" src="{{ asset ('admin/images/hotels/large/'.$info->file) }}"  style="width:100%;height:400px;" alt="">
                                        {{-- <img class="d-block w-100" src="{{ asset ('admin/images/hotels/large/'.$item->file) }}" alt="First slide"> --}}
                                        <div class="content">
                                            {{-- <p class="mt-3 fontss-weight-bold" style="display:inline-block;color:#0b3e59;">{{$info->small_title}}</p> --}}
                                            {{-- <a class="mt-3" style="float: right;text-decoration: underline;" href="/info/{{$info->id}}">Дэлгэрэнгүй</a> --}}
                                            {{-- {!! str_limit($info->description, 1000)  !!}  --}}
                                        </div>
                                </div>

                        @endforeach
                    </div>

                    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                      </a>
                      <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                      </a>

                </div> {{--car--}}

                  {{-- <ol class="carousel-indicators">
                        <li data-target="#carousel-thumb" data-slide-to="0" class="active">
                          <img src="https://mdbootstrap.com/img/Photos/Others/Carousel-thumbs/img%20(88).jpg" width="100">
                        </li>
                        <li data-target="#carousel-thumb" data-slide-to="1">
                          <img src="https://mdbootstrap.com/img/Photos/Others/Carousel-thumbs/img%20(121).jpg" width="100">
                        </li>
                        <li data-target="#carousel-thumb" data-slide-to="2">
                          <img src="https://mdbootstrap.com/img/Photos/Others/Carousel-thumbs/img%20(31).jpg" width="100">
                        </li>
                      </ol> --}}


          
             

            {{-- @endif    --}}
        </div>

        @foreach ($hotels as $item)

        <div class="col-lg-4   pl-0 pt-0">
            <div class="bg-white" style="padding:15px; padding-bottom:35px; height:100%;">
        {{-- style="padding-left:15px; padding-top:15px; height:100%;" --}}
                {{-- title --}}
                <div class="title">
                    <p class="m-0" style="font-size: 1.375rem;
                    font-weight: 700;
                    color: #015bd4;">{{$item->title}}</p>
                </div>


                {{-- star --}}
                @php
                $i;
                @endphp

                @for ($i =0; $i < $item->class; $i++)
                <i class="star fas fa-star text-warning"></i>
                @endfor
                
                <span class="badge badge-pill badge-secondary ml-2">
                @php
                    echo $i.' Одтой';
                    @endphp
                </span>
                
                <hr class="hotel-hr">



                {{-- facilites --}}
                <div>
                    @php
                    $arrA = [];
                    $arrB = preg_split("/[\s,]+/", $item->facilities);
                    
                    @endphp 
                    
                    @foreach ($arrB as $x)
                    @foreach($facfile as $key=>$value) 
                        {{-- {{ $item }}  --}}
                            @if ($key <= 10) 
                                @if ($x == $value->id_item )
                                    <span class="facility-icon" style="vertical-align:middle;"> 
                                        <img data-toggle="tooltip" data-placement="top" title="{{$value->name}}" 
                                        src="{{asset('admin/images/facility/'.$value->file )}}"  style="width: 19px; height: 19px; display: block; opacity: 0.7;">
                                    </span> 
                                
                                    <span class="pr-3" style="vertical-align:middle;">
                                        {{$value->name}}
                                    </span>
                            @endif 
                            @endif 
                        @endforeach
                    @endforeach

                    <a href="#">
                        <div class="facility-icon" style="">
                            ... 
                        </div>
                    </a>
                </div>
                
                <hr class="hotel-hr">
        

            {{-- Address --}}
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d5352.863954360801!2d106.922977966507!3d47.912775335772174!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x2db89d3695ee24a2!2sThe%20Continental%20Hotel!5e0!3m2!1sen!2sus!4v1573559160228!5m2!1sen!2sus" width="100%" height="55" frameborder="0" style="border:0;" allowfullscreen=""></iframe>
                <div class="post-meta">
                    <span class="small lh-120">
                        <i class="fas fa-map-marker-alt mr-1"></i>
                        {{$item->address}}
                    </span>   

                    <span class="small lh-120">
                        <i class="fas fa-phone ml-2 mr-1"></i>
                        {{$item->phone}}
                    </span>   
                </div>

            {{-- Тнаилцуулга --}}
            <div class="mt-2">
                <p style="word-wrap: break-word;">{{ str_limit(strip_tags($item->descr), 50) }}</p>
               
                <a class="btn btn-outline-primary btn-sm" style="float:right; margin-top:7px;" data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
                    Дэлгэрэнгүй  
                    {{-- <input type="button" value="{{$item->phone}}"  name="hotelId"> --}}
                </a>
            
                <div class="collapse" id="collapseExample">
                    {{ str_limit(strip_tags($item->descr), -100) }}
                </div>
            </div>
            

        </div>
        </div>


      @endforeach
    </div>
    {{-- End Section 1 --}}

  

    {{-- <input type="number" name="hh" class="form-control custom-selects listen-room-too" min="0" max="{{$r->uruunii_zuruu}}" placeholder="өрөө" onkeyup = "this.value = minmaxfuncz(this.value, 0, {{$r->uruunii_zuruu}} )"><br/>
         <input type="number"  name="pp" class="form-control"   min="0" max="{{$r->max_people}}" placeholder="хүн"><br/> --}}

    
       
   

    {{-- Section 2 --}}
    <div class="row mt-2">     
              
        @foreach ($rooms as $r)

            <div class="col-lg-12">

                        <div class="card card-article-wide shadow-sm flex-md-row no-gutters border-soft mb-4 animate-up-5">

                            @foreach ($roomfile as $item)
                            @if ($item->id_item == $r->id)
                                
                            <a href="javascript:" class="col-md-3 ">
                                <img src="https://i.pinimg.com/originals/a2/ef/f5/a2eff5dcc55aae1c935b862abb07f8ca.png" class="card-img-top" alt="image" 
                                style="background-position: center;
                                background-size: cover;
                                background-image:url({{asset('admin/images/rooms/large/'.$item->file)}}); ">
                            </a>
                            @endif
                            
                            @endforeach

                            <div class="card-body  d-flex flex-column col-md-3 p-2">
                                <a href="javascript:" style="margin-bottom: 12px;" >
                                        <input type="hidden" value="{{$r->id}}" name="room_id"/>
                                        
                                         {{-- <div class="rnam" data-id={{$r->id}}> --}}
                                            <h4 class="font-weight-normal mb-0">{{ $r->title }}</h4>
                                         {{-- </div> --}}
                                   
                                </a>

                                <div class="post-meta">
                                    <span class="small lh-120">
                                        {{-- <i class="fas fa-map-marker-alt mr-2"></i> --}}
                                        {{-- {{ $r->address }} --}}
                                    </span>   
                                </div>
{{-- 
                                <div class="d-flex my-2">
                                    
                                    @php
                                        $i;
                                    @endphp --}}

                                    {{-- @for ($i =0; $i < $r->class; $i++)
                                        <i class="star fas fa-star text-warning"></i>
                                    @endfor --}}

                                    {{-- <span class="badge badge-pill badge-secondary ml-2">
                                        @php
                                            echo $i.' Одтой';
                                        @endphp
                                    </span>

                                </div> --}}


                                <div>
                                    @php
                                    $arrA = [];
                                    $arrB = preg_split("/[\s,]+/", $r->facilities);
                                    @endphp 

                                    @foreach ($arrB as $item)
                                    @foreach($facfile as $key=>$value) 

                                       @if ($key <= 10) 
                                           @if ($item == $value->id_item )
                                                    <span class="facility-icon"> 
                                                    <img data-toggle="tooltip" data-placement="top" title="{{$value->name}}" 
                                                    src="{{asset('admin/images/facility/'.$value->file )}}"  style="    
                                                        width: 19px;
                                                        height: 19px;
                                                        display: block;
                                                        opacity: 0.7;">
                                                    </span>
                                            @endif 
                                       @endif 

                                    @endforeach
                                    @endforeach 

                                    <a href="#">
                                        <div class="facility-icon" style="display:table-caption;">
                                            ... 
                                        </div>
                                    </a>

                                </div>
                            </div>



                            <div class="card-body  d-flex flex-column col-auto p-2 
                            "  >
                                    <div class="col">
                                        <p> Багтаамж:   <i class="fa fa-male" aria-hidden="true"></i> x {{$r->max_people}}</p>
                                        <div class="input-group input-group-lg mb-3 mb-lg-0 kk">
                                            <div class="input-group-prepend"><span class="input-group-text">Өрөө:</span></div>
                                            <input type="number" name="uruu" class="form-control custom-selects listen-room-too " min="0" max="{{$r->uruunii_zuruu}}" value="0"  onkeyup = "this.value = minmaxfuncz(this.value, 0, {{$r->uruunii_zuruu}} )"><br/>
                                        </div><br/>
                                        
                                        <div class="input-group input-group-lg mb-3 mb-lg-0">
                                            <div class="input-group-prepend"><span class="input-group-text">Хүн:</span></div>
                                            <input type="number"  name="hun" class="form-control"   min="0" max="{{$r->max_people}}" value="0" onkeyup = "this.value = minmaxfuncz(this.value, 0, {{$r->max_people}} )"><br/>
                                        </div><br/>

                                        {{-- <input type="number" name="uruu" class="form-control custom-selects listen-room-too" min="0" max="{{$r->uruunii_zuruu}}" value="0"  placeholder="өрөө" onkeyup = "this.value = minmaxfuncz(this.value, 0, {{$r->uruunii_zuruu}} )"><br/> --}}
                                        {{-- <input type="number"  name="hun" class="form-control"   min="0" max="{{$r->max_people}}" placeholder="хүн"><br/> --}}
                                        {{-- <button type="button" class="btn btn-outline-primary btn-block">Дэлгэрэнгүй</button> --}}
                                    </div>
                            </div>

                            <div class="card-body d-flex flex-column  col-auto p-2">
                                <span class="text-muted font-small d-block mb-2">Үнэ / Хоног</span>

                                <?php $k=0; //rate dotor hotel id нь байгаа эсэхийг шалгаж буй тоолуур ?>
                                        @foreach ($rate_discount as $room_discount) 
                                            @if($r->id == $room_discount->id_room)
                                            <?php $k++;  ?>
                                                <span class="h5 text-dark font-weight-bold" style="text-decoration: line-through;font-style:italic;">	
                                                {{$room_discount->price}}Ŧ
                                                </span>
                                                <span class="h5 text-dark font-weight-bold"> - </span>
                                                <span class="h5 text-dark font-weight-bold hongololttei_une" style="color:red!important;"><?php echo $room_discount->price-(($room_discount->price*$room_discount->discount)/100 )?>Ŧ</span> 
                                            
                                            @endif
                                        @endforeach
                                        
                                        @foreach ($rate as $room_rate) <!--хямдрал нь дууссан ч rate table-s хасагдаагүй өрөө тус бүрийн хамгийн бага үнэтэйг нь гаргасан -->
                                            @if($r->id == $room_rate->id_room)
                                                    <?php $k++;  ?>
                                                    <span class="h5 text-dark font-weight-bold" style="text-decoration: line-through;font-style:italic;">	
                                                    {{$room_rate->price}}Ŧ
                                                    </span>
                                                    <span class="h5 text-dark font-weight-bold"> - </span>
                                                    <span class="h5 text-dark font-weight-bold hongololttei_une" style="color:red!important;">{{$room_rate->price}}Ŧ</span> 
                                            @endif
                                        @endforeach
                                        
                                        <?php if($k==0){?>
                                                
                                                <!--herwee rate dotor hotel id нь байхгүй бол хамгийн хямд өрөөний үнийн мэдээллийг харуулах-->
                                                <span class="h5 text-dark font-weight-bold" style="text-decoration: line-through;font-style:italic;">	
                                                    {{$r->price}}Ŧ
                                                </span>
                                                {{-- <span class="h5 text-dark font-weight-bold"> - </span> --}}
                                                <span class="h5 text-dark font-weight-bold hongololttei_une" style="color:red!important;">{{$r->price}}Ŧ</span> 
                                                
                                        <?php }?>
                                            {{-- <span class="h5 text-dark font-weight-bold" style="text-decoration: line-through;font-style:italic;">	
                                                240,0000Ŧ
                                            </span>
                                            <span class="h5 text-dark font-weight-bold"> - </span>
                                            <span class="h5 text-dark font-weight-bold" style="color:red!important;">168,000Ŧ</span>  --}}
                            </div>

                            <div class="card-body  d-flex flex-column col-md-3 p-2">
                                <div class="d-flex justify-content-between">
                                    <div class="col pl-0">
                                        
                                        {{-- Lorem ipsum dolor, sit amet consectetur adipisicing elit. Debitis saepe  --}}

                                        {{-- <span class="text-muted font-small d-block mb-2">Үнэ / Хоног</span>
                                        <span class="h5 text-dark font-weight-bold" style="text-decoration: line-through;font-style:italic;">	
                                            240,000Ŧ
                                        </span>

                                      <span class="h5 text-dark font-weight-bold"> - </span>
                                      
                                      <span class="h5 text-dark font-weight-bold" style="color:red!important;">168,000Ŧ</span> 
                                      
                                        <form action="{{url('room/search') }}" method="POST" enctype="multipart/form-data">
                                          @csrf
                                          <input id="searchA" type="hidden" name="datefrom22" class="form-control datefrom float-right datetime1 ">
                                          <input id="searchB" type="hidden" name="dateto22" class="form-control dateto  float-right datetime2">
                                          <input id="searchC" type="hidden" class="form-control room_quantity" name="room_quantity22" min="1" max="5" placeholder="өрөөний тоо">
                                          <input id="searchD" type="hidden" class="form-control person_quantity" name="person_quantity22" min="1" max="5" placeholder="хүний тоо">

                                          <button type="button" class="btn btn-outline-primary btn-block my-2">Дэлгэрэнгүй</button>
                                          <input type="hidden" value="{{$r->id}}" name="hotel" />
                                          <button class="btn btn-primary btn-block">Захиалах</button>

                                        </form> --}}
                                      </div>
                                </div>
                            </div>

                        </div>
                  </div>
        @endforeach
        </div>
    {{-- End of Section 2--}}

{{-- 

    <form id="booking_room"  action="/booking/booking-details" >
        @foreach ($rooms as $r)
            <div class="row">  
                <div class="col-md-10 bg-light p-3  mb-3">
                    <div class="row">

                        {{-- <div class="col">
                            <h5> <input type="hidden" value="{{$r->id}}" name="roome"/>{{ $r->title }} <br/> </h5>
                            {{ $r->facilities }} 
                        </div> --}}
{{-- 
                        <div class="col">
                            ${{$r->price}} price/ night
                        </div>

                        <div class="col">
                        <p>calendar</p>
                        </div> --}}

                    {{-- </div>   --}}
                {{-- </div>   col-md-10 bg-light p-3  mb-3 --}}
            {{-- </div>  row div --}}
    {{-- @endforeach --}} 
    

    {{-- {{ $rooms->links() }} --}}
        <div class="row">  
              <div class="col-md-12  p-3 mb-3">
                   
                    <a href="javascript:history.back()" class="btn btn-primary float-left"> Буцах</a>

                    <form id="booking_room"  action="/booking/booking-details" >
                        @foreach ($hotels as $h)

                         {{-- <input type="number" name="hh" class="form-control custom-selects listen-room-too" min="0" max="{{$r->uruunii_zuruu}}" placeholder="өрөө" onkeyup = "this.value = minmaxfuncz(this.value, 0, {{$r->uruunii_zuruu}} )"><br/>
                              <input type="number"  name="pp" class="form-control"   min="0" max="{{$r->max_people}}" placeholder="хүн"><br/> --}}

                            <input type="hidden" value="{{$h->id}}"  name="hotelId">
                            
                        <button class="btn btn-primary float-right " id="button" onclick ="getData2(); ">Дараах</button>
                        @endforeach
                    </form>
            </div>  
        </div>  {{-- row div --}}
</form>
</div>  
{{-- </div>   --}}



   


  
@endsection

