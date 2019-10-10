@extends('layouts.adminLayout.admin_design')
@section('content')

<form action="">
<div class="card card-default">
    <div class="card-header">
        {{-- Lorem ipsum dolor sit amet consectetur adipisicing elit. Quidem laborum ducimus numquam recusandae distinctio veniam, ratione libero doloribus, assumenda dicta totam! Nobis sed, a debitis eos beatae velit quisquam nihil. --}}
    </div>
    <div class="card-body  table-responsive ">
            <div class="form-group row">
                <label for="inputEmail3" class="col-sm-2 col-form-label text-right">Зочид буудал</label>
                    <div class="col-sm-6">
                        <select class="form-control" name="hotel" style="width: 100%;">
                            <option selected="selected">Alabama</option>
                            <option>Alaska</option>
                            <option>California</option>
                            <option>Delaware</option>
                            <option>Tennessee</option>
                            <option>Texas</option>
                            <option>Washington</option>

                            <?php echo $categories_drop_down; ?>
                            
                        </select>
                    </div>
                </div>
            
            <div class="form-group row">
                <label for="inputEmail3" class="col-sm-2 col-form-label text-right">Email</label>
                <div class="col-sm-6">
                <div class="input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text">
                      <i class="far fa-calendar-alt"></i>
                    </span>
                  </div>
                  <input type="text" class="form-control float-right" id="reservation">
                </div>
                <!-- /.input group -->
              </div>
              </div>

            <!-- text input -->
            <div class="form-group row">
                <label for="inputEmail3" class="col-sm-2 col-form-label text-right">Хоног</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" placeholder="0">
                </div>
            </div>
            <!-- text input -->
            <div class="form-group row">
                <label for="inputEmail3" class="col-sm-2 col-form-label text-right">Хүний тоо</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" placeholder="0">
                </div>
            </div>
            <!-- text input -->
            <div class="form-group row">
                <label for="inputEmail3" class="col-sm-2 col-form-label text-right">Children</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" placeholder="0">
                </div>
            </div>
            <!-- text input -->
            <div class="form-group row">
                <label for="inputEmail3" class="col-sm-2 col-form-label text-right">Discount</label>
                <div class="col-sm-6">
                    <input type="number" class="form-control" placeholder="0">
                </div>
            </div>
            <!-- text input -->
            <div class="form-group row">
                <label for="inputEmail3" class="col-sm-2 col-form-label text-right">Down payment</label>
                <div class="col-sm-6">
                    <input type="number" class="form-control" placeholder="0">
                </div>
            </div>
            <!-- text input -->
            <div class="form-group row">
                <label for="inputEmail3" class="col-sm-2 col-form-label text-right">Ex-tax total</label>
                <div class="col-sm-6">
                    <input type="number" class="form-control" placeholder="0">
                </div>
            </div>
            <!-- text input -->
            <div class="form-group row">
                <label for="inputEmail3" class="col-sm-2 col-form-label text-right">Tax amount</label>
                <div class="col-sm-6">
                    <input type="number" class="form-control" placeholder="">
                </div>
            </div>
            <div class="form-group row">
                <label for="inputEmail3" class="col-sm-2 col-form-label text-right">Total</label>
                <div class="col-sm-6">
                    <input type="number" class="form-control" placeholder="">
                </div>
            </div>
            <div class="form-group row">
                <label for="inputEmail3" class="col-sm-2 col-form-label text-right">Paid</label>
                <div class="col-sm-6">
                    <input type="number" class="form-control" placeholder="0">
                </div>
            </div>
            <div class="form-group row">
                <label for="inputEmail3" class="col-sm-2 col-form-label text-right">Balance</label>
                <div class="col-sm-6">
                    <input type="number" class="form-control" placeholder="0">
                </div>
            </div>

            <div class="form-group row">
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
            </div>

            <!-- text input -->
            <div class="form-group row">
                <label for="inputEmail3" class="col-sm-2 col-form-label text-right">Firstname </label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" placeholder="">
                </div>
            </div>
            <!-- text input -->
            <div class="form-group row">
                <label for="inputEmail3" class="col-sm-2 col-form-label text-right">Lastname </label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" placeholder="">
                </div>
            </div>
            <!-- text input -->
            <div class="form-group row">
                <label for="inputEmail3" class="col-sm-2 col-form-label text-right">Lastname </label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" placeholder="">
                </div>
            </div>
            <!-- text input -->
            <div class="form-group row">
                <label for="inputEmail3" class="col-sm-2 col-form-label text-right">Lastname </label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" placeholder="">
                </div>
            </div>
            <!-- text input -->
            <div class="form-group row">
                <label for="inputEmail3" class="col-sm-2 col-form-label text-right">Lastname </label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" placeholder="">
                </div>
            </div>
            <!-- text input -->
            <div class="form-group row">
                <label for="inputEmail3" class="col-sm-2 col-form-label text-right">Lastname </label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" placeholder="">
                </div>
            </div>
            <!-- text input -->
            <div class="form-group row">
                <label for="inputEmail3" class="col-sm-2 col-form-label text-right">Lastname </label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" placeholder="">
                </div>
            </div>
            <!-- text input -->
            <div class="form-group row">
                <label for="inputEmail3" class="col-sm-2 col-form-label text-right">City </label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" placeholder="">
                </div>
            </div>
            <!-- text input -->
            <div class="form-group row">
                <label for="inputEmail3" class="col-sm-2 col-form-label text-right">Phone </label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" placeholder="">
                </div>
            </div>
            <!-- text input -->
            <div class="form-group row">
                <label for="inputEmail3" class="col-sm-2 col-form-label text-right">Mobile </label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" placeholder="">
                </div>
            </div>
            <!-- text input -->
            <div class="form-group row">
                <label for="inputEmail3" class="col-sm-2 col-form-label text-right">Country </label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" placeholder="">
                </div>
            </div>
            <!-- text input -->
            <div class="form-group row">
                <label for="inputEmail3" class="col-sm-2 col-form-label text-right">Comments </label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" placeholder="">
                </div>
            </div>
            
            <div class="form-group row">
                <label for="inputEmail3" class="col-sm-2 col-form-label text-right">Status</label>
                    
                <div class="col-sm-6">
                <select class="form-control " style="width: 100%;">
                        <option selected="selected">Alabama</option>
                        <option>Alaska</option>
                        <option>California</option>
                        <option>Delaware</option>
                        <option>Tennessee</option>
                        <option>Texas</option>
                        <option>Washington</option>
                    </select>
                    </div>
            </div>
           
            <div class="form-group row">
                <label for="inputEmail3" class="col-sm-2 col-form-label text-right">Payment option</label>
                <div class="col-sm-6">
                <select class="form-control " style="width: 100%;">
                        <option selected="selected">Alabama</option>
                        <option>-</option>
                        <option>Alaska</option>
                        <option>California</option>
                        <option>Delaware</option>
                        <option>Tennessee</option>
                        <option>Texas</option>
                        <option>Washington</option>
                    </select>
                </div>
            </div>
            
            <!-- text input -->
            <div class="form-group row">
                <label for="inputEmail3" class="col-sm-2 col-form-label text-right">Comments </label>
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
                                    <th scope="col">Actions</th>
                                  </tr>
                                </thead>
                                <tbody>
                                  <tr>
                                        <th scope="row">1</th>
                                        <td> 
                                            <select class="form-control" style="width: 100%;">
                                                <option>-</option>
                                                <option>Alaska</option>
                                                <option>California</option>
                                                <option>Delaware</option>
                                                <option>Tennessee</option>
                                                <option>Texas</option>
                                                <option>Washington</option>
                                            </select>
                                        </td>
                                        <td> <select class="form-control" style="width: 100%;">
                                                <option>-</option>
                                                <option>Alaska</option>
                                                <option>California</option>
                                                <option>Delaware</option>
                                                <option>Tennessee</option>
                                                <option>Texas</option>
                                                <option>Washington</option>
                                            </select></td>
                                        <td><input type="text" class="form-control" placeholder=""></td>
                                        <td><input type="text" class="form-control" placeholder=""></td>

                                        <td><input type="text" class="form-control" placeholder=""></td>
                                        <td><input type="text" class="form-control" placeholder=""></td>
                                        <td><input type="text" class="form-control" placeholder=""></td>
                                        <td><input type="text" class="form-control" placeholder=""></td>
                                        <td><input type="text" class="form-control" placeholder=""></td>
                                  </tr>
                                  
                                </tbody>
                              </table>
                </div>
            </div>

            

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
            <!-- /.card -->

            
            
        </div>
</div>
</form>
@endsection