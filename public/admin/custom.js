// ====================
// Өрөө нэмэх дээр дарахад сүүлийн баганы утгыг авч хэвлэнэ
// ==================-=
$("#uruu_nemeh").on('click', function(){        
    var newRow = $('.room_table_row:last').clone().insertAfter('.room_table_body tr:last');
                newRow.find('th:first').text($('.room_table_body tr').length - 1); //increment each row by 1
            $('.room_table_body tr:last td :input').val(''); //clear form field values
    
    });