@extends('layouts.adminLayout.admin_design')
@section('content')


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
        Өрөө оруулах
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
                        <input type="radio" id="homepage1" name="homepage1" checked="" value="0">
                        <label for="homepage1">Тийм
                        </label>
                    </div>

                    <div class="icheck-primary d-inline">
                        <input type="radio" id="homepage2" name="homepage1" value="1">
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
                        <input type="file" name="image" id="image">
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