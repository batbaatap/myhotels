@extends('layouts.adminLayout.admin_design')
@section('content')



<div class="col-md-6">
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
    </div>


<form action="{{url('admin/hotel/add-hotel')}}" method="POST" enctype = "multipart/form-data" novalidate="novalidate" id="add-hotel">
    {{ csrf_field() }}
<div class="card card-default">
    <div class="card-header">
        Зочид буудал оруулах 
    </div>
    <div class="card-body  table-responsive ">
         
        <!-- title -->
         <div class="form-group row">
            <label for="inputEmail3" class="col-sm-2 col-form-label text-right">Нэр</label>
            <div class="col-sm-6">
                <input type="text" class="form-control" id="hotel_title" name="hotel_title" value="" >
            </div>
        </div>

        <!-- subtitle -->
        <div class="form-group row">
            <label for="inputEmail3" class="col-sm-2 col-form-label text-right">Subtitle</label>
            <div class="col-sm-6">
                <input type="text" class="form-control" id="hotel_subtitle" name="hotel_subtitle" value="" >
            </div>
        </div>

        <!-- subtitle -->
        <div class="form-group row">
            <label for="inputEmail3" class="col-sm-2 col-form-label text-right">Alias</label>
            <div class="col-sm-6">
                <input type="text" class="form-control" id="hotel_alias" name="hotel_alias" value="" >
            </div>
        </div>

        <!-- desc -->
        <div class="form-group row">
            <label for="inputEmail3" class="col-sm-2 col-form-label text-right">Description</label>
            <div class="col-sm-6">
                <textarea class="textarea" name="hotel_description" placeholder="Place some text here"
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
                            <select class="duallistbox" multiple="multiple" name="hotel_facilities[]">

                                <?php echo $facilities_drop_down; ?>
                            </select>
                            </div>
                        </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

{{-- dest --}}
        <div class="form-group row">
            <label for="inputEmail3" class="col-sm-2 col-form-label text-right">Чиглэл</label>
                <div class="col-sm-6">
                    <select class="form-control" name="id_destination" style="width: 100%;">
                        <?php echo $destinations_drop_down; ?>
                    </select>
                </div>
        </div>

{{-- star --}}
        <div class="form-group row">.
            <label for="inputEmail3" class="col-sm-2 col-form-label text-right">Одны зэрэглэл</label>
            <div class="col-sm-6">
                <div class="icheck-primary d-inline">
                <input type="radio" id="radioPrimary1" name="hotel_class" checked="" value="0">
                <label for="radioPrimary1">None
                </label>
                </div>
                <div class="icheck-primary d-inline">
                <input type="radio" id="radioPrimary2" name="hotel_class" value="1">
                <label for="radioPrimary2">1 Од
                </label>
                </div>
                <div class="icheck-primary d-inline">
                <input type="radio" id="radioPrimary3" name="hotel_class" value="2">
                <label for="radioPrimary3">2 Од
                </label>
                </div>
                <div class="icheck-primary d-inline">
                <input type="radio" id="radioPrimary4" name="hotel_class" value="3">
                <label for="radioPrimary4">3 Од
                </label>
                </div>
                <div class="icheck-primary d-inline">
                <input type="radio" id="radioPrimary5" name="hotel_class" value="4">
                <label for="radioPrimary5">4 Од
                </label>
                </div>
                <div class="icheck-primary d-inline">
                <input type="radio" id="radioPrimary6" name="hotel_class" value="5">
                <label for="radioPrimary6">5 Од
                </label>
                </div>
            </div>
        </div>
            

        <!-- phone -->
        <div class="form-group row">
            <label for="inputEmail3" class="col-sm-2 col-form-label text-right">Утас</label>
            <div class="col-sm-6">
                <input type="number" class="form-control" id="hotel_phone" name="hotel_phone" value="" >
            </div>
        </div>

        <!-- phone -->
        <div class="form-group row">
            <label for="inputEmail3" class="col-sm-2 col-form-label text-right">Имэйл</label>
            <div class="col-sm-6">
                <input type="text" class="form-control" id="hotel_email" name="hotel_email" value="" >
            </div>
        </div>
        <!-- web -->
        <div class="form-group row">
            <label for="inputEmail3" class="col-sm-2 col-form-label text-right">Web</label>
            <div class="col-sm-6">
                <input type="text" class="form-control" id="hotel_web" name="hotel_web" value="" >
            </div>
        </div>
        <!-- address -->
        <div class="form-group row">
            <label for="inputEmail3" class="col-sm-2 col-form-label text-right">Address</label>
            <div class="col-sm-6">
                <input type="text" class="form-control" id="hotel_address" name="hotel_address" value="" >
            </div>
        </div>
        <!-- lat -->
        <div class="form-group row">
            <label for="inputEmail3" class="col-sm-2 col-form-label text-right">lat</label>
            <div class="col-sm-6">
                <input type="text" class="form-control" id="hotel_lat" name="hotel_lat" value="" >
            </div>
        </div>
        <!-- long -->
        <div class="form-group row">
            <label for="inputEmail3" class="col-sm-2 col-form-label text-right">long</label>
            <div class="col-sm-6">
                <input type="text" class="form-control" id="hotel_long" name="hotel_long" value="" >
            </div>
        </div>
        

        {{-- release --}}
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


        {{-- release --}}
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
                
                <div class="form-group">
                    <div class="col-sm-9 col-sm-offset-4">
                        <button type="submit" class="btn btn-primary" name="signup1" value="Sign up">Хадгалах</button>
                    </div>
                </div>
        </div>
</div>

</form>
@endsection