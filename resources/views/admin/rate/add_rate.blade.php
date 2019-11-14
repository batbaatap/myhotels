@extends('layouts.adminLayout.admin_design')
@section('content')


        @if(Session::has('flash_message_error'))
        <div class="alert alert-error alert-block">
            <button type="button" class="close" data-dismiss="alert">×</button> 
                <strong>{!! session('flash_message_error') !!}</strong>
        </div>
        @endif   
        @if(Session::has('flash_message_success'))
        <div class="alert alert-success alert-block">
            <button type="button" class="close" data-dismiss="alert">×</button> 
                <strong>{!! session('flash_message_success') !!}</strong>
        </div>
        @endif

        <div class="col-md-6">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        {{-- <li>{{ $error }}</li> --}}
                        <li>Талбаруудыг бүтэн бөглөнө үү</li>
                    @endforeach
                </ul>
            </div>
        @endif
        </div>


        <form action="{{url('admin/rate/add-rate')}}" method="POST" 
        enctype = "multipart/form-data" 
        class="form-horizontal" 
        novalidate="novalidate" id="add-rate">
            {{ csrf_field() }}
            
            <div class="card card-default">
                <div class="card-header">
                    <h1 style="float:left; font-weight:100; font-size:24px;">
                        <svg style="width:19px;" class="svg-inline--fa fa-wrench fa-w-16 fa-fw" style="wi" aria-hidden="true" data-fa-processed="" data-prefix="fas" data-icon="wrench" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path fill="currentColor" d="M481.156 200c9.3 0 15.12 10.155 10.325 18.124C466.295 259.992 420.419 288 368 288c-79.222 0-143.501-63.974-143.997-143.079C223.505 65.469 288.548-.001 368.002 0c52.362.001 98.196 27.949 123.4 69.743C496.24 77.766 490.523 88 481.154 88H376l-40 56 40 56h105.156zm-171.649 93.003L109.255 493.255c-24.994 24.993-65.515 24.994-90.51 0-24.993-24.994-24.993-65.516 0-90.51L218.991 202.5c16.16 41.197 49.303 74.335 90.516 90.503zM104 432c0-13.255-10.745-24-24-24s-24 10.745-24 24 10.745 24 24 24 24-10.745 24-24z"></path></svg>
                        Үнэ &nbsp;  
                    </h1>    
                    <a href="/admin/rate/add-rate" class="btn btn-danger rounded-0 btn-sm">
                        <i class="fas fa-plus"></i>  &nbsp;Нэмэх
                    </a>
                    <a href="/admin/rate/view-rates" class="btn btn-primary rounded-0 btn-sm">
                        <i class="fas fa-reply"></i>  &nbsp;Буцах
                    </a>
                </div>

            <div class="card-body  table-responsive ">
                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label text-right">Зочид буудал</label>
                    <div class="col-sm-6">
                        <select class="form-control" name="rate_id_hotel" style="width: 100%;">
                            <?php echo $hotels_drop_down; ?>
                        </select>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label text-right">Өрөө</label>
                    <div class="col-sm-6">
                        <select class="form-control" name="rate_id_room" style="width: 100%;">
                            <?php echo $rooms_drop_down; ?>
                        </select>
                    </div>
                </div>

                {{-- datepciker --}}
                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label text-right">Орох, Гарах өдөр</label>
                    <div class="col-sm-6">
                        
                            <div id="reportrange">
                                <span></span>
                            </div>
                    <div class="input-group">
                        <div class="input-group-prepend">
                        <span class="input-group-text">
                            <i class="far fa-calendar-alt"></i>
                        </span>
                        </div>
                        <input type="text" name="date_from_and_date_to" class="form-control float-right" id="reservation">
                    </div>
                   
                    <!-- /.input group -->
                    </div>
                </div>

                <!-- subtitle -->
                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label text-right">Багц</label>
                    <div class="col-sm-6">
                        <select name="rate_id_package" class="form-control">
                            <option value="" selected="selected">-</option>
                            <option value="4">2 nights</option>
                            <option value="3">Mid-week</option>
                            <option value="2">Night</option>
                            <option value="6">Week</option>
                            <option value="1">Week-end</option>
                            </select>
                        
                    </div>
                </div>

                <!-- Alias -->
                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label text-right">Үнэ</label>
                    <div class="col-sm-6">
                        <input type="text" name="rate_price" id="rate_price_0_0" value="" rel="rate_price_0" class="form-control">
                    </div>
                </div>

                <!-- Num people -->
                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label text-right">Хүний тоо</label>
                    <div class="col-sm-6">
                        <input type="text" name="rate_people" id="rate_people_0_0" value="" rel="rate_people_0" class="form-control">
                    </div>
                </div>

                <!-- Num people -->
                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label text-right">Хөнгөлөлт</label>
                    <div class="col-sm-6">
                        <input type="text" name="rate_discount" id="rate_discount_0_0" value="" rel="rate_discount_0" class="form-control">
                    </div>
                </div>
            
            
                    
                </div>
                
                <div class="card-footer">
                        {{-- <button id="add-room" type="submit">Хадгалах</button> --}}

                        <div class="form-group">
                            <div class="col-sm-9 col-sm-offset-4">
                                <button type="submit" class="btn btn-primary" name="signup1" value="Sign up">Хадгалах</button>
                            </div>
                        </div>
                </div>

            

        </div>

        </form>
@endsection