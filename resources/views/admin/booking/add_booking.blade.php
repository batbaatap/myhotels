@extends('layouts.adminLayout.admin_design')
@section('content')

<form action="{{url('admin/booking/add-booking')}}" method="POST" enctype = "multipart/form-data" novalidate="novalidate" id="add-booking">
    {{ csrf_field() }}


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

<div class="card card-default">
    <div class="card-header">
        <h1 style="float:left; font-weight:100; font-size:24px;">
            <svg style="width:19px;" class="svg-inline--fa fa-wrench fa-w-16 fa-fw" style="wi" aria-hidden="true" data-fa-processed="" data-prefix="fas" data-icon="wrench" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path fill="currentColor" d="M481.156 200c9.3 0 15.12 10.155 10.325 18.124C466.295 259.992 420.419 288 368 288c-79.222 0-143.501-63.974-143.997-143.079C223.505 65.469 288.548-.001 368.002 0c52.362.001 98.196 27.949 123.4 69.743C496.24 77.766 490.523 88 481.154 88H376l-40 56 40 56h105.156zm-171.649 93.003L109.255 493.255c-24.994 24.993-65.515 24.994-90.51 0-24.993-24.994-24.993-65.516 0-90.51L218.991 202.5c16.16 41.197 49.303 74.335 90.516 90.503zM104 432c0-13.255-10.745-24-24-24s-24 10.745-24 24 10.745 24 24 24 24-10.745 24-24z"></path></svg>
            Захиалга &nbsp;  
        </h1>    
        <a href="/admin/booking/add-booking" class="btn btn-danger rounded-0 btn-sm">
            <i class="fas fa-plus"></i>  &nbsp;Нэмэх
        </a>
        <a href="/admin/booking/view-bookings" class="btn btn-primary rounded-0 btn-sm">
            <i class="fas fa-reply"></i>  &nbsp;Буцах
        </a>
    </div>
        
    
    <div class="card-body  table-responsive ">
        
            <div class="form-group row">
                <label for="inputEmail3" class="col-sm-2 col-form-label text-right">Зочид буудал</label>
                    <div class="col-sm-6">
                        <select class="form-control" name="id_hotel" style="width: 100%;">
                            <?php echo $hotels_drop_down; ?>
                        </select>
                    </div>
            </div>
            
            <div class="form-group row">
                <label for="inputEmail3" class="col-sm-2 col-form-label text-right">Орох, Гарах өдөр</label>
                <div class="col-sm-6">
                    
                        <div id="reportrange">
                            <span></span>
                        </div>
                <div class="input-group">
                    <div class="input-group-prepend">
                    <span class="input-group-text">
                        <i class="far fa-calendar-alt"></i>
                    </span>
                    </div>
                    <input type="text" name="date_from_and_date_to" class="form-control float-right" id="reservation">
                </div>
               
                <!-- /.input group -->
                </div>
            </div>

            <!-- text input -->
            <div class="form-group row">
                <label for="inputEmail3" class="col-sm-2 col-form-label text-right">Хоног</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" id="honog" name="nights" value="0" readonly="true"  >
                </div>
            </div>
            <!-- text input -->
            <div class="form-group row">
                <label for="inputEmail3" class="col-sm-2 col-form-label text-right">Хүний тоо</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="adults" value="0"  readonly="true" >
                </div>
            </div>
            <!-- text input -->
            <div class="form-group row">
                <label for="inputEmail3" class="col-sm-2 col-form-label text-right">Children</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="children" value="0"  readonly="true" >
                </div>
            </div>
            <!-- text input -->
            <div class="form-group row">
                <label for="inputEmail3" class="col-sm-2 col-form-label text-right">Discount</label>
                <div class="col-sm-6">
                    <input type="number" class="form-control" name="discount" value="0">
                </div>
            </div>
            <!-- text input -->
            <div class="form-group row">
                <label for="inputEmail3" class="col-sm-2 col-form-label text-right">Down payment</label>
                <div class="col-sm-6">
                    <input type="number" class="form-control" name="down_payment" value="0">
                </div>
            </div>
            <!-- text input -->
            <div class="form-group row">
                <label for="inputEmail3" class="col-sm-2 col-form-label text-right">Ex-tax total</label>
                <div class="col-sm-6">
                    <input type="number" class="form-control" name="ex_tax" value="0">
                </div>
            </div>
            <!-- text input -->
            <div class="form-group row">
                <label for="inputEmail3" class="col-sm-2 col-form-label text-right">Tax amount</label>
                <div class="col-sm-6">
                    <input type="number" class="form-control" name="tax_amount" value="0">
                </div>
            </div>
            <div class="form-group row">
                <label for="inputEmail3" class="col-sm-2 col-form-label text-right">Total</label>
                <div class="col-sm-6">
                    <input type="number" class="form-control" name="total" value="0"  readonly="true">
                </div>
            </div>
            <div class="form-group row">
                <label for="inputEmail3" class="col-sm-2 col-form-label text-right">Paid</label>
                <div class="col-sm-6">
                    <input type="number" class="form-control" name="paid" value="0">
                </div>
            </div>
            <div class="form-group row">
                <label for="inputEmail3" class="col-sm-2 col-form-label text-right">Balance</label>
                <div class="col-sm-6">
                    <input type="number" class="form-control" name="balance" value="0"  readonly="true">
                </div>
            </div>

            {{-- <div class="form-group row">
                <label for="inputEmail3" class="col-sm-2 col-form-label text-right">Customer</label>
                    
                <div class="col-sm-6">
                <select class="form-control" style="width: 100%;">
                        <option selected="selected">Alabama</option>
                        <option>Alaska</option>
                        <option>California</option>
                        <option>Delaware</option>
                        <option>Tennessee</option>
                        <option>Texas</option>
                        <option>Washington</option>
                    </select>
                </div>
            </div> --}}

            <!-- text input -->
            <div class="form-group row">
                <label for="inputEmail3" class="col-sm-2 col-form-label text-right">Firstname </label>
                <div class="col-sm-6">
                    <input type="text" name="firstname" class="form-control" placeholder="">
                </div>
            </div>
            <!-- text input -->
            <div class="form-group row">
                <label for="inputEmail3" class="col-sm-2 col-form-label text-right">Lastname </label>
                <div class="col-sm-6">
                    <input type="text" name="lastname" class="form-control" placeholder="">
                </div>
            </div>
            <!-- text input -->
            <div class="form-group row">
                <label for="inputEmail3" class="col-sm-2 col-form-label text-right">Email </label>
                <div class="col-sm-6">
                    <input type="text" name="email" class="form-control" placeholder="">
                </div>
            </div>
            <!-- text input -->
            <div class="form-group row">
                <label for="inputEmail3" class="col-sm-2 col-form-label text-right">Company </label>
                <div class="col-sm-6">
                    <input type="text" name="company" class="form-control" placeholder="">
                </div>
            </div>
            <!-- text input -->
            <div class="form-group row">
                <label for="inputEmail3" class="col-sm-2 col-form-label text-right">Address </label>
                <div class="col-sm-6">
                    <input type="text" name="address" class="form-control" placeholder="">
                </div>
            </div>
            <!-- text input -->
            <div class="form-group row">
                <label for="inputEmail3" class="col-sm-2 col-form-label text-right">Postcode </label>
                <div class="col-sm-6">
                    <input type="text" name="postcode" class="form-control" placeholder="">
                </div>
            </div>
            <!-- text input -->
            <div class="form-group row">
                <label for="inputEmail3" class="col-sm-2 col-form-label text-right">City </label>
                <div class="col-sm-6">
                    <input type="text" name="city"  class="form-control" placeholder="">
                </div>
            </div>
            <!-- text input -->
            <div class="form-group row">
                <label for="inputEmail3" class="col-sm-2 col-form-label text-right">Phone </label>
                <div class="col-sm-6">
                    <input type="text" name="phone"  class="form-control" placeholder="">
                </div>
            </div>
            <!-- text input -->
            <div class="form-group row">
                <label for="inputEmail3" class="col-sm-2 col-form-label text-right">Mobile </label>
                <div class="col-sm-6">
                    <input type="text" name="mobile" class="form-control" placeholder="">
                </div>
            </div>
            <!-- text input -->
            <div class="form-group row">
                <label for="inputEmail3" class="col-sm-2 col-form-label text-right">Country </label>
                <div class="col-sm-6">
                    <input type="text" name="country"  class="form-control" placeholder="">
                </div>
            </div>
            <!-- text input -->
            <div class="form-group row">
                <label for="inputEmail3" class="col-sm-2 col-form-label text-right">Comments </label>
                <div class="col-sm-6">
                    <input type="text" name="comments"  class="form-control" placeholder="">
                </div>
            </div>
            
            <div class="form-group row">
                <label for="inputEmail3" class="col-sm-2 col-form-label text-right">Төлөв</label>
                <div class="col-sm-6">
                    <select class="form-control"  name="status" style="width: 100%;">
                        <option selected="selected">-</option>
                        <option value="1">Хүлээгдэж байгаа</option>
                        <option value="2">Цуцлагдсан</option>
                        <option value="3">Payment rejected</option>
                        <option value="4">Баталгаажсан</option>
                    </select>
                </div>
            </div>

            <div class="form-group row">
                <label for="inputEmail3" class="col-sm-2 col-form-label text-right">Payment option</label>
                <div class="col-sm-6">
                    <select class="form-control" name="payment_option" style="width: 100%;">
                        <option selected="selected" >-</option>
                        <option value="arrival">On Arrival</option>
                        <option value="check">Check</option>
                        <option value="transfer">Bank Transfer</option>
                        <option value="paypal">Paypal</option>
                    </select>
                </div>
            </div>
            
            <!-- text input -->
            <div class="form-group row">
                <label for="inputEmail3" class="col-sm-2 col-form-label text-right">Өрөө</label>
                <div class="col-sm-10">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                            <th scope="col">#</th>
                            <th scope="col" width='140px;'>Зочид буудал</th>
                            <th scope="col">Өрөө </th>
                            <th scope="col">Description</th>
                            <th scope="col">Том хүн</th>
                            <th scope="col">Хүүхэд</th>
                            <th scope="col">No.</th>
                            <th scope="col">Tax rate</th>
                            <th scope="col">Amount</th>
                            {{-- <th scope="col">Actions</th> --}}
                            </tr>
                        </thead>
                        
                        <tbody class="room_table_body room_table_body_custom">
                            <tr class="room_table_row">
                                    <th scope="row">
                                        {{-- <input type="number" name="linenum[]" class="form-control" > --}}
                                    </th>
                                    <td> 
                                        <select class="form-control" name="id_hotel_sub[]" style="width: 100%;">
                                                <?php echo $hotels_drop_down; ?>
                                        </select>
                                    </td>
                                    <td> 
                                        <select class="form-control" name="room_id_sub[]" style="width: 100px;">
                                                <?php echo $rooms_drop_down; ?>
                                        </select>
                                    </td>
                                    <td><input type="text" name="description_r[]" class="form-control" placeholder=""></td>
                                    <td><input type="text" name="adult_r[]" class="form-control" placeholder=""></td>
                                    <td><input type="text" name="children_r[]" class="form-control" placeholder=""></td>
                                    <td><input type="text" name="no_r[]" class="form-control" placeholder=""></td>
                                    <td><input type="text" name="taxrater[]" class="form-control" placeholder=""></td>
                                    <td><input type="text" name="amount_r[]" class="form-control" placeholder=""></td>
                                    {{-- <td><input type="text" name="actions_r" class="form-control" placeholder=""></td> --}}
                            </tr>
                        </tbody>
                    </table>
                    <a href="javascript:void(0);" id="uruu_nemeh" class="btn btn-primary">Өрөө нэмэх</a>   
                </div>
              
            </div>

                    
{{-- 
            <div class="form-group row">
                <label for="inputEmail3" class="col-sm-2 col-form-label text-right">Хэрэглэгч сонгох </label>
        
                <div class="col-lg-6">
                    <div class="card card-default">
                        <div class="card-body">
                            <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                <select class="duallistbox" multiple="multiple">
                                    <option selected>Batbaatar</option>
                                    <option>Khishgee</option>
                                </select>
                                </div>
                                <!-- /.form-group -->
                            </div>
                            <!-- /.col -->
                            </div>
                            <!-- /.row -->
                        </div>
                        <!-- /.card-body -->
                    </div>
                </div>
            </div>
            <!-- /.card --> --}}
            
        </div>
        
        <div class="card-footer">
                {{-- <button type="submit">Хадгалах</button> --}}
                <div class="form-group">
                        <div class="col-sm-9 col-sm-offset-4">
                            <button type="submit" class="btn btn-primary" name="signup1" value="Sign up">Хадгалах</button>
                        </div>
                    </div>

        </div>
</div>

</form>
@endsection