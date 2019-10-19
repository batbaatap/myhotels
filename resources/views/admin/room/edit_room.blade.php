@extends('layouts.adminLayout.admin_design')
@section('content')

<form action="{{ url('/admin/booking/edit-booking/'. $bookingDetails->id) }}" method="POST" enctype = "multipart/form-data" novalidate="novalidate">
    {{ csrf_field() }}

{{-- <form class="form-horizontal" method="post" action="{{ url('admin/edit-category/'.$categoryDetails->id) }}" 
    name="add_category" id="add_category" novalidate="novalidate"> --}}

<div class="card card-default">
    <div class="card-header">
        {{-- Lorem ipsum dolor sit amet consectetur adipisicing elit. Quidem laborum ducimus numquam recusandae distinctio veniam, ratione libero doloribus, assumenda dicta totam! Nobis sed, a debitis eos beatae velit quisquam nihil. --}}
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
                    <input type="text" class="form-control" name="nights" value="0" >
                </div>
            </div>
            <!-- text input -->
            <div class="form-group row">
                <label for="inputEmail3" class="col-sm-2 col-form-label text-right">Хүний тоо</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="adults" value="0" >
                </div>
            </div>
            <!-- text input -->
            <div class="form-group row">
                <label for="inputEmail3" class="col-sm-2 col-form-label text-right">Children</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="children" value="0" >
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
                    <input type="number" class="form-control" name="total" value="0">
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
                    <input type="number" class="form-control" name="balance" value="0">
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
                        <option value="0">Хүлээгдэж байгаа</option>
                        <option value="1">Цуцлагдсан</option>
                        <option value="2">Payment rejected</option>
                        <option value="3">Баталгаажсан</option>
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
                        <option value="bank_transfer">Bank Transfer</option>
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
                        
                        <tbody class="room_table_body">
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
            
        </div>
        
        <div class="card-footer">
                <button type="submit">Хадгалах</button>
        </div>
</div>

</form>
@endsection