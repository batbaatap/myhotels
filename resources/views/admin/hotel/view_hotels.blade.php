@extends('layouts.adminLayout.admin_design')
@section('content')


{{-- <div class="row"> --}}
<div class="card">
    <div class="card-header">
        {{-- <h3 class="card-title">DataTable with default features</h3> --}}
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
                                <td>{{ $item->id}}</td>
                                <td>zurag</td>
                                {{-- <td>@php echo date("Y-m-d",  ($item->from_date) ); @endphp </td>
                                <td>@php echo date("Y-m-d",  ($item->to_date) ); @endphp</td> --}}

                                <td>{{ $item->title}}</td>
                                <td>{{ $item->subtitle}}</td> 
                                <td>{{ $item->class}}</td>
                                {{-- <td>{{ $destination->id_destination}}</td> --}}
                                <td>{{ $item->name}}</td>
                                
                                <td>{{ $item->home}}</td>
                                <td>{{ $item->checked}}</td>

                                <td class="project-actions text-center">
                                        <a href="{{ url('/admin/booking/edit-booking', $item->id ) }}" class="btn btn-info btn-sm" href="#">
                                            <i class="fas fa-pencil-alt">
                                            </i>
                                        </a>
                                        <a href="{{ url('/admin/booking/delete-booking/'.$item->id ) }}" class="btn btn-danger btn-sm" href="#">
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