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
                                <th style="width: 200px;">Зочид буудал</th>
                                <th style="width: auto;">Харилцагч</th>
                                <th style="width: auto;">Орох</th>
                                <th style="width: auto;">Гарах</th>
                                
                                <th style="width: auto;">Хоног</th>
                                <th style="width: auto;">Том хүн</th>
                                <th style="width: auto;">Хүүхэд</th>
                                <th style="width: auto;">Нийт</th>
                                <th style="width: auto;">Төлөв</th>
                                
                                <th style="width: auto;">Нэмэгдсэн</th>
                                <th style="width: auto;">Шинэчлэгдсэн</th>
                                <th style="width: auto;">Үйлдэл</th>
                            </tr>
                        </thead>
                        
                        <tbody>
                            @foreach ($bookings as $item)
                            <tr >
                                <td>{{ $item->hotel_id}}</td>
                                <td>{{ $item->hotel_id}}</td>
                                <td>{{ $item->hotel_id}}</td>
                                <td>{{ $item->from_date}}</td>
                                <td>{{ $item->to_date}}</td>
                                
                                <td>{{ $item->nights}}</td>
                                <td>{{ $item->nights}}</td>
                                <td>{{ $item->adults}}</td>
                                <td>{{ $item->children}}</td>
                                <td>{{ $item->amount}}</td>
                                
                                <td>{{ $item->amount}}</td>
                                <td>{{ $item->amount}}</td>
                                <td>{{ $item->amount}}</td>
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