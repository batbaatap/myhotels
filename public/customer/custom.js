$(document).ready(function () {

    if(!localStorage.getItem("localdate1")){
     $('.datefrom').datetimepicker({
      //  defaultDate:new Date(),
       format: 'YYYY-MM-DD ',
       minDate: { minDate: 0 },
       locale: 'en',
       sideBySide: true
      })
    }
  
  
    if(!localStorage.getItem("localdate2")){
       $('.dateto').datetimepicker({
        // defaultDate:new Date(),
         format: 'YYYY-MM-DD ',
         minDate: { minDate: 0 },
       locale: 'en',
       sideBySide: true
        })
    }
    
$('.datetime1').datetimepicker({
  defaultDate: dateFrom, // someVardate
  format: 'YYYY-MM-DD ',
  minDate:  { minDate: 0 },
  locale: 'en',
  sideBySide: true
});

$('.datetime2').datetimepicker({
  defaultDate: dateTo, // someVardate
  minDate: { minDate: 0 },
  format: 'YYYY-MM-DD ',//HH:mm:ss
  locale: 'en',
  sideBySide: true
})
 /* ========= dateto deer 1 odriig nemeh ========*/
$(".datefrom").on("dp.change", function (e) {
  if( e.date ){
    e.date.add(1, 'day');
  }
  $('.dateto').data("DateTimePicker").minDate(e.date);
});
 /* ==============================================*/

 /* ========= datefrom der max odriin zaah ========*/
// $(".datetime2").on("dp.change", function (e) {
//   $('.datetime1').data("DateTimePicker").maxDate(e.date);
// });
 /* ==============================================*/

  

});
    

  
  
  // setting min max value :)
  function minmaxfuncz(value, min, max) 
  {
      if(parseInt(value) > 0) 
      {
          console.log('red');
      }
  
      if(parseInt(value) < min || isNaN(parseInt(value))) 
      {
          return min; 
      }
      else if(parseInt(value) > max) {
          return max; 
      }
      else{ 
          return value;
      }
  }
  
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


  // function getData2(){
  //   var arrData = [];
      
  //   $("input.custom-selects").each(function () {  
  //     var selText  = $(this).val();  
  //     if(selText != 0)
      
  //       $(this).closest('div.row').each(function () {
          
  //           var currentRow=$(this);
  //           var idColeach = currentRow.find("div.col:eq(1) .roome").val();
  //           var col1_value=currentRow.find("div.col:eq(1)").text();
  //           // var col2_value=currentRow.find("col:eq(2)").text();
  //           var col2_value=currentRow.find("div.col:eq(2) > input").val();
  //           var col3_value=currentRow.find("div.col:eq(3)").text();
  //           // var col4_value=currentRow.find("col:eq(4) > input").val();
  //           var col4_value=currentRow.find("div.col:eq(4)").text();


  //           var obj={};
  //               obj.col0=idColeach;
  //               obj.col1=col1_value;
  //               obj.col2=col2_value;
  //               obj.col3=col3_value;
  //               obj.col4=col4_value;

  //           arrData.push(obj);
  //       });
  //   });
  //   localStorage.setItem("seData", JSON.stringify(arrData));
  // }


  function getData2(){
    var arrData = [];
      
    $("input.custom-selects").each(function () {  
      var selText  = $(this).val();  
      if(selText != 0)
      
        $(this).closest('div.card').each(function () {
          
            var currentRow=$(this);
            var idColeach = currentRow.find("div.ss:eq(1) .roome").val();
            var col1_value=currentRow.find("div.ss:eq(1)").text();
            // var col2_value=currentRow.find("col:eq(2)").text();
            var col2_value=currentRow.find("div.ss:eq(2) > input").val();
            var col3_value=currentRow.find("div.ss:eq(3)").text();
            // var col4_value=currentRow.find("col:eq(4) > input").val();a
            var col4_value=currentRow.find("div.ss:eq(4)").text();


            var obj={};
                obj.col0=idColeach;
                obj.col1=col1_value;
                obj.col2=col2_value;
                obj.col3=col3_value;
                obj.col4=col4_value;

            arrData.push(obj);
        });
    });
    localStorage.setItem("seData", JSON.stringify(arrData));
  }

  // Assigning localstorage data to booking details inputs.. 
  (function(){

      var x = JSON.parse(localStorage.getItem("seData"));
      
      $.each(x, function(i, item){
        console.log(x[i].col0);

        $(".orderedUruu tbody").append(
          "<tr>", 
            "<td name='toroltd'><input style='display: none;'class='turul' name='roomtypeid[]' type='text' value=' "+ x[i].col0 +" ' />"+ x[i].col1 +"</td>", 
            "<td name='tooo'><input style='display: none; class='turul' name ='too[]' type='text' value='" +   x[i].col2 + " ' >"+   x[i].col2 +" </td>",
            "<td name='une'>" +   x[i].col3 + "</td>",
          "</tr>" 
        );
      
      });
  }());    




  function getDate(){
   
    date1 = jQuery('.datefrom').val();
    date2 = jQuery('.dateto').val();
    room_quantity = jQuery('.room_quantity').val();
    person_quantity = jQuery('.person_quantity').val();
    destination = jQuery('.destination').val();

  
    localStorage.setItem("localdate1", date1); 
    localStorage.setItem("localdate2", date2); 
    localStorage.setItem("localdate3",  room_quantity ); 
    localStorage.setItem("localdate4",  person_quantity ); 
    localStorage.setItem("localdate5",  destination ); 

    //days calculator
  dt1 = new Date(date1);
  dt2 = new Date(date2);
  diff= Math.floor((Date.UTC(dt2.getFullYear(), dt2.getMonth(), dt2.getDate()) - Date.UTC(dt1.getFullYear(), dt1.getMonth(), dt1.getDate()) ) /(1000 * 60 * 60 * 24)); //difference
  localStorage.setItem("day", diff); 
  }
  

  
  
    (function(){
      
    dateFrom = localStorage.getItem("localdate1");
    dateTo= localStorage.getItem("localdate2");
    room_quantity = localStorage.getItem("localdate3");
    person_quantity = localStorage.getItem("localdate4");
    des = localStorage.getItem("localdate5");

    diffrence= localStorage.getItem("day");
    
    jQuery('.datefrom1').append(dateFrom ); //console.log(axe);
      jQuery('.datefrom11').val(dateFrom);
  
    jQuery('.dateto1').append(dateTo ); //console.log(axe);
    jQuery('.dateto11').val(dateTo);
      
    jQuery('.room_quantity').val( room_quantity);
    jQuery('.person_quantity').val( person_quantity);
    jQuery('.destination').val( des);
      
   jQuery('.diffrence').text(diffrence);
   
 

    }());
  
  
  
    // function localdelete() {
    //   localStorage.clear();
    // }
  


    
// rating
(function() {
  var boxes = document.querySelectorAll("input[type='checkbox']");
  for (var i = 0; i < boxes.length; i++) {
      var box = boxes[i];
      if (box.hasAttribute("store")) {
          setupBox(box);
      }
  }
  
  function setupBox(box) {
      var storageId = box.getAttribute("store");
      var oldVal    = localStorage.getItem(storageId);
      console.log(oldVal);
      box.checked = oldVal === "true" ? true : false;
      
      box.addEventListener("change", function() {
          localStorage.setItem(storageId, this.checked); 
      });
  }

})();


// service 
(function() {
  var boxes = document.querySelectorAll("input[type='checkbox']");
  for (var i = 0; i < boxes.length; i++) {
      var box2 = boxes[i];
      if (box2.hasAttribute("facility")) {
          setupBoxx(box2);
      }
  }
  
  function setupBoxx(box2) {
      var storageIde = box2.getAttribute("facility");
      var oldValue    = localStorage.getItem(storageIde);
      console.log(oldValue);
      box2.checked = oldValue === "true" ? true :box2.checked
      box2.addEventListener("change", function() {
        localStorage.setItem(storageIde, this.checked); 
      });
      
      
      jQuery('#clears').click(function(){
        box2.checked = oldValue === "true" ? false :box2.checked
      // box2.checked = false;
      $('#form').submit();
        localStorage.setItem(storageIde,null);
      console.log('w');
    });
  }
})();


       

// Room

// $('#booking_room').each( function(){
//   var form = $(this);    // this is important, make the "form" local inside the function, otherwise $(this) changes scope each loop!
//   form.validate({
//       rules: {
//           'uruu':{required:true,min:1 },
//      },
//      messages: {
//       // room_title: "Required",
//       // lastname: "Please enter your lastname",
//   },

//   errorElement: "em",
//   errorPlacement: function ( error, element ) {
//       // Add the `invalid-feedback` class to the error element
//       error.addClass( "invalid-feedback" );

//       if ( element.prop( "type" ) === "multiple" ) {
//           error.insertAfter( element.next( "label" ) );
//       } else {
//           error.insertAfter( element );
//       }
//   },
//   highlight: function ( element, errorClass, validClass ) {
//       $( element ).addClass( "is-invalid" ).removeClass( "is-valid" );
//   },
//   unhighlight: function (element, errorClass, validClass) {
//       $( element ).addClass( "is-valid" ).removeClass( "is-invalid" );
//   }

//   });
// });



// var arrData = [];

//   $("input.custom-selects").each(function () {  
//     var selText  = $(this).val();  
//     if(selText != 0)
    
//       $(this).closest('tr').each(function () {
        
//       var currentRow=$(this);
//           var idColeach = currentRow.find("td:eq(1)>.rnam").attr("data-id");
//           var col1_value=currentRow.find("td:eq(1)").text();
//           var col2_value=currentRow.find("td:eq(2)").text();
//           var col3_value=currentRow.find("td:eq(3)").text();
//           var col4_value=currentRow.find("td:eq(4) > input").val();

//           var obj={};
//               obj.col0=idColeach;
//               obj.col1=col1_value;
//               obj.col2=col2_value;
//               obj.col3=col3_value;
//               obj.col4=col4_value;

//           arrData.push(obj);
//       });
//   });

//   localStorage.setItem("seData", JSON.stringify(arrData));






// $("#booking_room").validate({
//   rules:{
//     a:{required:true,min:1 },
//     // 'hun':{required:true, min:1},
//   },
//   messages: {
//       // room_title: "Required",
//       // lastname: "Please enter your lastname",
//   },

//   errorElement: "em",
//   errorPlacement: function ( error, element ) {
//       // Add the `invalid-feedback` class to the error element
//       error.addClass( "invalid-feedback" );

//       if ( element.prop( "type" ) === "multiple" ) {
//           error.insertAfter( element.next( "label" ) );
//       } else {
//           error.insertAfter( element );
//       }
//   },
//   highlight: function ( element, errorClass, validClass ) {
//       $( element ).addClass( "is-invalid" ).removeClass( "is-valid" );
//   },
//   unhighlight: function (element, errorClass, validClass) {
//       $( element ).addClass( "is-valid" ).removeClass( "is-invalid" );
//   }

// });


$("#user_register").validate({
  rules:{
    lastname:{required:true, },
    email:{required:true, email: true,},
    phone:{required:true, number: true,min:6},
    // checkbox:{required:true,},
    // 'hun':{required:true, min:1},
  },
  messages: {
      // room_title: "Required",
      // lastname: "Please enter your lastname",
  },

  errorElement: "em",
  errorPlacement: function ( error, element ) {
      // Add the `invalid-feedback` class to the error element
      error.addClass( "invalid-feedback" );

      if ( element.prop( "type" ) === "multiple" ) {
          error.insertAfter( element.next( "label" ) );
      } else {
          error.insertAfter( element );
      }
  },
  highlight: function ( element, errorClass, validClass ) {
      $( element ).addClass( "is-invalid" ).removeClass( "is-valid" );
  },
  unhighlight: function (element, errorClass, validClass) {
      $( element ).addClass( "is-valid" ).removeClass( "is-invalid" );
  }

});






// jquery jishee
jQuery('<div class="quantity-nav"><div class="quantity-button quantity-up">+</div><div class="quantity-button quantity-down">-</div></div>').insertAfter('.quantity input');
jQuery('.quantity').each(function() {
  var spinner = jQuery(this),
    input = spinner.find('input[type="number1"]'),
    btnUp = spinner.find('.quantity-up'),
    btnDown = spinner.find('.quantity-down'),
    min = input.attr('min'),
    max = input.attr('max');

  btnUp.click(function() {
    var oldValue = parseFloat(input.val());
    if (oldValue >= max) {
      var newVal = oldValue;
    } else {
      var newVal = oldValue + 1;
    }
    spinner.find("input").val(newVal);
    spinner.find("input").trigger("change");
  });

  btnDown.click(function() {
    var oldValue = parseFloat(input.val());
    if (oldValue <= min) {
      var newVal = oldValue;
    } else {
      var newVal = oldValue - 1;
    }
    spinner.find("input").val(newVal);
    spinner.find("input").trigger("change");
  });

});