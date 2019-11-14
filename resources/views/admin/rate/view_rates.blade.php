@extends('layouts.adminLayout.admin_design')
@section('content')

@if(Session::has('flash_message_error'))
<div class="alert alert-danger">
    <button type="button" class="close" data-dismiss="alert">×</button> 
        <strong>{!! session('flash_message_error') !!}</strong>
</div>
@endif   
@if(Session::has('flash_message_success'))
<div class="alert alert-success">
    <button type="button" class="close" data-dismiss="alert">×</button> 
        <strong>{!! session('flash_message_success') !!}</strong>
</div>
@endif

{{-- <div class="row"> --}}
<div class="card">
    <div class="card-header">
        <h1 style="float:left; font-weight:100; font-size:24px;">
            <svg style="width:19px;" class="svg-inline--fa fa-h-square fa-w-14 fa-fw" aria-hidden="true" data-fa-processed="" data-prefix="fas" data-icon="h-square" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path fill="currentColor" d="M448 80v352c0 26.51-21.49 48-48 48H48c-26.51 0-48-21.49-48-48V80c0-26.51 21.49-48 48-48h352c26.51 0 48 21.49 48 48zm-112 48h-32c-8.837 0-16 7.163-16 16v80H160v-80c0-8.837-7.163-16-16-16h-32c-8.837 0-16 7.163-16 16v224c0 8.837 7.163 16 16 16h32c8.837 0 16-7.163 16-16v-80h128v80c0 8.837 7.163 16 16 16h32c8.837 0 16-7.163 16-16V144c0-8.837-7.163-16-16-16z"></path></svg>
            Үнэ &nbsp;  
        </h1>    
        <a href="/admin/rate/add-rate" class="btn btn-danger rounded-0 btn-sm">
            <i class="fas fa-plus"></i>  &nbsp;Нэмэх
        </a>
        {{-- <a href="/admin/hotel/view-hotels" class="btn btn-primary rounded-0 btn-sm">
            <i class="fas fa-reply"></i>  &nbsp;Буцах
        </a> --}}
    </div>

    <!-- /.card-header -->
    <div class="card-body">
        <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4">
            
            <div class="row">
                <div class="col-sm-12">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr style="font-size:12px;">
                                <th style="width: 10px;">#</th>
                                <th style="width: 10px;">id</th>
                                <th style="width: auto;">Өрөө</th>
                                <th style="width: auto;">Эхлэх өдөр</th>
                                <th style="width: auto;">Дуусах өдөр</th>
                                
                                <th style="width: auto;">Багц</th>
                                <th style="width: auto;">Үнэ</th>
                                <th style="width: auto;"></th>
                            </tr>
                        </thead>
                        
                        <tbody>
                            @foreach ($rates as $item)
                            <tr style="font-size:12px;">
                                <td></td>
                                <td>{{ $item->id}}</td>
                                
                                <td>{{ $item->title}}</td>
                                <td>@php echo date("Y-m-d",  ($item->start_date) ); @endphp </td>
                                <td>@php echo date("Y-m-d",  ($item->end_date) ); @endphp </td>

                                <td>
                                    @php
                                    switch ($item->id_package) {
                                        case 1:
                                        echo "Week-end";
                                            break;
                                        case 2:
                                        echo "Night";
                                            break;
                                        case 3:
                                        echo "Mid Week";
                                            break;
                                        case 4:
                                        echo "2 Nights";
                                            break;
                                        case 6:
                                        echo "Week";
                                            break;
                                        
                                        default:
                                            # code...
                                            break;
                                    }
                                    @endphp
                                </td>
                                <td>{{ $item->ratesPrice}}</td>
                              
                                <td class="project-actions text-center">
                                    <a href="{{ url('/admin/rate/edit-rate', $item->id ) }}" class="btn btn-info btn-sm" href="#">
                                        <i class="fas fa-pencil-alt">
                                        </i>
                                    </a>
                                    <a href="{{ url('/admin/rate/delete-rate/'.$item->id ) }}" class="btn btn-danger btn-sm" href="javascript:" id="delRate">
                                        <i class="fas fa-trash">
                                        </i>
                                    </a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>

                        <tfoot>
                            {{-- <tr>
                                <th rowspan="1" colspan="1">Rendering engine</th>
                                <th rowspan="1" colspan="1">Browser</th>
                                <th rowspan="1" colspan="1">Platform(s)</th>
                                <th rowspan="1" colspan="1">Engine version</th>
                                <th rowspan="1" colspan="1">CSS grade</th>
                            </tr> --}}
                        </tfoot>
                    </table>
                </div>
            </div>
            
        </div>
    </div>
    <!-- /.card-body -->
</div>


   

    @endsection