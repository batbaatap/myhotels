@extends('layouts.frontLayout.front_design')
@section('content')

<main>
    <!-- Hero -->
    <section class="section section-xl bg-primary overlay-dark text-white rounded" data-background="" style="background-size:cover;background-image:url({{asset('customer/images/ub_20170414053231.jpg')}})">
        <div class="container">
                <div class="row justify-content-center">
                        <div class="col-12 text-md-center">
                            <!-- Heading -->
                            <h1 class="display-2"> Зочид буудлаа захиалаарай<span class="font-weight-bolder"></span>. </h1>
                            {{-- <h1 class="display-2">Онлайнаар захиалбал<span class="font-weight-bolder">50% хүртэлх</span> хямдралтай.</h1> --}}
        
                            <!-- Text -->
                            {{-- <p class="lead text-muted mt-4"><span class="font-weight-bold">12,000+</span> coworking spaces with desks, offices & meeting rooms in <span class="font-weight-bold">165+</span> countries. --}}
                            <p class="lead text-muted mt-4"><span class="font-weight-bold">  Хамгийн хямд </span>  шуурхай найдвартай онлайн буудал захиалгыг <span class="font-weight-bold">бид таньд </span> болгож байна.
        
                                {{-- <br>Discover and reserve space today.</p> --}}
                                <br>Онлайнаар захиалбал 50% хүртэлх хямдралтай.</p>
                                
                        </div>
                    </div>
            <div class="row mt-4">
                <div class="col">
                    <div class="card card-body">
                      <form autocomplete="off" class="row" action="{{url('hotel/search') }}"  method="POST" enctype="multipart/form-data">
                        @csrf <!-- {{ csrf_field() }} -->
                            <div class="col-lg-3">
                                <div class="form-group mb-lg-0">
                                    <div class="input-group input-group-lg mb-lg-0">
                                        <div class="input-group-prepend"><span class="input-group-text"><i class="fas fa-search"></i></span></div>
                                        {{---е <input id="search-location" type="text" class="form-control autocomplete" placeholder="Байршил" tabindex="1" required> --}}

                                        <select name="destination" class=" form-control destination autocomplete" placeholder="Байршил" tabindex="1" required>
                                          @foreach ($destinationSearch  as $des)
                                            <option value="{{$des->id}}" >{{ $des->name }} </option>
                                          @endforeach
                                        </select>
                      
                                    </div>
                                </div>
                            </div>
                            
                            <div class="col-lg-2">
                                <div class="input-group input-group-lg mb-3 mb-lg-0" >
                                    <div class="input-group-prepend"><span class="input-group-text"><i class="far fa-calendar-alt"></i></span></div>
                                    <input class="form-control datefrom datepicker datetime1" placeholder="Select date" name="datefrom"  type="text" required>
                                </div>
                            </div>
                            <div class="col-lg-2">
                              <div class="input-group input-group-lg mb-3 mb-lg-0">
                                  <div class="input-group-prepend"><span class="input-group-text"><i class="far fa-calendar-alt"></i></span></div>
                                  <input class="form-control dateto datepicker datetime2" name="dateto" placeholder="Select date" type="text" required>
                              </div>
                            </div>
                          <div class="col-lg">
                              
                            <div class="input-group input-group-lg mb-3 mb-lg-0">
                                <div class="input-group-prepend"><span class="input-group-text">Өрөө:</span></div>
                                <input class="form-control room_quantity " type="number"   name="room_quantity" min="1" max="10" value="1"  onkeyup = "this.value = minmaxfuncz(this.value, 1, 10)" required>
                                    
                            </div>
                          </div>

                          <div class="col-lg">
                            <div class="input-group input-group-lg mb-3 mb-lg-0">
                                <div class="input-group-prepend"><span class="input-group-text">Хүн:</span></div>
                                <input class="form-control person_quantity" type="number" name="person_quantity" min="1" max="10" value="1" onkeyup = "this.value = minmaxfuncz(this.value, 1, 10)" required>
                              </div>
                          </div>

                            <div class="col-lg-auto">
                                <button class="btn btn-lg btn-primary btn-block mt-3 mt-md-0 animate-up-2" type="submit" onclick="getDate()" >Хайх</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="section">
        <div class="container">
            <div class="row">
                <div class="col-6 col-lg-3">
                    <!-- Icon box -->
                    <div class="icon-box text-center">
                        <div class="icon icon-primary icon-xl"><i class="fas fa-clock"></i></div>
                        <h6 class="font-weight-normal text-gray mt-4 mb-3">24 Hr Access</h6></div>
                    <!-- End of Icon box -->
                </div>
                <div class="col-6 col-lg-3">
                    <!-- Icon box -->
                    <div class="icon-box text-center">
                        <div class="icon icon-primary icon-xl"><i class="fas fa-tachometer-alt"></i></div>
                        <h6 class="font-weight-normal text-gray mt-4 mb-3">Хурдтай интернэт</h6></div>
                    <!-- End of Icon box -->
                </div>
                <div class="col-6 col-lg-3">
                    <!-- Icon box -->
                    <div class="icon-box text-center">
                        <div class="icon icon-primary icon-xl"><i class="fas fa-user-tie"></i></div>
                        <h6 class="font-weight-normal text-gray mt-4 mb-3">Шилдэг ажилчид</h6></div>
                    <!-- End of Icon box -->
                </div>
                <div class="col-6 col-lg-3">
                    <!-- Icon box -->
                    <div class="icon-box text-center">
                        <div class="icon icon-primary icon-xl"><i class="fas fa-city"></i></div>
                        <h6 class="font-weight-normal text-gray mt-4 mb-3">Орчин үеийн барилгууд</h6></div>
                    <!-- End of Icon box -->
                </div>
            </div>
            <div class="row mt-6">
                <div class="col-md-4">
                    <h2 class="h1 mb-5">Explore our <span class="font-weight-bold">available</span><br>Hotels .</h2></div>
                <div class="col-md-4">
                    {{-- <p class="lead">Coworking is not only about the physical place, but about establishing the coworking community first. Its benefits can already be experienced outside of its places, and it is recommended</p> --}}
                    <p class="lead">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a ga</p>

                    {{-- <p class="lead mt-4">To start with building a coworking community first before considering opening a Coworking place.</p> --}}
                    <p class="lead mt-4">of type and scrambled it to make a type specimen book. It has survived not only five centuries, </p>

                </div>
                <div class="col-md-4">
                    {{-- <p class="lead">However, some coworking places don’t build a community: they just get a part of an existing one by combining their opening with</p> --}}
                    <p class="lead"> It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with de</p>

                    {{-- <p class="lead mt-4">An event which attracts their target group. Real-estate centric coworking spaces are about selling desks first, with building community as a secondary goal.</p> --}}
                    <p class="lead mt-4">Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 yea</p>

                </div>
            </div>
            <div class="row mt-6">
                <div class="col-12">
                    <!-- Card -->
                    <div class="card-group shadow-soft border border-soft">
                        <div class="card">
                            <div class="card-body p-5">
                                <div class="progress-wrapper mb-5">
                                    <div class="progress-info info-xl">
                                        <div class="progress-label">
                                            <h6 class="font-weight-normal text-dark">Санал хүсэлт</h6></div>
                                        <div class="progress-percentage"><span class="text-dark">85%</span></div>
                                    </div>
                                    <div class="progress progress-lg">
                                        <div class="progress-bar bg-primary" role="progressbar" aria-valuenow="85" aria-valuemin="0" aria-valuemax="100" style="width: 85%;"></div>
                                    </div>
                                </div>
                                <div class="d-flex flex-column flex-lg-row d-sm-flex justify-content-between align-items-center">
                                    <div class="mb-5 mb-lg-0">
                                        {{-- <h4 class="font-weight-normal">Book your tour experience today!</h4> --}}
                                        {{-- <p class="lead mb-0">Schedule a tour, make an appointment to rent space --}}
                                        <p class="lead mb-0">Lorem Ipsum is simply dummy text of the printingss

                                            {{-- <br class="d-none d-lg-inline">at Themesberg, or ask for more information.</p> --}}
                                            <br class="d-none d-lg-inline">typesetting industry. Lorem Ipsum has been.</p>

                                    </div>
                                    <div class="align-content-end">
                                        <!-- Button Modal -->
                                        <button type="button" class="btn btn-primary animate-up-2" data-toggle="modal" data-target="#modal-form">Санал хүсэлт илгээх</button>
                                    </div>
                                    <!-- Modal Content -->
                                    <div class="modal fade" id="modal-form" tabindex="-1" role="dialog" aria-labelledby="modal-form" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered modal-md" role="document">
                                            <div class="modal-content">
                                                <div class="modal-body p-0">
                                                    <div class="card bg-soft shadow-md border-0">
                                                        <div class="card-header bg-white py-4">
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                                                            <div class="text-muted text-center mb-3">
                                                                <h3>Interested?</h3>
                                                                <p>We would love to show you Spaces. Please let us know when you are available and we will make our best to receive you on that date and time.</p>
                                                            </div>
                                                        </div>
                                                        <div class="card-body">
                                                            <form class="mt-3">
                                                                <div class="form-group">
                                                                    <div class="input-group mb-4">
                                                                        <div class="input-group-prepend"><span class="input-group-text"><i class="far fa-user"></i></span></div>
                                                                        <input class="form-control" placeholder="Name" type="text" required>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <div class="input-group mb-4">
                                                                        <div class="input-group-prepend"><span class="input-group-text"><i class="far fa-envelope"></i></span></div>
                                                                        <input class="form-control" placeholder="Email" type="email" required>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <div class="input-group mb-4">
                                                                        <div class="input-group-prepend"><span class="input-group-text"><i class="fas fa-mobile"></i></span></div>
                                                                        <input class="form-control" placeholder="Phone" type="number" required>
                                                                    </div>
                                                                </div>
                                                                <div class="input-group input-group-lg mb-lg-0">
                                                                    <div class="input-group-prepend"><span class="input-group-text"><i class="far fa-calendar-alt"></i></span></div>
                                                                    <input class="form-control datepicker" placeholder="Select date" type="text" data-position="top">
                                                                </div>
                                                                <div class="text-center">
                                                                    <button type="submit" class="btn btn-block btn-primary mt-4">Send Request Quote</button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End of Modal Content -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
           
            {{-- Буудлууд --}}
            <div class="row mt-6">
                <div class="col-12">
                    <h5 class="font-weight-normal mb-5">Эрэлттэй буудлууд</h5></div>
                {{-- <div class="col-md-6 col-lg-4">
                    <!-- Card -->
                    <div class="card shadow-sm border-soft mb-4 animate-up-5">
                        <a href="./html/pages/single-space.html" class="position-relative">
                            <img src="https://i.pinimg.com/originals/a2/ef/f5/a2eff5dcc55aae1c935b862abb07f8ca.png" class="card-img-top" alt="image" 
                            style="background-position: center;
                            background-size: cover;
                            background-image:url({{asset('customer/images/narantuul.jpg')}}); ">
                            <span class="badge badge-primary position-absolute listing-badge">
                                <span class="font-weight-normal font-xs">Хямдрал 30%</span>
                            </span>
                        </a>
                        <div class="card-body"><a href="./html/pages/single-space.html"><h5 class="font-weight-normal">Нарантуул</h5></a>
                            <div class="post-meta"><span class="small lh-120"><i class="fas fa-map-marker-alt mr-2"></i>Улаанбаатар</span></div>
                            <div class="d-flex my-4"><i class="star fas fa-star text-warning"></i> <i class="star fas fa-star text-warning"></i> <i class="star fas fa-star text-warning"></i> <i class="star fas fa-star text-warning"></i> <i class="star fas fa-star text-warning"></i> <span class="badge badge-pill badge-secondary ml-2">5.0</span></div>
                            <div class="d-flex justify-content-between">
                                <div class="col pl-0"><span class="text-muted font-small d-block mb-2">Monthly</span> <span class="h5 text-dark font-weight-bold">2100$</span></div>
                                <div class="col"><span class="text-muted font-small d-block mb-2">People</span> <span class="h5 text-dark font-weight-bold">12</span></div>
                                <div class="col pr-0"><span class="text-muted font-small d-block mb-2">Sq.Ft</span> <span class="h5 text-dark font-weight-bold">1200</span></div>
                            </div>
                        </div>
                    </div>
                    <!-- End of Card -->
                </div>
                <div class="col-md-6 col-lg-4">
                    <!-- Card -->
                    <div class="card shadow-sm border-soft mb-4 animate-up-5">
                            <a href="./html/pages/single-space.html" class="position-relative">
                                <img src="https://i.pinimg.com/originals/a2/ef/f5/a2eff5dcc55aae1c935b862abb07f8ca.png" class="card-img-top" alt="image" 
                                style="background-position: center;
                                background-size: cover;
                                background-image:url({{asset('customer/images/NewWest.jpg')}}); ">
                                <span class="badge badge-primary position-absolute listing-badge">
                                    <span class="font-weight-normal font-xs">Хямдрал 30%</span>
                                </span>
                            </a>
                        <div class="card-body"><a href="./html/pages/single-space.html"><h5 class="font-weight-normal">Coworking Workspace</h5></a>
                            <div class="post-meta"><span class="small lh-120"><i class="fas fa-map-marker-alt mr-2"></i>Bucharest, Sector 2, Romania</span></div>
                            <div class="d-flex my-4"><i class="star fas fa-star text-warning"></i> <i class="star fas fa-star text-warning"></i> <i class="star fas fa-star text-warning"></i> <i class="star fas fa-star text-gray-200"></i> <i class="star fas fa-star text-gray-200"></i> <span class="badge badge-pill badge-secondary ml-2">3.0</span></div>
                            <div class="d-flex justify-content-between">
                                <div class="col pl-0"><span class="text-muted font-small d-block mb-2">Monthly</span> <span class="h5 text-dark font-weight-bold">300$</span></div>
                                <div class="col"><span class="text-muted font-small d-block mb-2">People</span> <span class="h5 text-dark font-weight-bold">24</span></div>
                                <div class="col pr-0"><span class="text-muted font-small d-block mb-2">Sq.Ft</span> <span class="h5 text-dark font-weight-bold">3000</span></div>
                            </div>
                        </div>
                    </div>
                    <!-- End of Card -->
                </div>
                <div class="col-md-6 col-lg-4">
                    <!-- Card -->
                    <div class="card shadow-sm border-soft mb-4 animate-up-5">
                            <a href="./html/pages/single-space.html" class="position-relative">
                                <img src="https://i.pinimg.com/originals/a2/ef/f5/a2eff5dcc55aae1c935b862abb07f8ca.png" class="card-img-top" alt="image" 
                                style="background-position: center;
                                background-size: cover;
                                background-image:url({{asset('customer/images/cont.jpg')}}); ">
                                <span class="badge badge-primary position-absolute listing-badge">
                                    <span class="font-weight-normal font-xs">Хямдрал 30%</span>
                                </span>
                            </a>
                        <div class="card-body"><a href="./html/pages/single-space.html"><h5 class="font-weight-normal">Meeting Office Space</h5></a>
                            <div class="post-meta"><span class="small lh-120"><i class="fas fa-map-marker-alt mr-2"></i>London, Canary Wharf, UK</span></div>
                            <div class="d-flex my-4"><i class="star fas fa-star text-warning"></i> <i class="star fas fa-star text-warning"></i> <i class="star fas fa-star text-warning"></i> <i class="star fas fa-star text-warning"></i> <i class="star fas fa-star text-gray-200"></i> <span class="badge badge-pill badge-secondary ml-2">4.0</span></div>
                            <div class="d-flex justify-content-between">
                                <div class="col pl-0"><span class="text-muted font-small d-block mb-2">Hourly</span> <span class="h5 text-dark font-weight-bold">50$</span></div>
                                <div class="col"><span class="text-muted font-small d-block mb-2">People</span> <span class="h5 text-dark font-weight-bold">3-5</span></div>
                                <div class="col pr-0"><span class="text-muted font-small d-block mb-2">Sq.Ft</span> <span class="h5 text-dark font-weight-bold">400</span></div>
                            </div>
                        </div>
                    </div>
                    <!-- End of Card -->
                </div>
                <div class="col-md-6 col-lg-4">
                    <!-- Card -->
                    <div class="card shadow-sm border-soft mb-4 animate-up-5">
                            <a href="./html/pages/single-space.html" class="position-relative">
                                <img src="https://i.pinimg.com/originals/a2/ef/f5/a2eff5dcc55aae1c935b862abb07f8ca.png" class="card-img-top" alt="image" 
                                style="background-position: center;
                                background-size: cover;
                                background-image:url({{asset('customer/images/narantuul.jpg')}}); ">
                                <span class="badge badge-primary position-absolute listing-badge">
                                    <span class="font-weight-normal font-xs">Хямдрал 30%</span>
                                </span>
                            </a>
                        <div class="card-body"><a href="./html/pages/single-space.html"><h5 class="font-weight-normal">Conference Room</h5></a>
                            <div class="post-meta"><span class="small lh-120"><i class="fas fa-map-marker-alt mr-2"></i>Paris, La Defense, France</span></div>
                            <div class="d-flex my-4"><i class="star fas fa-star text-warning"></i> <i class="star fas fa-star text-warning"></i> <i class="star fas fa-star text-warning"></i> <i class="star fas fa-star text-warning"></i> <i class="star fas fa-star text-warning"></i> <span class="badge badge-pill badge-secondary ml-2">4.7</span></div>
                            <div class="d-flex justify-content-between">
                                <div class="col pl-0"><span class="text-muted font-small d-block mb-2">Hourly</span> <span class="h5 text-dark font-weight-bold">100$</span></div>
                                <div class="col"><span class="text-muted font-small d-block mb-2">People</span> <span class="h5 text-dark font-weight-bold">2-20</span></div>
                                <div class="col pr-0"><span class="text-muted font-small d-block mb-2">Sq.Ft</span> <span class="h5 text-dark font-weight-bold">200</span></div>
                            </div>
                        </div>
                    </div>
                    <!-- End of Card -->
                </div>
                <div class="col-md-6 col-lg-4">
                    <!-- Card -->
                    <div class="card shadow-sm border-soft mb-4 animate-up-5">
                            <a href="./html/pages/single-space.html" class="position-relative">
                                <img src="https://i.pinimg.com/originals/a2/ef/f5/a2eff5dcc55aae1c935b862abb07f8ca.png" class="card-img-top" alt="image" 
                                style="background-position: center;
                                background-size: cover;
                                background-image:url({{asset('customer/images/cont.jpg')}}); ">
                                <span class="badge badge-primary position-absolute listing-badge">
                                    <span class="font-weight-normal font-xs">Хямдрал 30%</span>
                                </span>
                            </a>
                        <div class="card-body"><a href="./html/pages/single-space.html"><h5 class="font-weight-normal">Lifestyle Space</h5></a>
                            <div class="post-meta"><span class="small lh-120"><i class="fas fa-map-marker-alt mr-2"></i>Madrid, Hortaleza, Spain</span></div>
                            <div class="d-flex my-4"><i class="star fas fa-star text-warning"></i> <i class="star fas fa-star text-warning"></i> <i class="star fas fa-star text-warning"></i> <i class="star fas fa-star text-warning"></i> <i class="star fas fa-star text-warning"></i> <span class="badge badge-pill badge-secondary ml-2">5.0</span></div>
                            <div class="d-flex justify-content-between">
                                <div class="col pl-0"><span class="text-muted font-small d-block mb-2">Daily</span> <span class="h5 text-dark font-weight-bold">350$</span></div>
                                <div class="col"><span class="text-muted font-small d-block mb-2">People</span> <span class="h5 text-dark font-weight-bold">10-25</span></div>
                                <div class="col pr-0"><span class="text-muted font-small d-block mb-2">Sq.Ft</span> <span class="h5 text-dark font-weight-bold">100</span></div>
                            </div>
                        </div>
                    </div>
                    <!-- End of Card -->
                </div>
                <div class="col-md-6 col-lg-4">
                    <!-- Card -->
                    <div class="card shadow-sm border-soft mb-4 animate-up-5">
                            <a href="./html/pages/single-space.html" class="position-relative">
                                <img src="https://i.pinimg.com/originals/a2/ef/f5/a2eff5dcc55aae1c935b862abb07f8ca.png" class="card-img-top" alt="image" 
                                style="background-position: center;
                                background-size: cover;
                                background-image:url({{asset('customer/images/jasper.jpg')}}); ">
                                <span class="badge badge-primary position-absolute listing-badge">
                                    <span class="font-weight-normal font-xs">Хямдрал 30%</span>
                                </span>
                            </a>
                        <div class="card-body"><a href="./html/pages/single-space.html"><h5 class="font-weight-normal">Private Space</h5></a>
                            <div class="post-meta"><span class="small lh-120"><i class="fas fa-map-marker-alt mr-2"></i>Budapest, Ferencvaros, Hungary</span></div>
                            <div class="d-flex my-4"><i class="star fas fa-star text-warning"></i> <i class="star fas fa-star text-warning"></i> <i class="star fas fa-star text-warning"></i> <i class="star fas fa-star text-warning"></i> <i class="star fas fa-star text-gray-200"></i> <span class="badge badge-pill badge-secondary ml-2">4.0</span></div>
                            <div class="d-flex justify-content-between">
                                <div class="col pl-0"><span class="text-muted font-small d-block mb-2">Monthly</span> <span class="h5 text-dark font-weight-bold">100$</span></div>
                                <div class="col"><span class="text-muted font-small d-block mb-2">People</span> <span class="h5 text-dark font-weight-bold">1</span></div>
                                <div class="col pr-0"><span class="text-muted font-small d-block mb-2">Sq.Ft</span> <span class="h5 text-dark font-weight-bold">10</span></div>
                            </div>
                        </div>
                    </div>
                    <!-- End of Card -->
                </div>
 --}}


              @foreach ($hotel as $h)
                <div class="col-md-6 col-lg-4">
                  <!-- Card -->
                  <div class="card shadow-sm border-soft mb-4 animate-up-5">
                          <a href="#" class="position-relative">

                            @foreach ($hotelFile as $item)  <!--- буудлын зураг-->
                                @if ($item->id_item == $h->id)
                                <img src="https://i.pinimg.com/originals/a2/ef/f5/a2eff5dcc55aae1c935b862abb07f8ca.png" class="card-img-top" alt="image" 
                                style="background-position: center;
                                background-size: cover;
                                background-image:url({{asset('admin/images/hotels/small/'.$item->file)}}); ">
                                @endif
                            @endforeach

                                @foreach ($discount as $hotel_discount) <!--- буудлын хямдрал -->
                                    @if($hotel_discount->id_hotel == $h->id)
                                        <span class="badge badge-primary position-absolute listing-badge">
                                                <span class="font-weight-normal font-xs">Хямдрал {{$hotel_discount->discount}}%</span>   
                                        </span>
                                    @endif
                                @endforeach

                               
                          </a>
                        <div class="card-body"><a href="#"><h5 class="font-weight-normal">{{$h->title}}</h5></a>
                          <div class="post-meta"><span class="small lh-120"><i class="fas fa-map-marker-alt mr-2"></i>{{ str_limit(strip_tags($h->address), 40) }}</span></div>
                          
                          <div class="d-flex my-4">
                              @for ($i =0; $i < $h->class; $i++)
                                <i class="star fas fa-star text-warning"></i>
                              @endfor

                              {{-- @if( $h->class < 5)
                                @for ($i =$h->class; $i < 5; $i++)
                                  <i class="star fas fa-star text-gray-200"></i> 
                                @endfor
                              @endif --}}
                             <span class="badge badge-pill badge-secondary ml-2">{{$h->class}}.0 одтой</span>
                          </div>
                         

                          
                          {{-- <div class="d-flex justify-content-between">
                            <div class="col pl-0"><span class="text-muted font-small d-block mb-2">Нийт үнэ</span> <span class="h5 text-dark font-weight-bold">$</span></div>
                            <div class="col"><span class="text-muted font-small d-block mb-2">People</span> <span class="h5 text-dark font-weight-bold">1</span></div>
                            <div class="col pr-0"><span class="text-muted font-small d-block mb-2">Хямдралтай үнэ</span> <span class="h5 text-dark font-weight-bold">10</span></div>
                        </div> --}}
                           
                            <div class="d-flex justify-content-between">
                              
                              

                <?php $k=0; //rate dotor hotel id нь байгаа эсэхийг шалгаж буй тоолуур ?>
                                @foreach ($discount as $hotel_discount) <!--хямдралтай буудлын үнэ, буудлын хямдрал тооцох-->
                                    @if($h->id==$hotel_discount->id_hotel)
                                         <?php $k++;  ?>
                                            <div class="col pl-0">
                                                <span class="h5 text-dark font-weight-bold" style="text-decoration: line-through;font-style:italic;">{{$hotel_discount->price}}Ŧ</span>
                                                <span class="h5 text-dark font-weight-bold" style="color:red!important;"><?php echo $hotel_discount->price-(($hotel_discount->price*$hotel_discount->discount)/100 )?>Ŧ</span>
                                            </div>
                            
                                            <div class="col pr-0">
                                                    <form action="{{url('room/search') }}" method="POST" enctype="multipart/form-data">
                                                        @csrf <!-- {{ csrf_field() }} -->
                                                        <input id="searchA" type="hidden" name="datefrom22" class="form-control datefrom float-right datetime1 ">
                                                        <input id="searchB" type="hidden" name="dateto22" class="form-control dateto  float-right datetime2">
                                                        <input id="searchC" type="hidden" class="form-control room_quantity" name="room_quantity22" min="1" max="5" placeholder="өрөөний тоо">
                                                        <input id="searchD" type="hidden" class="form-control person_quantity" name="person_quantity22" min="1" max="5" placeholder="хүний тоо">
                
                                                        <input type="hidden" value="{{$h->id}}" name="hotel" />
                                                        <button class="btn btn-primary btn-block" onclick="getDate()"><span class="home_button font-small d-block ">Захиалах</span></button>
                
                                                    </form>
                                            </div>
                                   
                                    @endif
                                @endforeach   

                                @foreach ($rate as $hotel_rate) <!--хямдрал нь дууссан ч rate table-s хасагдаагүй буудал тус бүрийн хамгийн бага үнэтэйг нь гаргасан -->
                                    @if($hotel_rate->id_hotel==$h->id)
                                                 <?php $k++;  ?>
                                        <div class="col pl-0"><span class="h5 text-dark font-weight-bold" style="color:red!important;">{{$hotel_rate->price}}Ŧ</span></div>
                                        <div class="col pr-0">
                                                <form action="{{url('room/search') }}" method="POST" enctype="multipart/form-data">
                                                     @csrf <!-- {{ csrf_field() }} -->
                                                    <input id="searchA" type="hidden" name="datefrom22" class="form-control datefrom float-right datetime1 ">
                                                    <input id="searchB" type="hidden" name="dateto22" class="form-control dateto  float-right datetime2">
                                                    <input id="searchC" type="hidden" class="form-control room_quantity" name="room_quantity22" min="1" max="5" placeholder="өрөөний тоо">
                                                    <input id="searchD" type="hidden" class="form-control person_quantity" name="person_quantity22" min="1" max="5" placeholder="хүний тоо">
            
                                                    <input type="hidden" value="{{$h->id}}" name="hotel" />
                                                    <button class="btn btn-primary btn-block" onclick="getDate()"><span class="home_button font-small d-block ">Захиалах</span></button>
            
                                                </form>
                                        </div>

                                    @endif
                                @endforeach
                <?php
             
                   if($k==0){?>
                        
                        <!--herwee rate dotor hotel id нь байхгүй бол хамгийн хямд өрөөний үнийн мэдээллийг харуулах-->
                        <?php  $tooluur=0;  $arr =[];?>  
                        @foreach ($room as $room_price) 
                            @if($h->id==$room_price->id_hotel)
                                <?php $arr[]=$room_price->price; $tooluur++;  ?> 
                            @endif
                        @endforeach
                        <?php  
                            if($tooluur>=1){
                                $price=$arr[0];
                                for ($i=0; $i < count($arr); $i++ ) { 
                                    if($price > $arr[$i]){ 
                                        $price=$arr[$i];
                                    }
                                }
                              // echo $price;//hamgiin baga uniin dun
                            ?> 
                                
                                <div class="col pl-0"><span class="h5 text-dark font-weight-bold" style="color:red!important;"> <?php echo $price;?>Ŧ</span></div>
                                <div class="col pr-0">
                                    <form action="{{url('room/search') }}" method="POST" enctype="multipart/form-data">
                                        @csrf <!-- {{ csrf_field() }} -->
                                        <input id="searchA" type="hidden" name="datefrom22" class="form-control datefrom float-right datetime1 ">
                                        <input id="searchB" type="hidden" name="dateto22" class="form-control dateto  float-right datetime2">
                                        <input id="searchC" type="hidden" class="form-control room_quantity" name="room_quantity22" min="1" max="5" placeholder="өрөөний тоо">
                                        <input id="searchD" type="hidden" class="form-control person_quantity" name="person_quantity22" min="1" max="5" placeholder="хүний тоо">

                                        <input type="hidden" value="{{$h->id}}" name="hotel" />
                                        <button class="btn btn-primary btn-block" onclick="getDate()"><span class=" home_button font-small d-block ">Захиалах</span></button>

                                    </form>
                                
                                </div>

                        <?php }?> 
                        
                <?php }?>
                               
                               

                            </div>
                      </div>
                  </div>
                  <!-- End of Card -->
              </div>
            @endforeach



                <div class="col mt-6 d-flex flex-column text-center">
                    <div><a href="/hotel" class="btn btn-primary animate-up-2 mb-2">Бүгдийг харах </a></div><span class="font-xs">7 аймгийн 12 буудал </span></div>
            </div>

            {{-- Чиглэл --}}
            <div class="row mt-6">
                    <div class="col-12">
                        <h5 class="font-weight-normal mb-5">Эрэлттэй чиглэл</h5>
                    </div>


                    @foreach ($destination as $des) 
                        <div class="col-12 col-sm-6 col-lg-3 mb-4 mb-lg-0">
                            <!-- Card -->
                            <a href="#" class="card img-card fh-400 border-0 outer-bg" data-background-inner="customer/images/huwsgul.jpg "
                                style="background-position: center;
                                background-size: cover;
                                background-image:url({{asset('admin/images/destination/large/'.$des->file)}}); ">

                                    <div class="inner-bg overlay-dark"></div>
                                    <div class="card-img-overlay d-flex align-items-center">
                                        <div class="card-body text-white p-3">
                                            <h5 class="font-weight-normal text-uppercase text-center">{{$des->name}}</h5>
                                        </div>
                                    </div>
                            </a>
                            <!-- End of Card -->
                        </div>
                    @endforeach
                    {{-- <div class="col-12 col-sm-6 col-lg-3 mb-4 mb-lg-0">
                        <!-- Card -->
                        <a href="./html/pages/all-spaces.html" class="card img-card fh-400 border-0 outer-bg" data-background-inner="img/paris.jpg"
                        style="background-position: center;
                          background-size: cover;
                          background-image:url({{asset('customer/images/darhan.jpg')}}); ">

                            <div class="inner-bg overlay-dark"></div>
                            <div class="card-img-overlay d-flex align-items-center">
                                <div class="card-body text-white p-3">
                                    <h5 class="font-weight-normal text-uppercase text-center">Дархан</h5></div>
                            </div>
                        </a>
                        <!-- End of Card -->
                    </div>
                    <div class="col-12 col-sm-6 col-lg-3 mb-4 mb-lg-0">
                        <!-- Card -->
                        <a href="./html/pages/all-spaces.html" class="card img-card fh-400 border-0 outer-bg" data-background-inner="img/london.jpg"
                        style="background-position: center;
                          background-size: cover;
                          background-image:url({{asset('customer/images/bulgan.jpg')}}); ">
                            <div class="inner-bg overlay-dark"></div>
                            <div class="card-img-overlay d-flex align-items-center">
                                <div class="card-body text-white p-3">
                                    <h5 class="font-weight-normal text-uppercase text-center">Булган</h5></div>
                            </div>
                        </a>
                        <!-- End of Card -->
                    </div>
                    <div class="col-12 col-sm-6 col-lg-3 mb-4 mb-lg-0">
                        <!-- Card -->
                        <a href="./html/pages/all-spaces.html" class="card img-card fh-400 border-0 outer-bg" data-background-inner="img/tokyo.jpg"
                        style="background-position: center;
                          background-size: cover;
                          background-image:url({{asset('customer/images/ub.jpg')}}); ">
                            <div class="inner-bg overlay-dark"></div>
                            <div class="card-img-overlay d-flex align-items-center">
                                <div class="card-body text-white p-3">
                                    <h5 class="font-weight-normal text-uppercase text-center">Улаанбаатар</h5></div>
                            </div>
                        </a>
                        <!-- End of Card -->
                    </div> --}}
                </div>
        </div>
    </section>
    <!-- Section -->
    <section class="section bg-soft">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-8 text-center">
                    <h2 class="h1"><span class="font-weight-bold">Бид</span> хэрхэн ажилладаг вэ?</h2>
                    <p class="lead mt-3">Хамгийн хямд шуурхай найдвартай буудал онлайн буудал захиалгыг бид таньд санал болгож байна.Таньд ердөө 3-хан л хангалттай.</p>
                </div>
            </div>
            <div class="row mt-6">
                <div class="col-6 mx-auto">
                    <!-- Tab -->
                    {{-- <div class="nav-wrapper"> --}}
                        {{-- <ul class="nav nav-pills nav-fill flex-column flex-sm-row mb-3" id="tab-32" role="tablist"> --}}
                            {{-- <li class="nav-item mb-3 mb-lg-0"><a class="nav-link flex-sm-fill text-sm-center border-0 active" id="tab-link-example-7" data-toggle="tab" href="#link-example-7" role="tab" aria-controls="link-example-7" aria-selected="true"><i class="far fa-building"></i>Буудалаа сонго</a></li> --}}
                            {{-- <li class="nav-item"><a class="nav-link flex-sm-fill text-sm-center border-0" id="tab-link-example-8" data-toggle="tab" href="#link-example-8" role="tab" aria-controls="link-example-8" aria-selected="false"><i class="far fa-money-bill-alt"></i>Submit your Space</a></li> --}}
                        {{-- </ul>
                    </div> --}}
                    <!-- End of Tab Nav -->
                </div>
                <div class="col-12">
                    <!-- Tab Content -->
                    <div class="tab-content mt-5" id="tabcontentexample-3">
                        <div class="tab-pane fade show active" id="link-example-7" role="tabpanel" aria-labelledby="tab-link-example-7">
                            <div class="row">
                                <div class="col-12 col-lg-4">
                                    <div class="card shadow-soft border-0 mb-4 mb-lg-0 text-center">
                                        <div class="card-body p-3 px-xl-4 py-xl-6">
                                            <div class="icon icon-shape icon-shape-primary mb-4 rounded-circle"><i class="fas fa-search"></i></div>
                                            <h5 class="font-weight-normal my-3">1. Буудлаа хай</h5>
                                            <p>Таны оруулсан утганд тулгуурлан бид танд хамгийн хямд буудлыг жагсааж харуулах болно.</p>
                                        </div>
                                    </div>
                                    <!-- End of Icon box -->
                                </div>
                                <div class="col-12 col-lg-4">
                                    <div class="card shadow-soft border-0 mb-4 mb-lg-0 text-center">
                                        <div class="card-body p-3 px-xl-4 py-xl-6">
                                            <div class="icon icon-shape icon-shape-primary mb-4 rounded-circle"><i class="far fa-calendar-check"></i></div>
                                            <h5 class="font-weight-normal my-3">2. Буудлаа сонго </h5>
                                            <p>Та өөрт нийцэх хамгийн тохиромжтой буудлынхаа захиалах товч дээр дарна</p>
                                        </div>
                                    </div>
                                    <!-- End of Icon box -->
                                </div>
                                <div class="col-12 col-lg-4">
                                    <div class="card shadow-soft border-0 mb-4 mb-lg-0 text-center">
                                        <div class="card-body p-3 px-xl-4 py-xl-6">
                                            <div class="icon icon-shape icon-shape-primary mb-4 rounded-circle"><i class="fas fa-mouse-pointer"></i></div>
                                            <h5 class="font-weight-normal my-3">3. Өрөөгөө сонго</h5>
                                            <p>Захиал.</p>
                                        </div>
                                    </div>
                                    <!-- End of Icon box -->
                                </div>
                            </div>
                            <div class="col mt-6 text-center"><a href="/hotel" class="btn btn-primary animate-up-2"><i class="fas fa-search-location mr-2"></i>Буудал хайх</a></div>
                        </div>
                        <div class="tab-pane fade" id="link-example-8" role="tabpanel" aria-labelledby="tab-link-example-8">
                            <div class="row">
                                <div class="col-12 col-lg-4">
                                    <div class="card shadow-soft border-0 mb-4 mb-lg-0 text-center">
                                        <div class="card-body p-3 px-xl-4 py-xl-6">
                                            <div class="icon icon-shape icon-shape-secondary mb-4 rounded-circle"><i class="fas fa-clipboard-list"></i></div>
                                            <h5 class="font-weight-normal my-3">1. List your space</h5>
                                            <p>It takes no longer than 15 minutes to list your space on themesberg. Our user friendly onboarding process.</p>
                                        </div>
                                    </div>
                                    <!-- End of Icon box -->
                                </div>
                                <div class="col-12 col-lg-4">
                                    <div class="card shadow-soft border-0 mb-4 mb-lg-0 text-center">
                                        <div class="card-body p-3 px-xl-4 py-xl-6">
                                            <div class="icon icon-shape icon-shape-secondary mb-4 rounded-circle"><i class="far fa-user"></i></div>
                                            <h5 class="font-weight-normal my-3">2. Get ready</h5>
                                            <p>After you have uploaded your space - our website makes it easy for you to keep the details up to date.</p>
                                        </div>
                                    </div>
                                    <!-- End of Icon box -->
                                </div>
                                <div class="col-12 col-lg-4">
                                    <div class="card shadow-soft border-0 mb-4 mb-lg-0 text-center">
                                        <div class="card-body p-3 px-xl-4 py-xl-6">
                                            <div class="icon icon-shape icon-shape-secondary mb-4 rounded-circle"><i class="far fa-money-bill-alt"></i></div>
                                            <h5 class="font-weight-normal my-3">3. Earn money</h5>
                                            <p>Orders coming from themesberg are 100% prepaid. We will bring you not just leads but new clients.</p>
                                        </div>
                                    </div>
                                    <!-- End of Icon box -->
                                </div>
                            </div>
                            <div class="col mt-6 text-center"><a href="./html/pages/submit-space.html" class="btn btn-secondary animate-up-2"><i class="fas fa-plus mr-2"></i>List a Space</a></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    {{-- <section class="section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-8 text-center">
                    <h2 class="h1">Choose a <span class="font-weight-bold">plan</span> for your space</h2>
                    <p class="lead mt-3">Upgrade your space for higher rankings, powerful features & more ways to connect with potential customers.</p>
                </div>
            </div>
            <div class="row mt-6">
                <div class="col-12 mb-4 col-lg-4">
                    <!-- Pricing Card -->
                    <div class="pricing-card">
                        <div class="card shadow-sm border-soft p-4">
                            <!-- Header -->
                            <header class="card-header border-bottom bg-white text-center">
                                <h3 class="font-weight-normal text-gray mb-4">Free</h3><span class="d-block"><span class="display-1 text-primary font-weight-bold"><span class="align-top font-medium">$</span>0 </span><span class="text-light font-small">/ month</span></span>
                            </header>
                            <!-- End Header -->
                            <!-- Content -->
                            <div class="card-body">
                                <p class="font-weight-normal">Get listed in the directory:</p>
                                <div class="d-flex">
                                    <div class="icon-md lh-180 mr-3"><i class="fas fa-check-circle"></i></div>
                                    <p>Unlimited photos</p>
                                </div>
                                <div class="d-flex">
                                    <div class="icon-md lh-180 mr-3"><i class="fas fa-check-circle"></i></div>
                                    <p>Unlimited videos</p>
                                </div>
                                <div class="d-flex">
                                    <div class="icon-md lh-180 mr-3"><i class="fas fa-check-circle"></i></div>
                                    <p>Receive messages</p>
                                </div>
                                <div class="d-flex">
                                    <div class="icon-md lh-180 mr-3"><i class="fas fa-check-circle"></i></div>
                                    <p>Display your contact info</p>
                                </div>
                                <button type="button" class="btn btn-outline-primary btn-block mt-4"><span class="fas fa-cart-plus mr-3"></span>Add to Cart</button>
                            </div>
                            <!-- End Content -->
                        </div>
                    </div>
                    <!-- End of Pricing Card -->
                </div>
                <div class="col-12 mb-4 col-lg-4">
                    <!-- Pricing Card -->
                    <div class="pricing-card">
                        <div class="card shadow-sm border-soft p-4">
                            <!-- Header -->
                            <header class="card-header border-bottom bg-white text-center">
                                <h3 class="font-weight-normal text-gray mb-4">Silver</h3><span class="d-block"><span class="display-1 text-primary font-weight-bold"><span class="align-top font-medium">$</span>19 </span><span class="text-light font-small">/ month</span></span>
                            </header>
                            <!-- End Header -->
                            <!-- Content -->
                            <div class="card-body">
                                <p class="font-weight-normal">Everything in the Free Plan:</p>
                                <div class="d-flex">
                                    <div class="icon-md lh-180 mr-3"><i class="fas fa-check-circle"></i></div>
                                    <p>Rank booster</p>
                                </div>
                                <div class="d-flex">
                                    <div class="icon-md lh-180 mr-3"><i class="fas fa-check-circle"></i></div>
                                    <p>Lead capturing buttons</p>
                                </div>
                                <div class="d-flex">
                                    <div class="icon-md lh-180 mr-3"><i class="fas fa-check-circle"></i></div>
                                    <p>Connect your social media</p>
                                </div>
                                <div class="d-flex">
                                    <div class="icon-md lh-180 mr-3"><i class="fas fa-check-circle"></i></div>
                                    <p>Display your contact info</p>
                                </div>
                                <div class="d-flex">
                                    <div class="icon-md lh-180 mr-3"><i class="fas fa-check-circle"></i></div>
                                    <p>Link to your website</p>
                                </div>
                                <div class="d-flex">
                                    <div class="icon-md lh-180 mr-3"><i class="fas fa-check-circle"></i></div>
                                    <p>Promote your best review</p>
                                </div>
                                <div class="d-flex">
                                    <div class="icon-md lh-180 mr-3"><i class="fas fa-check-circle"></i></div>
                                    <p>Booking & Lead Logs</p>
                                </div>
                                <div class="d-flex">
                                    <div class="icon-md lh-180 mr-3"><i class="fas fa-check-circle"></i></div>
                                    <p>Priority customer support</p>
                                </div>
                                <button type="button" class="btn btn-outline-primary btn-block mt-4" tabindex="0"><span class="fas fa-cart-plus mr-3"></span>Add to Cart</button>
                            </div>
                            <!-- End Content -->
                        </div>
                    </div>
                    <!-- End of Pricing Card -->
                </div>
                <div class="col-12 mb-4 col-lg-4">
                    <!-- Pricing Card -->
                    <div class="pricing-card">
                        <div class="card shadow-sm border-soft p-4">
                            <!-- Header -->
                            <header class="card-header border-bottom bg-white text-center">
                                <h3 class="font-weight-normal text-gray mb-4">Gold</h3><span class="d-block"><span class="display-1 text-primary font-weight-bold"><span class="align-top font-medium">$</span>49 </span><span class="text-light font-small">/ month</span></span>
                            </header>
                            <!-- End Header -->
                            <!-- Content -->
                            <div class="card-body">
                                <p class="font-weight-normal mb-4">Everything in the other Plans:</p>
                                <div class="d-flex">
                                    <div class="icon-md lh-180 mr-3"><i class="fas fa-check-circle"></i></div>
                                    <p>Appear at the top of your city's search page</p>
                                </div>
                                <div class="d-flex">
                                    <div class="icon-md lh-180 mr-3"><i class="fas fa-check-circle"></i></div>
                                    <p>Appear at the top of popular spaces page</p>
                                </div>
                                <div class="d-flex">
                                    <div class="icon-md lh-180 mr-3"><i class="fas fa-check-circle"></i></div>
                                    <p>Receive a special "Popular Now" banner</p>
                                </div>
                                <div class="d-flex">
                                    <div class="icon-md lh-180 mr-3"><i class="fas fa-check-circle"></i></div>
                                    <p>A custom pin drop on the map</p>
                                </div>
                                <div class="d-flex">
                                    <div class="icon-md lh-180 mr-3"><i class="fas fa-check-circle"></i></div>
                                    <p>Spaces Instagram takeover (*annual subscriber)</p>
                                </div>
                                <div class="d-flex">
                                    <div class="icon-md lh-180 mr-3"><i class="fas fa-check-circle"></i></div>
                                    <p>Priority customer support and on boarding</p>
                                </div>
                                <div class="d-flex">
                                    <div class="icon-md lh-180 mr-3"><i class="fas fa-check-circle"></i></div>
                                    <p>Advertising campaign</p>
                                </div>
                                <button type="button" class="btn btn-outline-primary btn-block mt-4" tabindex="0"><span class="fas fa-cart-plus mr-3"></span>Add to Cart</button>
                            </div>
                            <!-- End Content -->
                        </div>
                    </div>
                    <!-- End of Pricing Card -->
                </div>
            </div>
        </div>
    </section> --}}
    <!-- Section -->
    {{-- <div class="section bg-soft">
        <div class="container">
            <div class="row align-items-center justify-content-center">
                <div class="col-sm-12 col-md-10 col-lg-9 text-center">
                    <!-- Tab -->
                    <div class="nav-wrapper">
                        <ul class="nav nav-pills testimonial-nav nav-pill-circle flex-sm-row justify-content-center" id="tab-34" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link text-sm-center avatar-link active" id="tab-link-example-13" data-toggle="tab" href="#link-example-13" role="tab" aria-controls="link-example-13" aria-selected="true"><img class="rounded-circle" src="img/team/profile-image-1.jpg" alt="Image Description"></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-sm-center avatar-link" id="tab-link-example-14" data-toggle="tab" href="#link-example-14" role="tab" aria-controls="link-example-14" aria-selected="false"><img class="rounded-circle" src="img/team/profile-image-2.jpg" alt="Image Description"></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-sm-center avatar-link" id="tab-link-example-15" data-toggle="tab" href="#link-example-15" role="tab" aria-controls="link-example-15" aria-selected="false"><img class="rounded-circle" src="img/team/profile-image-3.jpg" alt="Image Description"></a>
                            </li>
                        </ul>
                    </div>
                    <!-- End of Tab Nav -->
                    <!-- Tab Content -->
                    <div class="card border-0">
                        <div class="card-body bg-soft p-0">
                            <div class="tab-content" id="tabcontentexample-5">
                                <div class="tab-pane fade show active" id="link-example-13" role="tabpanel" aria-labelledby="tab-link-example-13"><span class="d-block my-3"><i class="star fas fa-star text-warning"></i> <i class="star fas fa-star text-warning"></i> <i class="star fas fa-star text-warning"></i> <i class="star fas fa-star text-warning"></i> <i class="star fas fa-star text-warning"></i></span>
                                    <blockquote class="blockquote">I used Themesberg's logo creation services along with their website development services. They have been a pleasure to work with and have been responsive to all questions asked. I have recommended them to some of my clients.
                                        <footer class="blockquote-footer mt-4 text-primary">Oana Calota</footer>
                                    </blockquote>
                                </div>
                                <div class="tab-pane fade" id="link-example-14" role="tabpanel" aria-labelledby="tab-link-example-14"><span class="d-block my-3"><i class="star fas fa-star text-warning"></i> <i class="star fas fa-star text-warning"></i> <i class="star fas fa-star text-warning"></i> <i class="star fas fa-star text-warning"></i> <i class="star fas fa-star text-warning"></i></span>
                                    <blockquote class="blockquote">I have worked with Themesberg over the years on a number of projects. I've always found them to be responsive, friendly and up-to-date with all the technology - which everyone knows is constantly changing. I recommend Netclues completely.
                                        <footer class="blockquote-footer mt-4 text-primary">Zoltan Szőgyényi</footer>
                                    </blockquote>
                                </div>
                                <div class="tab-pane fade" id="link-example-15" role="tabpanel" aria-labelledby="tab-link-example-15"><span class="d-block my-3"><i class="star fas fa-star text-warning"></i> <i class="star fas fa-star text-warning"></i> <i class="star fas fa-star text-warning"></i> <i class="star fas fa-star text-warning"></i> <i class="star fas fa-star text-warning"></i></span>
                                    <blockquote class="blockquote">Themesberg are the best in the business for website design and building. They worked hard to give us exactly what we wanted and more for our website and delivered on time. We would definitely use them again in the future.
                                        <footer class="blockquote-footer mt-4 text-primary">Tanislav Robert</footer>
                                    </blockquote>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End of Tab -->
                </div>
            </div>
        </div>
    </div> --}}
    <!-- End of section -->
    {{-- <section class="section bg-white">
        <div class="container">
            <div class="mb-6 text-center">
                <h2 class="font-weight-light mb-4">Are you ready for Spaces?</h2>
                <p class="lead">Check out our offers:</p>
            </div>
            <div class="row justify-content-center">
                <div class="col-lg-12">
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead class="thead-inverse">
                                <tr>
                                    <th class="h6 py-4" style="width: 40%">Features</th>
                                    <th class="h6 py-4 font-weight-light">Standard License</th>
                                    <th class="h6 py-4">Extended License</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="option h6 font-weight-light">Create single websites for client</td>
                                    <td><i class="fa fa-check text-success"></i></td>
                                    <td><i class="fa fa-check text-success"></i></td>
                                </tr>
                                <tr>
                                    <td class="option h6 font-weight-light">Create single personal website</td>
                                    <td><i class="fa fa-check text-success"></i></td>
                                    <td><i class="fa fa-check text-success"></i></td>
                                </tr>
                                <tr>
                                    <td class="option h6 font-weight-light">6 months support included</td>
                                    <td><i class="fa fa-check text-success"></i></td>
                                    <td><i class="fa fa-check text-success"></i></td>
                                </tr>
                                <tr>
                                    <td class="option h6 font-weight-light">Create multiple personal websites</td>
                                    <td><i class="fas fa-times text-danger"></i></td>
                                    <td><i class="fa fa-check text-success"></i></td>
                                </tr>
                                <tr>
                                    <td class="option h6 font-weight-light">Create multiple websites for clients</td>
                                    <td><i class="fas fa-times text-danger"></i></td>
                                    <td><i class="fa fa-check text-success"></i></td>
                                </tr>
                            </tbody>
                            <tfoot class="thead-inverse">
                                <tr>
                                    <th class="w-25"></th>
                                    <th class="py-4"><a href="https://themes.getbootstrap.com/product/spaces/" target="_blank" class="btn btn-sm btn-primary font-weight-bold animate-up-2 d-none d-md-inline-block">Buy Standard License - $49</a></th>
                                    <th class="py-4"><a href="https://themes.getbootstrap.com/product/spaces/" target="_blank" class="btn btn-sm btn-outline-dark font-weight-bold d-none d-md-inline-block">Buy Extended License - $449</a></th>
                                </tr>
                            </tfoot>
                        </table>
                        <div class="d-flex justify-content-between"><a href="https://themes.getbootstrap.com/product/spaces/" target="_blank" class="btn btn-sm btn-primary font-weight-bold animate-up-2 d-md-none mr-3">Buy Standard License - $49</a> <a href="https://themes.getbootstrap.com/product/spaces/" target="_blank" class="btn btn-sm btn-outline-dark font-weight-bold d-md-none">Buy Extended License - $449</a></div>
                    </div>
                </div>
            </div>
        </div>
    </section> --}}
</main>
 @endsection