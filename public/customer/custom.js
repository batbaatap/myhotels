$(document).ready(function () {



/* ==================== dateTo, dateFrom dahi localstorage-iin  utga baihgui ued =======================*/

    if(!localStorage.getItem("localdate1")){
     $('.datefrom').datetimepicker({
      //  defaultDate: moment().add(1, 'y'),
      defaultDate: moment(),
       format: 'YYYY-MM-DD',
       minDate: { minDate: 0 },
       locale: 'en',
       sideBySide: true
      })
    }
   
    if(!localStorage.getItem("localdate2")){
       
          // date = new Date();    
          // tomorrow = new Date(date.getFullYear(), date.getMonth(), (date.getDate() + 1));  /*==calculate tommorow ===*/
          var df=$('.datefrom').val();
          var dateObj = new Date(df);
             var numberOfDaysToAdd = 1;
          dateObj.setDate(dateObj.getDate() + numberOfDaysToAdd); 

       $('.dateto').datetimepicker({
          minDate: dateObj,
          defaultDate: dateObj,
          // minDate: { minDate: 0 },
          format: 'YYYY-MM-DD',
          locale: 'en',
          sideBySide: true

        })
    }
  

 /* ========= search hesgiin  uruu,hun,chiglel deer localstorage dahi utga baihgui bol ========*/

    if(!localStorage.getItem("localdate3")){
      jQuery('.room_quantity').val(1);
    }
    if(!localStorage.getItem("localdate4")){
      jQuery('.person_quantity').val(1);
    }
    
    $('.destination').change(function() {
      localStorage.setItem('localdate5', this.value);
  });
  if(localStorage.getItem('localdate5')){
      $('.destination').val(localStorage.getItem('localdate5'));
  }

 /* ===================== dateTo, dateFrom dahi localstorage utga bgaa bol ================================*/

$('.datetime1').datetimepicker({
  // defaultDate: new Date(), // someVardate
  format: 'YYYY-MM-DD ',
  minDate:  { minDate: 0 },
  locale: 'en',
  sideBySide: true
});

$('.datetime2').datetimepicker({
  // defaultDate: dateTo, // someVardate
  minDate: { minDate: 0 },
  format: 'YYYY-MM-DD ',//HH:mm:ss
  locale: 'en',
  sideBySide: true
})

if(localStorage.getItem("localdate1")){
  jQuery('.datetime1').val(dateFrom);
}
if(localStorage.getItem("localdate2")){
  jQuery('.datetime2').val(dateTo);
}



 /* ========= dateto deer 1 odriig nemeh ========*/
$(".datefrom").on("dp.change", function (e) {
  if( e.date ){
    e.date.add(1, 'day');
  }
  $('.dateto').data("DateTimePicker").minDate(e.date);
});
 
//example



 /* ========= datefrom der max odriin zaah ========*/

      // $(".datetime2").on("dp.change", function (e) {
      //   $('.datetime1').data("DateTimePicker").maxDate(e.date);
      // });

});
    

  
  /* ========= setting min max value :)  ========*/
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

//==================== room page-s booking details inputs utgiig awah..  ============================================
// $("input.custom-selects").click(function () {  

//   alert("re");


  function getData2(){

    

    var arrData = [];
      
    $(".custom-selects").each(function () {  
      var selText  = $(this).val();  
      

      if(selText != 0) 
      
        $(this).closest('.card').each(function () {
          
            var currentRow=$(this);
        
            // var idColeach = currentRow.find(".rnam").attr("data-id");
            var idColeach = currentRow.find(" input[name='roome']").val();
            var col1_value=currentRow.find(".card-body h4").text();
            var col2_value=currentRow.find(".card-body input[name='uruu']").val();
            var col3_value=currentRow.find(" .hongololttei_une").text();

            var obj={};
                obj.col0=idColeach;
                obj.col1=col1_value;
                obj.col2=col2_value;
                obj.col3=col3_value;

            arrData.push(obj);
        });
    });
    localStorage.setItem("seData", JSON.stringify(arrData));
  }
// });


  

  // Assigning localstorage data to booking details inputs.. 
  (function(){

      var x = JSON.parse(localStorage.getItem("seData"));
      
      $.each(x, function(i, item){
        // console.log(x[i].col0);

        $(".orderedUruu tbody").append(
          "<tr>", 
          "<td name='toroltd'><input style='display: none;'class='turul' name='roomtypeid[]' type='text' value=' "+ x[i].col0 +" ' />"+ x[i].col1 +"</td>", 
            "<td name='tooo'><input style='display: none; class='turul' name ='too[]' type='text' value='" +   x[i].col2 + " ' >"+   x[i].col2 +" өрөө </td>",
            "<td name='une'>" +   x[i].col3 + " </td>",
          "</tr>" 
        );
      
      });
  }());    



//===localstorage-====================================
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

    //===days calculator====================================

  dt1 = new Date(date1);
  dt2 = new Date(date2);
  diff= Math.floor((Date.UTC(dt2.getFullYear(), dt2.getMonth(), dt2.getDate()) - Date.UTC(dt1.getFullYear(), dt1.getMonth(), dt1.getDate()) ) /(1000 * 60 * 60 * 24)); //difference
  localStorage.setItem("day", diff); 
  }
  

  
  //==============================================================
  // local dah utguudiig huwisagchind hadgalj bui heseg 
  //==============================================================
    (function(){
      
    dateFrom = localStorage.getItem("localdate1");
    dateTo= localStorage.getItem("localdate2");
    room_quantity = localStorage.getItem("localdate3");
    person_quantity = localStorage.getItem("localdate4");
    diffrence= localStorage.getItem("day");
    
    //booking-details blade
    jQuery('.datefrom1').append(dateFrom ); //console.log(axe);
      jQuery('.datefrom11').val(dateFrom);
  
    jQuery('.dateto1').append(dateTo ); //console.log(axe);
    jQuery('.dateto11').val(dateTo);
      
    jQuery('.room_quantity').val( room_quantity);
    jQuery('.person_quantity').val( person_quantity);
      
   jQuery('.diffrence').text(diffrence + ' хоног');
   
 

    }());
  
  
  
    
  


    
//========= ===========================================
//    rating
//========= ===========================================
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




//==========================================================
// service
//==========================================================

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



// ========== booking details -> user register =============================================
$("#user_register").validate({
  rules:{
    lastname:{required:true, },
    email:{required:true, email: true,},
    phone:{required:true, number: true,minlength:6},
    checkbox:{required:true,},
    // 'hun':{required:true, min:1},
  },
  messages: {
     lastname: "Өөрийн нэрийг оруулна уу!",
      email:"Имэйл хаягаа оруулна уу!",
      phone:"Утасны дугаараа оруулна уу!",
      checkbox: {
        required: ""
      }
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






function myFunction() {
 localStorage.clear();
}