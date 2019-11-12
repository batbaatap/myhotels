@extends('layouts.frontLayout.front_design')
@section('content')


<div class="section section-lg bg-primary overlay-dark text-white py-5"  data-background="../../img/hero.jpg" style="background-size:cover;background-image: url({{asset('customer/images/ub_20170414053231.jpg')}});">
    <div class="container">
    </div>
  </div>

  
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

<div class="row">
    <div class="col-md-8">
            @if(!empty('$hotels->file'))
                <img src="{{ asset ('admin/images/hotels/large/'.$item->file) }}" style="width:160px;margin: -92px 0px;">
            @endif   
    </div>
</div>


{{-- start of the world --}}
<div class="col-md-12 col-lg-9">
                   
        <div class="d-flex justify-content-between align-items-center flex-column flex-md-row">
            <div class="mr-3">
                {{-- <p class="mb-3 mb-md-0 font-small">Showing 0 - 8 of 62</p> --}}
            </div>
            <div class="nav-wrapper position-relative p-0">
                <ul class="nav nav-pills nav-pill-rounded" id="tab-34" role="tablist">
                    <li class="nav-item pr-0">
                        <a class="nav-link text-sm-center active" id="tab-link-example-13" data-toggle="tab" href="#link-example-13" role="tab" aria-controls="link-example-13" aria-selected="true">
                            <span class="nav-link-icon d-block">
                          <i class="fas fa-th-list"></i>
                        </span>
                        </a>
                    </li>
                    <li class="nav-item pr-0">
                        <a class="nav-link text-sm-center" id="tab-link-example-14" data-toggle="tab" href="#link-example-14" role="tab" aria-controls="link-example-14" aria-selected="false">
                            <span class="nav-link-icon d-block">
                    <i class="fas fa-th-large"></i>
                  </span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>


        <div class="tab-content mt-4" id="tabcontentexample-5">
            <div class="tab-pane fade show active" id="link-example-13" role="tabpanel" aria-labelledby="tab-link-example-13">
              @foreach ($hotels as $h)
              <div class="row">
                <div class="col-lg-12">
                        <div class="card card-article-wide shadow-sm flex-md-row no-gutters border-soft mb-4 animate-up-5">
                            <a href="single-space.html" class="col-md-4 col-lg-4">
                                <img src="https://i.pinimg.com/originals/a2/ef/f5/a2eff5dcc55aae1c935b862abb07f8ca.png" class="card-img-top" alt="image" 
                                style="background-position: center;
                                background-size: cover;
                                background-image:url({{asset('customer/images/narantuul.jpg')}}); ">
                            </a>
                            
                            <div class="card-body d-flex flex-column justify-content-between col-auto p-4">
                                <a href="single-space.html">
                                    <h4 class="font-weight-normal mb-0">{{ $h->title }}</h4>
                                </a>

                                <div class="post-meta">
                                    <span class="small lh-120">
                                        <i class="fas fa-map-marker-alt mr-2"></i>
                                        {{ $h->address }}
                                    </span>   
                                </div>

                                <div class="d-flex my-4">
                                    
                                    @php
                                        $i;
                                    @endphp

                                    @for ($i =0; $i < $h->class; $i++)
                                        <i class="star fas fa-star text-warning"></i>
                                    @endfor

                                    <span class="badge badge-pill badge-secondary ml-2">
                                        @php
                                            echo $i.' Одтой';
                                        @endphp
                                    </span>

                                </div>


                                <div>
                                    @php
                                    $arrA = [];
                                    $arrB = preg_split("/[\s,]+/", $h->facilities);
                                    
                                    @endphp 
                                    
                                    {{-- 
                                    @foreach ($arrB as $item)
                                    @foreach($facfile as $key=>$value) --}}
                                        
                                        {{-- {{ $item }} --}}

                                        {{-- @if ($key <= 10) --}}
                                            {{-- @if ($item == $value->id_item )
                                                    <span class="facility-icon"> 
                                                    <img data-toggle="tooltip" data-placement="top" title="{{$value->name}}" 
                                                    src="{{asset('admin/images/facility/'.$value->file )}}"  style="    
                                                        width: 19px;
                                                        height: 19px;
                                                        display: block;
                                                        opacity: 0.7;">
                                                    </span>
                                            @endif --}}
                                        {{-- @endif --}}
                                    {{-- @endforeach
                                    @endforeach --}}

                                    <a href="#">
                                        <div class="facility-icon" style="display:table-caption;">
                                            ... 
                                        </div>
                                    </a>
                                </div>
                            </div>

                            <div class="card-body d-flex flex-column justify-content-between col-md-3 p-4">
                                <div class="d-flex justify-content-between">
                                    <div class="col pl-0">
                                        <span class="text-muted font-small d-block mb-2">Үнэ / Хоног</span>
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
                                          <input type="hidden" value="{{$h->id}}" name="hotel" />
                                          <button class="btn btn-primary btn-block">Захиалах</button>

                                        </form>
                                      </div>
                                </div>

                            </div>
                        </div>
                  </div>
                </div>
                @endforeach
            </div>


            <div class="tab-pane fade" id="link-example-14" role="tabpanel" aria-labelledby="tab-link-example-14">
                <div class="row">
                    <div class="col-12 col-lg-6">
                        <!-- Card -->
                        <div class="card shadow-sm border-soft mb-4 animate-up-5">
                            <a href="./single-space.html" class="position-relative">
                                <img src="../../img/image-office.jpg" class="card-img-top" alt="image">
                                <span class="badge badge-primary position-absolute listing-badge">
                                        <span class="font-weight-normal font-xs">Office Space</span>
                                </span>
                            </a>
                            <div class="card-body">
                                <a href="./single-space.html">
                                    <h5 class="font-weight-normal">Collaborative Workspace</h5>
                                </a>
                                <div class="post-meta">
                                    <span class="small lh-120">
                                        <i class="fas fa-map-marker-alt mr-2"></i>New York, Manhattan, USA
                                    </span>
                                </div>
                                <div class="d-flex my-4">
                                    <i class="star fas fa-star text-warning"></i>
                                    <i class="star fas fa-star text-warning"></i>
                                    <i class="star fas fa-star text-warning"></i>
                                    <i class="star fas fa-star text-warning"></i>
                                    <i class="star fas fa-star text-warning"></i>
                                    <span class="badge badge-pill badge-secondary ml-2">5.0</span>
                                </div>
                                <div class="d-flex justify-content-between">
                                    <div class="col pl-0">
                                        <span class="text-muted font-small d-block mb-2">Monthly</span>
                                        <span class="h5 text-dark font-weight-bold">450$</span>
                                    </div>
                                    <div class="col">
                                        <span class="text-muted font-small d-block mb-2">People</span>
                                        <span class="h5 text-dark font-weight-bold">12</span>
                                    </div>
                                    <div class="col pr-0">
                                        <span class="text-muted font-small d-block mb-2">Sq.Ft</span>
                                        <span class="h5 text-dark font-weight-bold">1200</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End of Card -->
                    </div>
                    <div class="col mt-5 text-center">
                        <button class="btn btn-primary" type="submit">Show More</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- end of the world --}}





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
  {{-- {{ $hotels->links() }} --}}
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
  {{-- {{ $rooms->links() }} --}}
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
