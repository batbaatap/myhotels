// ====================
// Clone down last row value
// ==================-=
$("#uruu_nemeh").on('click', function(){        
            var newRow = $('.room_table_row:last').clone().insertAfter('.room_table_body tr:last');
                newRow.find('th:first').text($('.room_table_body tr').length - 1); //increment each row by 1
            $('.room_table_body tr:last td :input').val(''); //clear form field values
});

// ====================
// Calculcating
// ==================-=



// ====================
// calculating num of people 
// ==================-=

$('.room_table_body_custom').on('keyup', function(){
    var adult_r = $("[name='adult_r[]']");
    var children_r = $("[name='children_r[]']");
    var amount_r = $("[name='amount_r[]']");
    
    var ad_too=[];
    var ch_too=[];
    var amount_too=[];

    for(var i = 0; i<adult_r.length; i++){
        ad_too.push(parseInt(adult_r[i].value));
    }

    for(var i = 0; i<children_r.length; i++){
        ch_too.push(parseInt(children_r[i].value));
    }

    for(var i = 0; i<amount_r.length; i++){
        amount_too.push(parseInt(amount_r[i].value));
    }

    $("[name='adults']").val(ad_too.reduce(myFunc));
    function myFunc(total, num) {
        return total + num;
    }

    $("[name='children']").val(ch_too.reduce(myFunc2));
    function myFunc2(total, num) {
        return total + num;
    }
    
    $("[name='total'],[name='balance']").val(amount_too.reduce(myFunc3));
    function myFunc3(total, num) {
        return total + num;
    }
});

// ====================
// Өрөө нэмэх дээр дарахад сүүлийн баганы утгыг авч хэвлэнэ
// ==================-=





// ====================
// jquery validate form
// ==================-=

// Room

$("#add-room").validate({
    rules:{
        room_title:{required:true,},
        room_id_hotel:{required:true,},
        room_alias:{required:true,},
        room_subtitle:{required:true,},
        room_stock:{required:true,},
        room_price:{required:true,},
        room_max_children: {  required:true,},
        room_max_adults: {  required:true,},
        room_max_people: {  required:true,},
        room_min_people: {  required:true,},
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

// Hotel
$("#add-hotel").validate({
    rules:{
        hotel_title: {required:true},
        hotel_alias  : {required:true},
        hotel_address  : {required:true},
        hotel_lat  : {required:true},
        hotel_long  : {required:true}
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


// Booking
$("#add-booking").validate({
    rules:{
        id_hotel: {required:true},
        date_from_and_date_to  : {required:true},
        firstname  : {required:true},
        lastname  : {required:true},
        email  : {required:true},
        address  : {required:true},
        postcode  : {required:true},
        city  : {required:true},
        phone  : {required:true},
        country  : {required:true},
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