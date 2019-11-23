@extends('layouts.adminLayout.admin_design')
@section('content')

{{-- <div class="col-md-6"> --}}
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
{{-- </div> --}}

{{-- <div class="row"> --}}
<div class="card">
       
    <div class="card-header">
        <h1 style="float:left; font-weight:100; font-size:24px;">
            <svg style="width:19px;" class="svg-inline--fa fa-h-square fa-w-14 fa-fw" aria-hidden="true" data-fa-processed="" data-prefix="fas" data-icon="h-square" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path fill="currentColor" d="M448 80v352c0 26.51-21.49 48-48 48H48c-26.51 0-48-21.49-48-48V80c0-26.51 21.49-48 48-48h352c26.51 0 48 21.49 48 48zm-112 48h-32c-8.837 0-16 7.163-16 16v80H160v-80c0-8.837-7.163-16-16-16h-32c-8.837 0-16 7.163-16 16v224c0 8.837 7.163 16 16 16h32c8.837 0 16-7.163 16-16v-80h128v80c0 8.837 7.163 16 16 16h32c8.837 0 16-7.163 16-16V144c0-8.837-7.163-16-16-16z"></path></svg>
            Зочид буудал &nbsp;  
        </h1>    
        <a href="/admin/hotel/add-hotel" class="btn btn-danger rounded-0 btn-sm">
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
                            <tr  style="font-size:12px;">
                                <th style="width: 10px;">#</th>
                                <th style="width: 10px;">id</th>
                                <th style="width: auto;">Image</th>
                                <th style="width: auto;">Title</th>
                                <th style="width: auto;">Subtitle</th>
                                
                                <th style="width: auto;">Class</th>
                                <th style="width: auto;">Destination</th>
                                <th style="width: auto;">Home</th>
                                <th style="width: auto;">Status</th>
                                <th style="width: auto;">Actions</th>
                                
                            </tr>
                        </thead>
                        
                        <tbody>
                            @foreach ($hotels as $item)
                            <tr style="font-size:12px;">
                                <td></td>
                                <td>{{ $item->hotelId}}</td>
                                   
                                @if(!empty('$hotels->file'))
                                <td style="overflow:hidden;" class="text-center">
                                    <img src="{{ asset ('admin/images/hotels/small/'.$item->file) }}" style="width:160px;margin: -92px 0px;">
                                </td>
                                @endif

                                {{-- <td>@php echo date("Y-m-d",  ($item->from_date) ); @endphp </td>
                                <td>@php echo date("Y-m-d",  ($item->to_date) ); @endphp</td> --}}

                                <td>{{ $item->hTitle}}</td>
                                <td>{{ $item->hSubTitle}}</td> 
                                <td>{{ $item->hotelClass}}</td>
                                {{-- <td>{{ $destination->id_destination}}</td> --}}
                                <td>{{ $item->name}}</td>
                                
                                <td class="text-center">
                                    @if ($item->hotelHome == 0) <svg class="svg-inline--fa fa-home fa-w-18 fa-fw text-danger" aria-hidden="true" data-fa-processed="" data-prefix="fas" data-icon="home" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512"><path fill="currentColor" d="M488 312.7V456c0 13.3-10.7 24-24 24H348c-6.6 0-12-5.4-12-12V356c0-6.6-5.4-12-12-12h-72c-6.6 0-12 5.4-12 12v112c0 6.6-5.4 12-12 12H112c-13.3 0-24-10.7-24-24V312.7c0-3.6 1.6-7 4.4-9.3l188-154.8c4.4-3.6 10.8-3.6 15.3 0l188 154.8c2.7 2.3 4.3 5.7 4.3 9.3zm83.6-60.9L488 182.9V44.4c0-6.6-5.4-12-12-12h-56c-6.6 0-12 5.4-12 12V117l-89.5-73.7c-17.7-14.6-43.3-14.6-61 0L4.4 251.8c-5.1 4.2-5.8 11.8-1.6 16.9l25.5 31c4.2 5.1 11.8 5.8 16.9 1.6l235.2-193.7c4.4-3.6 10.8-3.6 15.3 0l235.2 193.7c5.1 4.2 12.7 3.5 16.9-1.6l25.5-31c4.2-5.2 3.4-12.7-1.7-16.9z"></path></svg>  @endif
                                    @if ($item->hotelHome == 1) <svg class="svg-inline--fa fa-home fa-w-18 fa-fw text-success" aria-hidden="true" data-fa-processed="" data-prefix="fas" data-icon="home" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512"><path fill="currentColor" d="M488 312.7V456c0 13.3-10.7 24-24 24H348c-6.6 0-12-5.4-12-12V356c0-6.6-5.4-12-12-12h-72c-6.6 0-12 5.4-12 12v112c0 6.6-5.4 12-12 12H112c-13.3 0-24-10.7-24-24V312.7c0-3.6 1.6-7 4.4-9.3l188-154.8c4.4-3.6 10.8-3.6 15.3 0l188 154.8c2.7 2.3 4.3 5.7 4.3 9.3zm83.6-60.9L488 182.9V44.4c0-6.6-5.4-12-12-12h-56c-6.6 0-12 5.4-12 12V117l-89.5-73.7c-17.7-14.6-43.3-14.6-61 0L4.4 251.8c-5.1 4.2-5.8 11.8-1.6 16.9l25.5 31c4.2 5.1 11.8 5.8 16.9 1.6l235.2-193.7c4.4-3.6 10.8-3.6 15.3 0l235.2 193.7c5.1 4.2 12.7 3.5 16.9-1.6l25.5-31c4.2-5.2 3.4-12.7-1.7-16.9z"></path></svg> @endif
                                </td>
                                
                                <td  class="text-center">
                                    @if ($item->hotelChecked == 1) <span class="badge badge-success">Published</span>  @endif
                                    @if ($item->hotelChecked == 2) <span class="badge badge-danger">Not Published</span>  @endif
                                    @if ($item->hotelChecked == 0) <span class="badge badge-warning">Awaiting</span>  @endif
                                    @if ($item->hotelChecked == 3) <span class="badge badge-secondary">Archived</span>  @endif
                                </td>

                                <td class="project-actions text-center">
                                    <a href="{{ url('/admin/hotel/edit-hotel', $item->hotelId ) }}" class="btn btn-info btn-sm" href="#">
                                        <i class="fas fa-pencil-alt">
                                        </i>
                                    </a>
                                    <a href="{{ url('/admin/hotel/delete-hotel/'.$item->hotelId ) }}" class="btn btn-danger btn-sm" href="javascript:" id='delHotel'>
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