$(document).ready(function () {
    if(!localStorage.getItem("localdate1")){
     $('.datefrom').datetimepicker({
       defaultDate:new Date(),
       format: 'YYYY-MM-DD HH:mm:ss',
       locale: 'en',
       sideBySide: true
      })
    }
  
  
    if(!localStorage.getItem("localdate2")){
       $('.dateto').datetimepicker({
         defaultDate:new Date(),
         format: 'YYYY-MM-DD HH:mm:ss',
       locale: 'en',
       sideBySide: true
        })
    }
    
$('.datetime1').datetimepicker({
  defaultDate: dateFrom, // someVardate
  format: 'YYYY-MM-DD HH:mm:ss',
  locale: 'en',
  sideBySide: true
})
$('.datetime2').datetimepicker({
  defaultDate: dateTo, // someVardate
  format: 'YYYY-MM-DD HH:mm:ss',
  locale: 'en',
  sideBySide: true
})

})
    

//   $('.datetime1').datetimepicker({
//       defaultDate: dateFrom, // someVardate
//       format: 'YYYY-MM-DD HH:mm:ss',
//       locale: 'en',
//       sideBySide: true
//     })
//     $('.datetime2').datetimepicker({
//       defaultDate: dateTo, // someVardate
//       format: 'YYYY-MM-DD HH:mm:ss',
//       locale: 'en',
//       sideBySide: true
//     })
  
//   })
  
  
  
  // setting min max value :)
//   function minmaxfuncz(value, min, max) 
//   {
//       if(parseInt(value) > 0) 
//       {
//           console.log('red');
//       }
  
//       if(parseInt(value) < min || isNaN(parseInt(value))) 
//       {
//           return min; 
//       }
//       else if(parseInt(value) > max) {
//           return max; 
//       }
//       else{ 
//           return value;
//       }
//   }
  
  // function urgeljluulehtovch(){
  // $(".listen-room-too").on("change paste keyup", function() {
  //     if(this.value > 0 ){
  //         $('.urgeljluuleh').prop('disabled', false);
  //     }else{
  //         $('.urgeljluuleh').prop('disabled', true);
  //     }
  // });
  // }
  
  
  // START
  // START
  // START
  // START
  // START
//   var arrData = [];
  
  function getData(){
   
    date1 = jQuery('.datefrom').val();
    date2 = jQuery('.dateto').val();
    room_quantity = jQuery('.room_quantity').val();
    person_quantity = jQuery('.person_quantity').val();
    
   
    //  names = [jQuery('.destination').text()];

 

    localStorage.setItem("localdate1", date1); 
    localStorage.setItem("localdate2", date2); 
    localStorage.setItem("localdate3",  room_quantity ); 
    localStorage.setItem("localdate4",  person_quantity ); 

    // localStorage.setItem("names", JSON.stringify(names));




    
    //days calculator
    // dt1 = new Date(date1);
    // dt2 = new Date(date2);
    // diff= Math.floor((Date.UTC(dt2.getFullYear(), dt2.getMonth(), dt2.getDate()) - Date.UTC(dt1.getFullYear(), dt1.getMonth(), dt1.getDate()) ) /(1000 * 60 * 60 * 24)); //difference
    // localStorage.setItem("day", diff); 
   
   
      
    // var arrData = [];
  
    // $("input.custom-selects").each(function () {  
    //   var selText  = $(this).val();  
    //   if(selText != 0)
      
    //     $(this).closest('tr').each(function () {
          
    //     var currentRow=$(this);
    //         var idColeach = currentRow.find("td:eq(1)>.rnam").attr("data-id");
    //         var col1_value=currentRow.find("td:eq(1)").text();
    //         var col2_value=currentRow.find("td:eq(2)").text();
    //         var col3_value=currentRow.find("td:eq(3)").text();
    //         var col4_value=currentRow.find("td:eq(4) > input").val();
  
    //         var obj={};
    //             obj.col0=idColeach;
    //             obj.col1=col1_value;
    //             obj.col2=col2_value;
    //             obj.col3=col3_value;
    //             obj.col4=col4_value;
  
    //         arrData.push(obj);
    //     });
    // });
    // localStorage.setItem("seData", JSON.stringify(arrData));

   
  }
  
  
  
  
    (function(){
      
    //   var x = JSON.parse(localStorage.getItem("seData"));
  
    //   $.each(x, function(i, item){
    //     console.log(x[i].col1);
  
    //     $(".orderedUruu tbody").append(
    //       "<tr>", 
    //         "<td name='toroltd'><input style='display: none;'class='turul' name='roomtypeid[]' type='text' value=' "+ x[i].col0 +" ' />"+ x[i].col1 +"</td>", 
    //         "<td name='tooo'><input style='display: none; class='turul' name ='too[]' type='text' value='" +   x[i].col4 + " ' >"+   x[i].col4 +" </td>",
    //         "<td name='une'>" +   x[i].col3 + "</td>",
    //       "</tr>" 
    //     );
       
    //   });
  

  
    dateFrom = localStorage.getItem("localdate1");
    dateTo= localStorage.getItem("localdate2");
    room_quantity = localStorage.getItem("localdate3");
    person_quantity= localStorage.getItem("localdate4");
// storedNames = JSON.parse(localStorage.getItem("names"));

    // diffrence= localStorage.getItem("day");
    
//    jQuery('.datefrom1').append(dateFrom ); //console.log(axe);
//     jQuery('.datefrom11').val(dateFrom);
  
//   jQuery('.dateto1').append(dateTo ); //console.log(axe);
//    jQuery('.dateto11').val(dateTo);
   
jQuery('.room_quantity').val( room_quantity);
jQuery('.person_quantity').val( person_quantity);
// jQuery('.destination').val( storedNames );


  
//    jQuery('.diffrence').text(diffrence);
   
  //calculate cancel_time
        // var today = new Date();
        //   var newdate = new Date();
        //   newdate.setDate(today.getDate()+7);
          // document.getElementById('cancel_time').innerHTML = newdate.toISOString().split('T')[0];


       


    }());
  
  
  
    function localdelete() {
      localStorage.clear();
    }
  
  
  
  
  
  