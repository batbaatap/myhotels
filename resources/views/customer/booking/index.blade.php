@extends('layouts.frontLayout.front_design')
@section('content')
<div class="container">

    <form >

        {{--
        <form method="post" action="/bookings"> --}}
            @csrf
            <div class="row">
                <div class="col-8 border">
                    <br/>
                    <div>
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Ирэх өдөр </th>
                                    <th>Гарах өдөр</th>
                                    <th>Хугацаа</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="datefrom1">
                                        <input style="border:none;background: white;display:none; " type="text" name="bookingfrom" class="datefrom11" />
                                    </td>

                                    <td class="dateto1"> 
                                        <input style="border:none;background: white;display:none; " type="text" name="bookingto" class="dateto11" />
                                    </td>
                                    <td class="diffrence"></td>

                                    
                                </tr>
                            </tbody>
                        </table>
                        <br/>

                        <h5>Захиалсан өрөөнүүд</h5>
                        <br/>
                        <table class="table orderedUruu table-bordered">
                            <thead>
                                <tr>
                                    <th>Төрөл </th>
                                    {{-- <th>Буудал</th>
                                    <th>Өрөө</th> --}}
                                    <th>Тоо ширхэг</th>
                                    <th>Үнэ</th>
                                    {{-- <th>Хямдарсан үнэ</th> --}}
                                </tr>
                            </thead>

                            <tbody class="bb"></tbody>
                        </table>
                        <br/>
                        

                        {{-- <h6>ЦУЦЛАЛТЫН НӨХЦӨЛ</h6>

                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Цуцлагдах хугацаа </th>
                                    <th>Нийт үнийн дүнгийн</th>
                                    <th>Торгууль (MNT)</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        <p id="cancel_time"></p>

                                    </td>
                                    <td>Эхний өдрийн төлбөр </td>
                                    <td>MNT 350,000 </td>
                                </tr>

                            </tbody>
                        </table> --}}

                    </div>

                </div>

                <div class="col-4 border">
                         <h6>Хэрэглэгчийн мэдээлэл</h6>
						<div class="form-group"><input name="lastname" type="text" class="form-control" placeholder="Овог" /></div>
                        <div class="form-group"><input name="firstname" type="text" class="form-control" placeholder="Нэр" /></div>
						<div class="form-group"><input name="number" type="text" class="form-control" placeholder="Утас" /></div>
						
                        {{-- <div class="form-group" >
                            <label for="exampleFormControlTextarea1">Хүсэлт</label>
                            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="feedback" ></textarea>
                        </div>
                        
                        <p>Нийт үнэ</p>
                        <div class="card" style="width: 7rem;">MNT 460,000</div><br/> --}}
                        <span> <input type="checkbox" class="checkbox"> Үйлчилгээний нөхцөл хүлээн зөвшөөрөх </span>
                        <input class="btn btn-outline-success " onclick="localdelete()" type="submit" value="Захиалах">
                </div>

            </div>
       

  

        </form>
      

</div>
<style>
    .turul {
        border: none;
        background: white;
    }
</style>
{{-- 

<script type="text/javascript">

      if(localStorage.getItem("seData") == null) {
        window.location = '/hotel';
      } 

</script> --}}



 @endsection
 
