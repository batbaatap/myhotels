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
    
    var ad_too=[];
    var ch_too=[];

    for(var i = 0; i<adult_r.length; i++){
        ad_too.push(parseInt(adult_r[i].value));
    }

    for(var i = 0; i<children_r.length; i++){
        ch_too.push(parseInt(children_r[i].value));
    }

    $("[name='adults']").val(ad_too.reduce(myFunc));
    function myFunc(total, num) {
        return total + num;
    }

    $("[name='children']").val(ch_too.reduce(myFunc2));
    function myFunc2(total, num) {
        return total + num;
    }
});

// ====================
// Өрөө нэмэх дээр дарахад сүүлийн баганы утгыг авч хэвлэнэ
// ==================-=





// ====================
// Өрөө нэмэх дээр дарахад сүүлийн баганы утгыг авч хэвлэнэ
// ==================-=


