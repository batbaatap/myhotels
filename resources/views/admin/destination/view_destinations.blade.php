@extends('layouts.adminLayout.admin_design')
@section('content')


{{-- <div class="row"> --}}
<div class="card">
    <div class="card-header">
            <h1 style="float:left; font-weight:100; font-size:24px;">
                <svg style="width:19px;" class="svg-inline--fa fa-wrench fa-w-16 fa-fw" style="wi" aria-hidden="true" data-fa-processed="" data-prefix="fas" data-icon="wrench" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path fill="currentColor" d="M481.156 200c9.3 0 15.12 10.155 10.325 18.124C466.295 259.992 420.419 288 368 288c-79.222 0-143.501-63.974-143.997-143.079C223.505 65.469 288.548-.001 368.002 0c52.362.001 98.196 27.949 123.4 69.743C496.24 77.766 490.523 88 481.154 88H376l-40 56 40 56h105.156zm-171.649 93.003L109.255 493.255c-24.994 24.993-65.515 24.994-90.51 0-24.993-24.994-24.993-65.516 0-90.51L218.991 202.5c16.16 41.197 49.303 74.335 90.516 90.503zM104 432c0-13.255-10.745-24-24-24s-24 10.745-24 24 10.745 24 24 24 24-10.745 24-24z"></path></svg>
                Чиглэл &nbsp;  
            </h1>    
            <a href="/admin/destination/add-destination" class="btn btn-danger rounded-0 btn-sm">
                <i class="fas fa-plus"></i>  &nbsp;Нэмэх
            </a>
            {{-- <a href="/admin/booking/view-calendar" class="btn btn-primary btn-sm" >
                <i class="fas fa-calendar"></i>  &nbsp;КАЛЕНДАР
            </a> --}}
        </div>
    <!-- /.card-header -->
    <div class="card-body">
        <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4">
            
            <div class="row">
                <div class="col-sm-12">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr  style="font-size:12px;">
                                <th style="width: 10px;">#</th>
                                <th style="width: 10px;">ID</th>
                                <th style="width: auto;">Зураг</th>
                                <th style="width: auto;">Нэр</th>
                                <th style="width: auto;">Text</th>
                                
                                <th style="width: auto;">Home</th>
                                <th style="width: auto;">Төлөв</th>

                                <th style="width: 100px;"></th>
                            </tr>
                        </thead>
                        
                        <tbody>
                            @foreach ($destinations as $item)
                            <tr style="font-size:12px;">
                                <td></td>
                                <td>{{$item->id}}</td>
                                    
                                @if(!empty('$destination->file'))
                                <td style="overflow:hidden;" class="text-center">
                                    <img src="{{ asset ('admin/images/destination/large/'.$item->file) }}" style="width:160px;margin: -92px 0px;">
                                </td>
                                @endif

                                <td>{{ $item->name}}</td>
                                <td>{!! $item->text !!}</td>
                                <td class="text-center">
                                        @if ($item->home == 0) <svg class="svg-inline--fa fa-home fa-w-18 fa-fw text-danger" aria-hidden="true" data-fa-processed="" data-prefix="fas" data-icon="home" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512"><path fill="currentColor" d="M488 312.7V456c0 13.3-10.7 24-24 24H348c-6.6 0-12-5.4-12-12V356c0-6.6-5.4-12-12-12h-72c-6.6 0-12 5.4-12 12v112c0 6.6-5.4 12-12 12H112c-13.3 0-24-10.7-24-24V312.7c0-3.6 1.6-7 4.4-9.3l188-154.8c4.4-3.6 10.8-3.6 15.3 0l188 154.8c2.7 2.3 4.3 5.7 4.3 9.3zm83.6-60.9L488 182.9V44.4c0-6.6-5.4-12-12-12h-56c-6.6 0-12 5.4-12 12V117l-89.5-73.7c-17.7-14.6-43.3-14.6-61 0L4.4 251.8c-5.1 4.2-5.8 11.8-1.6 16.9l25.5 31c4.2 5.1 11.8 5.8 16.9 1.6l235.2-193.7c4.4-3.6 10.8-3.6 15.3 0l235.2 193.7c5.1 4.2 12.7 3.5 16.9-1.6l25.5-31c4.2-5.2 3.4-12.7-1.7-16.9z"></path></svg>  @endif
                                        @if ($item->home == 1) <svg class="svg-inline--fa fa-home fa-w-18 fa-fw text-success" aria-hidden="true" data-fa-processed="" data-prefix="fas" data-icon="home" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512"><path fill="currentColor" d="M488 312.7V456c0 13.3-10.7 24-24 24H348c-6.6 0-12-5.4-12-12V356c0-6.6-5.4-12-12-12h-72c-6.6 0-12 5.4-12 12v112c0 6.6-5.4 12-12 12H112c-13.3 0-24-10.7-24-24V312.7c0-3.6 1.6-7 4.4-9.3l188-154.8c4.4-3.6 10.8-3.6 15.3 0l188 154.8c2.7 2.3 4.3 5.7 4.3 9.3zm83.6-60.9L488 182.9V44.4c0-6.6-5.4-12-12-12h-56c-6.6 0-12 5.4-12 12V117l-89.5-73.7c-17.7-14.6-43.3-14.6-61 0L4.4 251.8c-5.1 4.2-5.8 11.8-1.6 16.9l25.5 31c4.2 5.1 11.8 5.8 16.9 1.6l235.2-193.7c4.4-3.6 10.8-3.6 15.3 0l235.2 193.7c5.1 4.2 12.7 3.5 16.9-1.6l25.5-31c4.2-5.2 3.4-12.7-1.7-16.9z"></path></svg> @endif
                                    </td>
                                    
                                    <td  class="text-center">
                                        @if ($item->checked == 1) <span class="badge badge-success">Published</span>  @endif
                                        @if ($item->checked == 2) <span class="badge badge-danger">Not Published</span>  @endif
                                        @if ($item->checked == 0) <span class="badge badge-warning">Awaiting</span>  @endif
                                        @if ($item->checked == 3) <span class="badge badge-secondary">Archived</span>  @endif
                                    </td>

                                <td class="project-actions text-center">
                                    <a href="{{ url('/admin/destination/edit-destination', $item->id ) }}" class="btn btn-info btn-sm" href="#">
                                        <i class="fas fa-pencil-alt">
                                        </i>
                                    </a>
                                    <a href="{{ url('/admin/destination/delete-destination/'.$item->id ) }}" class="btn btn-danger btn-sm" id="delDestination" href="javascript:">
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