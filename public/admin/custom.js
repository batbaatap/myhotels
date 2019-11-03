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
        lastname  :  {required:true},
        email  :     {required:true},
        address  :   {required:true},
        postcode  :  {required:true},
        city  :      {required:true},
        phone  :     {required:true},
        country  :   {required:true},
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

    






// calendar

$(function(){
    $('#from_picker, #start_picker').datepicker({
        dateFormat: 'dd/mm/yy',
        //minDate: 0,
        onClose: function (selectedDate, instance){
            if(selectedDate != '') {
                var relPicker = $('#'+$(this).attr('rel'));
                relPicker.datepicker('option', 'minDate', selectedDate);
                var date = $.datepicker.parseDate(instance.settings.dateFormat, selectedDate, instance.settings);
                date.setMonth(date.getMonth() + 1);
                relPicker.datepicker('option', 'minDate', selectedDate);
                relPicker.datepicker('option', 'maxDate', date);
            }
        }
    });
    $('#to_picker, #end_picker').datepicker({
        dateFormat: 'dd/mm/yy',
        defaultDate: '+1w',
        onClose: function (selectedDate){
            var relPicker = $('#'+$(this).attr('rel'));
            relPicker.datepicker('option', 'maxDate', selectedDate);
        }
    });
    // <?php
    // if(isset($field_notice) && !empty($field_notice))
    //     foreach($field_notice as $field => $notice) echo '$(\'.field-notice[rel="'.$field.'"]\').html(\''.$notice.'\').fadeIn(\'slow\').parent().addClass(\'alert alert-danger\');'."\n"; ?>
});



// </script>
// <script>



$(function(){
    
    var curr_start_id = '';
    var prev_class = '';
    var curr_room = 0;
    var curr_line = -1;
    var curr_date = null;
    var end_clicked = false;
    var start_clicked = false;
    $('.timeline-default:not(.start-d):not(.start-end-d):not(.full)').on('click', function(e){
        if(!$(e.target).closest('a').length){
            var arr_id = $(this).attr('id').split('-');
            var hotel = parseInt(arr_id[1]);
            var room = parseInt(arr_id[2]);
            var line = parseInt(arr_id[3]);
            var date = parseInt(arr_id[4]);
            // set start date
            if((curr_room == 0 || (curr_room > 0 && curr_room != room))
            || (curr_line == -1 || (curr_line > -1 && curr_line != line))
            || (curr_date == null || (curr_date > 0 && curr_date > date))
            || end_clicked){
                
                if(!end_clicked && prev_class != '' && curr_start_id != '') $('#'+curr_start_id).attr('class', '').addClass(prev_class);
                
                prev_class = $(this).attr('class');
                
                var class_attr = ($(this).hasClass('end-d')) ? 'start-end-d' : 'start-d';
                $(this).removeClass('end-d').addClass(class_attr+' booked pending').append('<a class="pending"></a>');
                
                curr_start_id = $(this).attr('id');
                curr_room = room;
                curr_line = line;
                curr_date = date;
                end_clicked = false;
                start_clicked = true;
            }
        }
    });


    $('.timeline-default:not(.end-d):not(.start-end-d):not(.full)').on('click', function(e){
        if(!$(e.target).closest('a').length){
            var arr_id = $(this).attr('id').split('-');
            var hotel = parseInt(arr_id[1]);
            var room = parseInt(arr_id[2]);
            var line = parseInt(arr_id[3]);
            var date = parseInt(arr_id[4]);
            // set end date
            if(curr_room > 0 && curr_room == room
            && curr_line > -1 && curr_line == line
            && curr_date > 0 && curr_date < date
            && start_clicked){
                
                var booked = false;
                var limit = 0;
                var end_id = $(this).attr('id');
                var next_elm = $('#'+curr_start_id).next();
                var next_id = next_elm.attr('id');
                while(next_id != end_id && limit < 31){
                    if($('#'+next_id).hasClass('booked')){
                        booked = true;
                        break;
                    }
                    next_elm = next_elm.next();
                    next_id = next_elm.attr('id');
                    limit++;
                }
                
                if(!booked){
                
                    end_id = $(this).attr('id');
                    end_clicked = true;
                    start_clicked = false;
                    var class_attr = ($(this).hasClass('start-d')) ? 'start-end-d' : 'end-d';
                    $(this).removeClass('start-d').addClass(class_attr).prepend('<a class="pending"></a>');
                    
                    limit = 0;
                    next_elm = $('#'+curr_start_id).next();
                    next_id = next_elm.attr('id');
                    while(next_id != end_id && limit < 31){
                        next_elm.addClass('booked full pending').append('<a class="pending"></a>');
                        next_elm = next_elm.next();
                        next_id = next_elm.attr('id');
                        limit++;
                    }
                    /*var from_time = new Date(curr_date*1000);
                    var from_date = from_time.getUTCFullYear()+'-'+(from_time.getUTCMonth()+1)+'-'+from_time.getUTCDate();
                    var to_time = new Date(date*1000);
                    var to_date = to_time.getUTCFullYear()+'-'+(to_time.getUTCMonth()+1)+'-'+to_time.getUTCDate();*/
                    
                    var nnights = (date-curr_date)/86400;
                    var room_title = $('#room-title-'+room).html().trim();
                    //var room_num = $('#room-num-'+room+'-'+line).html().trim().replace('#', '%23');
                    
                    if($('#context-menu').length == 0){
                        $('body').append('<div id="context-menu"></div>').on('blur', function(){
                            $(this).hide();
                        });
                    }
                    
                    $('#context-menu').html('<a href="index.php?view=form&id=0&booking_id_hotel_0='+hotel+'&booking_from_date_0='+curr_date+'&booking_to_date_0='+date+'&booking_nights_0='+nnights+'&booking_status_0=1&booking_room_id_hotel_0='+hotel+'&booking_room_id_room_0='+room+'&booking_room_title_0='+room_title+'">New booking</a>'+
                    '<a href="../room/index.php?view=form&id='+room+'&room_closing_from_date_0='+curr_date+'&room_closing_to_date_0='+date+'">New closing date</a>');
                    
                    $('#context-menu').css({
                        'left': e.pageX + 'px',
                        'top': e.pageY + 'px'
                    }).slideDown();
                }
            }
        }
    });
    
    var saved_price = 0;
    $('.price-input').on('focus', function(e){
        var price = $(this).val().replace(/[^\d.-]/g, '');
        $(this).val(price);
        saved_price = price;
    });
    $('.stock-input').on('focus', function(e){
        var stock = $(this).val().replace(/[^\d.-]/g, '');
        $(this).val(stock);
        saved_stock = stock;
    });
    $('.ajax-input').on('blur', function(e){
        e.defaultPrevented;
        
        var input = $(this);
        var val = input.val();
        var form = input.parents('form.ajax-form');
        var action = input.data('action');
        
        $.ajax({
            url: action,
            type: form.attr('method'),
            data: form.serialize(),
            success: function(response){
                var response = $.parseJSON(response);
                        
                if(response.error != ''){
                    if(input.hasClass('price-input')) val = '<?php echo DEFAULT_CURRENCY_SIGN; ?> '+saved_price;
                    else val = saved_stock;
                    input.removeClass('text-success').addClass('text-danger');
                    setTimeout(function(){
                        input.removeClass('text-danger').val(val);
                    }, 1000);
                }
                if(response.success != ''){
                    if(response.html != '') $('[name="rate_id"]', form).val(response.html);
                    if(input.hasClass('price-input')) val = '<?php echo DEFAULT_CURRENCY_SIGN; ?> '+val;
                    else{
                        var remain = val - $('[name="num_bookings"]', form).val();
                        if(remain < 0) remain = 0;
                        $('.remain', form).html(remain);
                        if(remain == 0) form.parents('.timeline-info').addClass('full');
                        else form.parents('.timeline-info').removeClass('full');
                    }
                    input.removeClass('noprice text-danger').addClass('text-success').val(val);
                }
            }
        });
    });
});
// ..end calendar
