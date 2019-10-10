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
                    <table id="example1" class="table table-bordered table-striped dataTable responsive" role="grid" aria-describedby="example1_info">
                        <thead>
                            <tr role="row" style="font-size:12px;">
                                <th class="sorting_desc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="" aria-sort="descending" style="width: 10px;">#</th>
                                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="" style="width: 200px;">Зочид буудал</th>
                                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="" style="width: auto;">Харилцагч</th>
                                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="" style="width: auto;">Орох</th>
                                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="" style="width: auto;">Гарах</th>
                                
                                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="" style="width: auto;">Хоног</th>
                                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="" style="width: auto;">Том хүн</th>
                                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="" style="width: auto;">Хүүхэд</th>
                                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="" style="width: auto;">Нийт</th>
                                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="" style="width: auto;">Төлөв</th>
                                
                                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="" style="width: auto;">Нэмэгдсэн</th>
                                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="" style="width: auto;">Шинэчлэгдсэн</th>
                                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="" style="width: auto;">Үйлдэл</th>
                            </tr>
                        </thead>
                        
                        <tbody>
                            @foreach ($bookings as $item)
                            <tr role="row" class="even">
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