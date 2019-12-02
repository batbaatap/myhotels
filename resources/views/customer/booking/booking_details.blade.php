@extends('layouts.frontLayout.front_design')
@section('content')
<div class="container">

<form action="{{url('/booking/payment')}}" method="POST" enctype = "multipart/form-data" novalidate="novalidate" id="user_register">
        {{ csrf_field() }}
      
            <div class="row my-4  row my-4  pt-4 ">
                <div class="col-8">
                    <div class="card p-3">
                        <h5 class="font-weight-normal">Захиалгын мэдээлэл</h5>
                        <div class="table-responsive">
                            @foreach($hotels as $value) 
                        {{-- <div class="container">
                            <div class="row">
                                <div class="col-6">
                                        end zurag opj ipne
                                </div>

                                <div class="col-6">
                                    <div><span><i class="fas fa-home"></i></span> <span>{{$value->hotel_name}}</span></div>
                                    <div><span><i class="fas fa-map-marker-alt"></i></span> <span>{{$value->des_address}}</span></div>
                                    <div><span><i class="fas fa-phone"></i></span> <span>{{$value->phone}}</span></div>
                                </div>
                            </div>
                        </div> --}}
                            @endforeach
                                <table class="table table-striped">
                                    <thead class="thead-inverse">
                                        <tr>
                                            <th class="h6 py-4" style="width: 40%">Ирэх өдөр</th>
                                            <th class="h6 py-4 font-weight-light">Гарах Өдөр</th>
                                            <th class="h6 py-4">Хугацаа</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td class="option h6 font-weight-light datefrom1">
                                                <input style="border:none;background: white;display:none; " type="text" name="bookingfrom" class="datefrom11" />
                                            </td>
                                            <td class="dateto1">
                                                {{-- <i class="fa fa-check text-success"></i> --}}
                                                <input style="border:none;background: white;display:none; " type="text" name="bookingto" class="dateto11" />
                                            </td>
                                            {{-- <td><i class="fa fa-check text-success"></i></td> --}}
                                            <td class="diffrence">
                                            </td>
                                            <input type="hidden" class="diffrence" name="honog" value="">
                                        </tr>
                                       
                                    </tbody>
                                    <tfoot class="thead-inverse">
                                        {{--- <tr>
                                            <th class="w-25"></th>
                                            <th class="py-4"><a href="https://themes.getbootstrap.com/product/spaces/" target="_blank" class="btn btn-sm btn-primary font-weight-bold animate-up-2 d-none d-md-inline-block">Buy Standard License - $49</a></th>
                                            <th class="py-4"><a href="https://themes.getbootstrap.com/product/spaces/" target="_blank" class="btn btn-sm btn-outline-dark font-weight-bold d-none d-md-inline-block">Buy Extended License - $449</a></th>
                                        </tr> ---}}
                                    </tfoot>
                                </table>
                                <div class="d-flex justify-content-between"><a href="https://themes.getbootstrap.com/product/spaces/" target="_blank" class="btn btn-sm btn-primary font-weight-bold animate-up-2 d-md-none mr-3">Buy Standard License - $49</a> <a href="https://themes.getbootstrap.com/product/spaces/" target="_blank" class="btn btn-sm btn-outline-dark font-weight-bold d-md-none">Buy Extended License - $449</a></div>
                            </div>


     
                            <input type="hidden" value="{{$hotelEyed}}" name="hotelId">
                            <br>
                         
                            <div class="table-responsive">
                                <table class="table table-striped orderedUruu">
                                    <thead class="thead-inverse">
                                        <tr>
                                            <th class="h6 py-4" style="width: 40%">Өрөөний төрөл</th>
                                            {{-- <th class="h6 py-4 font-weight-light">Тоо ширхэг</th> --}}
                                            <th class="h6 py-4">Үнэ</th>
                                            {{-- <th class="h6 py-4">Нийт хоногийн үнэ</th> --}}
                                        </tr>
                                    </thead>
                                    
                                    <tbody class="bb" style="background-color: #f3f7fa;"></tbody>
                                    </tbody>
                                    
                                    <tfoot class="thead-inverse">
                                        {{-- <tr>
                                                <th class="h6 py-4" style="width: 60%">Нийт үнэ</th>
                                                <th class="h6 py-4">Үнэ</th> --}}
                                            {{-- <th class="w-25"></th>
                                            <th class="py-4"><a href="https://themes.getbootstrap.com/product/spaces/" target="_blank" class="btn btn-sm btn-primary font-weight-bold animate-up-2 d-none d-md-inline-block">Buy Standard License - $49</a></th>
                                            <th class="py-4"><a href="https://themes.getbootstrap.com/product/spaces/" target="_blank" class="btn btn-sm btn-outline-dark font-weight-bold d-none d-md-inline-block">Buy Extended License - $449</a></th> --}}
                                        {{-- </tr> --}}
                                    </tfoot>
                                </table>
                                <div class="d-flex justify-content-between"><a href="https://themes.getbootstrap.com/product/spaces/" target="_blank" class="btn btn-sm btn-primary font-weight-bold animate-up-2 d-md-none mr-3">Buy Standard License - $49</a> <a href="https://themes.getbootstrap.com/product/spaces/" target="_blank" class="btn btn-sm btn-outline-dark font-weight-bold d-md-none">Buy Extended License - $449</a></div>
                            </div>


                    {{-- <br/> --}}

                    {{-- <div>
                       
                        <br/>

                        <h5>Захиалсан өрөөнүүд</h5>
                        <br/>
                        <table class="table orderedUruu table-bordered">
                            <thead>
                                <tr> --}}
                                    {{-- <th>Төрөл </th> --}}
                                    {{-- <th>Буудал</th>
                                    <th>Өрөө</th> --}}
                                    {{-- <th>Тоо ширхэг</th>
                                    <th>Үнэ</th> --}}
                                    {{-- <th>Хямдарсан үнэ</th> --}}
                                {{-- </tr>
                            </thead>

                            <tbody class="bb"></tbody>
                        </table>
                        <br/> --}}
                        
                        {{-- <h6>ЦУЦЛАЛТЫН НӨХЦӨЛ</h6>

                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Цуцлагдах хугацаа </th>
                                    <th>Нийт үнийн дүнгийн</th>
                                    <th>Торгууль (MNT)</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        <p id="cancel_time"></p>

                                    </td>
                                    <td>Эхний өдрийн төлбөр </td>
                                    <td>MNT 350,000 </td>
                                </tr>

                            </tbody>
                        </table> --}}

                    {{-- </div> --}}

                </div>
                </div>

                <div class="col-4 ">
                    <div class="card p-3">
                        <h5 class="font-weight-normal">Хэрэглэгчийн мэдээлэл</h5>
                            <div class="form-group">
                                <div class="input-group mb-1">
                                    <div class="input-group-prepend"><span class="input-group-text"><i class="far fa-user"></i></span></div>
                                    <input name="lastname" class="form-control" placeholder="Нэр" type="text" required="">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="input-group mb-1">
                                    <div class="input-group-prepend"><span class="input-group-text"><i class="far fa-envelope"></i></span></div>
                                    <input name="email" class="form-control" placeholder="Имэйл" type="email" required="">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="input-group mb-1">
                                    <div class="input-group-prepend"><span class="input-group-text"><i class="fas fa-mobile"></i></span></div>
                                    <input name="phone" class="form-control" placeholder="Утас" type="number" required="">
                                </div>
                            </div>
                            {{-- <div class="form-group">
                                <textarea class="form-control" placeholder="Write short message to host" id="message" rows="4" required=""></textarea>
                            </div> --}}
                            <div class="text-center">
                                <button type="submit" onclick="localdelete()" class="btn btn-block btn-primary mt-2">Захиалах</button>
                            </div>
                    </div>





{{--                         
                        <div class="form-group">
                            <input name="lastname" type="text" class="form-control" placeholder="Нэр" />
                        </div>
                        
                        <div class="form-group">
                            <input name="email" type="text" class="form-control" placeholder="Имэйл" />
                        </div>
                        
                        <div class="form-group">
                            <input name="phone" type="text" class="form-control" placeholder="Утас" />
                        </div>
						 --}}
                        {{-- <div class="form-group" >
                            <label for="exampleFormControlTextarea1">Хүсэлт</label>
                            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="feedback" ></textarea>
                        </div>
                        
                        <p>Нийт үнэ</p>
                        <div class="card" style="width: 7rem;">MNT 460,000</div><br/> --}}
                        {{-- <span> <input type="checkbox" name="checkbox" class="checkbox"> Үйлчилгээний нөхцөл хүлээн зөвшөөрөх </span> --}}
                        {{-- <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="customCheck" name="checkbox">
                            <label class="custom-control-label" for="customCheck">Үйлчилгээний нөхцөл хүлээн зөвшөөрөх</label>
                        </div>  --}}
                        {{-- <input class="btn btn-outline-success " onclick="localdelete()" type="submit" value="Захиалах"> --}}

                        
                </div>
            </div>

            
            <div class="row">  
                <div class="col-md-12  p-3 mb-3">
                     
                      <a href="javascript:history.back()" class="btn btn-primary float-left"> Буцах</a>
  
  
                           {{-- <input type="number" name="hh" class="form-control custom-selects listen-room-too" min="0" max="{{$r->uruunii_zuruu}}" placeholder="өрөө" onkeyup = "this.value = minmaxfuncz(this.value, 0, {{$r->uruunii_zuruu}} )"><br/>
                                <input type="number"  name="pp" class="form-control"   min="0" max="{{$r->max_people}}" placeholder="хүн"><br/> --}}
  
                              
                          {{-- <button class="btn btn-primary float-right" >Дараах</button> --}}
                      </form>
              </div>  
          </div>  {{-- row div --}}


        </form>
</div>

<style>
    .turul {
        border: none;
        background: white;
    }
</style>
{{-- 

<script type="text/javascript">

      if(localStorage.getItem("seData") == null) {
        window.location = '/hotel';
      } 

</script> --}}



 @endsection
 
