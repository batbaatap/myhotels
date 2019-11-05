@extends('layouts.frontLayout.front_design') @section('content')


<div class="section section-lg bg-primary overlay-dark text-white py-5"  data-background="../../img/hero.jpg" style="background-image: url({{asset('customer/images/ub_20170414053231.jpg')}});">
  <div class="container">
      <div class="row justify-content-center pt-5">
          <div class="col-12">
              <!-- Heading -->
              <h1 class="display-2"><span class="font-weight-light">Зочид буудлууд</span></h1>
              <!-- Text -->
              <p class="lead text-muted mt-4">Орон даяар 150,000 буудал байгаагаас &amp; манайд 1500 байршиж байна
                  <br>Discover and reserve space today.</p>
          </div>
      </div>
  </div>
</div>



<main>
    <section class="section pt-5 pt-lg-6">
        <div id="spaces-container" class="container">
            <div class="row">
               <aside class="col-12 col-lg-3 mt-3 mt-lg-0 d-none d-lg-block z-2">
                    <div id="filters-sidebar">
                        <form id="form" action="{{url('hotel/search') }}" method="POST" class="sidebar-inner" enctype="multipart/form-data">
                          @csrf

                            <div class="card shadow-sm border-soft mt-4 p-3">
                                <h6 class="font-weight-bold">Зэрэглэл</h6>
                                <ul class="list-group list-group list-group-flush">
                                    <li class="list-group-item border-0 py-1 px-0 d-flex align-items-center justify-content-between">
                                        <div class="form-check">
                                            <label class="form-check-label">
                                                {{-- <input class="form-check-input" type="checkbox"> --}}
                                                
                                                <input type="checkbox" store="checkbox1"  class="form-check-input" onchange="$('#form').submit();" id="searchA" name="check[]" value="05"  />
                                                <i class="far fa-star"></i>
                                                <i class="far fa-star"></i>
                                                <i class="far fa-star"></i>
                                                <i class="far fa-star"></i>
                                                <i class="far fa-star"></i>
                                                
                                                <span class="form-check-sign"></span> 
                                            </label>
                                        </div>
                                    </li>

                                    <li class="list-group-item border-0 py-1 px-0 d-flex align-items-center justify-content-between">
                                        <div class="form-check">
                                            <label class="form-check-label">
                                                
                                                <input type="checkbox" store="checkbox2" onchange="$('#form').submit();" id="searchA" name="check[]" value="04" class="form-check-input" />
                                                <i class="far fa-star"></i>
                                                <i class="far fa-star"></i>
                                                <i class="far fa-star"></i>
                                                <i class="far fa-star"></i>
                                                
                                                <span class="form-check-sign"></span>
                                            </label>
                                        </div>
                                    </li>

                                    <li class="list-group-item border-0 py-1 px-0 d-flex align-items-center justify-content-between">
                                        <div class="form-check">
                                            <label class="form-check-label">

                                              <input type="checkbox" store="checkbox3" onchange="$('#form').submit();" id="searchA" name="check[]" value="03" class="form-check-input" />
                                                <i class="far fa-star"></i>
                                                <i class="far fa-star"></i>
                                                <i class="far fa-star"></i>
                                                <span class="form-check-sign"></span>

                                            </label>
                                        </div>
                                    </li>

                                    <li class="list-group-item border-0 py-1 px-0 d-flex align-items-center justify-content-between">
                                        <div class="form-check">
                                            <label class="form-check-label">

                                                <input type="checkbox" store="checkbox4" onchange="$('#form').submit();" id="searchA" name="check[]" value="02" class="form-check-input
                                                orm-check-input" />
                                                <i class="far fa-star"></i>
                                                <i class="far fa-star"></i>
                                                <span class="form-check-sign"></span> 

                                            </label>
                                        </div>
                                    </li>

                                    <li class="list-group-item border-0 py-1 px-0 d-flex align-items-center justify-content-between">
                                        <div class="form-check">
                                            <label class="form-check-label">
                                                
                                                <input type="checkbox" store="checkbox5" onchange="$('#form').submit();" id="searchA" name="check[]" value="01" class="form-check-input" />
                                                <i class="far fa-star"></i>
                                                <span class="form-check-sign"></span> 

                                            </label>
                                        </div>
                                    </li>

                                </ul>
                            </div>

                              
                            <div class="card shadow-sm border-soft mt-4 p-3">
                              <h6 class="font-weight-bold">Үйлчилгээ</h6>
                            <ul class="list-group list-group list-group-flush"> 
                                   @foreach ($fac as $ee) 
                                  {{-- бүх үйлчилгээнүүдээ хэвлэж байгаа хэсэг --}}
                                    
                                     <li class="list-group-item border-0 py-1 px-0 d-flex align-items-center justify-content-between">
                                      <div class="form-check">
                                        <label class="form-check-label">
                                            {{ $ee->name}}
                                            <input type="checkbox" facility="{{$ee->id}}" onchange="$('#form').submit();" id="searchA" name="checkbox[]" value="{{$ee->id}}" class="form-check-input" />
                                              <span class="form-check-sign"></span> 
                                        </label>
                                      </div>
                                    </li>
                                  @endforeach 
                               </ul>
                            </div>

                             <button class="btn btn-sm btn-block btn-primary animate-up-2 mt-4" type="submit">Apply filters</button> 
                        </form>
                    </div>
                </aside>



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
                        
                        
                                              
                          @foreach ($hotel as $h)
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
                                                    echo $i.'.0';
                                                @endphp
                                                </span>
                                            </div>
                                            <div>
                                              
                                              @php

                                                // $arh = [];
                                                
                                                // $a = str_split($h->facilities, 1);
                                                // $f = explode('', $h->facilities);
                                                // array_push($arrHotel, $a);

                                                $arrFacOrig = [];
                                                $result = '';

                                                foreach ($facall as $value) {
                                                  array_push($arrFacOrig, $value->id);
                                                  echo $value->id;
                                                }

                                                // echo $f[1];
                                                // str_replace(",",$h->facilities);


                                                
                                                // $axe = [];
                                                // $output  = str_replace(',', '', $h->facilities);
                                                // $splitter = str_split($output, 1);
                                                $splitter = preg_split("/[\s,]+/", $h->facilities);
                                                // array_push($axe, $splitter);

                                                // echo $splitter[0];
                                                // print_r($splitter);
                                                // $diff_result = array_diff($arrFacOrig, $splitter);
                                                // print_r ($arrFacOrig);
                                                // echo '<br>';
                                                // print_r ($splitter);

                                                $result = array_intersect($arrFacOrig, $splitter);

                                                print_r($result);

                                                // print_r($result);

                                              // print_r(array_diff_assoc($splitter, $arrFacOrig));
                                              
                                              @endphp

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

                            <div class="row">
                                <div class="col mt-3 d-flex justify-content-center">
                                    <nav aria-label="Page navigation example">
                                        <ul class="pagination">
                                            <li class="page-item disabled">
                                                <a class="page-link" tabindex="-1" href="#">
                                                    < </a>
                                            </li>
                                            <li class="page-item">
                                                <a class="page-link" href="#">1</a>
                                            </li>
                                            <li class="page-item active">
                                                <a class="page-link" href="#">2</a>
                                            </li>
                                            <li class="page-item">
                                                <a class="page-link" href="#">3</a>
                                            </li>
                                            <li class="page-item">
                                                <a class="page-link" href="#">4</a>
                                            </li>
                                            <li class="page-item">
                                                <a class="page-link" href="#">5</a>
                                            </li>
                                            <li class="page-item">
                                                <a class="page-link" href="#">></a>
                                            </li>
                                        </ul>
                                    </nav>
                                </div>
                            </div>


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
               
            </div>
        </div>
    </section>
    <!-- End of section -->
</main>














<div class="container p-3">
        <!-- {{ csrf_field() }} -->
        <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-2 ">
                <select id="searchR" name="destination" class="form-control destination" placeholder="очих газар">
                    @foreach ($destination as $des)
                      <option value="{{$des->id}}">{{ $des->name }} </option>
                    @endforeach
                </select>
            </div>

            <div class="col-sm-6  col-md-6 col-lg-2">
                {{-- <input id="searchA" type="date" name="datefrom" class="form-control datefrom float-right  datetime1"> --}}
                <div class="form-group">
                    {{-- Booking In: --}}
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text ">
                              <i class="far fa-calendar-alt"></i>
                            </span>
                        </div>
                        <input type="text" name="datefrom" class="form-control datefrom float-right datetime1">
                    </div>
                </div>
            </div>

            <div class="col-sm-6  col-md-6 col-lg-2">
                {{--

                <input id="searchB" type="date" name="dateto" class="form-control dateto float-right  datetime2"> --}}

                <div class="form-group">
                    {{-- Booking Out: --}}

                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text ">
																			<i class="far fa-calendar-alt"></i>
																		</span>
                        </div>
                        <input type="text" name="dateto" class="form-control dateto  float-right datetime2">
                    </div>
                </div>
            </div>
            <div class="col-sm-6  col-md-6 col-lg-2">
                <input id="searchC" type="number" class="form-control room_quantity" name="room_quantity" min="1" max="10" placeholder="өрөөний тоо">
            </div>
            <div class="col-sm-6  col-md-6 col-lg-2">
                <input id="searchD" type="number" class="form-control person_quantity" name="person_quantity" min="1" max="10" placeholder="хүний тоо">
            </div>
            <div class="col-sm-12  col-md-12 col-lg-2">
                <button type="submit" onclick="getDate()" class="btn btn-primary btn-block">Хайх</button>
            </div>
        </div>
        {{--

    </form> --}}

    </div>

      

        {{-- бүх үйлчилгээ--}}

        <a name="" id="clears" class="btn btn-link float-right" href="javascript:void(0);" role="button">clear	</i></a> {{-- үйлчилгээ clear--}} 
        @foreach ($fac as $ee){{-- бүх үйлчилгээнүүдээ хэвлэж байгаа хэсэг --}}
        <div class="checkbox">
            <label>
                <input type="checkbox" facility="{{$ee->id}}" onchange="$('#form').submit();" id="searchA" name="checkbox[]" value="{{$ee->id}}" class="checkbox" /> {{ $ee->name}}

                <br/>
            </label>
        </div>
        @endforeach

    </div>
    </form>



    <div class="col-sm-10">

        @foreach ($hotel as $h)

        <div class="jumbotron  p-5 mb-4">
            <div class="row">
                <div class="col-lg-4 col-md-4  col-sm-12">
                    <img src="hotelpicture/hotel.jpg" alt="hotel_image" width="250" height="150">
                </div>
                <div class="col-lg-6 col-md-5 col-sm-8">
                  

                    <br/> {{-- {{str_limit($h->descr,130) }}


                    <br/> {{-- form --}} {{-- form --}} {{-- form --}}

                    <form action="{{url('room/search') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input id="searchA" type="hidden" name="datefrom22" class="form-control datefrom float-right datetime1 ">
                        <input id="searchB" type="hidden" name="dateto22" class="form-control dateto  float-right datetime2">
                        <input id="searchC" type="hidden" class="form-control room_quantity" name="room_quantity22" min="1" max="5" placeholder="өрөөний тоо">
                        <input id="searchD" type="hidden" class="form-control person_quantity" name="person_quantity22" min="1" max="5" placeholder="хүний тоо">
                        </div>

                        <div class="col-lg-2 col-md-3 col-sm-2">
                            <p>From $8 / night</p>
                            <button type="button" class="btn btn-outline-primary btn-block">Дэлгэрэнгүй</button>
                            <br/>
                            <input type="hidden" value="{{$h->id}}" name="hotel" />
                            <button class="btn  btn-success btn-block">Захиалах</button>
                        </div>
                    </form>

            </div> {{-- row div --}}

        </div>
        @endforeach

    </div>
</div>
</div>
@endsection