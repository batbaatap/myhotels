@extends('layouts.adminLayout.admin_design')
@section('content')


{{-- <div class="row"> --}}
<div class="card">
    <div class="card-header">
        <h1 style="float:left; font-weight:100; font-size:24px;">
            <svg style="width:19px;" class="svg-inline--fa fa-wrench fa-w-16 fa-fw" style="wi" aria-hidden="true" data-fa-processed="" data-prefix="fas" data-icon="wrench" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path fill="currentColor" d="M481.156 200c9.3 0 15.12 10.155 10.325 18.124C466.295 259.992 420.419 288 368 288c-79.222 0-143.501-63.974-143.997-143.079C223.505 65.469 288.548-.001 368.002 0c52.362.001 98.196 27.949 123.4 69.743C496.24 77.766 490.523 88 481.154 88H376l-40 56 40 56h105.156zm-171.649 93.003L109.255 493.255c-24.994 24.993-65.515 24.994-90.51 0-24.993-24.994-24.993-65.516 0-90.51L218.991 202.5c16.16 41.197 49.303 74.335 90.516 90.503zM104 432c0-13.255-10.745-24-24-24s-24 10.745-24 24 10.745 24 24 24 24-10.745 24-24z"></path></svg>
            Үйлчилгээ &nbsp;  
        </h1>    
        <a href="/admin/facility/add-facility" class="btn btn-primary rounded-0 btn-sm">
            <i class="fas fa-plus"></i>  &nbsp;Нэмэх
        </a>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4">
            
            <div class="row">
                <div class="col-sm-12">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr  style="font-size:12px;">
                                <th style="width: 10px;">ID</th>
                                <th style="width: 200px;">Зураг</th>
                                <th style="width: auto;">Нэр</th>
                                <th style="width: 100px;">#</th>
                            </tr>
                        </thead>
                        
                        <tbody>
                            @foreach ($fac as $item)
                            <tr style="font-size:12px;">
                                <td>{{ $item->id}}</td>
                                
                                @if(!empty('$item->file'))
                                <td style="text-align:center;">
                                    <img src="{{ asset ('admin/images/facility/'.$item->file) }}" style="width:19px;height:19px;">
                                </td>
                                @endif
                                <td>{{ $item->name}}</td>


                                <td class="project-actions text-center">
                                    <a href="{{ url('/admin/facility/edit-facility', $item->id ) }}" class="btn btn-info btn-sm" href="#">
                                        <i class="fas fa-pencil-alt">
                                        </i>
                                    </a>
                                    <a href="{{ url('/admin/facility/delete-facility/'.$item->id ) }}" class="btn btn-danger btn-sm" href="#">
                                        <i class="fas fa-trash">
                                        </i>
                                    </a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>

                        <tfoot>
                            <tr>
                                {{-- <th rowspan="1" colspan="1">Rendering engine</th>
                                <th rowspan="1" colspan="1">Browser</th>
                                <th rowspan="1" colspan="1">Platform(s)</th>
                                <th rowspan="1" colspan="1">Engine version</th> --}}
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
            
        </div>
    </div>
    <!-- /.card-body -->
</div>


   

    @endsection