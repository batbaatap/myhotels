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


        <div class="alert alert-warning alert-dismissible fade show" role="alert">
            Тохирох зургийн хэмжээ: 1400 x 800px
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>



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
        <form action="{{url('admin/room/add-room')}}" method="POST" 
        enctype = "multipart/form-data" 
        class="form-horizontal" 
        novalidate="novalidate" id="add-room">
            {{ csrf_field() }}
            
            <div class="card card-default">
                <div class="card-header">
                    <h1 style="float:left; font-weight:100; font-size:24px;">
                        <svg style="width:19px;" class="svg-inline--fa fa-wrench fa-w-16 fa-fw" style="wi" aria-hidden="true" data-fa-processed="" data-prefix="fas" data-icon="wrench" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path fill="currentColor" d="M481.156 200c9.3 0 15.12 10.155 10.325 18.124C466.295 259.992 420.419 288 368 288c-79.222 0-143.501-63.974-143.997-143.079C223.505 65.469 288.548-.001 368.002 0c52.362.001 98.196 27.949 123.4 69.743C496.24 77.766 490.523 88 481.154 88H376l-40 56 40 56h105.156zm-171.649 93.003L109.255 493.255c-24.994 24.993-65.515 24.994-90.51 0-24.993-24.994-24.993-65.516 0-90.51L218.991 202.5c16.16 41.197 49.303 74.335 90.516 90.503zM104 432c0-13.255-10.745-24-24-24s-24 10.745-24 24 10.745 24 24 24 24-10.745 24-24z"></path></svg>
                        Өрөө &nbsp;  
                    </h1>    
                    <a href="/admin/room/add-room" class="btn btn-danger rounded-0 btn-sm">
                        <i class="fas fa-plus"></i>  &nbsp;Нэмэх
                    </a>
                    <a href="/admin/room/view-rooms" class="btn btn-primary rounded-0 btn-sm">
                        <i class="fas fa-reply"></i>  &nbsp;Буцах
                    </a>
                </div>


            <div class="card-body  table-responsive ">
                
                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label text-right">Зочид буудал</label>
                        <div class="col-sm-6">
                            <select class="form-control" name="room_id_hotel" style="width: 100%;">
                                <?php echo $hotels_drop_down; ?>
                            </select>
                        </div>
                </div>

                <!-- title -->
                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label text-right">Нэр</label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" id="room_title" name="room_title" value="" >
                    </div>
                </div>

                <!-- subtitle -->
                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label text-right">Subtitle</label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" id="room_subtitle" name="room_subtitle" value="" >
                    </div>
                </div>

                <!-- Alias -->
                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label text-right">Alias</label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" id="room_alias" name="room_alias" value="" >
                    </div>
                </div>

                {{-- children --}}
                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label text-right">Хүүхдийн тоо:</label>
                        <div class="col-sm-6">
                            <select class="form-control" name="room_max_children" style="width: 100%;">
                                <option value selected="selected">-</option>
                                @php
                                    $children = 20;
                                @endphp
                                @for ($i = 0; $i < $children; $i++)
                                    <option value={{$i}}> {{$i}}</option>
                                @endfor
                            </select>
                        </div>
                </div>

                {{-- ad --}}
                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label text-right">Том хүний тоо:</label>
                        <div class="col-sm-6">
                            <select class="form-control" name="room_max_adults" style="width: 100%;">
                                <option value selected="selected">-</option>
                                @php
                                    $ad = 20;
                                @endphp
                                @for ($i = 0; $i < $ad; $i++)
                                    <option value={{$i}}>{{$i}}</option>
                                @endfor
                            </select>
                        </div>
                </div>

                {{-- pe --}}
                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label text-right">Хүний тоо ихдээ:</label>
                        <div class="col-sm-6">
                            <select class="form-control" name="room_max_people" style="width: 100%;">
                                <option value selected="selected">-</option>
                                @php
                                    $maxpe = 20;
                                @endphp
                                @for ($i = 0; $i < $maxpe; $i++)
                                    <option value={{$i}}>{{$i}}</option>
                                @endfor
                            </select>
                        </div>
                </div>

                {{-- pe --}}
                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label text-right">Хүний тоо багадаа:</label>
                        <div class="col-sm-6">
                            <select class="form-control" name="room_min_people" style="width: 100%;">
                                <option value selected="selected">-</option>
                                @php
                                    $minpe = 20;
                                @endphp
                                @for ($i = 0; $i < $minpe; $i++)
                                    <option value={{$i}}>{{$i}}</option>
                                @endfor
                            </select>
                        </div>
                </div>

                <!-- desc -->
                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label text-right">Description</label>
                    <div class="col-sm-6">
                        <textarea class="textarea" name="room_descr" placeholder="Place some text here"
                                style="width: 100%; height: 300px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label text-right">Facility сонгох </label>
                    <div class="col-lg-6">
                        <div class="card card-default">
                            <div class="card-body">
                                <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                    <select class="duallistbox" multiple="multiple" id="room_facilities" name="room_facilities[]">
                                        <?php echo $facilities_drop_down; ?>
                                    </select>
                                    </div>
                                </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- room_stock -->
                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label text-right">Өрөөний тоо</label>
                    <div class="col-sm-6">
                        <input type="number" class="form-control" id="room_stock" name="room_stock" value="" >
                    </div>
                </div>

                <!-- room_price -->
                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label text-right">Өрөөний үнэ/1 шөнө</label>
                    <div class="col-sm-6">
                        <input type="number" class="form-control" id="room_price" name="room_price" value="" >
                    </div>
                </div>

                
                {{-- relase --}}
                <div class="form-group row">.
                        <label for="inputEmail3" class="col-sm-2 col-form-label text-right">Release</label>
                        
                        <div class="col-sm-6">
                            <div class="icheck-primary d-inline">
                                <input type="radio" id="pub1" name="checked" checked="" value="1">
                                <label for="pub1">Published
                                </label>
                            </div>

                            <div class="icheck-primary d-inline">
                                <input type="radio" id="pub2" name="checked" value="2">
                                <label for="pub2"> Not published
                                </label>
                            </div>

                            <div class="icheck-primary d-inline">
                                <input type="radio" id="pub3" name="checked" value="0">
                                <label for="pub3">Awaiting
                                </label>
                            </div>

                            <div class="icheck-primary d-inline">
                                <input type="radio" id="pub4" name="checked" value="3">
                                <label for="pub4">Archived
                                </label>
                            </div>
                        </div>
                    </div>

                {{-- relase --}}
                <div class="form-group row">.
                        <label for="inputEmail3" class="col-sm-2 col-form-label text-right">Нүүр хуудас дээр гаргах</label>
                        
                        <div class="col-sm-6">
                            <div class="icheck-primary d-inline">
                                <input type="radio" id="homepage1" name="homepage1" checked="" value="1">
                                <label for="homepage1">Тийм
                                </label>
                            </div>

                            <div class="icheck-primary d-inline">
                                <input type="radio" id="homepage2" name="homepage1" value="0">
                                <label for="homepage2"> Үгүй
                                </label>
                            </div>
                        </div>
                    </div>
                    
                {{-- image --}}
                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label text-right">Зураг</label>
                    <div class="col-sm-6">
                        <div class="controls">
                            <input type="file" name="filename" id="filename">
                        </div>
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